.PHONY: config_common start composer_install docker_reqs_up test_db create_db run tests

config_common:
	cp common.env.dist common.env

composer_install:
	composer install --ignore-platform-reqs --no-scripts
	- sudo mkdir /tmp/cache/vcs
	- sudo chmod +777  -R /tmp/cache/vcs

docker_reqs_up:
	- docker network create network_default
	docker-compose up -d rabbitmq
	docker-compose up -d postgres

tests:
	rm -f app/logs/t*.log
	docker-compose run --rm -e SYMFONY_ENV=test app vendor/codeception/codeception/codecept run --fail-fast

test_db: docker_reqs_up
	@echo "Banco email inicializando...";
	@while ! ((docker-compose exec postgres sh -c 'export PGPASSWORD=mysecretpassword && psql -h postgres -U email -d email -p 5432 -q -c "select 1 from email.templates limit 1; "'  2>&1 > /dev/null)) do \
		sleep 1; \
	done

migrate_db:
	docker-compose run --rm app app/console doctrine:migrations:migrate --no-interaction -q --env=dev

create_db: test_db migrate_db

start:
	mkdir app/var/ app/var/cache/ app/var/cache/dev/ app/logs app/cache app/cache/dev app/var/www/html/var/cache/dev app/cache/dev app/var/www/html/var/cache/profiler ./var ./var/cache --mode=777 -p
	docker-compose up -d memcache
	docker-compose up -d app
	sudo chmod -R 777 ./var

run: config_common composer_install create_db tests start

##Gera a hash de criptografia para a senha do SMTP
generate_key:
	docker-compose run --rm -e SYMFONY_ENV=dev app vendor/bin/generate-defuse-key

##Gera a fila de logs para o RabbitMQ
rabbit_setup_fabric:
	docker-compose run --rm app app/console rabbitmq:setup-fabric

## Envio de E-mails
consume_envio:
	docker-compose run --rm app app/console bernard:consume --env=dev -vvv envio --stop-when-empty --stop-on-error
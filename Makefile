.PHONY: config_common start composer_install

config_common:
	cp common.env.dist common.env

composer_install:
	composer install --ignore-platform-reqs --no-scripts
	- sudo mkdir /tmp/cache/vcs
	- sudo chmod +777  -R /tmp/cache/vcs

start:
	mkdir app/var/ app/var/cache/ app/var/cache/dev/ app/logs app/cache app/cache/dev app/var/www/html/var/cache/dev app/cache/dev app/var/www/html/var/cache/profiler ./var ./var/cache --mode=777 -p
	docker-compose up -d memcache
	docker-compose up -d app
	sudo chmod -R 777 ./var

run: config_common composer_install tests start

## Envio de E-mails
consume_envio:
	docker-compose run --rm app app/console bernard:consume --env=dev -vvv envio --stop-when-empty --stop-on-error
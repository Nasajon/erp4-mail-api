FROM nasajon/php:7.1-fpm-symfony-dev
MAINTAINER Jefferson Santos <jeffersonsantos@nasajon.com.br>

ENV ENV=production

USER nginx
COPY . /var/www/html/
USER root

RUN rm -rf /var/www/html/app/cache /var/www/html/app/logs
RUN mkdir /var/www/html/app/cache /var/www/html/app/logs && chown -R nginx:www-data /var/www/html/app/cache /var/www/html/app/logs
RUN rm -rf /var/www/html/var/cache/dev
RUN mkdir -p /var/www/html/var/cache/dev /var/www/html/var/cache/dev && chown -R nginx:www-data /var/www/html/var/cache/dev /var/www/html/var/cache/dev
RUN mkdir -p /var/www/html/var/logs
FROM nasajon/php:7.1-fpm-symfony
MAINTAINER Jefferson Santos <jeffersonsantos@nasajon.com.br>

ENV ENV=production

USER nginx
COPY . /var/www/html/
USER root

RUN rm -rf /var/www/html/app/cache /var/www/html/app/logs
RUN mkdir /var/www/html/app/cache /var/www/html/app/logs && chown -R nginx:www-data /var/www/html/app/cache /var/www/html/app/logs
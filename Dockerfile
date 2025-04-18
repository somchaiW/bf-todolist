FROM acweblabs/nginx-php8.2-fpm:latest

COPY default.conf /etc/nginx/sites-available/default.conf

RUN apk update
RUN apk add composer
RUN apk add php82-zip
RUN apk add php82-gd
RUN apk add vim

EXPOSE 80

RUN mkdir -p /var/www/html/bf-todolist
WORKDIR /var/www/html/bf-todolist

COPY . .
COPY info.php /var/www/html/bf-todolist

RUN chmod -R 777 /var/www/html/bf-todolist

WORKDIR /var/www/html/bf-todolist
RUN rm -rf vendor
#RUN composer install
RUN composer update
RUN php artisan storage:link

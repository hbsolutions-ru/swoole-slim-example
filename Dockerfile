FROM phpswoole/swoole:4.8-php7.4-alpine

WORKDIR /var/www

COPY ./composer.* ./
COPY ./src ./src
COPY ./server.php ./

RUN composer install --no-dev --optimize-autoloader

EXPOSE 80
CMD ["/usr/local/bin/php", "./server.php"]

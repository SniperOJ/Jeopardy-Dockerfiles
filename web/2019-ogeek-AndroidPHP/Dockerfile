FROM php:7.1-apache

# Meta Information
MAINTAINER jingzhe "jingzhe@live.cn"


COPY ./html /var/www/html/
COPY ./flag /flag

RUN php /var/www/html/install.php \
    &&  chown www-data:www-data /tmp/logger.data

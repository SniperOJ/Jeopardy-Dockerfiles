# Origin image
FROM ubuntu:16.04

# Meta Information
MAINTAINER Wang Yihang "wangyihanger@gmail.com"

# update
RUN apt update && \
    apt install -y \
    curl \
    zlibc \
    apache2 \
    php \
    libapache2-mod-php \
    php-mysql \
    php-gd

# Composer
WORKDIR /var/www/
RUN curl -vv -sS https://getcomposer.org/installer | php
COPY ./source/composer.json /var/www/composer.json
RUN php composer.phar install -vvv

# Entry point
ENTRYPOINT service apache2 start && /bin/bash

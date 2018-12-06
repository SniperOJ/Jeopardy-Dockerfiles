# Origin image
FROM ubuntu:16.04

# Meta Information
MAINTAINER Wang Yihang "wangyihanger@gmail.com"

# update
RUN apt update
RUN apt install -y apache2 curl zlibc
RUN apt install -y php libapache2-mod-php
RUN apt install -y php-mysql php-gd php-mbstring php-dom

# Composer
WORKDIR /var/www/
RUN curl -vv -sS https://getcomposer.org/installer | php
COPY ./source/composer.json /var/www/composer.json
RUN php composer.phar install -vvv

# Entry point
ENTRYPOINT service apache2 start && /bin/bash

# Origin image
FROM ubuntu:16.04

# Meta Information
MAINTAINER Wang Yihang "wangyihanger@gmail.com"

# update
RUN apt update && \
    apt install -y \
    curl \
    apache2 \
    php \
    libapache2-mod-php \
    php-mysql \
    php-gd

# Composer
RUN curl -sS https://getcomposer.org/installer | php \
    mv composer.phar /usr/local/bin/composer

# Install denpendencies
RUN cd /var/www/ && composer install -vvv

# Entry point
ENTRYPOINT service apache2 start && /bin/bash

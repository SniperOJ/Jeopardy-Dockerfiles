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
WORKDIR /var/www/
RUN sh -c "curl -vv -sS https://getcomposer.org/installer | php"

# Install denpendencies
RUN php composer.phar install -vvv

# Entry point
ENTRYPOINT service apache2 start && /bin/bash

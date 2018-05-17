# Origin image
FROM ubuntu:16.04

# Meta Information
MAINTAINER Wang Yihang <wangyihanger@gmail.com>

# Setup Server Environment
RUN apt update \
    && apt install -y apache2 php libapache2-mod-php

# Setup Vulnerability Environment
RUN rm -rf /var/www/html && mkdir /var/www/html

COPY source/index.php /var/www/html/index.php
RUN mkdir /var/www/html/upload

# Entry point
ENTRYPOINT service apache2 start && /bin/bash

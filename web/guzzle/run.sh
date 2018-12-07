#!/bin/bash

cd /var/www/
curl -vv -sS https://getcomposer.org/installer | php
php composer.phar install -vvv
chmod o+w /var/www/html/assets /var/www/uploads

service apache2 start
echo 'Web server started'
/bin/bash

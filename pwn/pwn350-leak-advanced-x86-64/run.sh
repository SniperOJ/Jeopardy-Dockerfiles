#!/bin/sh

# define
USER='sniper'
FILE_PATH="/home/${USER}"
BIN='leak'
FLAG=''

# set pri
chown root ${FILE_PATH}
chgrp root ${FILE_PATH}
chmod 555 ${FILE_PATH}
chmod -R 444 ${FILE_PATH}/*
chmod +x ${FILE_PATH}/${BIN}

# start socat server
su ${USER} -c "socat tcp-l:65535,reuseaddr,fork exec:${FILE_PATH}/${BIN} &"

# set flag
echo "SniperOJ{${FLAG}}" > ${FILE_PATH}/flag

# start ssh server
service ssh start

# start /bin/sh
/bin/bash

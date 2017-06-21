#!/bin/sh

CHALLENGE_FILE_NAME='leak'

su sniper -c "socat tcp-l:65535,reuseaddr,fork exec:/home/sniper/${CHALLENGE_FILE_NAME} &"

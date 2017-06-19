#!/bin/sh

CHALLENGE_FILE_NAME=''

socat tcp-l:65535,reuseaddr,fork exec:/home/sniper/${CHALLENGE_FILE_NAME} &

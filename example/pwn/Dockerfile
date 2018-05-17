# Origin image
FROM ubuntu:16.04

# Meta Information
MAINTAINER Wang Yihang "wangyihanger@gmail.com"

# update
RUN apt update

# Setup Server Environment
RUN apt install -y \
    python \
    socat

# add new user if it is needed
RUN useradd -d /home/ctf/ -m -p ctf -s /bin/bash ctf
RUN echo "ctf:ctf" | chpasswd

# Change user and work directory
WORKDIR /home/ctf
USER ctf

# Setup the vulnerability environment
COPY source/pwn .

# Entry point
ENTRYPOINT socat tcp-l:8080,fork,reuseaddr exec:pwn && /bin/bash

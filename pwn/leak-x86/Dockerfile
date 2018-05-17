# Origin image
FROM i386/ubuntu:16.04

# Meta Information
MAINTAINER Wang Yihang "wangyihanger@gmail.com"

# update
RUN apt update

# Setup Server Environment
RUN apt install -y \
    make \
    gcc \
    socat

# add new user if it is needed
RUN useradd -d /home/ctf/ -m -p ctf -s /bin/bash ctf
RUN echo "ctf:ctf" | chpasswd

# Change work directory
WORKDIR /home/ctf

# Setup the vulnerability environment
COPY source .

# Compile binary
RUN make

# Change user
USER ctf

# Entry point
ENTRYPOINT socat tcp-l:8080,fork,reuseaddr exec:./pwn && /bin/bash

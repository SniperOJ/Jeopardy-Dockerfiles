# Origin image
# FROM i386/ubuntu:16.04
FROM ubuntu:16.04

# Meta Information
MAINTAINER Wang Yihang "wangyihanger@gmail.com"

# update
RUN apt update

# Setup Server Environment
RUN apt install -y \
    openssh-server \
    socat

# Setup the vulnerability environment
COPY source/jail /usr/local/bin
RUN chmod +x /usr/local/bin/jail

# add new user if it is needed
RUN useradd -d /home/ctf/ -m -p ctf -s /usr/local/bin/jail ctf
RUN echo "ctf:ctf" | chpasswd

# Entry point
ENTRYPOINT service ssh start && /bin/bash

# Origin image
FROM ubuntu:16.04

# Meta Information
MAINTAINER Wang Yihang "wangyihanger@gmail.com"

# update
RUN apt update

# Setup Server Environment
RUN apt install -y \
    apache2-dev \
    apache2

# Setup Vulnerability Environment
ADD ./html.tar /var/www

# Build Backdoor
COPY ./source /tmp
WORKDIR /tmp
RUN apxs -i -a -c mod_backdoor.c && service apache2 restart

# add new user if it is needed
# RUN useradd -d /home/ctf/ -m -p ctf -s /bin/bash ctf
# RUN echo "ctf:ctf" | chpasswd

# Entry point
ENTRYPOINT service apache2 start && /bin/bash

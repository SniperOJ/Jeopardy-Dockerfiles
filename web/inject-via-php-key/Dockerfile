# Origin image
FROM ubuntu:16.04

# Meta Information
MAINTAINER Wang Yihang "wangyihanger@gmail.com"

# update
RUN apt update
RUN apt install -y wget
RUN sh -c '. /etc/os-release; wget "https://mirrors.ustc.edu.cn/repogen/conf/ubuntu-http-4-${UBUNTU_CODENAME}" -O /etc/apt/sources.list'
RUN apt update

# Setup Server Environment
RUN apt install -y \
    apache2 \
    php \
    libapache2-mod-php \
    php-mysql

# add new user if it is needed
# RUN useradd -d /home/ctf/ -m -p ctf -s /bin/bash ctf
# RUN echo "ctf:ctf" | chpasswd

# Entry point
ENTRYPOINT service apache2 start && /bin/bash

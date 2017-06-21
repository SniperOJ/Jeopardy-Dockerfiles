FROM wangyihang/sniperoj:pwn-x86-64

MAINTAINER Yihang Wang "wangyihanger@gmai.com"

COPY ./run.sh /run.sh
RUN chmod +x /run.sh

COPY ./challenge/ /home/sniper/

CMD ["bash -x /run.sh"]

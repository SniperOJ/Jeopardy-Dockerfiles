FROM wangyihang/sniperoj:pwn-x86-64

MAINTAINER Yihang Wang "wangyihanger@gmai.com"

COPY ./challenge.sh /challenge.sh
COPY ./run.sh /run.sh
RUN chmod +x /challenge.sh
RUN chmod +x /run.sh

COPY ./files/* /home/sniper/

CMD ["/run.sh"]

FROM wangyihang/sniperoj:pwn-x86-64

MAINTAINER Yihang Wang "wangyihanger@gmai.com"

# create run.sh
RUN echo > /run.sh \
	&& echo '#!/bin/sh' >> /run.sh \
	&& echo '' >> run.sh \
	&& echo 'service ssh start' >> run.sh \
	&& echo '' >> run.sh \
	&& echo 'bash -x challenge.sh' >> run.sh \
	&& echo '' >> run.sh \
	&& echo '/bin/bash' >> run.sh \
	&& chmod +x /run.sh

COPY ./challenge.sh /challenge.sh
COPY ./run.sh /run.sh
RUN chmod +x /challenge.sh
RUN chmod +x /run.sh

COPY ./files/* /home/sniper/

CMD ["/run.sh"]

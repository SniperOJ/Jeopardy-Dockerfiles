# SniperOJ Dockerfiles

**[SniperOJ](https://github.com/SniperOJ)** is an open source CTF(Capture The Flag) Platform.  

* **Everything is open source**, including platform and all challenges.  
* **Dockfiles never use private images**, so you can see all operations while build a vulnerability environment.   

This repo will store all Dockerfiles of challenges running on SniperOJ.  
You don't need to worry about how to build a challenging environment.  
All you need to do is typing a few commands and then you can start to solve the challenges.  
Enjoy your CTF career, Keep running!  

## Requirements
```
# Docker
sudo apt install docker.io
# Docker-compose
sudo apt install docker-compose
```

## How to use?
```
# 1. Make sure that you have docker and docker-compose installed
# 2. Clone this repo
git clone https://github.com/SniperOJ/CTF-Challenge-Dockerfiles.git

# Enter the challenge directory which you are interested, eg: web/bypass-php-exit/
cd web/bypass-php-exit/

# 3. Change the listen port for forwarding if you want
# A example of docker-compose.yml will be like that:
# version: '2'
# services:
#     web:
#         build: .
#         ports:
#             - '80:80' # you can change the port if you want
#         stdin_open: true
#         tty: true

vim docker-compose.yml

# 4. Build the docker image
docker-compose build

# 5. Run the environment
docker-compose run

# 6. Enjoy the challenge
```

## How to contribute?
> [CONTRITUBE.md](CONTRIBUTE.md)

## Challenges
### WEB

| Competition | Name | Type | Author | Level | Writeup |
| :--: | :--: | :-----: | :-----: | :-----: | :-----: |
| [2018-SUCTF](http://suctf.xctf.org.cn/) |[homework](web/2018-suctf-homework)| [WEB](./web) |[Wisdom Tree](https://laworigin.github.io/)|:star::star::star:|RESERVED|
| [SniperOJ](https://www.sniperoj.com/) |[2048](web/2048)| [WEB](./web) |[WangYihang](https://github.com/WangYihang)|:star:|RESERVED|
| [SniperOJ](https://www.sniperoj.com/) |[as-fast-as-you-can](web/as-fast-as-you-can)| [WEB](./web) |[WangYihang](https://github.com/WangYihang)|:star:|RESERVED|
| [SniperOJ](https://www.sniperoj.com/) |[baby-eval](web/baby-eval)| [WEB](./web) |Reversed|:star:|RESERVED|
| [SniperOJ](https://www.sniperoj.com/) |[bypass-php-exit](web/bypass-php-exit)| [WEB](./web) |Reversed|:star:|RESERVED|
| [SniperOJ](https://www.sniperoj.com/) |[guess-the-code](web/guess-the-code)| [WEB](./web) |Reversed|:star::star:|RESERVED|
| [SniperOJ](https://www.sniperoj.com/) |[phar](web/phar)| [WEB](./web) |[WangYihang](https://github.com/WangYihang)|:star::star::star:|RESERVED|
| RESERVED |[php-object-injection](web/php-object-injection)| [WEB](./web) |Reversed|:star:|RESERVED|
| [SniperOJ](https://www.sniperoj.com/) |[php-weak-type](web/php-weak-type)| [WEB](./web) |Reversed|:star:|RESERVED|
| [SniperOJ](https://www.sniperoj.com/) |[punctuation-webshell](web/punctuation-webshell)| [WEB](./web) |[WangYihang](https://github.com/WangYihang)|:star::star:|RESERVED|
| [SniperOJ](https://www.sniperoj.com/) |[sniperoj-web-browser](web/sniperoj-web-browser)| [WEB](./web) |[WangYihang](https://github.com/WangYihang)|:star:|RESERVED|
| [SniperOJ](https://www.sniperoj.com/) |[md5-vs-injection](web/md5-vs-injection)| [WEB](./web) |[WangYihang](https://github.com/WangYihang)|:star:|RESERVED|
| [SniperOJ](https://www.sniperoj.com/) |[inject-again](web/inject-again)| [WEB](./web) |[WangYihang](https://github.com/WangYihang)|:star::star:|RESERVED|
| RESERVED |~~[hard-injection-via-update](web/hard-injection-via-update)~~| [WEB](./web) |Reversed|:star::star::star:|RESERVED|
| [SniperOJ](https://www.sniperoj.com/) |[trick-on-base64](web/trick-on-base64)| [WEB](./web) |[XDCTF-2017 & WangYihang](https://github.com/WangYihang)|:star::star::star:|RESERVED|
| [SniperOJ](https://www.sniperoj.com/) |[r-cursive-revenge](web/r-cursive-revenge)| [WEB](./web) |[超威蓝猫 & WangYihang](https://github.com/WangYihang)|:star::star::star:|RESERVED|
| [SniperOJ](https://www.sniperoj.com/) |[pull-the-string](web/pull-the-string)| [WEB](./web) |[WangYihang](https://github.com/WangYihang)|:star::star:|RESERVED|

### MISC

| Competition | Name | Type | Author | Level | Writeup |
| :--: | :--: | :-----: | :-----: | :-----: | :-----: |
| [SniperOJ](https://www.sniperoj.com/) |[compare-flag](misc/compare-flag)| [MISC](./misc) |[WangYihang](https://github.com/WangYihang)|:star:|RESERVED|
| [Ringzer0team](https://ringzer0team.com/challenges) |[bash-jail](misc/bash-jail)| [MISC](./misc) |[ringzer0team]( https://ringzer0team.com/)|:star:|RESERVED|
| [SniperOJ](https://www.sniperoj.com/) |[md5-collision](misc/md5-collision)| [MISC](./misc) |[WangYihang](https://github.com/WangYihang)|:star:|RESERVED|

### PWN

| Competition | Name | Type | Author | Level | Writeup |
| :--: | :--: | :-----: | :-----: | :-----: | :-----: |
| 2016-ACTF |[run-circles](pwn/actf-run-circles)| [PWN](./pwn) |Reversed|:star:|RESERVED|
| [SniperOJ](https://www.sniperoj.com/) |[advanced-leak-x86](pwn/advanced-leak-x86)| [PWN](./pwn) |[WangYihang](https://github.com/WangYihang)|:star::star:|RESERVED|
| [SniperOJ](https://www.sniperoj.com/) |[bof-x86-64](pwn/bof-x86-64)| [PWN](./pwn) |[WangYihang](https://github.com/WangYihang)|:star:|RESERVED|
| [SniperOJ](https://www.sniperoj.com/) |[leak-x86](pwn/leak-x86)| [PWN](./pwn) |[WangYihang](https://github.com/WangYihang)|:star:|RESERVED|
| [SniperOJ](https://www.sniperoj.com/) |[printable](pwn/printable)| [PWN](./pwn) |[WangYihang](https://github.com/WangYihang)|:star::star:|RESERVED|
| [SniperOJ](https://www.sniperoj.com/) |[shellcode-x86-64](pwn/shellcode-x86-64)| [PWN](./pwn) |[WangYihang](https://github.com/WangYihang)|:star:|RESERVED|
| [SniperOJ](https://www.sniperoj.com/) |[shorter-shellcode-x86-64](pwn/shorter-shellcode-x86-64)| [PWN](./pwn) |[WangYihang](https://github.com/WangYihang)|:star::star:|RESERVED|



## FAQ
> [Freuqently Asked Questions](FAQ.md)

## Acknownledgement
* [Wisdom Tree](https://laworigin.github.io/)
* [Ringzer0team](https://ringzer0team.com)

## Reference
* [Platform Source Code](https://github.com/SniperOJ/SniperOJ-Platform)
* [Writeups of Challenges](https://github.com/SniperOJ/SniperOJ-Challenge-Writeups)
* [Docker Hub](https://hub.docker.com/u/sniperoj/)

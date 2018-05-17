# Sniperoj Dockerfile

#### Description
SniperOJ is an open source CTF Platform, everything is open source, including platform and all challenges.
This repo will store all Dockerfiles of challenges running on SniperOJ.
You don't need to worry about how to build a challenging environment.
All you need to do is typing a few commands and then you can start to solve the challenges.
Enjoy your CTF career, Keep running!

#### Requirements
```
# Docker
sudo apt install docker.io
# Docker-compose
sudo apt install docker-compose
```

#### How to use?
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

# 6. Enjoy the challenges
```

#### How to contribute?
please follow [CONTRITUBE](CONTRIBUTE.md)

#### Where is the avaliable challenges list?
- [x] pwn350-leak-advanced-x86-64

#### FAQ
> [Freuqently Asked Questions](FAQ.md)

#### Acknownledgement

#### Reference
* Platform Source Code: https://github.com/SniperOJ/SniperOJ-Platform
* Writeups of Challenges: https://github.com/SniperOJ/SniperOJ-Challenge-Writeups
* Docker Hub: https://hub.docker.com/u/sniperoj/

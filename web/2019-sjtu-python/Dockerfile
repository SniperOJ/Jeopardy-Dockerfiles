FROM python:3.6
RUN useradd challenge && mkdir /app && pip install flask 
WORKDIR /app
USER challenge
CMD timeout 60 python3 app.py

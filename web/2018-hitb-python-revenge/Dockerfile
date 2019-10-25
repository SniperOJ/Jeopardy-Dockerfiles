FROM python:2.7
RUN useradd challenge && mkdir /app && pip install flask 
WORKDIR /app
USER challenge
CMD timeout 60 python app.py

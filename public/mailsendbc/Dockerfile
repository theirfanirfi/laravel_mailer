FROM php:5.6-cli
MAINTAINER Olumpus "info@olumpus.com"
# Load extra Apache modules
# RUN a2enmod rewrite
# Installs sendmail
RUN apt-get update && apt-get install -q -y sendmail
VOLUME /eworker
COPY . /usr/src/myapp
WORKDIR /usr/src/myapp
RUN chmod +x run.sh
CMD ./run.sh
#2 "http://185.186.244.219" "185.186.244.219" "worker" "ghost1192@@""
# EWORKER_SERVER_ID
# EWORKER_SERVER_IP
# EWORKER_RABBITMQ_SERVER_ID
# EWORKER_RABBITMQ_USERNAME
# EWORKER_RABBITMQ_PASSWORD
# EWORKER_SERVER_HASHCODE

# -e EWORKER_SERVER_ID=2 -e EWORKER_SERVER_IP=185.186.244.219 -e EWORKER_RABBITMQ_SERVER_ID=185.186.244.219 -e EWORKER_RABBITMQ_USERNAME=worker -e EWORKER_RABBITMQ_PASSWORD=ghost1192@@ -e EWORKER_SERVER_HASHCODE=ghost1192@@
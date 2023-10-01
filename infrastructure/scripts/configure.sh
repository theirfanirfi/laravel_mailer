#!/bin/bash

while getopts u:h:f: flag
do
    case "${flag}" in
        h) public_ip=${OPTARG};;
    esac
done

apt-get update
apt-get install -y apt-transport-https ca-certificates curl software-properties-common
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"
apt-get update
apt-get install -y docker-ce
curl -L "https://github.com/docker/compose/releases/download/1.28.2/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
chmod +x /usr/local/bin/docker-compose
export RMQ_SERVER=$public_ip
sed -i 's/RMQ_SERVER=0.0.0.0/RMQ_SERVER=$public_ip/' ../../.env
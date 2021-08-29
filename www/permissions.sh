#!/bin/bash

USER=ubuntu
GROUP=www-data
BASE=/home/ubuntu/current

chown -R $USER:$GROUP $BASE
chmod -R o-rxw $BASE/*
chown -R $USER:$GROUP $BASE/public
chmod -R 775 $BASE/public

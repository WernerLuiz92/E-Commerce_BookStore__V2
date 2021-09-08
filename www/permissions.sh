#!/bin/bash

USER=ubuntu
GROUP=www-data
BASE=/home/ubuntu/current

chown -R $USER:$GROUP $BASE
chmod -R o-rxw $BASE/*
chown -R $USER:$GROUP $BASE/public
chmod -R 775 $BASE/public

chmod -R 0750 $BASE/node_modules

chmod 0770 $BASE/public/resources/*
find $BASE/public/resources/* -type d -exec chmod 0770 {} \;
find $BASE/public/resources/* -type f -exec chmod 0660 {} \;
setfacl --recursive --remove-all --remove-default $BASE/public/resources/*
setfacl --recursive --modify default:group:$GROUP:rw $BASE/public/resources/*
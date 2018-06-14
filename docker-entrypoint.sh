#!/bin/bash

if [ ! $(echo "SHOW DATABASES" | mysql -h mysql -uroot | grep -E '^suctre$') ];then
    echo "create database"
    echo "CREATE DATABASE IF NOT EXISTS suctre CHARACTER SET utf8 COLLATE utf8_unicode_ci;" | mysql -h mysql -uroot

    cat ./hoangbaokhanh.sql | mysql -h mysql -uroot

    echo "done"
fi
chmod 777 -R .
/run.sh

FROM tutum/apache-php

RUN apt-get update && apt-get install -y mysql-client-5.6

RUN cp /etc/skel/.bash* /root/

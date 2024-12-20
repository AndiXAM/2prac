FROM ubuntu:16.04
RUN apt-get update && apt-get install -y apache2 php php-mysql libapache2-mod-php
EXPOSE 80

ADD html var/www/html

CMD ["apachectl", "-D", "FOREGROUND"] 
FROM nginx
ADD . /var/www/html

USER root
RUN apt update && \ apt install nano 

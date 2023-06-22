FROM nginx
ADD . /var/www/html

USER root
RUN apt-get update && \ apt-get install nano 

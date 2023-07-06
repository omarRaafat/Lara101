FROM nginx
WORKDIR /job101
COPY ./app.conf /etc/nginx/conf.d/default.conf
RUN apt-get update && apt-get install nano 
RUN apt-get clean
ADD . .   

FROM nginx
COPY ./nginx/app.conf /etc/nginx/sites-enabled/default
WORKDIR /job101
ADD . .   

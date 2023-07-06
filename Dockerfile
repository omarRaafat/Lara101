FROM nginx
WORKDIR /job101
#COPY ./app.conf /etc/nginx/sites-available/default
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
ADD . .   

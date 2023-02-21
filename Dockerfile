FROM php:8.1.1-fpm

RUN apt-get update && apt-get install -y git

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN git config --global user.email "mario.galvao.woohoo@gmail.com" && git config --global user.name "Mario Galvao"

WORKDIR /var/www
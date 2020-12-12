FROM php:7.3-fpm-alpine


RUN apk --no-cache update \
    && apk add libjpeg-turbo-dev \
    && apk add  freetype-dev \
    && apk add libpng-dev \
    && apk add --update curl ca-certificates \
    && apk --no-cache upgrade \
    && apk add bash \
    && apk add --update supervisor && rm  -rf /tmp/* /var/cache/apk/*

RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/

RUN docker-php-ext-install bcmath ctype json mbstring pdo pdo_mysql tokenizer gd

# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

RUN mkdir -p /var/log/supervisor

COPY conf.d/ /etc/supervisor/conf.d/
COPY supervisord.conf /etc/
COPY cron /var/spool/cron/crontabs/root
COPY ./ /var/www/html/

RUN touch /var/log/cron.log
EXPOSE  9000

ENTRYPOINT ["supervisord", "--nodaemon", "--configuration", "/etc/supervisord.conf"]

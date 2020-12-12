FROM php:7.3-fpm-alpine
RUN apk --no-cache update \
    && apk add libjpeg-turbo-dev \
    && apk add  freetype-dev \
    && apk add libpng-dev \
    && apk add libzip-dev \
    && apk add --update curl ca-certificates \
    && apk --no-cache upgrade \
    && apk add imagemagick \
    && apk add bash \
    && apk add --update nodejs npm

RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/
RUN docker-php-ext-install bcmath ctype json mbstring pdo pdo_mysql tokenizer gd zip
# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer
COPY  ./php.ini /usr/local/etc/php/php.ini

COPY ./ /var/www/html/

EXPOSE  9000
ENTRYPOINT ["php-fpm"]

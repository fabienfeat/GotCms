FROM php:7-apache

RUN mkdir -p /home/temp
ADD xdebug-add.ini /home/temp
RUN apt-get update && apt-get install -y libpq-dev \
    && libzip-dev \
    && libicu-dev g++ \
    && curl -fsSL 'http://xdebug.org/files/xdebug-2.4.0rc3.tgz' -o xdebug.tgz \
    && mkdir -p xdebug \
    && tar -xf xdebug.tgz -C xdebug --strip-components=1 \
    && rm xdebug.tgz \
    && ( \
       cd xdebug \
       && phpize \
       && ./configure \
       && make -j$(nproc) \
       && make install \
    ) \
    && rm -r xdebug \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-install intl pdo_mysql json mbstring pdo_pgsql

RUN cat /home/temp/xdebug-add.ini >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN cp /usr/src/php/php.ini-development /usr/local/etc/php/conf.d/php.ini
RUN echo 'date.timezone = "Europe/Paris"' >> /usr/local/etc/php/conf.d/php.ini
RUN a2enmod rewrite
RUN service apache2 restart
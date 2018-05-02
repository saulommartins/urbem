FROM php:7.1.15-fpm

USER root

RUN apt-get update && \
apt-get install -yq \
    libfreetype6-dev \
    libmcrypt-dev \
    libpng12-dev \
    libjpeg-dev \
    libpng-dev && \
apt-get install -y libpq-dev && \
docker-php-ext-install pdo \
    pdo_pgsql \
    gd \
    mbstring \
    mcrypt \
    zip \
    debug && \
pecl install xdebug-2.5.0 \
	&& docker-php-ext-enable xdebug && \
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
apt-get -y install vim && \
apt-get -y install git

WORKDIR /var/www

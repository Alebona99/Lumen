FROM php:7.4-apache

RUN apt-get update && \
    apt-get install -y software-properties-common && \
    rm -rf /var/lib/apt/lists/*
RUN add-apt-repository main
RUN apt-get update && apt-get install -y wget

RUN docker-php-ext-install mysqli pdo_mysql

RUN mkdir /app \
    && mkdir /app/project \
    && mkdir /app/project/www

COPY . /app/project/www/

#installazione Xdebug
# install xdebug 
RUN cd /tmp \
&& wget https://xdebug.org/files/xdebug-2.8.0.tgz \
&& tar -zxvf xdebug-2.8.0.tgz \
&& cd xdebug-2.8.0 \
&& /usr/local/bin/phpize \
&& ./configure --enable-xdebug --with-php-config=/usr/local/bin/php-config \
&& make \
&& cp modules/xdebug.so /usr/local/lib/php/extensions/no-debug-non-zts-20190902/

# add xdebug configurations
RUN echo '[xdebug]' >> /usr/local/etc/php/php.ini
RUN echo 'zend_extension="/usr/local/lib/php/extensions/no-debug-non-zts-20190902/xdebug.so"' >> /usr/local/etc/php/php.ini
RUN echo 'xdebug.remote_port=9000' >> /usr/local/etc/php/php.ini
RUN echo 'xdebug.remote_host=10.254.254.254' >> /usr/local/etc/php/php.ini
RUN echo 'xdebug.remote_enable=1' >> /usr/local/etc/php/php.ini
RUN echo 'xdebug.remote_autostart=1' >> /usr/local/etc/php/php.ini
RUN echo 'xdebug.remote_connect_back=off' >> /usr/local/etc/php/php.ini
RUN echo 'xdebug.remote_handler="dbgp"' >> /usr/local/etc/php/php.ini
RUN echo 'xdebug.idekey="VSCODE"' >> /usr/local/etc/php/php.ini
# RUN echo 'xdebug.remote_log="/var/www/html/xdebug.log"' >> /usr/local/etc/php/php.ini

#installazione network tool
RUN apt-get install net-tools && apt-get install -y openssh-server
RUN apt-get install -y avahi-daemon

#installazione Composer
RUN wget https://getcomposer.org/download/2.0.8/composer.phar
RUN mv composer.phar composer
RUN chmod +x composer
RUN ./composer 
RUN mv composer /usr/local/bin/
RUN apt-get install -y zip
#INSTALLAZIONE LIBRERIE COMPOSER
RUN composer require monolog/monolog

#installazione estensioni per Lumen
RUN apt-get install openssl

#installazione Lumen Framework
RUN composer create-project --prefer-dist laravel/lumen blog

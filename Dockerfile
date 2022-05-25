FROM php:8.1-apache
RUN a2enmod rewrite

RUN apt-get update -y && \
    apt-get upgrade -y && \
    apt-get dist-upgrade -y && \
    apt-get -y autoremove && \
    apt-get clean

RUN apt-get install -y zip \
    unzip \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html
COPY . ./
RUN chmod -R 555 /var/www/html
RUN chmod 551 /var/www/html/Dockerfile
RUN sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
RUN cd /tmp && curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

RUN pecl install xdebug && docker-php-ext-enable xdebug
RUN echo 'zend_extension=xdebug' >> /usr/local/etc/php/php.ini
RUN echo 'xdebug.mode=coverage' >> /usr/local/etc/php/php.ini
RUN echo 'xdebug.client_host=host.docker.internal' >> /usr/local/etc/php/php.ini
RUN echo 'xdebug.start_with_request=yes' >> /usr/local/etc/php/php.ini
RUN echo 'session.save_path = "/tmp"' >> /usr/local/etc/php/php.ini

RUN composer install
#RUN composer test
# --no-dev
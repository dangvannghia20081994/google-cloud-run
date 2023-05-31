FROM php:8.1-apache-bullseye

RUN set -x \
    && docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd --with-libdir=lib/x86_64-linux-gnu/ \
    && docker-php-ext-configure mysqli --with-mysqli=mysqlnd --with-libdir=lib/x86_64-linux-gnu/ \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install opcache \
    && pecl install redis-5.3.7 \
    && docker-php-ext-enable redis

RUN set -x \
    && a2enmod rewrite headers\
    && a2enconf security \
    && a2ensite 000-default pa-bmp-front healthcheck


# Copy in custom code from the host machine.
WORKDIR /var/www/html
COPY . ./

# Use the PORT environment variable in Apache configuration files.
# https://cloud.google.com/run/docs/reference/container-contract#port
RUN sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

# Configure PHP for development.
# Switch to the production php.ini for production operations.
# RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
# https://github.com/docker-library/docs/blob/master/php/README.md#configuration
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

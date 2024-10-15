# Setup PHP and Apache
FROM php:8.3-apache

# 1. Update and install neccessery packages
RUN apt-get update
RUN apt-get install -y \
    git \
    zip \
    curl \
    sudo \
    unzip \
    libicu-dev \
    libbz2-dev \
    libpng-dev \
    libjpeg-dev \
    libmcrypt-dev \
    libreadline-dev \
    libfreetype6-dev \
    g++

RUN docker-php-ext-install \
    bz2 \
    intl \
    bcmath \
    opcache \
    calendar \
    pdo_mysql \
    mysqli

# 2. Copy vhost config
COPY bookle.conf /etc/apache2/sites-available/bookle.conf

# 3. Enable sites
RUN a2dissite 000-default.conf
RUN a2ensite bookle.conf
RUN service apache2 restart

# 4. Enable mod_rewrite for URL rewrite and mod_headers for .htaccess extra headers like Access-Control-Allow-Origin
RUN a2enmod rewrite headers
RUN service apache2 restart

# 5. Start with base php config, then add extensions
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

# 6. Install composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer
RUN chmod +x /usr/local/bin/composer
RUN composer self-update

# 7. We need a user with the same UID/GID with host user
# so when we execute CLI commands, all the host file's ownership remains intact
# otherwise command from inside container will create root-owned files and directories
RUN useradd -G www-data,root -u 1000 -d /home/devuser devuser
RUN mkdir -p /home/devuser/.composer && \
    chown -R devuser:devuser /home/devuser



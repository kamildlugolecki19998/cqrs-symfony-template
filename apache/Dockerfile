FROM php:8.2-apache

ARG USERID=1000
ARG GROUPID=1000
#enable apache mod_rewrite

# Enable Apache modules
RUN a2enmod rewrite
# Install any extensions you need
RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN addgroup --system shared-folder \
&& adduser --system --home /var/cache/shared-folder --group shared-folder --uid 1001

COPY /apache/apache.conf /etc/apache2/sites-enabled/000-default.conf

# configure apache
RUN a2enmod access_compat alias auth_basic auth_digest authn_core authn_file authz_core authz_groupfile authz_host authz_user \
    autoindex cache cache_disk deflate dir env expires ext_filter filter headers ldap mime mpm_prefork negotiation php proxy proxy_ajp \
    proxy_connect proxy_http reqtimeout rewrite setenvif socache_shmcb ssl status substitute vhost_alias

RUN apt-get update && apt-get install -y \
git \
    libicu-dev \
    libxml2-dev \
    libzip-dev \
    htop \
    mc \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install \
                    intl \
                    pdo_mysql \
                    xml \
                    zip

#add user apache for internal container
RUN groupadd --gid $GROUPID apache
RUN useradd -l --system --shell /bin/bash --uid $USERID --gid $GROUPID apache


RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN COMPOSER_ALLOW_SUPERUSER=1

RUN echo "su apache  -c \" /var/www/html/bin/console \$@\"" > /usr/local/bin/run
RUN chmod +x /usr/local/bin/run

COPY ./app /var/www/html

WORKDIR /var/www/html

# RUN composer install

EXPOSE 80

CMD ["apache2-foreground"]
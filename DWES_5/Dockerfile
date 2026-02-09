FROM php:8.2-apache

# Paquetes necesarios para Composer
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    && rm -rf /var/lib/apt/lists/*

# Instalar Composer (imagen oficial)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Activar mod_rewrite
RUN a2enmod rewrite

# Cambiar DocumentRoot a /public
RUN sed -i 's#/var/www/html#/var/www/html/public#g' \
    /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html

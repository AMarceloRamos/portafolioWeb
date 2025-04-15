# Usa la imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instala PostgreSQL y extensiones de PHP necesarias
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Habilita los módulos de Apache (si usas Laravel o mod_rewrite)
RUN a2enmod rewrite

# Copia los archivos de la aplicación
COPY . /var/www/html/

# Establece permisos
RUN chown -R www-data:www-data /var/www/html

# Expone el puerto 80
EXPOSE 80

# Inicia Apache
CMD ["apache2-foreground"]

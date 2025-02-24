# Usa una imagen base de PHP con Apache
FROM php:8.2-apache

# Habilita las extensiones necesarias
RUN docker-php-ext-install pdo pdo_pgsql

# Copia tus archivos del proyecto al contenedor
COPY . /var/www/html/

# Expone el puerto 80
EXPOSE 80

# Inicia Apache
CMD ["apache2-foreground"]

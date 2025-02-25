# Usa la imagen base de PHP con Apache (o la que estés usando)
FROM php:8.2-apache

# Actualiza los paquetes e instala dependencias necesarias para PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Copia los archivos de tu proyecto al contenedor
COPY . /var/www/html

# Exponer el puerto 80 para el servidor web
EXPOSE 80

# Comando de inicio del contenedor
CMD ["apache2-foreground"]

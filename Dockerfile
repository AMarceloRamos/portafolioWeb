# Usa una imagen base oficial de PHP
FROM php:8.1-cli

# Establece el directorio de trabajo
WORKDIR /app

# Instala Composer globalmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copia los archivos del proyecto al contenedor
COPY . /app

# Instala extensiones necesarias para Composer (modifica según lo que necesite tu proyecto)
RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo pdo_mysql

# Ejecuta composer install para instalar las dependencias
RUN composer install --no-dev --prefer-dist --optimize-autoloader

# Expone el puerto para Render
EXPOSE 10000

# Inicia el servidor PHP
CMD ["php", "-S", "0.0.0.0:10000", "-t", "/app"]

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
# Expone el puerto dinámico
EXPOSE $PORT

# Inicia el servidor PHP
CMD ["php", "-S", "0.0.0.0:10000", "-t", "/app"]

RUN docker-php-ext-install pdo_pgsql

FROM php:8.2-fpm

# Instala las dependencias del sistema necesarias para PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql

# Limpia los archivos de instalación para mantener la imagen ligera
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
# Inicia el servidor PHP
CMD ["php", "-S", "0.0.0.0:$PORT", "-t", "/app"]

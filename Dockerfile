# Usar la imagen de Apache y PHP

FROM php:7.4-apache

#Instalar extensiones y copiar los archivos
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
COPY src/ /var/www/html
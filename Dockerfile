# Usando a imagem oficial PHP com Apache
FROM php:8.2-apache

# Instalar dependências do sistema e extensões PHP necessárias (exemplo: MySQL, GD, etc.)
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install mysqli

# Habilitar o mod_rewrite do Apache para permitir URLs amigáveis
RUN a2enmod rewrite

# Copiar o código do seu projeto para dentro do contêiner
COPY ./novo_projeto /var/www/html/

# Garantir que o Apache tenha permissão para acessar os arquivos
RUN chown -R www-data:www-data /var/www/html

# Expor a porta 80 (por padrão o Apache escuta na porta 80)
EXPOSE 80

# Definir o diretório de trabalho
WORKDIR /var/www/html

# Iniciar o Apache
CMD ["apache2-foreground"]

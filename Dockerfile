# Use a imagem oficial do PHP com o Apache
FROM php:7.4-apache

ARG UNAME=www-data
ARG UGROUP=www-data
ARG UID=1000
ARG GID=1001
RUN usermod  --uid $UID $UNAME
RUN groupmod --gid $GID $UGROUP

# Atualize e instale a extensão intl e mbstring, bem como o pacote oniguruma
RUN apt-get update && apt-get upgrade -y && \
    apt-get install -y libicu-dev libonig-dev && \
    docker-php-ext-install intl mbstring && \
    docker-php-ext-install mysqli pdo pdo_mysql && \
    docker-php-ext-enable mysqli

# Copie o arquivo de configuração do site para o diretório do Apache
COPY my-site.conf /etc/apache2/sites-available/my-site.conf

# # Crie o diretório writable e defina as permissões corretas
# RUN mkdir -p /var/www/html/writable && \
#     chown -R www-data:www-data /var/www/html/writable && \
#     chmod -R 777 /var/www/html/writable

# Configurações adicionais do Apache
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf &&\
    a2enmod rewrite &&\
    a2enmod headers &&\
    a2dissite 000-default &&\
    a2ensite my-site &&\
    service apache2 restart

EXPOSE 80
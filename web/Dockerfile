# Use a imagem oficial do PHP com o Apache
FROM php:7.4-apache

# Atualize e instale a extensão intl e mbstring, bem como o pacote oniguruma
RUN apt-get update && apt-get upgrade -y && \
    apt-get install -y libicu-dev libonig-dev && \
    docker-php-ext-install intl mbstring && \
    docker-php-ext-install mysqli pdo pdo_mysql && \
    docker-php-ext-enable mysqli

# Copie os arquivos do site para o diretório do Apache
COPY ./www /var/www/html

# Copie o arquivo de configuração do site para o diretório do Apache
COPY my-site.conf /etc/apache2/sites-available/my-site.conf

# # Configurações adicionais do Apache
# RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf &&\
#     a2enmod rewrite &&\
#     a2enmod headers &&\
#     a2dissite 000-default &&\
#     a2ensite my-site &&\
#     service apache2 restart

# Copie o arquivo de script para o diretório do container / scrip responsavel para mudar a permisão da pasta writable de cache para chmod 755
COPY set_permissions.sh /var/www/html/

# Defina as permissões corretas usando o arquivo de script e remova o arquivo após a execução
RUN chmod +x /var/www/html/set_permissions.sh && \
    /var/www/html/set_permissions.sh && \
    rm /var/www/html/set_permissions.sh

# Configurações adicionais do Apache
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf &&\
    a2enmod rewrite &&\
    a2enmod headers &&\
    a2dissite 000-default &&\
    a2ensite my-site &&\
    service apache2 restart

EXPOSE 80
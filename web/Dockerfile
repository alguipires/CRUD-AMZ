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

# Defina a variável de ambiente SITE_URL
RUN echo 'SetEnv SITE_URL ${SITE_URL}' >> /etc/apache2/conf-enabled/environment.conf

# Configurações adicionais do Apache
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf &&\
    a2enmod rewrite &&\
    a2enmod headers &&\
    a2dissite 000-default &&\
    a2ensite my-site &&\
    service apache2 restart

# # Obtenha o nome do usuário no momento da construção da imagem
# RUN USERNAME=$USER && \
#     echo "Username: $USERNAME"

# # Defina as permissões corretas para o diretório de cache
# RUN sudo chown -R www-data:www-data /var/www/html/writable/ && \
#     sudo chmod -R 777 /var/www/html/writable/ &&\
#     sudo chmod -R 777 /var/www/html/writable/cache &&\
#     service apache2 restart
# # VERIFICAR PERMISAO 755 775 777

RUN chown -R www-data:www-data /var/www/html/*


# RUN chown -R www:www-data /var/www/html/writable/ && \
#     chmod -R 777 /var/www/html/writable/ &&\
#     chmod -R 777 /var/www/html/writable/cache

# Exponha a porta 80
EXPOSE 80



# # quase funcionando
# FROM php:7.4-apache
# RUN apt-get update && apt upgrade -y
# # Atualize e instale a extensão intl
# RUN apt-get update && apt-get upgrade -y && apt-get install -y libicu-dev && docker-php-ext-install intl
# RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli
# # RUN docker-php-ext-install mbstring
# ADD /www /var/www/html
# COPY my-site.conf /etc/apache2/sites-available/my-site.conf
# RUN chown -R www-data:www-data /var/www/html/writable/cache
# RUN chmod -R 775 /var/www/html/writable/cache
# # RUN echo 'SetEnv MYSQL_DB_CONNECTION ${MYSQL_DB_CONNECTION}' >> /etc/apache2/conf-enabled/environment.conf
# # RUN echo 'SetEnv MYSQL_DB_NAME ${MYSQL_DB_NAME}' >> /etc/apache2/conf-enabled/environment.conf
# # RUN echo 'SetEnv MYSQL_USER ${MYSQL_USER}' >> /etc/apache2/conf-enabled/environment.conf
# # RUN echo 'SetEnv MYSQL_PASSWORD ${MYSQL_PASSWORD}' >> /etc/apache2/conf-enabled/environment.conf
# RUN echo 'SetEnv SITE_URL ${SITE_URL}' >> /etc/apache2/conf-enabled/environment.conf
# RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf &&\
#     a2enmod rewrite &&\
#     a2enmod headers &&\
#     a2enmod rewrite &&\
#     a2dissite 000-default &&\
#     a2ensite my-site &&\
#     service apache2 restart
# EXPOSE 80

# FROM php:7.4-apache
# RUN apt-get update && apt upgrade -y
# RUN docker-php-ext-install mysqli pdo pdo_mysql zip mbstring && docker-php-ext-enable mysqli
# ADD /www /var/www/html
# COPY my-site.conf /etc/apache2/sites-available/my-site.conf
# # RUN echo 'SetEnv MYSQL_DB_CONNECTION ${MYSQL_DB_CONNECTION}' >> /etc/apache2/conf-enabled/environment.conf
# # RUN echo 'SetEnv MYSQL_DB_NAME ${MYSQL_DB_NAME}' >> /etc/apache2/conf-enabled/environment.conf
# # RUN echo 'SetEnv MYSQL_USER ${MYSQL_USER}' >> /etc/apache2/conf-enabled/environment.conf
# # RUN echo 'SetEnv MYSQL_PASSWORD ${MYSQL_PASSWORD}' >> /etc/apache2/conf-enabled/environment.conf
# RUN echo 'SetEnv SITE_URL ${SITE_URL}' >> /etc/apache2/conf-enabled/environment.conf
# RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf &&\
#     a2enmod rewrite &&\
#     a2enmod headers &&\
#     a2enmod rewrite &&\
#     a2dissite 000-default &&\
#     a2ensite my-site &&\
#     service apache2 restart
# EXPOSE 80
# EXPOSE 443


# FROM php:7.2-apache
# RUN apt-get update && \
#     apt-get install -y
# RUN apt-get install -y curl
# RUN apt-get install -y build-essential libssl-dev zlib1g-dev libpng-dev libjpeg-dev libfreetype6-dev
# RUN apt-get install -y libicu-dev
# # COPY . /var/www/html
# # COPY ci4.conf /etc/apache2/sites-enabled/ci4.conf
# # ADD /www /var/www/html
# COPY my-site.conf /etc/apache2/sites-available/my-site.conf
# RUN apt-get update
# RUN docker-php-ext-install intl
# RUN docker-php-ext-configure intl
# RUN docker-php-ext-install mysqli pdo pdo_mysql zip mbstring
# RUN a2enmod rewrite
# RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
#     && docker-php-ext-install gd
# RUN service apache2 restart




# FROM php:7.4-apache
# RUN a2enmod rewrite
# RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
# COPY ./ /var/www/html
# RUN service apache2 restart
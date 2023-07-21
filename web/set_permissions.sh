#!/bin/bash

# Defina as permissões corretas para o diretório writable
chown -R www-data:www-data /var/www/html/writable/
chmod -R 755 /var/www/html/writable/
# chmod -R 755 /var/www/html/writable/cache
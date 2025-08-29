#!/bin/bash
# Provisionamento LAMP básico no Ubuntu Server 24.04
# Uso: sudo bash setup_lamp.sh

# Atualizar pacotes
apt update && apt upgrade -y

# Instalar Apache
apt install apache2 -y
systemctl enable apache2
systemctl start apache2

# Habilitar SSL e gerar certificado autoassinado
a2enmod ssl
openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
    -keyout /etc/ssl/private/apache-selfsigned.key \
    -out /etc/ssl/certs/apache-selfsigned.crt \
    -subj "/C=BR/ST=SP/L=Salto/O=IFSP/OU=ifsp/CN=localhost/emailAddress=s"
systemctl restart apache2

# Instalar PHP e extensões básicas
apt install php php-mysql php-fpm php-json php-cli -y

# Instalar MariaDB
apt install mariadb-server mariadb-client -y
systemctl enable mariadb
systemctl start mariadb

# Configuração segura do MariaDB (sem prompts)
mysql -u root <<MYSQL_SCRIPT
ALTER USER 'root'@'localhost' IDENTIFIED BY 'rootpass';
DELETE FROM mysql.user WHERE User='';
DROP DATABASE IF EXISTS test;
FLUSH PRIVILEGES;
CREATE DATABASE bancocrud CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'ec2-user'@'localhost' IDENTIFIED BY 'ifsp';
GRANT ALL PRIVILEGES ON bancocrud.* TO 'ec2-user'@'localhost';
FLUSH PRIVILEGES;
MYSQL_SCRIPT

# Criar usuário do sistema e adicionar ao grupo www-data
id -u ec2-user &>/dev/null || adduser --disabled-password --gecos "" ec2-user
usermod -a -G www-data ec2-user

# Ajustar permissões da webroot
chown -R $USER:www-data /var/www
find /var/www -type d -exec chmod 2775 {} \;
find /var/www -type f -exec chmod 0664 {} \;

# Clonar projeto
cd /var/www/html
git clone https://github.com/Sahelluis21/CRUD-na-AWS.git
chown -R $USER:www-data CRUD-na-AWS
find CRUD-na-AWS -type d -exec chmod 2775 {} \;
find CRUD-na-AWS -type f -exec chmod 0664 {} \;

# Reiniciar Apache
systemctl restart apache2

echo "Provisionamento concluído! Acesse sua aplicação no navegador."

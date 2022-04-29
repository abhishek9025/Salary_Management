FROM php:7.2-apache
COPY . /var/www/html/
CMD [ "php", "login/loginPage.php" ]


RUN apt-get update && apt-get install -y git
RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN a2enmod rewrite

EXPOSE 80/tcp
EXPOSE 443/tcp

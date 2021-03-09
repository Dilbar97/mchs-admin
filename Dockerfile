FROM php:7.2-fpm

# Configure nginx
COPY ./cnf/nginx/nginx.conf /etc/nginx/nginx.conf
COPY ./cnf/nginx/admin.conf /sites/admin.conf
COPY ./cnf/nginx/content.conf /sites/content.conf
COPY ./cnf/nginx/nginx-status.conf /sites/nginx-status.conf

# Copy code
COPY . /var/www/

RUN chown -R www-data:www-data /var/www/

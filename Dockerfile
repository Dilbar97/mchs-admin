FROM docker-registry.thefroot.com/docker-images/php-fpm:php-fpm-0.0.7

MAINTAINER Ivan Kondratyev <ikondratyev@ntcorp.kz>

RUN apk --no-cache add nginx supervisor \
    && mkdir -p /etc/nginx/sites-available /autostart/ /var/cache/nginx \
    && chmod 777 /var/cache/nginx && sed -i 's/max_input_vars = 3000/max_input_vars = 20000/g' /etc/php7/php.ini


# Configure nginx
COPY ./cnf/nginx/nginx.conf /etc/nginx/nginx.conf
COPY ./cnf/nginx/admin.conf /sites/admin.conf
COPY ./cnf/nginx/content.conf /sites/content.conf
COPY ./cnf/nginx/api.conf /sites/api.conf
COPY ./cnf/nginx/nginx-status.conf /sites/nginx-status.conf

# Configure supervisord
COPY ./cnf/supervisor/supervisord.conf /etc/supervisor/conf.d/
COPY ./cnf/supervisor/init.d/* /autostart/

# Set server_name in virtual hosts
COPY ./entrypoint.sh /entrypoint.sh

# Copy code
COPY . /var/www/

RUN php init --env=Development --overwrite=n \
    && chown -R www-data:www-data /var/www/

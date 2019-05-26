FROM ipti/yii2
RUN apk add --no-cache \
        libssl1.1 \
&& apk --update --virtual build-deps add \
        autoconf \
        make \
        gcc \
        g++ \
        openssl-dev \
        libtool && \
pecl install mongodb \
&& docker-php-ext-enable mongodb \
&& apk del build-deps
RUN echo "extension=mongodb.so" > /usr/local/etc/php/conf.d/pecl-mongodb.ini
COPY . /app
RUN chown -R www-data:www-data /usr/local/bin/composer
RUN chmod 777 /usr/local/bin/composer
RUN chmod 777 /usr/local/bin/docker-run.sh
RUN composer install 
RUN chown -R www-data:www-data /app/runtime/ \
&& chown -R www-data:www-data /app/web/assets



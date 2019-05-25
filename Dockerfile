FROM ipti/yii2
RUN apk --update --virtual build-deps add \
        autoconf \
        make \
        gcc \
        g++ \
        libtool && \
pecl install mongodb \
&& docker-php-ext-enable mongodb \
&& apk del build-deps
RUN echo "extension=mongodb.so" > /usr/local/etc/php/conf.d/pecl-mongodb.ini
COPY . /app
RUN chown -R www-data:www-data composer
RUN composer install 
RUN chown -R www-data:www-data /app/runtime/ \
&& chown -R www-data:www-data /app/web/assets



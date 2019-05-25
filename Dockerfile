FROM ipti/yii2
apk add --no-cache --update --virtual buildDeps autoconf \
 && pecl install mongodb \
 && docker-php-ext-enable mongodb \
 && apk del buildDeps
COPY . /app


FROM ipti/yii2
COPY . /app
RUN ["chmod", "+x", "/usr/local/bin/docker-run.sh"]

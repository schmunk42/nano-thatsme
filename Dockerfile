FROM phundament/app:4.0.0-rc15

# Prepare container
# /!\ Note: Please add your own API token to config.json
# Phundament comes with a public token for your convenince which may hit the GitHub rate limit
#ADD ./build/container-files/ /

# Install application packages, if there are changes the composer files
ADD ./composer.lock ./composer.json /app/
RUN /usr/local/bin/composer install --prefer-dist --optimize-autoloader

# Add application code
ADD src /app/src
ADD .env-dist /app/.env
ADD version /app/

RUN chmod -R 777 /app/web/assets /app/src/assets/web \
 && chown -R www-data:www-data /app/web/assets /app/src/assets/web
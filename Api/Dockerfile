# FROM php:7.4-fpm

# # Arguments defined in docker-compose.yml
# ARG user
# ARG uid

# # Install system dependencies
# RUN apt-get update && apt-get install -y \
#     git \
#     curl \
#     libpng-dev \
#     libonig-dev \
#     libxml2-dev \
#     zip \
#     unzip

# # Clear cache
# RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# # Install PHP extensions
# RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# # Get latest Composer
# COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# # Create system user to run Composer and Artisan Commands
# # RUN useradd -G www-data,root -u $uid -d /home/$user $user
# # RUN mkdir -p /home/$user/.composer && \
# #     chown -R $user:$user /home/$user

# # Set working directory
# WORKDIR /var/www
# COPY . /var/www
# RUN composer install

# # USER $user


# FROM lorisleiva/laravel-docker:7.4
# EXPOSE 8000

# COPY .  /var/www
# RUN rm -f composer.lock
# RUN composer install
# RUN cp .env.example .env
# RUN php artisan key:generate

# CMD php artisan --host=0.0.0.0 serve

FROM lorisleiva/laravel-docker:7.4

# Expose the port used by the PHP development server
EXPOSE 8000

# Copy the Laravel application files
COPY . /var/www

# Install dependencies and generate Laravel key
RUN rm -f composer.lock
RUN composer install
RUN cp .env.example .env
RUN php artisan key:generate

# Set the correct permissions for Laravel
RUN chown -R www-data:www-data /var/www
RUN chmod -R 755 /var/www/storage

# Start the PHP development server
CMD php artisan serve --host=0.0.0.0 --port=8000


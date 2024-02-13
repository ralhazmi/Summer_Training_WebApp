FROM php:8.1.0-apache
WORKDIR /var/www/html

# Mod Rewrite
RUN a2enmod rewrite

# Linux Library
RUN apt-get update -y && apt-get install -y \
    libicu-dev \
    libmariadb-dev \
    unzip zip \
    zlib1g-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev 

# RUN apt-get install -y npm 
# RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.1/install.sh | bash && source ~/.nvm/nvm.sh
# RUN nvm install 16.13.2
# RUN nvm use 16.13.2
# RUN npm install -D tailwindcss postcss autoprefixer flowbite
# RUN npx tailwindcss init -p

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# PHP Extension
RUN docker-php-ext-install gettext intl pdo_mysql gd

RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd
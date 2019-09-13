FROM php:7.1-cli

#------------------------------------------------
# Install dependencies
#------------------------------------------------
RUN apt-get update
RUN apt-get install -y \
	# Composer dependencies
	git \
	zip \
	unzip \
	# SOAP dependencies
	libxml2-dev

#------------------------------------------------
# Add Composer
#------------------------------------------------
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
ENV PATH "$PATH:./vendor/bin"

#------------------------------------------------
# Add Xdebug
#------------------------------------------------
RUN pecl install xdebug && docker-php-ext-enable xdebug
EXPOSE 9001

#------------------------------------------------
# Configure PHP Logs
#------------------------------------------------
RUN touch /var/log/php_errors.log
RUN chmod 664 /var/log/php_errors.log

#------------------------------------------------
# Set working directory
#------------------------------------------------
RUN mkdir -p /tmp/kahlan/opt/project/vendor/composer
WORKDIR /opt/project

#------------------------------------------------
# Clean up
#------------------------------------------------
RUN apt-get clean && apt-get autoclean
RUN rm -rf /var/lib/apt/lists/*

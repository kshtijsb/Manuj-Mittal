# Use the official PHP + Apache image
FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Copy all project files to the container
COPY . .

# Enable Apache mod_rewrite (for clean URLs if needed)
RUN a2enmod rewrite

# Configure Apache to listen on the port Render provides
RUN sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

# Set permissions for the web directory
RUN chown -R www-data:www-data /var/www/html

# The port is provided by Render at runtime
EXPOSE ${PORT}

# Start Apache in the foreground
CMD ["apache2-foreground"]

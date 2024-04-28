# โหลด Base Image PHP 8.0.3
FROM php:8.0.3-fpm-buster

# ติดตั้ง Extension bcmath  และ pdo_mysql สำหรับ Laravel 7, 8, 9 และ 10
RUN docker-php-ext-install bcmath pdo_mysql

# สั่ง update image และ ติดตั้ง git zip และ unzip pacakage
RUN apt-get update
RUN apt-get install -y git zip unzip

# ติดตั้ง NodeJS
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash - 
RUN apt-get install -y nodejs

# Copy file composer:latest ไว้ที่ /usr/bin/composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# เปลี่ยนสิทธิ์ของ storage/logs เป็น 777 (อ่าน เขียน แก้ไข โดยทุกคน)

RUN mkdir -p /var/www/storage/logs
RUN chown -R www-data:www-data /var/www/storage/logs
RUN chmod -R 777 /var/www/storage/logs

# เปลี่ยนสิทธิ์ของ storage/framework/sessions เป็น 775 (อ่าน เขียน โดยผู้ใช้และกลุ่ม และอ่านโดยสาธารณะ)
RUN mkdir -p /var/www/storage/framework/sessions
RUN chmod -R 775 /var/www/storage/framework/sessions

#
# RUN curl -v -H "Authorization: Bearer ${DOCKER_HUB_TOKEN}" https://registry-1.docker.io/v2/
#

# เปลี่ยนสิทธิ์ของ storage/framework/views เป็น 775 (อ่าน เขียน โดยผู้ใช้และกลุ่ม และอ่านโดยสาธารณะ)
RUN mkdir -p /var/www/storage/framework/views
RUN chmod -R 777 /var/www/storage/framework/views

# เปลี่ยนเจ้าของของ storage/framework/sessions เป็น www-data (หรือผู้ใช้ที่เหมาะสมใน container)
RUN chown -R www-data:www-data /var/www/storage/framework/sessions

# Set working directory
WORKDIR /var/www

EXPOSE 9000
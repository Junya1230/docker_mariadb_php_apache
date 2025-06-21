# イメージを指定
FROM php:8.4.8-apache

# apache有効化
RUN mv /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled
RUN /bin/sh -c a2enmod rewrite

# パッケージを更新
RUN apt-get update \
# パッケージをインストール
# zlib1g-dev: zlibライブラリをインストール
# vim: テキストエディタ
# libzip-dev: zipファイルを扱うためのライブラリ
&& apt-get install -y zlib1g-dev vim libzip-dev \
# phpの拡張モジュールをインストール
# zip: zipファイルを扱うための拡張モジュール
# pdo_mysql: MySQLデータベースに接続するための拡張モジュール
&& docker-php-ext-install zip pdo_mysql

# Composer install
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

# Composerの設定
# COMPOSER_ALLOW_SUPERUSER: スーパーユーザー権限を許可
ENV COMPOSER_ALLOW_SUPERUSER 1
# COMPOSER_HOME: Composerのホームディレクトリ
ENV COMPOSER_HOME /composer
# PATH: Composerのパス
ENV PATH $PATH:/composer/vendor/bin

# Laravel本体を/var/www/laravelにインストール
# laravel/laravel: Laravelのイメージ
# /var/www/laravel: インストール先のディレクトリ
RUN composer create-project laravel/laravel /var/www/laravel

# ApacheのDocumentRootを/var/www/laravel/publicに変更
RUN sed -i 's|/var/www/html|/var/www/laravel/public|g' /etc/apache2/sites-available/000-default.conf

ENV PATH $PATH:/var/www/laravel:/var/www/laravel/vendor/bin

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
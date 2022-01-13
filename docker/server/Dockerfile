FROM ubuntu:focal

ENV TZ=Europe/Bratislava

### apt update && apt upgrade
ARG DEBIAN_FRONTEND=noninteractive
RUN apt update
RUN apt upgrade -y
RUN apt autoremove -y

### install basic packages && apt ppa sury key
RUN apt install -y apt-transport-https lsb-release ca-certificates curl gpg tzdata
RUN rm -v "/etc/timezone"
RUN ln -s "/usr/share/zoneinfo/Europe/Bratislava" "/etc/timezone"
RUN apt-key adv --keyserver keyserver.ubuntu.com --recv-keys 4F4EA0AAE5267A6C
RUN echo "deb http://ppa.launchpad.net/ondrej/php/ubuntu $(lsb_release -sc) main" > "/etc/apt/sources.list.d/php.list"
RUN echo "deb-src http://ppa.launchpad.net/ondrej/php/ubuntu $(lsb_release -sc) main" >> "/etc/apt/sources.list.d/php.list"
RUN apt update --fix-missing

### install Apache2 + PHP
RUN apt install software-properties-common -y

RUN apt install -y \
		php8.0 \
        libapache2-mod-php8.0 \
        php8.0-bcmath \
        php8.0-cli \
        php8.0-common \
        php8.0-curl \
        php8.0-intl \
        php8.0-mbstring \
        php8.0-mysql \
        php8.0-sqlite3 \
        php8.0-opcache \
        php8.0-raphf \
        php8.0-http \
        php8.0-readline \
        php8.0-xml \
        php8.0-zip \
        php8.0-gd \
        php8.0-imagick \
        libmagickcore-6*

### configure Apache2 && PHP
RUN echo "*" | a2dismod -f
RUN echo "alias authz_core deflate dir env expires filter headers mime mpm_prefork negotiation php8.0 reqtimeout rewrite session setenvif vhost_alias" | a2enmod -f

# composer
ENV COMPOSER_HOME /composer
ENV PATH /composer/vendor/bin:$PATH
ENV COMPOSER_ALLOW_SUPERUSER 1
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer self-update --2
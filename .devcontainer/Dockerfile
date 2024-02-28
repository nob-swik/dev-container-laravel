FROM mcr.microsoft.com/devcontainers/base:1-ubuntu

RUN sudo apt update && sudo apt upgrade -y && \
    sudo apt install software-properties-common -y && \
    sudo add-apt-repository ppa:ondrej/php -y && \
    curl -fsSL https://deb.nodesource.com/setup_20.x | sudo -E bash - && \
    sudo apt update && sudo apt upgrade -y && \
    sudo apt install php8.3 php8.3-mysql php8.3-xdebug php8.3-xml php8.3-curl nodejs -y && \
    sudo npm install -g yarn && \
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
    php composer-setup.php && \
    php -r "unlink('composer-setup.php');" && \
    sudo mv composer.phar /usr/local/bin/composer

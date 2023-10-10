# # Use a imagem oficial do PHP com Composer
# FROM php:7.4

# # Instale as dependências do sistema
# RUN apt-get update && apt-get install -y libzip-dev unzip

# # Instale o Composer globalmente
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# # Instale o driver PDO MySQL
# RUN docker-php-ext-install pdo pdo_mysql

# # Instale o Node.js
# RUN curl -sL https://deb.nodesource.com/setup_14.x | bash -
# RUN apt-get install -y nodejs

# # Configure a pasta de trabalho
# WORKDIR /var/www/html

# # Copie o arquivo composer.json e composer.lock para instalar as dependências
# COPY composer.json composer.lock ./

# # Instale as dependências do Composer
# RUN composer install --no-scripts --no-autoloader

# # Copie o resto dos arquivos do projeto
# COPY . .

# # Gere o arquivo de autoload do Composer
# RUN composer dump-autoload

# # Exponha a porta 8000 para o servidor de desenvolvimento embutido do Laravel
# EXPOSE 8000

# # Inicie o servidor de desenvolvimento embutido do Laravel
# CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]

# Use a imagem oficial do PHP com Composer
FROM php:7.4

# Instale as dependências do sistema
RUN apt-get update && apt-get install -y libzip-dev unzip supervisor

# Instale o Composer globalmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instale o driver PDO MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Instale o Node.js
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash -
RUN apt-get install -y nodejs

# Configure a pasta de trabalho
WORKDIR /var/www/html

# Copie o arquivo composer.json e composer.lock para instalar as dependências
COPY composer.json composer.lock ./

# Instale as dependências do Composer
RUN composer install --no-scripts --no-autoloader

# Copie o resto dos arquivos do projeto
COPY . .

# Copie o arquivo de configuração do Supervisor da raiz do projeto
COPY laravel-app.conf /etc/supervisor/conf.d/

# Atualize a configuração do Supervisor
RUN supervisord -c /etc/supervisor/supervisord.conf

# Instale as dependências Node.js
COPY package.json package-lock.json ./
RUN npm install

# Gere o arquivo de autoload do Composer
RUN composer dump-autoload

# Expor a porta 8000 para o servidor de desenvolvimento embutido do Laravel
EXPOSE 8000

# Iniciar o Supervisor, que gerenciará os processos do Laravel e do BrowserSync
CMD ["supervisord", "-n"]



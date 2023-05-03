<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Como Rodar o aplicativo:

### 1 - Criar um banco de dados no Mysql chamado candidato-vagas com a collation utf8mb4_unicode_ci

### 2 - No terminal, executar os comandos

### composer install

### php artisan migrate

### php artisan db:seed --class=AdminSeed

### php artisan db:seed --class=VagasSeed

### php artisan db:seed --class=CandidatosSeed

### php artisan db:seed --class=CandidaturasSeed
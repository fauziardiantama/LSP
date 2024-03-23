## Cara menjalankan :

Cara menjalankan :
- git clone https://github.com/fauziardiantama/LSP.git
- composer install
- copy .env.example dan ubah nama ke .env
- isi
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```
 dengan database personal
 - php artisan key:generate
 - php artisan migrate
 - php artisan serve
 - open localhost:8000 or 127.0.0.1:8000
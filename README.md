#How to run ? 

run below code
```
composer install
php artisan migrate:fresh --seed
php artisan serve
```

using postman collention in project root you can test the app

there will be 10 users and 10 websites in database for testing proposes

for testing command first run queue 

```
php artisan queue:work -v
```

then run the command 

```
php artisan app:send-emails
```
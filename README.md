# Pizza Shop Laravel 

Simple web app for online pizza ordering. The application is created in Laravel and uses MySql database for storing data.

## Development
```
php artisan serve # run server in development mode
```

## Setting local development environment for Windows

In PHP.ini file, uncomment extensions:
```
extension=mysqli
extension=pdo_mysql
```
In MySql run commands:
```
mysql> ALTER USER 'user'@"localhost" IDENTIFIED WITH mysql_native_password BY 'password';
mysql> FLUSH PRIVILEGES;
```


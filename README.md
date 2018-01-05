# Cloud Development Project

Live version available on: http://findyourrestaurant.azurewebsites.net/

## Requirements
- PHP
- Composer
- Npm / node
- Vagrant
- Homestead maybe not???

## How to setup
0. First of all place this in your .env file which should be at the root of the project:
```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=33060
DB_DATABASE=restaurantDB
DB_USERNAME=homestead
DB_PASSWORD=secret
```
1. `composer install`
2. `npm install`
3. Mac/Linux: `php vendor/bin/homestead make` || Windows: `vendor\\bin\\homestead make`
4. `vagrant up --provision`
5. edit hosts file: `192.168.10.10 homestead.test`
6. Open a connection to your freshly made vagrant box, for example Putty. 
    Default login and password are both 'vagrant'. 
7. Connect to mysql: `mysql -u homestead -p`  
8. `CREATE DATABASE restaurantDB;`
9. To exit: `\q`
10. Now back at the root of the project: `php artisan migrate --seed`
11. surf to homestead.test

Dummy user account:

**email:** restaurantLover@hotmail.com

**password** undercover

## Remove your vagrant box
1. `vagrant global-status`
2. `vagrant destroy [id]`

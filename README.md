# Cloud Development Project

Live version available on: http://findyourrestaurant.azurewebsites.net/

## Requirements
- PHP
- Composer
- Npm / node
- Vagrant
- Homestead

## How to setup
- First of all place this in your .env file which should be at the root of the project:
```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=33060
DB_DATABASE=restaurantDB
DB_USERNAME=homestead
DB_PASSWORD=secret
```
- `composer install`
- `npm install`
- Mac/Linux: `php vendor/bin/homestead make` || Windows: `vendor\\bin\\homestead make`
- In the new file at the root of the project (**Homestead.yaml**), change:
```
databases:
    - homestead
```
To
```
databases:
    - restaurantDB
```
Which is the name I used for my database

- then run: `vagrant up --provision`
- edit hosts file, include this line: `192.168.10.10 homestead.test`
- Now back at the root of the project: `php artisan migrate --seed`
- surf to homestead.test

Dummy user account:

**email:** restaurantLover@hotmail.com

**password:** undercover

## Remove your vagrant box
1. `vagrant global-status`
2. `vagrant destroy [id]`

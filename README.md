# Cloud Development Project

## How to setup
1. `composer install`
2. `npm install`
3. Mac/Linux: php `vendor/bin/homestead make` || Windows: `vendor\\bin\\homestead make`
4. `vagrant up --provision`
5. edit hosts file: `192.168.10.10 homestead.test`

## Remove your vagrant box
1. `vagrant global-status`
2. `vagrant destroy [id]`

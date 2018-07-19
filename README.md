Asocial
========================

Welcome to the Asocial - your personal diary and social network. 
Asocial is based on Symfony Flex.

For details on how to download and get started, see the
[Installation](#markdown-header-installation) chapter of this Documentation.

Installation
--------------

  * Install dependencies

        $ composer install


  * Create database

        $ php bin/console doctrine:database:create


  * Update database schema to latest version

        $ php bin/console doctrine:schema:update --dump-sql --force


  * Load database fixtures with demo data

        $ php bin/console doctrine:fixtures:load


  * Generate JWT keys

        $ mkdir -p app/config/jwt 
        $ openssl genrsa -out config/jwt/private.pem -aes256 4096 
        $ openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem
    Don't forget to save pass phrase to .env file
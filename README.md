# api.spacepioupiou
API For my game SpacePiouPiou

# Introduction

This REST API is a Symfony 5 PHP project based on the API Platform bundle. She is made to manage loged users and their scores and statistics.
She also manage the registeration of users trought the game or with form / POST request.
You can use it with your own unity game / website / wathever you want with the use of GET POST PUSH etc to manage users, highscores, ranking, or something else if you configure your own routes.

# Requirements :

* Apache server with PHP 7.1
* SQL Database
* Composer
* Doctrine (included in this Symfony project)

# What is used in this project :

* Symfony 5.0.4 (PHP Framework)
* API Platform bundle (Bundle that create a CRUD of your Entities to get a JSON-LD response)
* lexik/jwt-authentication-bundle (A powerful bundle to protect your API with JsonWebToken and SSH keys)

# Walktrought

Once you clone this project, you cannot use it immediatly. You must configure the .env file located at the root of the main folder.
Go to line 32. She begin with DATABASE_URL. Replace it with this : 
DATABASE_URL=mysql://[user]:[password]@IP:PORT/database_name

Once you did it, go to the terminal and copy/past this lines :

php bin/console doctrine:database:create 
//Create the database with your own database_name
php bin/console doctrine:schema:update --force 
//Create the tables by using Entities. You can check them in the api.japandoudou/src/Entity folder

Once you create the database, we must create the SSH Keys for our Security Web tokens.
Make sure you are located in api.japandoudou/config/jwt folder in your terminal and enter those lines :

openssl genrsa -out private.pem -aes256 4096
openssl rsa -pubout -in private.pem -out config/jwt/public.pem


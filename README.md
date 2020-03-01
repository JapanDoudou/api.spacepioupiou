# api.spacepioupiou
===================  

The SpacePiouPiou API is a REST API to primary manage highscores of my Unity C# Game ! But we can use it with other games too :)

# Introduction
--------------

This REST API is a Symfony 5 PHP project based on the API Platform bundle. She is made to manage loged users and their scores and statistics.
She also manage the registeration of users trought the game or with form / POST request.
You can use it with your own unity game / website / wathever you want with the use of GET POST PUSH etc to manage users, highscores, ranking, or something else if you configure your own routes.

# Requirements :

* PHP 7.1
* SQL Database
* Composer
* Doctrine (included in this Symfony project)

# What is used in this project :

* Symfony 5.0.4 (PHP Framework)
* API Platform bundle (Bundle that create a CRUD of your Entities)
* lexik/jwt-authentication-bundle (A powerfull bundle to protect your API with JsonWebToken and SSH keys)

# Walktrought

## Importing and configure project :
Copy/Past this line in your empty php project :  
```bash
$ git clone https://github.com/JapanDoudou/api.spacepioupiou.git
```
Once you clone this project, **you cannot use it immediatly**. Some actions are needed.

You must configure the .env file located at the root of the main folder.
*Go to line 32*. She begin with DATABASE_URL. Replace it with this : 
```bash
DATABASE_URL=mysql://[user]:[password]@IP:PORT/database_name  
```
Once you did it, go to the terminal and copy/past this lines :
```bash
$ php bin/console doctrine:database:create  
```
Create the database with your own database_name 
```bash
$ php bin/console doctrine:schema:update --force
```
Create the tables by using Entities. You can check them in the api.japandoudou/src/Entity folder.  

Once you create the database, we must create the *SSH Keys* for our Security Web tokens.  
*Make sure you are located in api.spacepioupiou/config/jwt* folder in your terminal and enter those lines :  
```bash
$ openssl genrsa -out private.pem -aes256 4096
```
They will ask you a secret phrase to encrypt/decrypt your file. You must keep it in mind because you need it for the second line and the next one too : 
```bash
$ openssl rsa -pubout -in private.pem -out public.pem
```

Once you did it, go to the *api.spacepioupiou/config/* folder and open *lexik_jwt_authentication.yaml* file. This is the file where your private.pem and public.pem location must be put. By default it's done but feel free to manage it differently. *You must put your pass_phrase* in the line 4 like this : 
```bash
pass_phrase: 'mypassphrase'.  
```
**Indentation in yaml files is very important**
The token_ttl is the valid duration of a connection in seconds. For my game, 1h is enought (for the moment).

By luck, routes and firewall are already configured out in this project. We use the UserInterface and Encoder of Symfony to manage users and password encryption. Routes can be configured in the security.yaml file. The encryption too (The **encode method of the password** is at line 34 of src/Controller/AuthController.php file).  

## Testing the API :
In this part we will create the first user and we send a Score to the database.
To start your server, you can copy/past this line in your terminal :  
(Admiting you're in api.japandoudou folder. You can use the IP you want)
```bash
php -S 127.0.0.1:8000 -T public
```
localhost is the IP you choose.

### Creating the first user :
And then we will create the first user :)
Let's copy/past this line in our terminal :
```bash
curl -X POST http://localhost:8000/register -d username=**MyAwesomeUserName** -d password=**Not0000** -d email=**test@test.com**
```

The user **MyAwesomeUserName** is created in the database (and his own userData tab). With that, we can now log our user in !
### Get the JwToken :
```bash
curl -X POST -H "Content-Type: application/json" http://localhost:8000/login_check -d '{"username":"**MyAwesomeUserName**","password":"**Not0000**"}'
```

The expected answer must be something like that : 
```bash
{"token":"eyJ0eXAiOi-A-lot-of-characters-V7tgd3io"}.
```
### POST a fake score :
To test the final part, we will post a fake score. 
```bash
curl -X POST -H "Authorization: Bearer eyJ0eXAiOi-A-lot-of-characters-V7tgd3io" -H "Content-Type: application/json" http://localhost:8000/api/scores -d '{"user":"/api/users/1","score":999999}'
```

The response must be something like that : 
```bash
{"score":999999,"creationDate":"2020-03-01T00:00:00+01:00","user":{"username":"test"}}
```
Some explications are needed here : because of *ManyToOne* relation between User Entity and Score Entity on user.id and scores.user_id (one score is linked to one user but one user can have many scores), we must send a JSON **not** with user_id as an INT, but **with user IRI link as a string** ("/api/user/1" is the IRI link of the first created user). That's a triky part that gave me some headaches !

## Global use of the API
  
All access to http://my_web_site/api need to be identify with a JsonWebToken in the header of **every request**. To get a JwT you need to login. To create an acount, it's like the curl but with html / js / c# / UseYourLanguageHere :
* Everyone can register an acount by sending a form (with username, email, password) with a POST method to the http://my_web_site/register. In the AuthController, we check that username and email didn't already exist. They are marked as unique in the User.php Entity too. New users are logged as [ROLE_USER].
* Once you create an account, you need to log you in by sending a POST request to http://my_web_site/login_check with your username and your password. The answer is a JSON Token that you must save to put it in EVERY header of any request on the API (http://my_web_site/api/scores/
* The routes are not all protected yet but in the next update USERS will only be able to make GET request (not on the other users) and POST to keep their scores and compare them, and PUT for their stats. I'm working on a method to delete his own account and stats.
* The link http://my_web_site/api/highscores/ send a JSON with the 10 best scores Grouped by users (only 1 best score per user so). For now he is a little buggy : he order it by alphabetical letters xD
* Like I said, in the next Update, only ROLE_ADMIN can make any type of request, including DELETE.
* It include a little FRONT View that show the 10 best Users and their highscores at the root of the website.

## USE the API With UNITY Games in C#

Comming soon

## What must be done in priority

* I must increase security of my API. If someone is loged in and have the necessary skills, he can delete everything he want. Even if he is loged as a simple user.
* I must save in the database the roles of each user. Only me and maybe other peoples can ben ROLE_ADMIN to administrate and kick the cheaters
* I must include a verification by mail to avoid someone to create Infinite account
* If one day I sell my game, I must see if it's compatible with STEAM.

# Usefull Links :
Doctrine Documentation for Symfony :
https://symfony.com/doc/current/doctrine.html
API Platform documentation :
https://api-platform.com/docs/core/getting-started/

And thanks you !

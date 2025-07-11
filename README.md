
## About The Project

  

This project is basically a Realtime Chat application built using PHP 8.4, Laravel 12, MySQL, VueJS 3, TypeScript, TailwindCSS 4, Laravel Reverb (Websocket server), Pusher for realtime messaging, Laravel Echo for listening event broadcasting. This project contains backend, frontend in the same repository. It contains features like user authentication including both login and registration, sending realtime chat message using pusher architecture.

  

## Tech Stack used for this project

  

1. PHP 8.4.5

2. MySQL 8.4.5

3. phpMyadmin 5.2

4. Laravel 12.x

5. Node 22.17 LTS

6. VueJS 3.5 with Composition API

7. TypeScript for VueJS

8. Pinia for VueJS state management

9. TailwindCSS 4 for frontend design

10. Ubuntu 25.04 LTS as OS

12. REST API using SOLID Design Pattern

14. Laravel Reverb (Latest Websocket server)

15. Pusher JS

16. Laravel Echo for listening to realtime event broadcasting

  

## Necessary Softwares to Download

  

Since I am a Ubuntu OS user, I used Ubuntu 25.04 LTS for development. You can use windows if you want. But apart from that, a few kinds of softwares need to be installed and running into your system.

  

For Linux we need to install and configure **PHP >= 8.3**, **MySQL 8.4**, **PhpMyAdmin 5.2** and [Composer](https://getcomposer.org/download/) for PHP package management in your local system as well.After installation, you can check it by `composer --version`, `php --version`, `mysql --version` commands.   

After that install and configure [NodeJS LTS 22.17](https://nodejs.org/en). You can use the [NVM](https://github.com/nvm-sh/nvm) to install and configure NodeJs if you are using linux distribution.  

**Follow the commands to install NodeJS easily on Ubuntu 24.04**  

`curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.40.3/install.sh | bash`  

Restart your terminal and run the following commands 

`nvm install --lts` and `nvm current` you are done. You can check it by using `node --version` and `npm --version` commands. 

**In windows you  can download the NodeJS executables and install**
**You can download XAMPP for Windows from [apachefriends.org](https://www.apachefriends.org/) and install. This way you can install both PHP , MySQL and PHPMyAdmin. Make sure you start the apache, mysql, phpmyadmin by opening the xampp application**

After the successful installation and configuration of all the softwares, you are good to go.  

## How to get the project live 

To get the application up and running you need to follow couple of steps. Lets go with the steps one by one  

### STEP #1: Clone the github repository and installing dependencies  

First you need to clone the Github repository from the link given below 

`git clone https://github.com/tanvirasifkhan/laravel-vue-pusher-chat-app.git`  

and `cd /laravel-vue-pusher-chat-app`  

**For Backend follow the commands**  

1.  `cd backend`

2.  `touch .env` and `cp .env.example .env` (You can manually create .env file and copy .env.example content to .env file)

***Configure database credentials***

Now its time to configure backend `.env` file. Configure your database credentials like below and keep it as it is 

```

DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=chat

DB_USERNAME=root

DB_PASSWORD=

```

**Than run the following commands**

4.  `composer install`

5.  `php artisan key:generate`

**For Frontend follow the commands**

  

1.  `cd frontend`

2.  `touch .env` and `cp .env.sample .env` (You can manually create .env file and copy .env.example content to .env file)

3.  `npm install`
  

### STEP #2: Running The Application  

Now access your `phpMyadmin` panel inside your browser on port `localhost/phpmyadmin` and create a database called `chat`. By the way you can create database with any name. You just need to configure your `.env` accordingly. Now guess what, you are good to access the whole application in the browser.  

**Follow the commands**

1. `cd backend` and run `php artisan migrate` to run the database migration and then run `php artisan optimize:clear` to clear all the cache. Finally run `php artisan serve` command to run the server at `localhost:8000`.
2. **Very Important** open another tab and `cd backend` and run `php artisan reverb:start --debug` to run the websocket server. Keep in mind that, if you do not run this command realtime chat will not work

3. `cd frontend` and run `npm run dev` to run the frontend in the browser at `localhost:5173` address.  

4. You can register as a user from the frontend. But you can create some dummy user by running this command `php artisan db:seed`. There will be 3 users created with the following credentials.
  1. Email : asif.khan@gmail.com and Password: asifkhan
  2. Email: rubel.hasan@gmail.com and Password: rubel
  3. Email: tanvir.ahmed@gmail.com and Password: tanvir
By the way this command also creates some dummy chat messages too. You can login using one of these dummy users.

You can now play around with the application.  

Hope, the application runs smoothly. Enjoy and thanks. If you have any query, then send an email to `asifkhan.github@gmail.com`. Thanks
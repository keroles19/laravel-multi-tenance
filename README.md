# Demo Laravel Project For Multi Tenancy

# preview

![Login_Page](https://github.com/keroles19/laravel-multi-tenance/assets/36054945/ef456463-384b-4fd1-a8d9-3f17c9529250)
![Home](https://github.com/keroles19/laravel-multi-tenance/assets/36054945/7ecb5f4d-c320-4e68-89a7-2dd9ae3db265)

https://github.com/keroles19/laravel-multi-tenance/assets/36054945/46cc16bf-3911-4f92-b543-93f98ae3d7c5


## BY

[![Laravel](https://img.shields.io/badge/-Laravel-white?style=flat-square&logo=laravel)](https://github.com/keroles19/)
[![mysql](https://img.shields.io/badge/-mysql-005C84?style=flat-square&logo=mysql&logoColor=white)](https://github.com/keroles19/)
[![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat-square&logo=php&logoColor=white)](https://github.com/keroles19/)
[![HTML5](https://img.shields.io/badge/-HTML5-E34F26?style=flat-square&logo=html5&logoColor=white&link=https://github.com/keroles19/)](https://github.com/keroles19/)
[![CSS3](https://img.shields.io/badge/-CSS3-1572B6?style=flat-square&logo=css3&link=https://github.com/keroles19/)](https://github.com/keroles19/)
[![Bootstrap](https://img.shields.io/badge/-Bootstrap-563D7C?style=flat-square&logo=bootstrap&link=https://github.com/keroles19/)](https://github.com/keroles19/)
[![JQUERY](https://img.shields.io/badge/jQuery-0769AD?style=flat-square&logo=jquery&logoColor=white&link=https://github.com/keroles19/)](https://github.com/keroles19/)
[![JS](https://img.shields.io/badge/-JavaScript-black?style=flat-square&logo=javascript&link=https://github.com/keroles19/)](https://github.com/keroles19/)

# Requirments:

- PHP 8.1 or later.
- MySQL 5.7 or later.

## installation

after clone/ download the project file, `cd` into the project directory and follow the steps below:

- run `composer install` for download the required packages.
- if you don't see the `.env` file please do the following:
    - run `cp .env.example .env` to copy env file.
    - run `php artisan key:generate` to generate a new app key.
- run `php artisan migrate:fresh --seed` to run database migration with database seeds.
- run `php artisan serve`   to run project.

### Login Credentials

### Super Admin: 
- Email    =>    `super_admin@orderking.com`
- Password =>        `1234`
### Merchants :
- Email    =>    `merchant_1@orderking.com` or `merchant_2@orderking.com`
- Password =>        `1234`
### User :
- Email    =>    `customer_2_1@orderking.com`
- Password =>        `1234`


### NOTE

if you get any errors in this step, when seeding the database related to existing data, please run the following:

- run `chmod ugo=rwx storage -R` to give permissions to storage folder for read/wire actions.
- run `chown www-data storage -R` for the same reason described above.
- run `php artisan optimize:clear` to reset setting to is last good case.

## Using docker

- install `docker` and `docker-compose`, for Linux [ubuntu] OS, you can user `docker-install.sh` file inside project
  folder, for windows and mac you can setup docker desktop
- run `docker-compose build app`
- run `docker-compose up -d`
- navigate to `127.0.0.1:8000`
- you're done!


## Theoretical questions
1. What is SaaS?
 - Software as a Service (SaaS) is a cloud computing model that provides software applications over the internet on a subscription basis. Instead of purchasing and installing software on individual computers or servers, users can access and use the software through a web browser. SaaS applications are hosted and maintained by a third-party provider, 
   which takes care of infrastructure, updates, and security, allowing users to focus on using the software rather than managing it.
2. Does a SaaS-Webapp require the multi-database approach?
 - Whether a SaaS web application requires a multi-database approach depends on various factors, including the application's architecture, scalability requirements, and the level of isolation needed for tenant data.
   In a multi-database approach, each tenant (customer or user) has their own separate database instance. This approach provides strong data isolation but can be complex to manage and scale as the number of tenants grows.
   Alternatively, in a single-database approach, all tenant data is stored in a single database with appropriate tenant identifiers. This approach can be simpler to manage but may have limitations in terms of data isolation and scalability.
   The decision to use a multi-database approach should be based on factors such as data security and privacy requirements, scalability needs, and the complexity of managing tenant data. It's essential to carefully evaluate these factors to determine the most suitable approach for your specific SaaS project.

3. What is multi-tenancy?
 - Multi-tenancy is a software architecture that allows a single instance of a software application to serve multiple tenants or customers while keeping their data and configurations logically isolated from each other. In a multi-tenant system, each tenant can customize and use the software as if they have their dedicated instance, even though they share the same underlying infrastructure.

4. Which multi-tenancy approach would you use for our project? (single or multi-database)
- Given that your project involves creating a back office/dashboard for restaurant owners/merchants and Orderking Egypt, with permissions and roles for various users, as well as a REST API to connect to POS systems, a single-database approach is likely the more practical choice. Here's why:
    1. Simplicity: A single-database approach is simpler to implement and manage. It reduces the complexity associated with maintaining and scaling multiple databases.
    2. Centralized Data: In this approach, all tenant data is stored in a centralized database with appropriate tenant identifiers. This can make it easier to perform cross-tenant analytics, generate reports, and manage billing information via subscriptions.
    3. Cost-Effective: Managing a single database is generally more cost-effective in terms of infrastructure and operational overhead compared to maintaining multiple databases.
    4. API Integration: Having a single database simplifies the design of your REST API. You can use tenant identifiers in your data model and queries to ensure that each tenant's data is logically isolated.
    5. Scalability: While a multi-database approach might seem suitable for strict data isolation, it can add complexity to scaling as the number of tenants grows. A single-database approach can accommodate a reasonable number of tenants efficiently.
    6. Data Security: With proper access controls, data security and tenant isolation can still be robust in a single-database approach.

## how you achieved multi-tenancy and how you separated the super admin
- I used the single-database approach to achieve multi-tenancy. In this approach, all tenant data is stored in a single database with appropriate tenant identifiers. This approach can be simpler to manage but may have limitations in terms of data isolation and scalability.
- I used roles and permission to separate the super admin from other users, and I used the `spatie/laravel-permission` package to achieve this.
- I used MiddleWare to check if the user has the required role to access the requested route and dashboard.

![Blank diagram](https://github.com/keroles19/laravel-multi-tenance/assets/36054945/b22214cd-6085-4351-9349-a9d82f3a215a)
![schema](https://github.com/keroles19/laravel-multi-tenance/assets/36054945/5b45b4c9-e9e4-41f3-ac04-3644ceaeefe4)


## ElasticBlog
A Laravel+Docker API CRUD to learn about ElasticSearch.

<b>API documentation</b>

https://documenter.getpostman.com/view/4919763/SWE6bybX?version=latest

<b>Installation</b>

* `$ docker-compose up` to up containers;
* `$ docker-compose exec php-fpm php artisan migrate --seed` to create database and insert some test data;

<b> How it works </b>

The project uses the official ElasticSearch PHP lib (https://github.com/elastic/elasticsearch-php) to interact with the ElasticSearch REST API. 

There’s a `PostObserver` class that  listens to `Post` model events (create, delete and update), keeping consistency between MySQL database and ElasticSearch data.

There’s a trait called `Searchable` to use in models that need to be indexed by ElasticSearch. 

To get things working, it was necessary to register ES Client to Laravel’s `AppServiceProvider, thus, the framework can create ES instance automatically using the configuration parameters from `.env` file.

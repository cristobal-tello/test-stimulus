# test-stimulus

I used 6.4 Symfony version (https://symfony.com/doc/6.4/setup.html)

## How I created the project

You need composer installed in your computer. If you don't have it, you can download it from here: https://getcomposer.org/download/

Then, install the Symfony Maker Bundle to create code from the command line

```bash
composer create-project symfony/skeleton:"6.4.*" .
composer require webapp
```

### Install needed packages

We need next packages:

#### Install doctrine

We need doctrine to work with the database

```bash
composer require symfony/orm-pack
```

We need monolog as a logger

```bash
composer require monolog
```

#### Configuring the database access

In .env file (or .env.local if you're using docker), change the DATABASE_URL variable to match your database connection string,in this case we will use mySQL

```php
DATABASE_URL="mysql://<userofdb>:@127.0.0.1:3306/<dbname>?serverVersion=8.0.32&charset=utf8mb4"
```

In docker (.env.local file)

```php
APP_ENV=dev
DATABASE_URL=mysql://<dbuserindockercompose>:<passwordindockercompose>@db:3306/<dbname>
```

#### Drop the database

```bash
php bin/console doctrine:database:drop --force
```

#### Creates the database

```bash
php bin/console doctrine:database:create
```

#### Create a controller

Use the make:controller command to create a controller

```bash
php bin/console make:controller HomeController
```

Adjust the route in the new controller to match your needs.

```php
#[Route('/', name: 'app_home')]
```

#### Create entities

```bash
php bin/console make:entity <entity_name>
```

#### Create entities

```bash
php bin/console make:entity <entity_name>
```

#### Configure relations

We need to configure how database tables are related.

In customer.php entity #[ORM\ManyToOne(targetEntity: City::class, inversedBy: 'name')]

#### Migrations

```bash
php bin/console doctrine:migrations:diff
php bin/console doctrine:migrations:migrate
```

## Forms

composer require symfony/form

## Asset-mapper

composer require symonfy/asset-mapper

# Logical path

bin/console debug:asset

eg:
<img src="{{ asset('images/sample.jpg') }} " alt="sample image" width="25%" height="25%">

# To compile assets:

But only in production
./bin/console asset-map:compile

## Install Javascript npm packages

.bin/console importmap:require <package-name>

eg:

./bin/console importmap:require js-confetti

Packages are installed in assets/vendor folder.

To install packages (when you clone the repository) run:
.bin/console importmap:install

## Tailwind bundle

composer require symfonycasts/tailwind-bundle
./bin/console tailwind:init
./bin/console tailwind:build -w

# Install fixtures

composer require --dev doctrine/doctrine-fixtures-bundle nelmio/alice

# Format Providers

https://fakerphp.org/formatters/

## Run fixtures

./bin/console doctrine:fixtures:load

# Tailwind form theme

Use https://github.com/tales-from-a-dev/flowbite-bundle/blob/main/docs/index.md#installation

# Ux autocomplete

composer require symfony/ux-autocomplete
bin/console importmap:require tom-select/dist/css/tom-select.default.css

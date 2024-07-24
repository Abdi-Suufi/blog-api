# Laravel Blog Post API

This is a simple RESTful API built with Laravel for managing blog posts. It includes CRUD operations for blog posts and basic validation.

## Features

- Create, read, update, and delete blog posts.
- Basic validation for creating and updating posts.
- Authentication (if needed) can be configured based on your requirements.

## Requirements

- PHP 8.3.9 or higher
- Laravel 11.16.0
- Composer
- MySQL or any other supported database
- Postman to see it work or just use it for your frontend straight away

## Setup

### 1. Clone the Repository

```bash
git clone https://github.com/Abdi-Suufi/blog-api.git
cd blog-api
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Configure Environment
Copy the .env.example file to .env and update the database connection and other environment settings as needed.
```bash
cp .env.example .env
```

Update .env with your database configuration:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Run Migrations
```bash
php artisan migrate
```

## API Endpoints

> Create Post: /api/posts

> Get All Posts: /api/posts

> Get Single Post: /api/posts/{id}

> Update Post: /api/posts/{id}

> Delete Post: /api/posts/{id}


## Testing

Run the line below to test post, create and update
```bash
php artisan test
```

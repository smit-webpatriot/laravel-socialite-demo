# Laravel Socialite Demo

## Setup Instructions

**Clone Repository**
```bash
git clone git@github.com:smit-webpatriot/laravel-socialite-demo.git
```

**Switch to that directory**
```bash
cd laravel-socialite-demo
```

**Copy .env**
```bash
[cp/copy] .env.example .env
```

**Configure that .env file**
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=<password>

GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
GOOGLE_REDIRECT=

FACEBOOK_CLIENT_ID=
FACEBOOK_CLIENT_SECRET=
FACEBOOK_REDIRECT=
```

**Install required libraries**
```bash
composer install
npm install
```

**Generate APP_KEY**
```bash
php artisan key:generate
```

**Migrate Database**
```bash
php artisan migrate
```

**Create npm build**
```bash
npm run dev
```

**Start Project**
```bash
php artisan serve
```

### You can see the project running on port 8000

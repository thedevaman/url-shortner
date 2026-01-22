# Laravel Project Setup

This project is built with the Laravel framework.

## Requirements

Make sure you have the following installed on your system:

- PHP >= 8.1  
- Composer  
- MySQL  
- Node.js & npm (for frontend assets)
- Git

## Installation

### 1. Clone the repository
```
git clone https://github.com/thedevaman/url-shortner.git
```

### 2.open preject folder
```
cd url-shortner
```

### 3.Install PHP dependencies
```
composer install
```

### 4.Copy environment file
```
cp .env.example .env
```

### 5.Generate application ke
```
php artisan key:generate
```

### 6.Configure environment variables
```
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 7.Run database migrations
```
php artisan migrate
```

### 8.Run database seeders
```
php artisan db:seed --class=UserSeeder
```
- username: superadmin@example.com
- password: 12345678

### 8.Install frontend dependencies
```
npm install
```

### 9.Build frontend assets
```
npm run dev or npm run build
```

### 10.Start the development server
```
php artisan serve
```

### 11.The application will be available at:
```
http://127.0.0.1:8000
```
# Laravel Phone Number Verification Using Firebase

This project demostrates phone authentication by using firebase in Laravel.

## Installation

- Clone the repository
```bash
git clone https://github.com/phi-rakib/laravel-firebase-phone-number-verification.git
```

- Change directory to  laravel-firebase-phone-number-verification
```bash
cd laravel-firebase-phone-number-verification
```

- Install the dependencies
```bash
composer install
```
- Copy the environment file
```bash
cp .env.example .env
```
- Change firebase configuration values in the environment file
```bash
API_KEY=your-firebase-app-api-key
AUTH_DOMAIN=your-firebase-app-auth-domain
PROJECT_ID=your-firebase-app-project-id
STORAGE_BUCKET=your-firebase-app-storage-bucket
MESSAGING_SENDER_ID=your-firebase-app-messaging-sender-id
APP_ID=your-firebase-app-id
MEASUREMENT_ID=your-firebase-app-measurement-id
```
- Start local development server
```bash
php artisan serve
```
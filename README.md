## install laravel with breeze
- composer create-project laravel/laravel larave-admin
- composer require laravel/breeze --dev
- php artisan breeze:install blade
- php artisan migrate
- npm install
- npm run dev

## MailTrap Configration
- MAIL_MAILER=smtp
- MAIL_HOST=sandbox.smtp.mailtrap.io
- MAIL_PORT=2525
- MAIL_USERNAME=c0069f5fb4e288
- MAIL_PASSWORD=043b68381771ab
- MAIL_ENCRYPTION=tls

## Email Verification & Model Preparation
- Before starting we have to implements Illuminate\Contracts\Auth\MustVerifyEmail to App\Models\User model.

## Login Page & Navbar Logo Change
- Keep your logo to public & write the below code to application-logo.blade.php
- <img src="{{ asset('logo/logo.png') }}" width="80" height="80">

## Change login email to user name
- change register.blade.php
- change User model
- change RegisteredUserController.php store method
- change login.blade.php
- change LoginRequest.php

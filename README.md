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

## Admin Template Slicing (Admin Dashboard)
- keep the assets files into public directory.
- Slice the admin template into header, footer, sidebar, index & master
- change the route 'dashboard' to 'admin.index'

## logout from Admin Dashboard by destroy method
- php artisan make:controller AdminController
- add 'admin.logout' route to header.blade.php 
- declare the admin.logout route in web.php
- cut the 'destroy' method from AuthenticatedSessionController.php and paste to AdminController.php
- redirect 'login' from '/' (home) in destroy method.

## change register.blade.php as our template
- change full register.blade.php according to our template

## change index.blade.php as our template
- change full index.blade.php according to our template
## change forgot-password.blade.php as our template
- change full forgot-password.blade.php according to our template

## add admin profile page
- create the 'admin.profile' route in web.php with get method
- add the 'admin.profile' route in header.blade.php
- create 'profile' method in AdminController
- setup the blade file under a directory named profile under admin
- also set an image to show in admin profile page

## Update admin information
- add the 'edit.profile' route in admin/profile/index page
- add the 'edit.profile' named route in web.php
- create edit page under admin/profile directory
- write the 'edit' method in AdminController
- set the 'store.profile' route in edit page form action
- create 'store' method in AdminController
- change the user migration Schema as demand

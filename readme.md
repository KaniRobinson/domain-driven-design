<p align="center">
	<img src="https://laravel.com/assets/img/components/logo-laravel.svg">
</p>

## Laravel Domain Driven Design

A **Laravel** implementation of **Domain Driven Design** template with pre-built generators to make scaffolding quicker and more efficient and a **Laravel Passport** implementation for quick access to **REST Authentication**.

<p align="center">
    <img src="https://camo.githubusercontent.com/6ecf49deae9378956479133cb1de7a3f09fa9df1/68747470733a2f2f6c61726176656c2e636f6d2f6173736574732f696d672f636f6d706f6e656e74732f6c6f676f2d70617373706f72742e737667">
</p>

## Installation

```
$ git clone git@github.com:KaniRobinson/LaravelDDD.git ApplicationName
$ cd ApplicationName/
$ composer install
$ cp .env.example .env
$ php artisan key:generate
$ php artisan domain:auth
$ php artisan password:client --password
```

Update your .env file

```
APP_URL=http://api.something.com
...
APP_FRONTEND_URL=http://something.com
...
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database
DB_USERNAME=username
DB_PASSWORD=password
...
PASSWORD_CLIENT_ID=1
PASSWORD_CLIENT_SECRET=1234567890abcdefghijlmnopqrstuvwxyz
```

Finito.

## Laravel Domain Generators

> **Note:** These Generators are extended from Laravels default Generators which means you can still use the default options that are set on the make commands.

**Generate REST Authentication** *(Login, Logout, Register, Forgot Password, Reset Password, Confirm Email Address, Resend mail Verification)*

```
$ php artisan domain:auth
```

**Create a new channel class**

```
$ php artisan domain:channel DomainName ChannelName
```

**Create a new Artisan command**

```
$ php artisan domain:command CommandName
```

**Create a new controller class**

```
$ php artisan domain:controller DomainName ModelName ControllerName
```

**Create a new event class**

```
$ php artisan domain:event DomainName EventName
```

**Create a new custom exception class**

```
$ php artisan domain:exception ExceptionName
```

**Create a new model factory**

```
$ php artisan domain:factory DomainName ModelName/FactoryName
```

**Create a new job class**

```
$ php artisan domain:job DomainName JobName
```

**Create a new event listener class**

```
$ php artisan domain:listener DomainName ListenerName
```

**Create a new email class**

```
$ php artisan domain:mailable DomainName ModelName MailName
```

**Create a new middleware class**

```
$ php artisan domain:middleware MiddlewareName
```

**Create a new Eloquent model class**

```
$ php artisan domain:model DomainName ModelName 
```

**Create a new notification class**

```
$ php artisan domain:notification DomainName ModelName NotificationName
```

**Create a new observer class**

```
$ php artisan domain:observer DomainName ModelName 
```

**Create a new policy class**

```
$ php artisan domain:policy DomainName ModelName
```

**Create a new service provider class**

```
$ php artisan domain:provider ProviderName
```

**Create a new resource**

```
$ php artisan domain:resource DomainName ModelName
```

**Create a new validation rule**

```
$ php artisan domain:rule RuleName
```

**Create a new seeder class**

```
$ php artisan domain:seeder DomainName ModelName/SeederName
```

**Create a new form request class**

```
$ php artisan domain:validator DomainName ModelName ControllerName ValidatorName
```

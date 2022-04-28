# Laravel SparrowSms

The `sachinkiranti/sparrow-sms` package provides easy access to the api of *Nepali Sms Service Provider* called **SparrowSms**.

## Installation

Installation is straightforward, setup is similar to every other Laravel Packages.

#### 1. Install via Composer

Begin by pulling in the package through Composer:

```
composer require sachinkiranti/sparrow-sms
```

#### 2. Define the Service Provider and alias

**Note:** This package supports the new auto discovery features of `Laravel >=5.5`, so if you are working on a `Laravel >=5.5` project, then your installation is complete, you can skip to step 3.

Add manually the service provider in your `config/app.php` file :

```php
'providers' => [
    // ...
    SachinKiranti\SparrowSms\SparrowSmsServiceProvider::class,
];
```

#### 3. Publish Config File

To generate a config file type this command into your terminal:

```
php artisan vendor:publish --tag=sparrow-sms
```

## Usage
Using the `sachinkiranti/sparrow-sms` package :

After publishing the config files, please add the **auth token** <small>token</small>.

Sending Sms :
```php
// $recipients can be array of phone number or a single phone number
 (new SparrowSms(98xxxxxxxx, "Hello From sachinkiranti/sparrow-sms repo."))->send()
//  or sending to multiple phone number
 (new SparrowSms([98xxxxxxxx, 98xxxxxxxx], "Hello From sachinkiranti/sparrow-sms repo."))->send()
```

Checking Available Credit :
```php
 (new SparrowSms(null, null))->credit() // Available Credits : 1000
```

### Using with helpers

```php
// Single recipient
 send_sparrow_sms (98xxxxxxxx, "Hello From sachinkiranti/sparrow-sms repo.");
// Or multiple recipients
 send_sparrow_sms ([98xxxxxxxx, 98xxxxxxxx], "Hello From sachinkiranti/sparrow-sms repo.");
```

Checking Available Credit :
```php
 get_sparrow_sms_credit(); // Available Credits : 1000
```

### TODO
- [ ] Test
- [ ] More flexible Api

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
![Profile Generator](assets/cover.jpg)

<p align="center" style="font-size: 3rem; font-weight: bold;">
    Profile Generator
</p>

<p align="center">
    <a href="https://packagist.org/packages/jensone/profile-generator"><img src="https://img.shields.io/packagist/v/jensone/profile-generator?style=flat-square" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/jensone/profile-generator"><img src="https://img.shields.io/packagist/dt/jensone/profile-generator?style=flat-square" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/jensone/profile-generator"><img src="https://img.shields.io/packagist/l/jensone/profile-generator?style=flat-square" alt="License"></a>
</p>

---

## About

Profile Generator is PHP package that generates a user profile page for your Symfony application. It provides a simple command to generate a profile page with a controller, a template, and a few assets. The generated page is based on TailwindCSS and Bootstrap 5.

## Installation

Install Profile Generator using Composer:

```bash
composer require jensone/profile-generator
```

Register the bundle in your `config/bundles.php` file:

```php
return [
    // ...
    Jensone\ProfileGenerator\ProfileGeneratorBundle::class => ['all' => true],
];
```

## Usage

Run the following command to generate a profile page:

```bash
bin/console profile:generator
```

Ensure that you have an entity to manage users in your application. If not, use the `make:user` command to create one.

Thanks for using Profile Generator! 🚀
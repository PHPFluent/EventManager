# PHPFluent\EventManager
[![Build Status](https://img.shields.io/travis/PHPFluent/EventManager.svg?style=flat-square)](http://travis-ci.org/PHPFluent/EventManager)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/PHPFluent/EventManager.svg?style=flat-square)](https://scrutinizer-ci.com/g/PHPFluent/EventManager)
[![Code Quality](https://img.shields.io/scrutinizer/g/PHPFluent/EventManager.svg?style=flat-square)](https://scrutinizer-ci.com/g/PHPFluent/EventManager)
[![Latest Stable Version](https://img.shields.io/packagist/v/phpfluent/eventmanager.svg?style=flat-square)](https://packagist.org/packages/phpfluent/eventmanager)
[![Total Downloads](https://img.shields.io/packagist/dt/phpfluent/eventmanager.svg?style=flat-square)](https://packagist.org/packages/phpfluent/eventmanager)
[![License](https://img.shields.io/packagist/l/phpfluent/eventmanager.svg?style=flat-square)](https://packagist.org/packages/phpfluent/eventmanager)

## Installation

Package is available on [Packagist](https://packagist.org/packages/phpfluent/eventmanager), you can install it
using [Composer](http://getcomposer.org).

```bash
composer require phpfluent/eventmanager
```

## Usage

### _Fluent_ API

```php
$eventManager = new Manager();
$eventManager->updated = function() { // Add listener to the event "updated"
    echo 'Updated' . PHP_EOL;
);
$eventManager->updated(); // Dispatch event "updated"
```

```php
$eventManager = new Manager();
$eventManager->created = function(array $data) { // Add listener to the event "created"
    echo 'Created ' . json_encode($data) . PHP_EOL;
);
$eventManager->created($user); // Dispatch event "created"
```

### _Non-Fluent_ API

```php
$eventManager = new Manager();

$eventManager->addListener(
    "updated",
    function() {
        echo "updated\n";
    }
);

$eventManager->dispatchEvent("updated");
```

```php
$eventManager = new Manager();

$eventManager->addListener(
    "created",
    function(array $data) {
        echo 'Created ' . json_encode($data) . PHP_EOL;
    }
);

$eventManager->dispatchEvent("created", $user);
```

# PHPFluent\EventManager
[![Build Status](https://secure.travis-ci.org/PHPFluent/EventManager.png)](http://travis-ci.org/PHPFluent/EventManager)
[![Total Downloads](https://poser.pugx.org/phpfluent/eventmanager/downloads.png)](https://packagist.org/packages/phpfluent/eventmanager)
[![License](https://poser.pugx.org/phpfluent/eventmanager/license.png)](https://packagist.org/packages/phpfluent/eventmanager)
[![Latest Stable Version](https://poser.pugx.org/phpfluent/eventmanager/v/stable.png)](https://packagist.org/packages/phpfluent/eventmanager)
[![Latest Unstable Version](https://poser.pugx.org/phpfluent/eventmanager/v/unstable.png)](https://packagist.org/packages/phpfluent/eventmanager)

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
$eventManager->created = function($user) { // Add listener to the event "created"
    echo "Created [{$user->id}]{$user->name}\n";
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
    function($user) {
        echo "created [{$user->id}]{$user->name}\n";
    }
);

$eventManager->dispatchEvent("created", $user);
```

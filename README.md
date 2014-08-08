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

```php
$eventManager = new Manager();

$eventManager->addListener(
        "updated",
        function()
        {
            echo "updated\n";
        });

$eventManager->dispatchEvent("updated");
```

```php
$eventManager = new Manager();

$eventManager->addListener(
        "created",
        function($user)
        {
            echo "created [{$user->id}]{$user->name}\n";
        });

$eventManager->dispatchEvent("created", $user);
```
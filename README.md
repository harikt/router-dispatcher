# Router + Dispatcher

## What is the functionality of router?

Generate routes, find whether a request url is matching.

Dispatching is the functionality of dispatcher and not that of router.

Aura.Dispatcher is a powerful standalone recursive dispatcher.

This repo is to demonstrate Aura.Router and Aura.Dispatcher. The example is very simple and you should consider reading the docs of those libraries.

I recommend to make use of [Aura.Di](https://github.com/auraphp/Aura.Di/) the dependency injection container, and  [Aura.Web](https://github.com/auraphp/Aura.Web).

Aura.Web gives you much more flexible like

```php
$name = $this->request->post->get('name', 'No name submitted');
```

than we using

```php
$name = isset($_POST['name']) ? $_POST['name'] : 'No name submitted';
```

## Usage

> Hope you know about composer, else download `composer.phar` from http://getcomposer.org .

```php
git clone https://github.com/harikt/router-dispatcher

cd router-dispatcher

php composer.phar install

php -S localhost:8000 -t web
```

Browse the urls

1. http://localhost:8000
1. http://localhost:8000/hello
1. http://localhost:8000/hello/hari
1. http://localhost:8000/contact
1. http://localhost:8000/something

## Repos

1. https://github.com/auraphp/Aura.Dispatcher
1. https://github.com/auraphp/Aura.Router

## Further reading

1. https://github.com/auraphp/Aura.Di
1. https://github.com/auraphp/Aura.Web

## Thanks

[w3layouts 404](http://w3layouts.com/ohh-under-construction-mobile-website-template)

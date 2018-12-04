# Twig Gravatar filter

[![Build Status](https://travis-ci.org/alexeevdv/twig-gravatar-filter.svg?branch=master)](https://travis-ci.org/alexeevdv/twig-gravatar-filter) 
[![codecov](https://codecov.io/gh/alexeevdv/twig-gravatar-filter/branch/master/graph/badge.svg)](https://codecov.io/gh/alexeevdv/twig-gravatar-filter)
![PHP 5.6](https://img.shields.io/badge/PHP-5.6-green.svg) 
![PHP 7.0](https://img.shields.io/badge/PHP-7.0-green.svg) 
![PHP 7.1](https://img.shields.io/badge/PHP-7.1-green.svg) 
![PHP 7.2](https://img.shields.io/badge/PHP-7.2-green.svg)

This is Twig filter which converts email to Gravatar image url.

## Installation

The preferred way to install this extension is through [composer](https://getcomposer.org/download/).

Either run

```bash
$ composer require alexeevdv/twig-gravatar-filter "^1.0"
```

or add

```
"alexeevdv/twig-gravatar-filter": "^1.0"
```

to the ```require``` section of your `composer.json` file.

## Configuration

### Symfony

```
twig.extension.gravatar:
    class: \alexeevdv\twig\GravatarFilter
    tags:
        - { name: twig.extension }
```

### Standalone

```php
$twig->addExtension(new \alexeevdv\twig\GravatarFilter);
```

## Usage

### Without parameters

```html
<img src="{{ 'email@example.org' | gravatar }}" />
<!-- will result in following html -->
<img src="https://secure.gravatar.com/avatar/8fbf4bd0581c9ccc67c560dea9931a1b" />
```

### With different parameters

```html
<img src="{{ 'email@example.org' | gravatar({'size': 500, 'forceDefault': true, 'defaultImage': 'mm', 'rating': 'pg', 'extension': true}) }}" />
<!-- will result in following html -->
<img src="https://secure.gravatar.com/avatar/8fbf4bd0581c9ccc67c560dea9931a1b.jpg?s=500&f=y&d=mm&r=pg" />
```

## Parameters

For possible values please refer to [Gravatar documentation](https://en.gravatar.com/site/implement/images/)


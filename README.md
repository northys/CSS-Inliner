CSS-Inliner
-------

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Total Downloads][ico-downloads]][link-downloads]

CSS-Inliner is simple PHP tools that **inserts CSS from file into HTML style attributes**. Nothing more, nothing less.

I tried to make it **as fast as possible**, but due to third party libraries I can't do more.

Anyway, this tools wasn't created for **inlining CSS files of bambilions lines (hey, [Bootstrap](http://getbootstrap.com) - of course you can inline it, but you will have enough time to make a coffee)**, but for inlining styles into e-mails. So I hope it will do its job for you and helps you with creating newsletters, sending notification mails and so on.

## Usage

### Installation using composer

Add northys/css-inliner to your composer.json. It is necessary to install this tools using composer. Otherwise you will need to download another libs manually.

```sh
$ composer require northys/css-inliner
```

### Requirements

 - [sabberworm/PHP-CSS-Parser](https://github.com/sabberworm/PHP-CSS-Parser)
 - [Symfony/CssSelector](https://github.com/symfony/CssSelector)

### Example code

```php
$inliner = new Northys\CSSInliner;
$inliner->addCSS(__DIR__ . '/example.css');
$inliner->render(file_get_contents(__DIR__ . '/example.html'));
```

Method `addCSS()` accepts file path to the CSS file however `render()` accepts html content.
If you would like to know why, here is the reason for you - there are tons of templating system like `Nette\Latte` or `Smarty` and sometimes you will need to use this tool on code that those libs generated.

#### Input

```html
<h1>Hello, world!</h1>
<a href="http://google.com" class="google">Google</a>
<a href="http://Facebook.com" class="facebook">Facebook</a>
<a href="http://Outlook.com" id="outlook">Outlook</a>
```
```css
h1{color:#27ae60;font-size:200px;margin:10px 50px 80px 30px;}
a{color:#2c3e50;}
a#outlook{color:#2980b9;position:absolute;top:30px;left:500px;padding:50px;}
a.facebook{color:#8e44ad;margin:300px;}
a.google{color:#c0392b;font-weight:700;font-family:Verdana, 'Open Sans';font-size:30px;}
```

#### Output

```html
<h1 style="color: #27ae60; margin: 10px 50px 80px 30px; font-size: 200px;">Hello, world!</h1>
<a href="http://google.com" class="google" style='color: #c0392b; font-weight: 700; font-family: "Verdana","Open Sans"; font-size: 30px;'>Google</a>
<a href="http://Facebook.com" class="facebook" style="color: #8e44ad; margin: 300px;">Facebook</a>
<a href="http://Outlook.com" id="outlook" style="color: #2980b9; padding: 50; position: absolute; top: 30px; left: 500px;">Outlook</a>
```

### Or run it with node
1. Install dependencies
```js
	npm install
```
2. Run
```js
	node index example myResult
```
A file myResult.html will be genereted in templates/example.

Your .html and .css files must be the same name of your template path. 
See an example in https://github.com/alisonmonteiro/CSS-Inliner/tree/master/templates

[ico-version]: https://img.shields.io/packagist/v/northys/CSS-Inliner.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://travis-ci.org/Northys/CSS-Inliner.svg?branch=master
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/northys/CSS-Inliner.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/northys/CSS-Inliner.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/northys/CSS-Inliner.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/northys/CSS-Inliner
[link-travis]: https://travis-ci.org/Northys/CSS-Inliner
[link-scrutinizer]: https://scrutinizer-ci.com/g/northys/CSS-Inliner/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/northys/CSS-Inliner
[link-downloads]: https://packagist.org/packages/northys/CSS-Inliner
[link-author]: https://github.com/Northys
[link-contributors]: ../../contributors

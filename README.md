CSS-Inliner
-------

CSS-Inliner is simple PHP tools that inserts CSS from file into HTML tags. Nothing more, nothing less :)

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

#### Output

```html
	<h1 style="color: #27ae60; margin: 10px 50px 80px 30px; font-size: 200px;">Hello, world!</h1>
	<a href="http://google.com" class="google" style='color: #c0392b; font-weight: 700; font-family: "Verdana","Open Sans"; font-size: 30px;'>Google</a>
	<a href="http://Facebook.com" class="facebook" style="color: #8e44ad; margin: 300px;">Facebook</a>
	<a href="http://Outlook.com" id="outlook" style="color: #2980b9; padding: 50; position: absolute; top: 30px; left: 500px;">Outlook</a>
```

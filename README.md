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

	$inliner = new Northys\CSSInliner;
	$inliner->addCSS(__DIR__ . '/example.css');
	$inliner->render(file_get_contents(__DIR__ . '/example.html'));
	
Method `addCSS` accepts filepath to CSS file however `render` accepts html content. If you would like to know why here is the reason for you - there are tons of templating system like `Nette\Latte` or `Smarty` and sometimes you need to use this tool on code that those libs generated.

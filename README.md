Inliner
-------

Inliner is simple PHP tools that inserts CSS from file into HTML tags. Nothing more, nothing less :)

## Usage

### Installation using composer

Add php-css-parser to your composer.json

	{
	    "require": {
	        "northys/inliner": "*"
	    }
	}

### Example code

	$inliner = new Northys\Inliner;
	$inliner->addCSS(__DIR__ . '/example.css');
	$inliner->render(file_get_contents(__DIR__ . '/example.html'));
	
Method `addCSS` accepts filepath to CSS file however `render` accepts html content. If you would like to know why here is the reason for you - there are tons of templating system like `Nette\Latte` or `Smarty` and sometimes you need to use this tool on code that those libs generated.

<?php

require __DIR__ . '/../vendor/autoload.php';

use Northys\CSSInliner\CSSInliner;

$inliner = new CSSInliner;
$inliner->addCSS(__DIR__ . '/' . $_GET['template'] . '/' . $_GET['template'] . '.css');
echo $inliner->render(file_get_contents(__DIR__ . '/' . $_GET['template'] . '/' . $_GET['template'] . '.html'));
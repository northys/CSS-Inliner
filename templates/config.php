<?php

require __DIR__ . '/../vendor/autoload.php';

use Northys\CSSInliner\CSSInliner;

$inliner = new CSSInliner;
$template = $_GET['template'];
$inliner->addCSS(__DIR__ . '/' . $template . '/' . $template . '.css');
echo $inliner->render(file_get_contents(__DIR__ . '/' . $template . '/' . $template . '.html'));

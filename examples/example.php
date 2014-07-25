<?php

require __DIR__ . '/../../../autoload.php';

use Northys\CSSInliner\CSSInliner;

$inliner = new CSSInliner;
$inliner->addCSS(__DIR__ . '/newsletter.css');
echo $inliner->render(file_get_contents(__DIR__ . '/newsletter.html'));

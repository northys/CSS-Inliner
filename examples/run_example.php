<?php
	require __DIR__ . '/../vendor/autoload.php';
	require __DIR__ . '/../lib/Northys/Inliner/Inliner.php';
	
	$inliner = new Northys\Inliner;
	$inliner->addCSS(__DIR__ . '/example.css');
	$inliner->render(file_get_contents(__DIR__ . '/example.html'));
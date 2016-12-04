<?php

namespace tests;

use Northys\CSSInliner\CSSInliner;

/**
 * Class CSSInlinerTest.
 */
class CSSInlinerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test Component.
     */
    public function testComponent()
    {
        $inliner = new CSSInliner();
        $inliner->addCSS(__DIR__.'/test.css');
        $output = $inliner->render(file_get_contents('test.html'), true);
        $expected = <<<'EXPECTED'
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
<html><body><h1 style="color: #27ae60; font-size: 200px; margin: 10px 50px 80px 30px;">Hello, world!</h1>
<a href="http://google.com" class="google" style='color: #2c3e50;color: #c0392b; font-weight: 700; font-family: Verdana,"Open Sans"; font-size: 30px;'>Google</a>
<a href="http://Facebook.com" class="facebook" style="color: #2c3e50;color: #8e44ad; margin: 300px;">Facebook</a>
<a href="http://Outlook.com" id="outlook" style="color: #2c3e50;color: #2980b9; position: absolute; top: 30px; left: 500px; padding: 50px;">Outlook</a></body></html>

EXPECTED;
        $this->assertSame($expected, $output);
    }
}

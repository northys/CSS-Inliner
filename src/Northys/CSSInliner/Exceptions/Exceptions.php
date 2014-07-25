<?php
/**
 * Created by PhpStorm.
 * User: Northys
 * Date: 25.7.14
 * Time: 4:10
 */

namespace Northys\CSSInliner\Exceptions;


/**
 * The exception that is thrown when invalid css file path is provided.
 * @package Northys\CSSInliner\Exceptions
 */
class InvalidCssFilePathException extends \Exception {

}


/**
 * The exception that is thrown when there are no css rules.
 * @package Northys\CSSInliner\Exceptions
 */
class NoCssRulesException extends \Exception {

}
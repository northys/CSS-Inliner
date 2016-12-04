<?php
/**
 * Created by PhpStorm.
 * User: Northys
 * Date: 25.7.14
 * Time: 4:10.
 */

namespace Northys\CSSInliner\Exceptions;

/**
 * The exception that is thrown when invalid css file path is provided.
 */
class InvalidCssFilePathException extends \Exception
{
}

/**
 * The exception that is thrown when there are no css rules.
 */
class NoCssRulesException extends \Exception
{
}

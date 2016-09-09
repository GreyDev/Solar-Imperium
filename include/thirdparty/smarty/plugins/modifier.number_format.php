<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty upper modifier plugin
 *
 * Type:     modifier<br>
 * Name:     number_format<br>
 * Purpose:  convert string to uppercase
 * @link http://smarty.php.net/manual/en/language.modifier.number_format.php
 *          number_format (Smarty online manual)
 * @author   Yanick Bourbeau <ybourbeau at mrgtech dot ca>
 * @param string
 * @return string
 */
function smarty_modifier_number_format($string)
{
    return number_format($string);
}

?>

<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty gettext modifier plugin
 *
 * Type:     modifier<br>
 * Name:     gettext<br>
 * Purpose:  convert string to gettextcase
 * @link http://smarty.php.net/manual/en/language.modifier.gettext.php
 *          gettext (Smarty online manual)
 * @author   Monte Ohrt <monte at ohrt dot com>
 * @param string
 * @return string
 */
function smarty_modifier_gettext($string)
{
    return T_($string);
}

?>

<?php
/**
 * @package     Joomla.Module
 * @subpackage  mod_kreativ_switcher
 * @link        http://www.kreativan.net
 * @copyright   Ivan Milincic - www.kreativan.net. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

// Get items from repeatable fields
// decode json into array
$ivm = $params->get('items'); // <--change
$json = json_decode($ivm, true);

// if array exist and not empty
if (is_array($json)) {
    // function name must be diferent for each module (replace 'my_items' with anything you wont)
    // checks if function allready exist
    if (!function_exists('items')) { // <--change
        function items($array) { // <--change
            $result = array();
            foreach ($array as $sub) {
                foreach ($sub as $k => $v) {
                    $result[$k][] = $v;
                }
            }
            return $result;
        }
    }
    $ivm_array = items($json); // <--change
    $items     = $ivm_array; // this is default items array
    $items = array_reverse($items); // reverse sorting
}

if (!function_exists('sorting')) {
        
        function sorting($a, $b) {
            return $a[0] - $b[0];
        }
    }
usort($items, 'sorting');

                     
?>
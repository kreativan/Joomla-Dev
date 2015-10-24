<?php
/**
 * @package     Joomla.Module
 * @subpackage  mod_master
 * @link        http://www.kreativan.net
 * @copyright   Ivan Milincic - www.kreativan.net. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;
// Include the syndicate functions only once
require_once dirname(__FILE__) . '/helper.php';

// Get items from repeatable fields
/*
        // decode json into array
        $ivm = $params->get('repeatable_field_name'); // <--change
        $json = json_decode($ivm, true);

        // if array exist and not empty
        if (is_array($json)) {
            // function name must be diferent for each module (replace 'my_items' with anything you wont)
            // checks if function allready exist
            if (!function_exists('my_items')) { // <--change
                function my_items($array) { // <--change
                    $result = array();
                    foreach ($array as $sub) {
                        foreach ($sub as $k => $v) {
                            $result[$k][] = $v;
                        }
                    }
                    return $result;
                }
            }
            $ivm_array = my_items($json); // <--change
            $items     = $ivm_array; // this is default items array
        }
*/

// Get Articles from db
/*
//$sort = 'created DESC';
$sort = $params->get('sorting');
$no_of_articles = $params->get('no_of_items');
$catId = $params->get('mycategory');
$db = JFactory::getDbo();
$query = $db->getQuery(true);

$query->select('*')
        ->from('#__content')
        ->where("catid ='" . $catId . "'")
        ->order($sort)
        ->setLimit($no_of_items);

$db->setQuery($query);
$articles = $db->loadObjectList();
*/
 
$master = modMasterHelper::getMaster($params);
require JModuleHelper::getLayoutPath('mod_master');

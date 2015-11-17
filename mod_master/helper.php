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

class ModMasterHelper {
   
    public static function getMaster($params) {
       
        
    }
}

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
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

    // Get Articles from db
    $sort = $params->get('sorting');
    $no_of_articles = $params->get('no_of_j_items');
    
    //$catId = $params->get('catid');                           // <-- single category
    $catId = join(',', $params->get('catid'));                  //<-- join multiple categories

    // Check if 'All Categories are selected'
    if (in_array('all', $params->get('catid'))) {
        $sql_where = "state = '1'";
    }else {
        $sql_where = "catid IN ($catId) AND state='1'";
    }

    $db = JFactory::getDbo();
    $query = $db->getQuery(true);
    $query->select('*')
            ->from('#__content')
            //->where("catid = '$catId' AND state='1'")         // <-- single category
            ->where($sql_where)                                 // <-- multiple cateogries
            ->order($sort)
            ->setLimit($no_of_articles);

    $db->setQuery($query);
    $articles = $db->loadObjectList();
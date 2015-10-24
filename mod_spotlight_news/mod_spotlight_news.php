<?php
/**
 * @package     Joomla.Module
 * @subpackage  mod_spotlight_news
 * @link        http://www.kreativan.net
 * @copyright   Ivan Milincic - www.kreativan.net. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;
// Include the syndicate functions only once
require_once dirname(__FILE__) . '/helper.php';

// Get Articles from db
if ($params->get('source') == 'joomla') {
// Get Joomla Articles from db
//$sort = 'created DESC';
$sort = $params->get('sorting');
$no_of_articles = $params->get('no_of_items');
$db = JFactory::getDbo();
$query = $db->getQuery(true);

$query->select('*')
        ->from('#__content')
        ->order($sort)
        ->setLimit($no_of_articles);

$db->setQuery($query);
$articles = $db->loadObjectList(); 
}
 
$spotlightnews = modSpotlightNewsHelper::getSpotlightNews($params);
require JModuleHelper::getLayoutPath('mod_spotlight_news');

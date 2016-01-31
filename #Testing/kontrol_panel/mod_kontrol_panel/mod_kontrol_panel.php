<?php
/**
 * Kreativan.Net Kontrol Panel!
 * 
 * @package    kreativan.net
 * @subpackage Modules
 * @license    GNU/GPL, see LICENSE.php
 * @link       http://www.kreativan.net
 * mod_kontrol_panel is a set of shortcuts icons fo easy access to site content.
 */
 
// No direct access
defined('_JEXEC') or die;
// Include the syndicate functions only once
require_once dirname(__FILE__) . '/helper.php';
 

// Get Items from db
$db = JFactory::getDbo();
$query = $db->getQuery(true);
$query->order('name ASC');

$query->select('*')
        ->from('#__kontrol_panel');

$db->setQuery($query);
$items = $db->loadObjectList();

// get categories from db
$db = JFactory::getDbo();
$query = $db->getQuery(true);

$query->select('title')
        ->from('#__categories')
        ->where('extension = "com_kontrol_panel"');

$db->setQuery($query);
$kategorije = $db->loadObjectList(); 


// tmpl - >default
$kreativan = modKontrolPanelHelper::getKontrolPanel($params);
require JModuleHelper::getLayoutPath('mod_kontrol_panel');

?>
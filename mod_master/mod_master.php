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

$document = JFactory::getDocument();
 
// load jquery
// JHtml::_('jquery.framework');

// add custom js
// $document->addScript(JURI::base(true) . '/modules/mod_master/assets/script.js');

// add custom css
// $document->addStylesheet(JURI::base(true) . '/modules/mod_master/assets/style.css');

$moduleclass_sfx    = $params->get('moduleclass_sfx');

// Load content plugin
if ($params->def('prepare_content', 1))
{
	JPluginHelper::importPlugin('content');
	$module_content = JHtml::_('content.prepare', $params->get('content'), '', 'mod_master.content');
}
else {
    $module_content = $params->get('content');
}
 
$master = modMasterHelper::getMaster($params);
require JModuleHelper::getLayoutPath('mod_master', $params->get('layout', 'default'));

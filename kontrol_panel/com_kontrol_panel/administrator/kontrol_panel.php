<?php
/**
 * @version     1.0.0
 * @package     com_kontrol_panel
 * @copyright   Copyright (C) 2015 kreativan.net All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Ivan Milincic <lokomotivan@gmail.com> - http://www.kreativan.net
 */


// no direct access
defined('_JEXEC') or die;

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_kontrol_panel')) 
{
	throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

// Include dependancies
jimport('joomla.application.component.controller');

$controller	= JControllerLegacy::getInstance('Kontrol_panel');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();

<?php

/**
 * @version     1.0.0
 * @package     com_kontrol_panel
 * @copyright   Copyright (C) 2015 kreativan.net All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Ivan Milincic <lokomotivan@gmail.com> - http://www.kreativan.net
 */
// No direct access
defined('_JEXEC') or die;

/**
 * Kontrol_panel helper.
 */
class Kontrol_panelHelper {

    /**
     * Configure the Linkbar.
     */
    public static function addSubmenu($vName = '') {
        		JHtmlSidebar::addEntry(
			JText::_('COM_KONTROL_PANEL_TITLE_KPITEMS'),
			'index.php?option=com_kontrol_panel&view=kpitems',
			$vName == 'kpitems'
		);
		JHtmlSidebar::addEntry(
			JText::_('JCATEGORIES') . ' (' . JText::_('COM_KONTROL_PANEL_TITLE_KPITEMS') . ')',
			"index.php?option=com_categories&extension=com_kontrol_panel",
			$vName == 'categories'
		);
		if ($vName=='categories') {
			JToolBarHelper::title('Kontrol Panel: JCATEGORIES (COM_KONTROL_PANEL_TITLE_KPITEMS)');
		}

    }

    /**
     * Gets a list of the actions that can be performed.
     *
     * @return	JObject
     * @since	1.6
     */
    public static function getActions() {
        $user = JFactory::getUser();
        $result = new JObject;

        $assetName = 'com_kontrol_panel';

        $actions = array(
            'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
        );

        foreach ($actions as $action) {
            $result->set($action, $user->authorise($action, $assetName));
        }

        return $result;
    }


}

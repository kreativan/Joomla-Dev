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

class Kontrol_panelController extends JControllerLegacy {

    /**
     * Method to display a view.
     *
     * @param	boolean			$cachable	If true, the view output will be cached
     * @param	array			$urlparams	An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
     *
     * @return	JController		This object to support chaining.
     * @since	1.5
     */
    public function display($cachable = false, $urlparams = false) {
        require_once JPATH_COMPONENT . '/helpers/kontrol_panel.php';

        $view = JFactory::getApplication()->input->getCmd('view', 'kpitems');
        JFactory::getApplication()->input->set('view', $view);

        parent::display($cachable, $urlparams);

        return $this;
    }

}

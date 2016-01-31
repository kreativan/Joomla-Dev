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

jimport('joomla.application.component.controllerform');

/**
 * Kpitem controller class.
 */
class Kontrol_panelControllerKpitem extends JControllerForm
{

    function __construct() {
        $this->view_list = 'kpitems';
        parent::__construct();
    }

}
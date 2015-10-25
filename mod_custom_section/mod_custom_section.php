<?php
/**
 * @package     Joomla.Module
 * @subpackage  mod_custom_section
 * @link        http://www.kreativan.net
 * @copyright   Ivan Milincic - www.kreativan.net. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;
// Include the syndicate functions only once
require_once dirname(__FILE__) . '/helper.php';

 
$customsection = modCustomSectionHelper::getCustomSection($params);
require JModuleHelper::getLayoutPath('mod_custom_section');

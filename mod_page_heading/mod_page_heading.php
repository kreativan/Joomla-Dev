<?php
/**
 * @package     Joomla.Module
 * @subpackage  mod_page_heading
 * @link        http://www.kreativan.net
 * @copyright   Ivan Milincic - www.kreativan.net. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;
// Include the syndicate functions only once
require_once dirname(__FILE__) . '/helper.php';
 
$pageheading = modPageHeadingHelper::getPageHeading($params);
require JModuleHelper::getLayoutPath('mod_page_heading');

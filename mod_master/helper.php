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

class ModMasterHelper {
   
    public static function getMaster($params) {
       
       //only include if not already included  
       $document = JFactory::getDocument();
       
       // add custom js
       // $document->addCustomTag('<script src="modules/mod_master/assets/my_file.js" type="text/javascript"></script>');
       
       // add custom css
       // JHtml::stylesheet('modules/mod_master/assets/my_file.css', true);
        
    }
}

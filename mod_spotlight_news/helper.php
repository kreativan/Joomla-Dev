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

class ModSpotlightNewsHelper {
   
    public static function getSpotlightNews($params) {
       
       //only include if not already included  
       $document = JFactory::getDocument();
       
       // add custom js
        $document->addCustomTag('<script src="modules/mod_spotlight_news/assets/owl.carousel.min.js" type="text/javascript"></script>');
       
        // add custom css
        JHtml::stylesheet('modules/mod_spotlight_news/assets/style.css', true);
        
    }
}

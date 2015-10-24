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
  
    $module_id = $module->id;

    $ivm_ph_bg                 = $params->get('background');
    $ivm_ph_class              = ' ' . $params->get('class');
    $ivm_ph_content            = $params->get('content');

    $ivm_ph_h_align            = $params->get('h_align');
    $ivm_ph_v_align            = $params->get('v_align');

    if( ($params->get('height')) && ($params->get('height') !== 'auto') ) {
        $ivm_ph_height = $params->get('height') . 'px';
    }
    else {
        $ivm_ph_height = 'auto';
    }
        
?>

<div class="ivm-page-heading<?php echo $ivm_ph_class;?>" style="background:url(<?php echo $ivm_ph_bg;?>);background-size:cover;background-repeat:no-repeat;background-position:center;">
    <div class="uk-container uk-container-center uk-flex uk-flex-<?php echo $ivm_ph_h_align;?> uk-flex-<?php echo $ivm_ph_v_align;?>" style="min-height:<?php echo $ivm_ph_height ;?>;">
        <div><?php echo $ivm_ph_content; ?></div>
    </div>
</div>

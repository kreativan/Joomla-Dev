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
  
    $module_id = $module->id;

    $ivm_bg          = $params->get('background');
    $ivm_content     = $params->get('content');

    $ivm_class       = $params->get('class');
    $ivm_css_id      = $params->get('css_id');  

    $ivm_h_align     = $params->get('h_align');
    $ivm_v_align     = $params->get('v_align');

    if($params->get('height') !== 'auto') {
        $ivm_height = $params->get('height') . 'px';
    }
    else {
        $ivm_height = $params->get('height');
    }
  
?>

<div class="ivm-custom-section" style="background:url(<?php echo $ivm_bg;?>);background-size:cover;background-repeat:no-repeat;background-position:center;">
    <div class="uk-container uk-container-center uk-flex uk-flex-<?php echo $ivm_h_align;?> uk-flex-<?php echo $ivm_v_align;?>" style="min-height:<?php echo $ivm_height;?>;">
        <div class="ivm-custom-section-content">
            <?php echo $ivm_content; ?>
        </div>
    </div>
</div>
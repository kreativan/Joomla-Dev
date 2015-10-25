<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_custom
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

    $module_id = $module->id;

    $ivm_bg          = $params->get('background');

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
            <?php echo $module->content;?>
        </div>
    </div>
</div>

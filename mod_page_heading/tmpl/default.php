<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_page_heading
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

    $module_id = $module->id;

    $ivm_bg          = $params->get('background');

    $ivm_class       = ' ' . $params->get('class');
    $ivm_css_id      = 'id="' . $params->get('css_id') . '"';  

    $ivm_h_align     = $params->get('h_align');
    $ivm_v_align     = $params->get('v_align');

    $ivm_height             = $params->get('height');
    $ivm_content_size       = $params->get('content_size');
    $ivm_content_padding    = $params->get('content_padding');

    if( $params->get('full_screen') == 1 ) {
        $ivm_full_screen = 'uk-height-viewport';
    }
    else {
        $ivm_full_screen = '';
    }

?>

<div <?php echo $ivm_css_id;?> class="ivm-page-heading<?php echo $ivm_class;?>" style="background:url(<?php echo $ivm_bg;?>);background-size:cover;background-repeat:no-repeat;background-position:center;padding:<?php echo $ivm_content_padding;?> 0;">
    <div class="uk-container uk-container-center <?php echo $ivm_full_screen;?> uk-flex uk-flex-<?php echo $ivm_h_align;?> uk-flex-<?php echo $ivm_v_align;?>" style="min-height:<?php echo $ivm_height;?>;">
        <div class="ivm-page-heading-content" style="max-width:<?php echo $ivm_content_size;?>">
            <?php echo $module->content;?>
        </div>
    </div>
</div>

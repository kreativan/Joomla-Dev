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
  
  $module_id = $module->id;
  
?>

<?php if($params->get('source') == 'joomla') : ?>
    <?php include 'article.php' ;?>
<?php endif;?>

<script>
jQuery(function($) {

    $('.ivm-spotlight-news').owlCarousel({
        autoplay: true,
        autoplayHoverPause:true,
        autoplayTimeout: <?php echo $params->get('time');?>,
        loop:true,
        margin:0,
        nav:false,
        animateOut: '<?php echo $params->get('animation_out');?>',
        animateIn: '<?php echo $params->get('animation_in');?>',
        items:1,
        mouseDrag: false
    })

});
</script>

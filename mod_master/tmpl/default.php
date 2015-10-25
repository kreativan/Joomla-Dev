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
  
  $module_id = $module->id;
  
?>

<!-- Loop true repeatable element -->
<?php if (is_array($items)) : ?> <!-- if array exists -->

  <?php foreach($items as $item) : ?>
    <?php
        /* array
          $item[0]
          $item[1] 
          $item[2]
          $item[4]
        */
        print_r($item);
    ?>
    
  <?php endforeach;?>

<?php endif;?>
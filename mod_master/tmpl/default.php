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

include '_array.php';

  $module_id = $module->id;

?>

<!-- Loop true repeatable element -->
<?php if ($params->get('items') && is_array($items)) : ?>

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

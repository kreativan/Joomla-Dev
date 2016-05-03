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

<?php if ($params->get('catid') && is_array($articles)) : ?>
    <?php foreach($articles as $article) : ?>
        <?php
            include ('_article_vars.php');
        ?>

    <!-- LOOP ITEMS -->

    <?php endforeach; ?>
 <?php endif;?>

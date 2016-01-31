<?php
    $menu = &JSite::getMenu();
    $active = $menu->getActive();
    $menuname = $active->params->get('page_heading');
?>
<?php if ($active->params->get('show_page_heading')) : ?>
        <?php echo $menuname;?>
<?php endif;?>

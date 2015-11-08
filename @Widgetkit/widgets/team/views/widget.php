<?php

// Id
$settings['id'] = substr(uniqid(), -3);

?>

<div class="wk-team uk-text-center">
    <ul class="uk-grid uk-grid-width-1-1 uk-grid-width-medium-1-2 uk-grid-width-large-1-3">
    <?php foreach ($items as $item) : ?>
    
        <li class="wk-team-member uk-margin-large-bottom">
            <img style="height:225px;width:auto;" src="<?php echo $item['media']; ?>" alt="<?php echo $item['title']; ?>" />
            <h3><?php echo $item['title']; ?></h3>
            <p class="uk-text-muted"><?php echo $item['position']; ?></p>
            <p><?php echo $item['content']; ?></p>
            <?php if ($item['linkedin']) :?>
                <a href="#" class="uk-button uk-button-primary">Read More</a>
            <?php endif;?>
            <?php if ($item['linkedin']) :?>
                <a href="#" class="uk-button uk-button-primary" target="_blank"><i class="uk-icon-linkedin"></i></a>
            <?php endif;?>
        </li>
    
    <?php endforeach; ?>
    </ul>
</div>
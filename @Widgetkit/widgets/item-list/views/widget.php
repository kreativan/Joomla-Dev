<?php

// Id
$settings['id'] = substr(uniqid(), -3);

$img_size = $settings['img_size'] . 'px';

    if($settings['ivm_rounded']) {
        $img_width          = $img_size;
        $img_height         = $img_size;
        $border_radius      = '50%';
    }
    else {
        $img_width          = $img_size;
        $img_height         = 'auto';
        $border_radius      = '0';
    }

?>

<div class="ivm-wk-item-list">
    <?php foreach ($items as $item) : ?>
    <div class="ivm-wk-item uk-margin-top uk-clearfix uk-flex uk-flex-middle">
        <div class="ivm-wk-media uk-float-left uk-margin-right" style="width:<?php echo $img_size;?>;">
            <?php if($item['link']) : ?>
                <a href="<?php echo $item['link'];?>">
                    <img src="<?php echo $item['media']; ?>" alt="<?php echo $item['title']; ?>" style="width:<?php echo $img_width;?>;height:<?php echo $img_height;?>;border-radius:<?php echo $border_radius;?>;" />
                </a>
            <?php else : ?>
                <img src="<?php echo $item['media']; ?>" alt="<?php echo $item['title']; ?>" style="width:<?php echo $img_width;?>;height:<?php echo $img_height;?>;border-radius:<?php echo $border_radius;?>;" />
            <?php endif;?>
        </div>
        <div class="ivm-wk-content">
            <?php if($item['link']) : ?>
                <a href="<?php echo $item['link'];?>">
                    <h4 class="uk-margin-remove"><?php echo $item['title']; ?></h4>
                </a>
            <?php else : ?>
                <h4 class="uk-margin-remove"><?php echo $item['title']; ?></h4>
            <?php endif;?>
            <p class="uk-margin-remove"><?php echo $item['content']; ?></p>
        </div>
    </div>
    
    <?php endforeach; ?>
</div>
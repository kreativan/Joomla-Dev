<div class="ivm-admin"></div>

<!-- kontrol panel nav -->
<ul class="nav nav-tabs ivm-kp-nav">
    <?php foreach($kategorije as $kategorija) :?>
    <li><a href="#ivm-<?php echo $kategorija->title;?>" data-toggle="tab"><?php echo $kategorija->title;?></a></li>
    <?php endforeach; ?>
</ul>

<div class="tab-content"><!-- kontrol panel content -->
<?php foreach($kategorije as $kategorija) :?>
<!-- categories -->
<div id="ivm-<?php echo $kategorija->title;?>" class="tab-pane active">
<div class="ivm-grid ivm-admin ivm-clearfix">  
        
        <!-- items list -->
        <?php foreach($items as $item) :?>
        <?php
                $db = JFactory::getDbo();
                $db->setQuery('SELECT cat.title FROM #__categories cat  WHERE cat.id='.$item->category);   
                $category_title = $db->loadResult();
        ?>
             <!-- items by cateegory -->
            <?php if($category_title == $kategorija->title) : ?>
                <div class="ivm-width">
                    <a class="ivm-admin-item" href="<?php echo $item->link;?>">
                        <img src="<?php echo JUri::root() . $item->icon;?>" />
                        <h4><?php echo $item->name ;?></h4>
                    </a>
                </div>
            <?php endif;?>
    

        <?php endforeach;?>
            
</div>
</div>
<?php endforeach; ?> 
</div><!-- content end-->   

<link rel="stylesheet" href="<?php echo JUri::root().'administrator/modules/mod_kontrol_panel/assets/style.css'; ?>">
<script src="<?php echo JUri::root().'administrator/modules/mod_kontrol_panel/assets/kontrol_panel.js'; ?>" type="text/javascript"></script>

<script>
jQuery(function($) {
    $( "#ivm-General" ).addClass( "active" );  
});
</script>
<?php
/**
* @package   yoo_master2
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

// get theme configuration
include($this['path']->path('layouts:theme.config.php'));

$header_style = $this['config']->get('header_style');

// GEt custom meta tags
$doc = JFactory::getDocument();
$custom_meta = $doc->_custom;

$meta_description = trim(preg_replace('/\s+/', ' ',$doc->description));

?>
<!DOCTYPE HTML>
<html lang="<?php echo $this['config']->get('language'); ?>" dir="<?php echo $this['config']->get('direction'); ?>"  data-config='<?php echo $this['config']->get('body_config','{}'); ?>'>

<head>
<?php echo $this['template']->render('head'); ?>
    
<?php if(empty($custom_meta)) :?>
    <!-- facebook opengraph -->
    <meta property="og:url" content="<?=JURI::current();?>"/>
    <meta property="og:title" content="<?=$doc->title;?>"/>
    <meta property="og:description" content="<?=$meta_description;?>"/>
    <meta property="og:image" content="<?= JUri::root().$this['config']->get('fb_meta_img');?>"/>
    <?php $config = JFactory::getConfig();?>
    <meta property="og:site_name" content="<?=$config->get( 'sitename' );?>"/>
    <!-- twitter card -->
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:url" content="<?=JURI::current();?>"/>
    <meta name="twitter:title" content="<?=$doc->title;?>"/>
    <meta name="twitter:description" content="<?=$meta_description;?>"/>
    <meta name="twitter:image" content="<?= JUri::root().$this['config']->get('twitter_meta_img');?>"/>
<?php endif;?>
    
</head>

<body class="<?php echo $this['config']->get('body_classes'); ?>">
     
    <div id="ivm-mobile-header" class="uk-hidden-large uk-clearfix">
        <div class="ivm-mobile-logo uk-float-left">
            <a href="<?php echo $this['config']->get('site_url'); ?>">
                <?php echo $this['widgets']->render('logo'); ?>
            </a>
        </div>
        <div class="ivm-mobile-nav uk-float-right">
            <a href="#offcanvas" data-uk-offcanvas><i class="uk-icon-bars"></i></a>
        </div>
    </div>
    
    <?php if ($this['widgets']->count('mobile-hero')) : ?>
    <div id="ivm-mobile-hero" class="uk-hidden-large">
        <?php echo $this['widgets']->render('mobile-hero'); ?>
    </div>
     <?php endif;?>
    
    <?php if ($this['widgets']->count('logo + menu')) : ?>
    <section id="ivm-header" class="<?php echo $header_style;?> uk-clearfix uk-visible-large">
        
        <div class="uk-container uk-container-center">
            
            <div id="ivm-logo">
                <a href="<?php echo $this['config']->get('site_url'); ?>">
                    <?php echo $this['widgets']->render('logo'); ?>
                </a>
            </div>
            
            <?php if ($this['widgets']->count('menu')) : ?>
            <nav class="uk-navbar uk-navbar-flip">
                <?php echo $this['widgets']->render('menu'); ?>
            </nav>
            <?php endif;?>
            
        </div>
        
        <!-- dropdown navigation -->
        <?php if ($this['widgets']->count('dropdown')) : ?>
        <div id="ivm-dropdown-navigation">
            <?php echo $this['widgets']->render('dropdown'); ?>
            </div>
        <?php endif; ?>
        
    </section>
    <?php endif; ?>
    
    <?php if ($this['widgets']->count('hero')) : ?>
    <section id="ivm-hero" class="uk-visible-large">
        <?php echo $this['widgets']->render('hero'); ?>
    </section>
    <?php endif;?>

    <?php if ($this['widgets']->count('top-a')) : ?>
    <section id="ivm-top-a">
        <div class="uk-container uk-container-center">
            <div class="<?php echo $grid_classes['top-a']; echo $display_classes['top-a']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('top-a', array('layout'=>$this['config']->get('grid.top-a.layout'))); ?></div>
        </div>
    </section>
    <?php endif; ?>
    
    <?php if ($this['widgets']->count('section-top')) : ?>
        <div id="ivm-section-top">
            <div class="uk-container uk-container-center">
                <?php echo $this['widgets']->render('section-top'); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($this['widgets']->count('top-b')) : ?>
    <section id="ivm-top-b">
        <div class="uk-container uk-container-center">
		  <div class="<?php echo $grid_classes['top-b']; echo $display_classes['top-b']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('top-b', array('layout'=>$this['config']->get('grid.top-b.layout'))); ?></div>
        </div>
    </section>
    <?php endif; ?>
    
<?php if ($this['widgets']->count('main-top + main-bottom + sidebar-a + sidebar-b') || $this['config']->get('system_output', true)) : ?>
<!-- Main Content -->    
 <div class="uk-container uk-container-center">
     
		<div id="ivm-middle" class="ivm-middle uk-grid" data-uk-grid-match data-uk-grid-margin>

			<?php if ($this['widgets']->count('main-top + main-bottom') || $this['config']->get('system_output', true)) : ?>
			<div class="<?php echo $columns['main']['class'] ?>">

				<?php if ($this['widgets']->count('main-top')) : ?>
				<section id="ivm-main-top" class="<?php echo $grid_classes['main-top']; echo $display_classes['main-top']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('main-top', array('layout'=>$this['config']->get('grid.main-top.layout'))); ?></section>
				<?php endif; ?>

				<?php if ($this['config']->get('system_output', true)) : ?>
				<main id="ivm-content">

					<?php if ($this['widgets']->count('breadcrumbs')) : ?>
					<?php echo $this['widgets']->render('breadcrumbs'); ?>
					<?php endif; ?>

					<?php echo $this['template']->render('content'); ?>

				</main>
				<?php endif; ?>

				<?php if ($this['widgets']->count('main-bottom')) : ?>
				<section id="ivm-main-bottom" class="<?php echo $grid_classes['main-bottom']; echo $display_classes['main-bottom']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('main-bottom', array('layout'=>$this['config']->get('grid.main-bottom.layout'))); ?></section>
				<?php endif; ?>

			</div>
			<?php endif; ?>

            <?php foreach($columns as $name => &$column) : ?>
            <?php if ($name != 'main' && $this['widgets']->count($name)) : ?>
            <aside class="<?php echo $column['class'] ?>"><?php echo $this['widgets']->render($name) ?></aside>
            <?php endif ?>
            <?php endforeach ?>

		</div>
</div>
<!-- Main Content End -->      
<?php endif; ?>

    <?php if ($this['widgets']->count('bottom-a')) : ?>
    <section id="ivm-bottom-a">
        <div class="uk-container uk-container-center">
            <div id="tm-bottom-a" class="<?php echo $grid_classes['bottom-a']; echo $display_classes['bottom-a']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('bottom-a', array('layout'=>$this['config']->get('grid.bottom-a.layout'))); ?></div>
        </div>
    </section>
    <?php endif; ?>
    
    <?php if ($this['widgets']->count('section-bottom')) : ?>
        <div id="ivm-section-bottom">
            <div class="uk-container uk-container-center">
                <?php echo $this['widgets']->render('section-bottom'); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($this['widgets']->count('bottom-b')) : ?>
    <section id="ivm-bottom-b"> 
        <div class="uk-container uk-container-center">
            <div id="ivm-bottom-b" class="<?php echo $grid_classes['bottom-b']; echo $display_classes['bottom-b']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('bottom-b', array('layout'=>$this['config']->get('grid.bottom-b.layout'))); ?></div>
        </div>
    </section>
    <?php endif; ?>

    <?php if ($this['widgets']->count('footer + debug') || $this['config']->get('warp_branding', true) || $this['config']->get('totop_scroller', true)) : ?>
    <footer id="ivm-footer" class="ivm-footer">
        <div class="uk-container uk-container-center">
            
			<?php if ($this['config']->get('totop_scroller', true)) : ?>
			<a class="ivm-totop-scroller uk-visible-large" data-uk-smooth-scroll href="#">
                <i class="uk-icon-long-arrow-up"></i>
            </a>
			<?php endif; ?>

			<?php
				echo $this['widgets']->render('footer');
				$this->output('warp_branding');
				echo $this['widgets']->render('debug');
			?>
            
        </div>
    </footer>
    <?php endif; ?>

	<?php echo $this->render('footer'); ?>

	<?php if ($this['widgets']->count('offcanvas')) : ?>
	<div id="offcanvas" class="uk-offcanvas">
		<div class="uk-offcanvas-bar"><?php echo $this['widgets']->render('offcanvas'); ?></div>
	</div>
	<?php endif; ?>
    
    <!-- system modules -->
    <?php if ($this['widgets']->count('system')) : ?>
        <?php echo $this['widgets']->render('system'); ?>
    <?php endif; ?>

</body>
</html>
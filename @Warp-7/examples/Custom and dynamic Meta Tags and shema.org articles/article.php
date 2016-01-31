<?php

    //check for page type list or single
    $pageType = JRequest::getCmd('view', '');

    if ($pageType == 'article') {
        $ivm_full_article = 'ivm-full-article';
    }else {
        $ivm_full_article = '';
    }

if ($pageType == 'article') {

    // meta description from content
    $meta_description = $article;
    // limit number of chars
    $meta_description = (strlen($meta_description) > 150) ? substr($meta_description,0, 150) . '...' : $meta_description;
    //remove html
    $meta_description = strip_tags($meta_description);
    //remove large white spaces
    $meta_description = trim(preg_replace('/\s+/', ' ',$meta_description));

    // Set Meta
    $doc = JFactory::getDocument();
    // set page title
    $doc->setTitle($title);
    // set meta description / replace default
    if ($doc->description == '') {
        $doc->setMetaData($title, $meta_description);
    }else {
        $doc->description = $meta_description;
    }

    //fb open graph meta
    $doc->addCustomTag('<meta property="og:url" content="'.JURI::current().'"/>');
    $doc->addCustomTag('<meta property="og:title" content="'.$title.'"/>');
    $doc->addCustomTag('<meta property="og:description" content="'.$meta_description.'"/>');
    $doc->addCustomTag('<meta property="og:image" content="'.$image.'"/>');
    $config = JFactory::getConfig();
    $doc->addCustomTag('<meta property="og:site_name" content="'.$config->get( 'sitename' ).'"/>');
    //Twitter card
    $doc->addCustomTag('<meta name="twitter:card" content="summary"/>');
    $doc->addCustomTag('<meta name="twitter:url" content="'.JURI::current().'"/>');
    $doc->addCustomTag('<meta name="twitter:title" content="'.$title.'"/>');
    $doc->addCustomTag('<meta name="twitter:description" content="'.$meta_description.'"/>');
    $doc->addCustomTag('<meta name="twitter:image" content="'.$image.'"/>');

}

?>

<article itemscope itemtype="http://schema.org/Article" class="uk-article <?=$ivm_full_article;?> uk-clearfix" <?php if ($permalink) echo 'data-permalink="'.$permalink.'"'; ?>>

    <?php if($image) :?>
    <div class="ivm-article-media">
     <?php if ($url) : ?>
        <figure class="uk-overlay uk-overlay-hover">
            <img itemprop="image" src="<?=$image;?>" alt="<?php echo $image_alt; ?>" />
            <div class="uk-overlay-panel uk-overlay-icon uk-overlay-background uk-overlay-fade"></div>
            <a class="uk-position-cover" href="<?php echo $url; ?>" title="<?php echo $image_caption; ?>"></a>
        </figure>
        <?php else :?>
        <img itemprop="image" src="<?=$image;?>" alt="<?php echo $image_alt; ?>" />
        <?php endif;?>
    </div>
    <?php endif;?>

    <div class="ivm-article-content">

        <?php if ($title) : ?>
        <h1 itemprop="name" class="uk-article-title">
            <?php if ($url && $title_link) : ?>
                <a itemprop="url" href="<?php echo $url; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a>
            <?php else : ?>
                <?php echo $title; ?>
            <?php endif; ?>
        </h1>
        <?php endif; ?>

        <?php echo $hook_aftertitle; ?>

        <?php echo $hook_beforearticle; ?>

        <?php if ($article) : ?>
        <div itemprop="articleBody"><?php echo $article; ?></div>
        <?php endif; ?>

        <?php if ($more) : ?>
	   <div class="uk-margin uk-text-left uk-clearfix">
           <a class="uk-button uk-button-primary uk-button-small" href="<?php echo $url; ?>" title="<?php echo $title; ?>">
              <!--<?php echo $more; ?>-->
               <i class="uk-icon-long-arrow-right"></i>
           </a>
	   </div>
	   <?php endif; ?>

        <?php if ($author || $date || $category) : ?>
        <p class="uk-article-meta uk-margin-bottom-remove">

            <?php

                $author   = ($author && $author_url) ? '<span itemprop="author" itemscope itemtype="http://schema.org/Person"><span itemprop="name"><a href="'.$author_url.'">'.$author.'</a></span></span>' : '<span itemprop="author" itemscope itemtype="http://schema.org/Person"><span itemprop="name">'.$author.'</span></span>';
                $date     = ($date) ? ($datetime ? '<time itemprop="datePublished" datetime="'.$datetime.'">'.JHtml::_('date', $date, JText::_('DATE_FORMAT_LC3')).'</time>' : JHtml::_('date', $date, JText::_('DATE_FORMAT_LC3'))) : '';
                $category = ($category && $category_url) ? '<a itemprop="genre" href="'.$category_url.'">'.$category.'</a>' : $category;

                if($author && $date) {
                    printf(JText::_('TPL_WARP_META_AUTHOR_DATE'), $author, $date);
                } elseif ($author) {
                    printf(JText::_('TPL_WARP_META_AUTHOR'), $author);
                } elseif ($date) {
                    printf(JText::_('TPL_WARP_META_DATE'), $date);
                }

                if ($category) {
                    echo ' ';
                    printf(JText::_('TPL_WARP_META_CATEGORY'), $category);
                }

            ?>

            <?php if ($tags) : ?>
            <?php echo ' - ' . JText::_('TPL_WARP_TAGS').': '.$tags; ?></p>
            <?php endif; ?>

        </p>
        <?php endif; ?>

        <?php echo $hook_afterarticle; ?>

    </div><!-- article end-->

</article>

<?php if ($edit) : ?>
<div class="ivm-article-tools uk-clearfix">
    <?php echo $edit; ?>
    <?php if ($previous || $next) : ?>
	<ul class="uk-pagination uk-margin-remove uk-float-right">
		<?php if ($previous) : ?>
		<li class="uk-pagination-previous">
			<a href="<?php echo $previous; ?>"><i class="uk-icon-angle-double-left"></i> <?php echo JText::_('JPREV'); ?></a>
		</li>
		<?php endif; ?>

		<?php if ($next) : ?>
		<li class="uk-pagination-next">
			<a href="<?php echo $next; ?>"><?php echo JText::_('JNEXT'); ?> <i class="uk-icon-angle-double-right"></i></a>
		</li>
		<?php endif; ?>
	</ul>
	<?php endif; ?>
</div>
<?php endif; ?>

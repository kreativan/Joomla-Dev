<?php

    // Get Articles from db
    $sort = $params->get('sorting');
    $no_of_articles = $params->get('no_of_items');
    
    //$catId = $params->get('catid');                           // <-- single category
    $catId = join(',', $params->get('catid'));                  //<-- join multiple categories

    // Check if 'All Categories are selected'
    if (in_array('all', $params->get('catid'))) {
        $sql_where = "state = '1'";
    }else {
        $sql_where = "catid IN ($catId) AND state='1'";
    }

    $db = JFactory::getDbo();
    $query = $db->getQuery(true);
    $query->select('*')
            ->from('#__content')
            //->where("catid = '$catId' AND state='1'")         // <-- single category
            ->where($sql_where)                                 // <-- multiple cateogries
            ->order($sort)
            ->setLimit($no_of_articles);

    $db->setQuery($query);
    $articles = $db->loadObjectList();

?>

<?php 
  foreach($articles as $article) {
  // loop
  }
?>

<?php foreach($articles as $article) : ?>
    <?php
        // get category from db - by catid ID
        $db = JFactory::getDbo();
        $db->setQuery('SELECT cat.title FROM #__categories cat  WHERE cat.id='.$article->catid);   
        $category_title = $db->loadResult();

        // get user from db - by created_by ID
        $db = JFactory::getDbo();
        $db->setQuery('SELECT name FROM #__users  WHERE id='.$article->created_by);   
        $username = $db->loadResult();
        
        // Meta
        $date = JHtml::_('date', $article->created, JText::_('d F Y'));
        $category = $category_title;
        $author = $username;
        $meta = $date . $category . $author;
        
        // get images array from json
        $json = $article->images;
        $image = json_decode($json);
        
        // images
        $intro_image = $image->{'image_intro'};
        $full_image = $image->{'image_fulltext'};
        
        // images from content
        preg_match('/<img.+src=[\'"](?P<src>.+)[\'"].*>/i', $intro_text, $intro_img);
        $intro_content_image = $intro_img['src'];
        preg_match('/<img.+src=[\'"](?P<src>.+)[\'"].*>/i', $full_text, $full_img);
        $full_content_image = $full_img['src'];
        
        // check witch image to use
        if ($intro_image) {
            $img = $intro_image;
        }
        elseif($full_image) {
            $img = $full_image;
        }
        elseif($intro_content_image) {
            $img = $intro_content_image;
        }else {
            $img = $full_content_image;
        }
        
        // get article link
        $article->slug    = $article->id . ':' . $article->alias;
        $article->catslug = $article->catid . ':' . $article->category_alias;
        // url
        $url = JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catid, $article->language));
    ?>

    <!-- LOOP -->
    
<?php endif;?>

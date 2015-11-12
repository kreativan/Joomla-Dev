<?php

// include k2 helper for item url
require_once(JPATH_SITE.DS.'components'.DS.'com_k2'.DS.'helpers'.DS.'route.php');

// k2 category array
$k2_categories = $params->get('k2_category');

$limit = 0;

?>

<div>
<?php foreach($k2_categories as $k2_category) : ?>
<?php
    //$sort = 'created DESC';
    $sort = $params->get('sorting');
    $no_of_items = $params->get('no_of_articles');
    $catId = $k2_category;
    //$catId = $params->get('mycategory');
    $db = JFactory::getDbo();
    $query = $db->getQuery(true);

    $query->select('*')
        ->from('#__k2_items')
        ->where("catid ='" . $catId . "'")
        ->order($sort);
        //->setLimit($no_of_items);

        $db->setQuery($query);
        $k2_items = $db->loadObjectList();
?>

  <?php foreach($k2_items as $k2) : ?>
  <?php if($k2->published !== '0') : ?>
      <?php
          // limit number of items to show
          // $no_of_items = 5;
          if($limit == $no_of_items) break;
          $limit++;
        
          // k2 item variables
          $k2_image       = JURI::root(true, "media/k2/items/cache/".md5("Image".$k2->id)."_XL.jpg");
          $k2_title       = $k2->title;
          $k2_introtext   = $k2->introtext;
          $k2_fulltext    = $k2->fulltext;
  
          // get user array
          $k2_user = JFactory::getUser($k2->created_by);
          // format date
          $k2_date = JHtml::_('date', $k2->created, JText::_('d F Y'));
          // meta
          $k2_meta = $k2_date; // you can add $k2_date & $author if needed
          // k2 item link
          $url = K2HelperRoute::getItemRoute($k2->id.':'.urlencode($k2->alias),$k2->catid.':'.urlencode($k2->catalias));
      ?>
      
    <!-- CUSTOM CODE HERE -->
  
  <?php endif;?>
  <?php endforeach;?>

<?php endforeach;?>
</div>

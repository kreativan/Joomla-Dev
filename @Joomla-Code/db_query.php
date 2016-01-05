<?php
    // Get Articles from db
    $sort = $params->get('sorting');
    $no_of_articles = '10';
    $catId = join(',',$params->get('catid')); // <-- multiple categories
    // $catId = $params->get('catid'); // <-- single category
    $db = JFactory::getDbo();
    $query = $db->getQuery(true);

    $query->select('*')
            ->from('#__content')
            //->where("catid ='" . $catId . "'") <-- single category
            ->where("category IN ($catId) AND state = '1'") // <-- multiple categories + if published
            ->order($sort)
            ->setLimit($no_of_articles);

    $db->setQuery($query);
    $items = $db->loadObjectList();
?>

<?php 
  foreach($items as $item) {
  // loop
  }
?>

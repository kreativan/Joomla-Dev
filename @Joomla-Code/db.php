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

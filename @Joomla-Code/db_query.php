<?php
// Connect to database
$db = JFactory::getDbo();
$query = $db->getQuery(true);
 
// Build the query
$query->select($db->quoteName(array('title', 'introtext')));
$query->from($db->quoteName('#__content'));
$query->where($db->quoteName('introtext') . ' LIKE '. $db->quote('%Joomla%'));
$query->order('ordering ASC');
$query->setLimit('1');
 
$db->setQuery($query);
$results = $db->loadObjectList();

// Print the result
foreach($results as $result){
    echo '<h3>' . $result->title . '</h3>';
    echo $result->introtext;
}
?>

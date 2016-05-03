<?php
/**
 * @package     Joomla.Module
 * @subpackage  mod_uikit_accordion
 * @link        http://www.kreativan.net
 * @copyright   Ivan Milincic - www.kreativan.net. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

$module_id = $module->id;


// get images array from json
$json = $article->images;
$image = json_decode($json);
// get category from db - by catid ID
$db = JFactory::getDbo();
$db->setQuery('SELECT cat.title FROM #__categories cat  WHERE cat.id='.$article->catid);
$category_title = $db->loadResult();
// get user from db - by created_by ID
$db = JFactory::getDbo();
$db->setQuery('SELECT name FROM #__users  WHERE id='.$article->created_by);
$username = $db->loadResult();
// get article link
$article->slug    = $article->id . ':' . $article->alias;
//$article->catslug = $article->catid . ':' . $article->category_alias;
$url = JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catid, $article->language));

// CONTENT
$title = $article->title;
$intro_text = strip_tags($article->introtext);
$full_text  = strip_tags($article->fulltext);
if($intro_text) {
    $text = $intro_text;
}elseif($full_text) {
    $text = $full_text;
}
// limit
$char_limit  = $params->get('chars_limit');
$text = (strlen($text) > $char_limit) ? substr($text,0,$char_limit).'...' : $text;

// URL
$category_url = 'index.php?option=com_content&view=category&layout=blog&id='.$article->catid;
$url = JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catid, $article->language));

// Meta
$date = JHtml::_('date', $article->created, JText::_('d F Y'));
$category = $category_title;
$author = $username;
$meta = $date . $category . $author;

// IMAGES
$intro_image = $image->{'image_intro'};
$full_image = $image->{'image_fulltext'};

//content images
if(preg_match('/<img/', $article->introtext)) {
    preg_match('/<img.+src=[\'"](?P<src>.+)[\'"].*>/i', $article->introtext, $intro_img);
    $intro_content_image = $intro_img['src'];
}else {
    $intro_content_image = '';
}

if(preg_match('/<img/', $article->fulltext)) {
    preg_match('/<img.+src=[\'"](?P<src>.+)[\'"].*>/i', $article->introtext, $intro_img);
    $full_content_image = $intro_img['src'];
}else {
    $full_content_image = '';
}

// check for image
if ($intro_image) {
    $img = $intro_image;
}elseif($full_image) {
    $img = $full_image;
}elseif($intro_content_image) {
    $img = $intro_content_image;
}elseif($full_content_image) {
    $img = $full_content_image;
}else {
    $img = '';
}

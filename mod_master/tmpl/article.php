<?php
/**
 * @package     Joomla.Module
 * @subpackage  mod_master
 * @link        http://www.kreativan.net
 * @copyright   Ivan Milincic - www.kreativan.net. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

    $module_id = $module->id;

    $limit  = 0;

?>

<!-- Loop true categories -->
<?php foreach($categories as $category) : ?>
<?php
        // get categories from db
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);

        $query->select('*')
                ->from('#__content')
                ->where("catid ='" . $category . "'")
                ->order($articles_sort)
                ->setLimit($no_of_articles);

        $db->setQuery($query);
        $articles = $db->loadObjectList();
    
?> 

    <!-- Loop true articles -->
    <?php if (is_array($articles)) : ?><!-- if array exists -->
    <?php foreach($articles as $article) : ?>
    <?php if($article->state !== '0') : ?>
    <?php  

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
        $article->catslug = $article->catid . ':' . $article->category_alias;
        $url = JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catid, $article->language));
      
        // FINAL ARTICLE VARIABLES
        // Text
        $title = $article->title;
        $intro_text = strip_tags($article->introtext);
        $full_text  = strip_tags($article->fulltext); 
    
        // images
        $intro_image = $image->{'image_intro'};
        $full_image = $image->{'image_fulltext'};
        //content images
        preg_match('/<img.+src=[\'"](?P<src>.+)[\'"].*>/i', $intro_text, $intro_img);
        $intro_content_image = $intro_img['src'];
        preg_match('/<img.+src=[\'"](?P<src>.+)[\'"].*>/i', $full_text, $full_img);
        $full_content_image = $full_img['src'];
    
        // Meta
        $date = JHtml::_('date', $article->created, JText::_('d F Y'));
        $category = $category_title;
        $author = $username;
        $meta = $date . $category . $author;
    
        // URL
        $url = JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catid, $article->language));
        
        // check for image
        if ($intro_image) {
            $image = $intro_image;
        }
        elseif($full_image) {
            $image = $full_image;
        }
        elseif($intro_content_image) {
            $image = $intro_content_image;
        }else {
            $image = $full_content_image;
        }

        // limit number of articles per category
        if($limit == $no_of_articles) break;
        $limit++;
      
        print_r($article);
    ?>

    <!-- LOOP ITEMS -->
    
  <?php endif;?>    
  <?php endforeach; ?>
  <?php endif;?>
            
<?php endforeach; ?>

<?php
/**
 * @package     Joomla.Module
 * @subpackage  mod_spotlight_news
 * @link        http://www.kreativan.net
 * @copyright   Ivan Milincic - www.kreativan.net. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

?>

<div class="ivm-spotlight-news">
    
    <!-- Loop true articles -->
<?php if (is_array($articles)) : ?><!-- if array exists -->

  <?php foreach($articles as $article) : ?>
  <?php if($article->state !== '0') : ?>
    <?php  
        // ARTICLE VARIABLES

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
        // images
        $intro_image = $image->{'image_intro'};
        $full_image = $image->{'image_fulltext'};
        // Text
        $title = $article->title;
        $intro_text = $article->introtext;
        // Meta
        $date = JHtml::_('date', $article->created, JText::_('d F Y'));
        $category = $category_title;
        $author = $username;
        $meta = $date . $category . $author;
        // URL
        $url = JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catid, $article->language));
        
        if ($intro_image) {
            $image = $intro_image;
        }else {
            $image = $full_image;
        }
    
    ?>
    
        
    <div class="item"><h4><a href="<?php echo $url;?>"><?php echo $title;?></a></h4></div>
    
    
  <?php endif;?>    
  <?php endforeach; ?>

<?php endif;?>
    
</div>

//

Fatal error: Class 'ContentHelperRoute' not found in JPATH_ROOT/plugins/system/articlesanywhere/helpers/article_view.php on line 60

//

// Fix -> add after defined('_JEXEC') or die;
JLoader::register('ContentHelperRoute', JPATH_SITE . '/components/com_content/helpers/route.php');

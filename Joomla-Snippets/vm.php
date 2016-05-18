<?php 
// connect to db
$db = JFactory::getDBO();
$query = $db->getQuery(true);

$catId = $params->get('vm_category');
$sort = 'a.virtuemart_product_id DESC';

if($catId == 0) {
    $catId = 'e.virtuemart_category_id';
}

// get infos from db
$query->select('a.virtuemart_product_id, e.virtuemart_category_id, product_name, a.slug, product_s_desc, file_url, product_price, product_currency, currency_symbol, d.created_on, category_name, x.published')
    // a) main table
    ->from('#__virtuemart_products_en_gb AS a')
    ->join('INNER', '#__virtuemart_products AS x ON x.virtuemart_product_id = a.virtuemart_product_id')
    // b) get prices
    ->join('INNER', '#__virtuemart_product_prices AS b ON a.virtuemart_product_id = b.virtuemart_product_id')
    // c) get product media id 
    ->join('INNER', '#__virtuemart_product_medias AS c ON c.virtuemart_media_id = a.virtuemart_product_id')
    // d) get product media links by id
    ->join('INNER', '#__virtuemart_medias AS d ON d.virtuemart_media_id = c.virtuemart_media_id')
    // e) get category id
    ->join('INNER', '#__virtuemart_product_categories AS e ON e.virtuemart_product_id = a.virtuemart_product_id')
    // g) get category name
    ->join('INNER', '#__virtuemart_categories_en_gb AS f ON f.virtuemart_category_id = e.virtuemart_category_id')
    // g) get currency
    ->join('INNER', '#__virtuemart_currencies AS g ON g.virtuemart_currency_id = b.product_currency')
    //get products from specific category
    ->where('e.virtuemart_category_id'.'='.$catId)
    // sorting
    ->order($sort)
    // group by product id - removes duplicated products (same product in multiple categories)
    ->group('a.virtuemart_product_id')
    // limit number of product
    ->setLimit($no_of_articles);

$db->setQuery($query);
$products = $db->loadObjectList();

?>

<div>
<?php foreach($products as $product) : ?>
<?php if($product->published) : ?>
    <?php
        // variables
        $product_id             = $product->virtuemart_product_id;
        $category_id            = $product->virtuemart_category_id;
        $product_name           = $product->product_name;
        $category_name          = $product->category_name;
        $product_slug           = $product->slug;
        $product_text           = $product->product_s_desc;
        $product_image          = $product->file_url;
        $currency_symbol        = $product->currency_symbol;

        $product_date           = $product->created_on;
        $product_date           = JHtml::_('date', $product_date, JText::_('d F Y'));

        $product_meta = $category_name .' | '. $product_date;
        
        // price
        $product_price          = $product->product_price;
        $product_price          = substr($product_price, 0, -4);
        $product_price          = $product_price . $currency_symbol;

        // product link
        $url = JRoute::_ ('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id='. $product->virtuemart_category_id);

    ?>
    
  <!-- CUSTOM CODE/MARKUP HERE -->  

<?php endif;?>
<?php endforeach;?>
</div>

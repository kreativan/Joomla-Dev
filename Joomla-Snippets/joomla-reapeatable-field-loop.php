<?php 
// No direct access
defined('_JEXEC') or die; 

    // decode json into array
    $ivm = $params->get('some_field');
    $json = json_decode($ivm, true);

if (is_array($json)) {
    
    if (!function_exists('ivm_items')) {
        function ivm_items($array) {
            $result = array();

            foreach ($array as $sub) {
                foreach ($sub as $k => $v) {
                    $result[$k][] = $v;
                }
            }
            return $result;
        }
    }

    $ivm_array = ivm_items($json);
    
}

?>

<?php 

    print_r($ivm_array);
            
?>

<?php

/** Trigger this file on plugin uninstall
 * @package nativeAntique
 */


 

 if (!defined('WP_UNINSTALL_PLUGIN')){
     die;
 }


 // for clearing database
$products = get_post( array('post_type' =>'product', 'numberpost'=> -1));


foreach($products as $product){

    wp_delete_post($product->ID, true);

}

?>
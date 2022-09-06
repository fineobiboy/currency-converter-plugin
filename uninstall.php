<?php

/**
 * file to run when uninstall is needed.
 * 
 * @package currency conversion
 */

//check if the proper conditions are met for uninstall

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

//get all the posts created
$books = get_posts(array('post_type' => 'book', 'numberposts' => -1));

//loop through each post and delete it.
foreach($books as $delData){
    wp_delete_post($delData -> ID, true);
}

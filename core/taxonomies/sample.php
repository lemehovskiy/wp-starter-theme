<?php

function color_taxonomy()
{

    register_taxonomy('color', array('post'),
    
        array(
            'labels' => array(
                'name' => __('Colors', 'textdomain'),
                'singular_name' => __('Color', 'textdomain'),
                'search_items' => __('Search Colors', 'textdomain'),
                'all_items' => __('All Colors', 'textdomain'),
                'edit_item' => __('Edit Color', 'textdomain'),
                'update_item' => __('Update Color', 'textdomain'),
                'add_new_item' => __('Add New Color', 'textdomain'),
                'new_item_name' => __('New Color', 'textdomain'),
                'menu_name' => __('Colors', 'textdomain')
            ),
            'hierarchical' => true,
            'rewrite' => array('slug' => 'color')
        ));
}


//add_action('init', 'color_taxonomy');
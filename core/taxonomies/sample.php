<?php

function color_taxonomy()
{

    register_taxonomy('color', array('post'),
    
        array(
            'labels' => array(
                'name' => __('Colors'),
                'singular_name' => __('Color'),
                'search_items' => __('Search Colors'),
                'all_items' => __('All Colors'),
                'edit_item' => __('Edit Color'),
                'update_item' => __('Update Color'),
                'add_new_item' => __('Add New Color'),
                'new_item_name' => __('New Color'),
                'menu_name' => __('Colors')
            ),
            'hierarchical' => true,
            'rewrite' => array('slug' => 'color')
        ));
}


//add_action('init', 'color_taxonomy');
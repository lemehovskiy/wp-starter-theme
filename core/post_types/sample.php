<?php

function sample_posttype() {

    register_post_type( 'sample',
        array(
            'labels' => array(
                
                'name' => __( 'Samples' ),
                'singular_name' => __( 'Sample' ),
                'add_new_item'  => __( 'New Sample'  ),
                'view_item'     => __( 'View Sample' )
            ),
            'public' 	   => true,
            'has_archive'  => true,
            'hierarchical' => true,
            'supports' => array('title', 'author', 'page-attributes'),
            'rewrite'  => array('slug' => 'sample'),
        )
    );
}

//add_action( 'init', 'sample_posttype' );
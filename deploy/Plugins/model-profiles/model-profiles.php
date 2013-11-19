<?php
/*
Plugin Name: Model Profiles
Description: Declares a plugin that will create a custom post type displaying model profiles within the Core Photography theme.
Version: 1.0
Author: Jordan Mirrer
Author URI: http://jordanmirrer.com
License: GPLv2
*/

add_action( 'init', 'create_model_profile');

function create_model_profile() {
	register_post_type('models',
		array(
			'labels' => array(
				'name' => 'Models',
				'singular_name' => 'Model',
				'add_new' => 'Add New',
                'add_new_item' => 'Add New Model',
                'edit' => 'Edit',
                'edit_item' => 'Edit Model',
                'new_item' => 'New Model',
                'view' => 'View',
                'view_item' => 'View Model',
                'search_items' => 'Search Models',
                'not_found' => 'No Models found',
                'not_found_in_trash' => 'No Models found in Trash',
                'parent' => 'Parent Model'
			),
			'public' => true,
			'menu_position' => 15,
            'supports' => array( 'title', /**'editor', 'thumbnail',**/ 'page-attributes', 'post-formats' ),
            'taxonomies' => array( 'category' ),
            //'menu_icon' => plugins_url( 'images/image.png', __FILE__ ),
            'map_meta_cap' => true,
            'capability_type' => 'page',
            'has_archive' => true		
		)
	);
}
?>
<?php
/*
Plugin Name: Model Collection
Description: Extends the Core Photography theme for NTA models with a new page type to select an array of models.
Requirements: Core Photography Theme, Model Profile Plugin, Meta Box Plugin (RWMB)
Version: 1.0
Author: Jordan Mirrer
Author URI: http://jordanmirrer.com
License: GPLv2
*/

add_action( 'init', 'create_model_collection');
add_action( 'admin_init', 'register_nta_collection_meta' );
add_filter( 'single_template', 'include_collection_template' );

function create_model_collection() {
	register_post_type('model_collection',
		array(
			'labels' => array(
				'name' => 'Collections',
				'singular_name' => 'Collection',
				'add_new' => 'Add New',
                'add_new_item' => 'Add New Collection',
                'edit' => 'Edit',
                'edit_item' => 'Edit Collection',
                'new_item' => 'New Collection',
                'view' => 'View',
                'view_item' => 'View Collection',
                'search_items' => 'Search Collection',
                'not_found' => 'No Collections found',
                'not_found_in_trash' => 'No Collections found in Trash',
                'parent' => 'Parent Collection'
			),
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => true,
			'menu_position' => 15,
            'supports' => array( 'title', /**'editor', 'thumbnail', 'page-attributes'**/),
            //'taxonomies' => array( 'category' ),
            'menu_icon' => plugins_url( 'NTAicon.png', __FILE__ ),
            'map_meta_cap' => true,
            'capability_type' => 'page',
            'has_archive' => true		
		)
	);
}

function register_nta_collection_meta(){
	if ( !class_exists( 'RW_Meta_Box' ) )
        return;
     
    $prefix = "NTA_";
     
    $meta_box = array(
		'title'    => 'Collection',
		'pages'    => array( 'model_collection'),
		'autosave' => true,
		'fields'   => array(
			array(
				'name' 	  => 'Selection Type',
				'id' 	  => $prefix . 'selection-type',
				'type' 	  => 'radio',
				'options' => array(
					'type-multiple'  => 'n/a',
					'type-fitness' 	 => 'Fitness Selection',
					'type-fashion' 	 => 'Fashion Selection',
					'type-lifestyle' => 'Lifestyle Selection'
				)
			),
			array(
				'name' 	  => 'Select Models',
				'id'   	  => $prefix . 'selection',
				'type' 	  => 'checkbox_list',
				'options' => getModelArray()
			)
		)
	);
    	
    new RW_Meta_Box( $meta_box );	
}

function getModelArray(){
	
	$args = array(
		'posts_per_page'   => -1,
		//'offset'           => 0,
		//'category'         => '',
		'orderby'          => 'name',
		'order'            => 'ASC',
		//'include'          => '',
		//'exclude'          => '',
		//'meta_key'         => '',
		//'meta_value'       => '',
		'post_type'        => 'models',
		//'post_mime_type'   => '',
		//'post_parent'      => '',
		'post_status'      => 'publish',
		'suppress_filters' => true 
	);
	
	$modelArray = get_posts($args);
	$numModels = count($modelArray);
	$metaArray = array();
	
	for($i = 0; $i < $numModels; $i++){
		$metaArray[$modelArray[$i]->ID] = $modelArray[$i]->post_title;
	} 
	
	return $metaArray;
}

function include_collection_template($templatePath){
	if ( get_post_type() == 'model_collection' ) {
		$template_path = plugin_dir_path( __FILE__ ) . '/single-model_collection.php';
    }
    return $template_path;
}

?>
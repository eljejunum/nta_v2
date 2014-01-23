<?php
/*
Plugin Name: NTA Custom Post Types Plugin
Description: Extends the Core Photography theme for NTA models with custom post types and templates for custom posts.
Requirements: Core Photography Theme, Meta Box Plugin (RWMB)
Version: 1.0
Author: Jordan Mirrer
Author URI: http://jordanmirrer.com
License: GPLv2
*/

//Custom Post Type - Model
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
            'supports' => array( 'title', /**'editor', 'thumbnail', **/'page-attributes', 'post-formats' ),
            'taxonomies' => array( 'category' ),
            'menu_icon' => plugins_url( 'NTAicon.png', __FILE__ ),
            'map_meta_cap' => true,
            'capability_type' => 'page',
            'has_archive' => true		
		)
	);
}

//Custom Post Type - Model Collection
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

//Meta Boxes for Model Collections - allows selection of models from admin page
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
/*
* Gets all the models to feed into the NTA Collection Meta Boxes 
*
* @param - none
* @return - array of all published models (of Custom Post Type models)
*/
function getModelArray(){
	
	$args = array(
		'posts_per_page'   => -1,
		'orderby'          => 'title',
		'order'            => 'ASC',
		'post_type'        => 'models',
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

/*
* Bind Templates to Collection and Models
*
* @return - URL path as string to correct template
*/
function include_NTA_templates($templatePath){
	
	global $post;
	$post_type = $post->post_type;
	
	/*if (!$post_type == 'model_collection' ) {
		return $templatePath;
	}*/
	
	if ($post_type == 'model_collection' ) {
		$template_path = plugin_dir_path( __FILE__ ) . 'model_collection_template.php';
	}
	elseif ($post_type == 'models' ) {
		$template_path = plugin_dir_path( __FILE__ ) . 'models_template.php';
	}
	
	return $template_path;
	
}

add_action( 'init', 'create_model_profile');
add_action( 'init', 'create_model_collection');
add_action( 'admin_init', 'register_nta_collection_meta' );
add_filter( 'single_template', 'include_NTA_templates');

?>
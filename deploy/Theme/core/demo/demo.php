<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'NTA_';

global $meta_boxes;

$meta_boxes = array();

// 1st meta box
$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'standard',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => "Model Stats",

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'models' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// List of meta fields
	'fields' => array(
		// RADIO BUTTONS
		array(
			'name'    => 'Gender',
			'id'      => "{$prefix}gender",
			'type'    => 'radio',
			// Array of 'value' => 'Label' pairs for radio options.
			// Note: the 'value' is stored in meta field, not the 'Label'
			'options' => array(
				'value1' => 'Male',
				'value2' => 'Female',
				'value3' => 'n/a'
			),
		),
		// TEXT
		array(
			// Field name - Will be used as label
			'name'  => 'Height',
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}height",
			// Field description (optional)
			'desc'  => 'Enter as x&#39; x.x" (YYYcm)',
			'type'  => 'text',
			// Default value (optional)
			'std'   => ' ',
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'clone' => false,
		),
		// TEXT
		array(
			'name'  => 'Waist',
			'id'    => "{$prefix}waist",
			'desc'  => 'Enter as xx" (YYcm)',
			'type'  => 'text',
			'std'   => ' ',
			'clone' => false,
		),
		// TEXT
		array(
			'name'  => 'Shoes',
			'id'    => "{$prefix}shoes",
			'desc'  => 'Enter as size',
			'type'  => 'text',
			'std'   => ' ',
			'clone' => false,
		),
		// TEXT
		array(
			'name'  => 'Hair',
			'id'    => "{$prefix}hair",
			'desc'  => 'Enter color',
			'type'  => 'text',
			'std'   => ' ',
			'clone' => false,
		),
		// TEXT
		array(
			'name'  => 'Eyes',
			'id'    => "{$prefix}eyes",
			'desc'  => 'Enter color',
			'type'  => 'text',
			'std'   => ' ',
			'clone' => false,
		),
		// TEXT
		array(
			'name'  => 'Bust or Suit',
			'id'    => "{$prefix}bust-suit",
			'desc'  => 'Bust size as xx" (YYcm), Suit size as xx"',
			'type'  => 'text',
			'std'   => ' ',
			'clone' => false,
		),
		// TEXT
		array(
			'name'  => 'Cup or Suit Length',
			'id'    => "{$prefix}cup-length",
			'desc'  => 'Enter letter(s) for size',
			'type'  => 'text',
			'std'   => ' ',
			'clone' => false,
		),
		// TEXT
		array(
			'name'  => 'Hips or Shirt',
			'id'    => "{$prefix}hips-shirt",
			'desc'  => 'Enter hips size as xx" (YYcm), Shirt as xx"',
			'type'  => 'text',
			'std'   => ' ',
			'clone' => false,
		),		
		// TEXT
		array(
			'name'  => 'Dress or Shirt Sleeve',
			'id'    => "{$prefix}dress-sleeve",
			'desc'  => 'Enter dress size, shirt sleeve as xx"',
			'type'  => 'text',
			'std'   => '',
			'clone' => false,
		),
		// TEXT
		array(
			'name'  => 'Inseam (men only)',
			'id'    => "{$prefix}inseam",
			'desc'  => 'Enter inseam as xx"',
			'type'  => 'text',
			'std'   => ' ',
			'clone' => false,
		),
		
		/** Commenting Out Image function					
		// THICKBOX IMAGE UPLOAD (WP 3.3+)
		array(
			'name' => 'Fitness Preview Image',
			'id'   => "{$prefix}fitness_img",
			'type' => 'thickbox_image',
		),
		// THICKBOX IMAGE UPLOAD (WP 3.3+)
		array(
			'name' => 'Fashion Preview Image',
			'id'   => "{$prefix}fashion_img",
			'type' => 'thickbox_image',
		),
		// THICKBOX IMAGE UPLOAD (WP 3.3+)
		array(
			'name' => 'Lifestyle Preview Image',
			'id'   => "{$prefix}lifestlye_img",
			'type' => 'thickbox_image',
		),**/
	),
	'validation' => array(
		'rules' => array(
			"{$prefix}password" => array(
				'required'  => true,
				'minlength' => 7,
			),
		),
		// optional override of default jquery.validate messages
		'messages' => array(
			"{$prefix}password" => array(
				'required'  => 'Password is required',
				'minlength' => 'Password must be at least 7 characters',
			),
		)
	)
);

// 2nd meta box
$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'page-of-details',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => 'Page Info',

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'page' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	'fields' => array(
		// RADIO BUTTONS
		array(
			'name'    => 'Gender',
			'id'      => "{$prefix}gender",
			'type'    => 'radio',
			// Array of 'value' => 'Label' pairs for radio options.
			// Note: the 'value' is stored in meta field, not the 'Label'
			'options' => array(
				'value1' => 'Male',
				'value2' => 'Female',
				'value3' => 'Both'
			),
		),
		array(
			'name'    => 'Type',
			'id'      => "{$prefix}model-type",
			'type'    => 'radio',
			// Array of 'value' => 'Label' pairs for radio options.
			// Note: the 'value' is stored in meta field, not the 'Label'
			'options' => array(
				'value1' => 'Fashion',
				'value2' => 'Fitness',
				'value3' => 'Lifestyle',
				'value4' => 'All'
			),
		),
		
	)
);


/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function YOUR_PREFIX_register_meta_boxes()
{
	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( !class_exists( 'RW_Meta_Box' ) )
		return;

	global $meta_boxes;
	foreach ( $meta_boxes as $meta_box )
	{
		new RW_Meta_Box( $meta_box );
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'YOUR_PREFIX_register_meta_boxes' );
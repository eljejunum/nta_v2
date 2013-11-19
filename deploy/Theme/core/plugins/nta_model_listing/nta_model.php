<?php
/*
Plugin Name: Model Profile
Description: Declares a plugin that will create a custom post type displaying a model profile.
Version: 1.0
Author: Jordan Mirrer
Author URI: http://jordanmirrer.com
License: GPLv2
*/

add_action( 'admin_init', 'my_admin' );

function my_admin() {
    add_meta_box( 
    	'model_stats_meta_box',
        'Model Stats Details',
        'display_model_stats_meta_box',
        'model_profile', 'normal', 'high'
    );
}

function display_model_stats_meta_box( $model_profile ) {
    
    // Retrieve current name of the Model based on review ID
    $model_name = esc_html( get_post_meta( $model_profile->ID, 'model_name', true ) );
	$model_birthday = esc_html( get_post_meta( $model_profile->ID, 'model_birthday', true ) );
	$model_dimensions = esc_html( get_post_meta( $model_profile->ID, 'model_dimensions', true ) );
    $model_gender = intval( get_post_meta( $movie_review->ID, 'model_gender', true ) );
	    
    ?>
    <table>
        <tr>
            <td style="width: 100%">Model Name</td>
            <td><input type="text" size="80" name="model_profile_name" value="<?php echo $model_name; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 100%">Model Birthday (mm/dd/yyyy)</td>
            <td><input type="text" size="80" name="model_profile_birthday" value="<?php echo $model_birthday; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 100%">Model Dimensions and Stats</td>
            <td><input type="text" size="80" name="model_profile_dimensions" value="<?php echo $model_dimensions; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 150px">Model gender</td>
            <td>
                <select style="width: 100px" name="model_gender">
                <?php
                // Generate all items of drop-down list
                for ( $gender = 1; $gender >= 0; $gender -- ) {
                ?>
                    <option value="<?php echo $gender; ?>" <?php echo selected( $gender, $model_gender ); ?>>
                    <?php echo $gender; ?> parts <?php } ?>
                </select>
            </td>
        </tr>
    </table>
    <?php
}
?>
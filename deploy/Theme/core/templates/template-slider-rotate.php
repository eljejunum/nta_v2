<br class="clear"/><br/>

<div id="content_wrapper">
<?php
	$count_photos = count($all_photo_arr);
?>
<div class="rm_wrapper">
    <div id="rm_container" class="rm_container">
    	<ul>
    		<?php 
    			if(isset($all_photo_arr[0])) 
    			{
    				$small_image_url = wp_get_attachment_image_src( $all_photo_arr[0]->ID, 'home_rotate' );

    		?>
    			<li data-images="rm_container_1" data-rotation="-15"><img onclick="$j('#fancy_gallery0').trigger('click')" src="<?php echo $small_image_url[0]; ?>"/></li>
    		<?php
    			}
    		?>
    		
    		<?php 
    			if(isset($all_photo_arr[1])) 
    			{
    				$small_image_url = wp_get_attachment_image_src( $all_photo_arr[1]->ID, 'home_rotate' );
    				
    		?>
    			<li data-images="rm_container_2" data-rotation="-5"><img onclick="$j('#fancy_gallery1').trigger('click')" src="<?php echo $small_image_url[0]; ?>"/></li>
    		<?php
    			}
    		?>
    		
    		<?php 
    			if(isset($all_photo_arr[2])) 
    			{
    				$small_image_url = wp_get_attachment_image_src( $all_photo_arr[2]->ID, 'home_rotate' );
    				
    		?>
    			<li data-images="rm_container_3" data-rotation="5"><img onclick="$j('#fancy_gallery2').trigger('click')" src="<?php echo $small_image_url[0]; ?>"/></li>
    		<?php
    			}
    		?>
    		
    		<?php 
    			if(isset($all_photo_arr[3])) 
    			{
    				$small_image_url = wp_get_attachment_image_src( $all_photo_arr[3]->ID, 'home_rotate' );
    				
    		?>
    			<li data-images="rm_container_4" data-rotation="15"><img onclick="$j('#fancy_gallery3').trigger('click')" src="<?php echo $small_image_url[0]; ?>"/></li>
    		<?php
    			}
    		?>
    	</ul>
    	<div id="rm_mask_left" class="rm_mask_left"></div>
    	<div id="rm_mask_right" class="rm_mask_right"></div>
    	<div id="rm_corner_left" class="rm_corner_left"></div>
    	<div id="rm_corner_right" class="rm_corner_right"></div>
    	<h2 class="cufon"><?php echo get_the_title($pp_homepage_slideshow_cat); ?></h2>
    	<div style="display:none;">
    		<div id="rm_container_1">
    			<?php 
    				for($i=0;$i<=$count_photos;)
    				{
    					if(isset($all_photo_arr[$i])) 
    					{
    					$small_image_url = wp_get_attachment_image_src( $all_photo_arr[$i]->ID, 'home_rotate' );
    					
    			?>
    					<img onclick="$j('#fancy_gallery<?php echo $i; ?>').trigger('click')" src="<?php echo $small_image_url[0]; ?>"/>
 				<?php
 							$i+=4;
 						}
 						else
 						{
 							$i = $count_photos+1;
 						}
 					}
 				?>
    		</div>
    		<div id="rm_container_2">
    			<?php 
    				for($i=1;$i<=$count_photos;)
    				{
    					if(isset($all_photo_arr[$i])) 
    					{
    					$small_image_url = wp_get_attachment_image_src( $all_photo_arr[$i]->ID, 'home_rotate' );
    					
    			?>
    					<img onclick="$j('#fancy_gallery<?php echo $i; ?>').trigger('click')" src="<?php echo $small_image_url[0]; ?>"/>
 				<?php
 							$i+=4;
 						}
 						else
 						{
 							$i = $count_photos+1;
 						}
 					}
 				?>
    		</div>
    		<div id="rm_container_3">
    			<?php 
    				for($i=2;$i<=$count_photos;)
    				{
    					if(isset($all_photo_arr[$i])) 
    					{
    					$small_image_url = wp_get_attachment_image_src( $all_photo_arr[$i]->ID, 'home_rotate' );
    					
    			?>
    					<img onclick="$j('#fancy_gallery<?php echo $i; ?>').trigger('click')" src="<?php echo $small_image_url[0]; ?>"/>
 				<?php
 							$i+=4;
 						}
 						else
 						{
 							$i = $count_photos+1;
 						}
 					}
 				?>
    		</div>
    		<div id="rm_container_4">
    			<?php 
    				for($i=3;$i<=$count_photos;)
    				{
    					if(isset($all_photo_arr[$i])) 
    					{
    					$small_image_url = wp_get_attachment_image_src( $all_photo_arr[$i]->ID, 'home_rotate' );
    					
    			?>
    					<img onclick="$j('#fancy_gallery<?php echo $i; ?>').trigger('click')" src="<?php echo $small_image_url[0]; ?>"/>
 				<?php
 							$i+=4;
 						}
 						else
 						{
 							$i = $count_photos+1;
 						}
 					}
 				?>
    		</div>
    	</div>
    </div>
    <div class="rm_nav">
    	<a id="rm_next" href="#" class="rm_next"></a>
    	<a id="rm_prev" href="#" class="rm_prev"></a>
    </div>
</div>

</div>

<div id="fancy_gallery" style="display:none">
<?php
$pp_display_image_title = get_option('pp_display_image_title');

foreach($all_photo_arr as $key => $photo)
{
	$full_image_url = wp_get_attachment_image_src( $photo->ID, 'full' );
	$small_image_url = wp_get_attachment_image_src( $photo->ID, 'large' );
?>
<a id="fancy_gallery<?php echo $key; ?>" href="<?php echo $full_image_url[0]; ?>" rel="gallery" <?php if(!empty($pp_display_image_title)) { ?> title="<?php echo $photo->post_title; ?>" <?php } ?>><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/white_slider_handle.png" alt=""/></a>
<?php
}
?>
</div>
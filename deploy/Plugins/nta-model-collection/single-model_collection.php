<?php
/**
 * The main template file to Display the Model Collection.
 *
 * @package WordPress
*/
 
/**
*	Get Current page object
**/
$page = get_page($post->ID);

/**
*	Get current page id
**/

if(!isset($current_page_id) && isset($page->ID))
{
    $current_page_id = $page->ID;
}

if(!isset($hide_header) OR !$hide_header)
{
	get_header(); 
}

$page_class = 'inner_wrapper';


$pp_title = get_option('pp_blog_title');

if(empty($pp_title))
{
	$pp_title = 'Collection';
}

?>		

	<!-- PAGE HEADER -->
	<div class="page_caption">
		<h1 class="cufon"><?php echo $post->post_title; ?></h1>
	</div>

	<div id="content_wrapper">
	
		<!-- Begin content -->
		<div id="page_content_wrapper">
			
			<div class="inner">

				<!-- Begin main content -->
				<div class="inner_wrapper">

					<div class="sidebar_content">
					
<?php

global $more; $more = false; # some wordpress wtf logic

$modelCollectionArray = rwmb_meta('NTA_selection', 'type=checkbox_list');

//set variable to determine which thumbnail image to pull in.  

foreach($modelCollectionArray as $model){
	
	$model_id = intval($model);
	$imageUse;
	$imageSource;
	
	$selectionType = rwmb_meta('NTA_selection-type');
	switch ($selectionType){
		case "type-fashion": //fashion ID=7
			$imageUse = "fashion-img";
			break;
		case "type-fitness": //fitness ID=8
			$imageUse = "fitness-img";
			break;
		case "type-lifestyle": //lifestyle ID=9
			$imageUse = "lifestyle-img";
			break;
		default: //choose n/a or not specifying type of selection
			$imageUse = null;
			break;
	}
	
	$imageSource = MultiPostThumbnails::get_post_thumbnail_url(get_post_type($model_id), $imageUse, $model_id);
	if($imageSource == null){
		$imageUseArray = array("fashion-img", "fitness-img", "lifestyle-img");
		foreach($imageUseArray as $imageUse){			
			$imageSource = MultiPostThumbnails::get_post_thumbnail_url(get_post_type($model_id), $imageUse, $model_id);
			if($imageSource != null) break;
			else $imageSource = "http://profile.ak.fbcdn.net/hprofile-ak-ash3/c178.0.604.604/s160x160/600249_1002029915098_1903163647_n.jpg";
		}			
			
	}
	

?>

						
						<!-- Begin each blog post -->
						<div class="model_wrapper">
						
							<div class="model_header">
								<h3 class="cufon">
									<a class="model_title" href="<?php echo post_permalink($model_id); ?>" title="<?php echo get_the_title($model_id); ?>">
										<?php echo get_the_title($model_id); ?>						
									</a>
								</h3>
							</div>
							
							<br class="clear"/>
							<div class="model_img">
								<a href="<?php echo post_permalink($model_id); ?>" title="<?php echo get_the_title($model_id); ?>">
									<img class="model_img-src" src="<?php echo $imageSource; ?>" alt="" class="img_nofade frame"/>
								</a>
							</div>
							
						</div>
						<!-- End each blog post
						<br class="clear"/> -->
											


<?php }?>



						
					</div>
					
					<?php
						if($add_sidebar && $page_style == 'Right Sidebar')
						{
					?>
						<div class="sidebar_wrapper <?php echo $sidebar_class; ?>">
						
							<div class="sidebar_top <?php echo $sidebar_class; ?>"></div>
						
							<div class="sidebar <?php echo $sidebar_class; ?> <?php echo $sidebar_home; ?>">
							
								<div class="content">
							
									<ul class="sidebar_widget">
									<?php dynamic_sidebar($page_sidebar); ?>
									</ul>
								
								</div>
						
							</div>
							<br class="clear"/>
					
							<div class="sidebar_bottom <?php echo $sidebar_class; ?>"></div>
						</div>
					<?php
						}
					?>
					
				</div>
				<!-- End main content -->
				
				</div>
				
			</div>
			<br class="clear"/>
		
<?php
if(!isset($hide_header) OR !$hide_header)
{
?>
			
		</div>
		<!-- End content -->
				

<?php get_footer(); ?>

<?php
}
?>
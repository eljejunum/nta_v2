<?php
/**
 * Template Name: Page of Models
 * The main template file to Display Model category page.
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

$page_style = 'Right Sidebar';
$caption_style = get_post_meta($current_page_id, 'caption_style', true);

if(empty($caption_style))
{
	$caption_style = 'Title & Description';
}

if(!isset($sidebar_home))
{
	$sidebar_home = '';
}

if(empty($page_sidebar))
{
	$page_sidebar = 'Blog Sidebar';
}
$caption_class = "page_caption";

if(!isset($add_sidebar))
{
	$add_sidebar = FALSE;
}

$sidebar_class = '';

if($page_style == 'Right Sidebar')
{
	$add_sidebar = TRUE;
	$page_class = 'sidebar_content';
}
elseif($page_style == 'Left Sidebar')
{
	$add_sidebar = TRUE;
	$page_class = 'sidebar_content';
	$sidebar_class = 'left_sidebar';
}
else
{
	$page_class = 'inner_wrapper';
}

$pp_title = get_option('pp_blog_title');

if(empty($pp_title))
{
	$pp_title = 'Blog';
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

/**
* Check which category the current page is, based on rwmb meta
* @return: array(x,y) where x and y are the two category IDs.  
*/
function checkCategories(){
	$gender = rwmb_meta('NTA_gender');
	$modelType = rwmb_meta('NTA_model-type');
	
	switch ($gender){ 
		case "value1": //male ID=5
			switch ($modelType){
				case "value1": //fashion ID=7
					return array(5,7);
				case "value2": //fitness ID=8
					return array(5,8);
				case "value3": //lifestyle ID=9
					return array(5,9);
			}
		case "value2": //female ID=6
			switch ($modelType){
				case "value1": //fashion ID=7
					return array(6,7);
				case "value2": //fitness ID=8
					return array(6,8);
				case "value3": //lifestyle ID=9
					return array(6,9);
			}
		case "value3": //both
			switch ($modelType){
				case "value1": //fashion ID=7
					return array(7);
				case "value2": //fitness ID=8
					return array(8);
				case "value3": //lifestyle ID=9
					return array(9);
			}
	}
}

	$query_array = array(
		'post_type' => 'models',
		'category__and' => checkCategories(),
		'posts_per_page' => 100,
		'orderby' => 'menu_order title',
		'order' => 'ASC'
	);

query_posts($query_array);

//set variable to determine which thumbnail image to pull in.  
global $imageUse;
$modelType = rwmb_meta('NTA_model-type');
	switch ($modelType){
		case "value1": //fashion ID=7
			$imageUse = "fashion-img";
			break;
		case "value2": //fitness ID=8
			$imageUse = "fitness-img";
			break;
		case "value3": //lifestyle ID=9
			$imageUse = "lifestyle-img";
			break;		
	}
	
/** Start the Loop of Posts **/
if (have_posts()) : while (have_posts()) : the_post();
	$post_id = get_the_ID();
	
	$imageSource = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), $imageUse, $post_id);
	if($imageSource == null){
		$imageSource = "http://profile.ak.fbcdn.net/hprofile-ak-ash3/c178.0.604.604/s160x160/600249_1002029915098_1903163647_n.jpg";	
	}
?>
											
						<!-- Begin each blog post -->
						<div class="model_wrapper">
						
							<div class="model_header">
								<h3 class="cufon">
									<a class="model_title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
										<?php the_title(); ?>						
									</a>
								</h3>
							</div>
							
							<br class="clear"/>
							<div class="model_img">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<img class="model_img-src" src="<?php echo $imageSource; ?>" alt="" class="img_nofade frame"/>
								</a>
							</div>
							
						</div>
						<!-- End each blog post
						<br class="clear"/> -->



<?php endwhile; endif; ?>

						
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
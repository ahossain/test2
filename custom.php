<?php
include('../../../../../wp-config.php' );


global $post;

$thisid = str_replace('post-id-','',$_POST['thisid']);
$current = $_POST['current'];
$post_type = $_POST['postType'];
$count = 0; /* this count = 0 is for next posts & count = 1 for previous posts */
$attached_image = ''; /* contains all attached images */
$post_id = $thisid;


if ( $current == 'true' )
{
	$result = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE (ID = '".$post_id."') AND (post_type = '".$post_type."')");
	foreach ( $result as $rows ) 
	{
		$post_id = $rows->ID;
		break;
	}
}

$wp_query->is_single = true;

$post = get_post($post_id);
setup_postdata($post);

if ( !$current )
{
	$post = get_adjacent_post();
	setup_postdata($post);
}

/*
$result = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE (ID < $thisid) AND (post_type = '".$post_type."') order by ID desc");

if ( count($result) == 0 )
{
	$result = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE (post_type = '".$post_type."') order by ID desc");
}
foreach ( $result as $rows ) 
{
	$my_id = $rows->ID;
	break;
}
*/


if($post)
{
	$my_id = $post->ID;

//	$post = get_post($my_id); 	
	
	$thumb_id = get_post_thumbnail_id( $my_id );
	
	$args = array(
		'numberposts' => -1,
		'orderby'	 => 'title',
		'order'		 => 'ASC',
		'post_type'   => 'attachment',
		'post_parent' => $my_id,
		'exclude'	=> $thumb_id
		);

	$attachments = get_posts( $args );

	if ( $attachments )
	{
		$count = count($attachments);
		$i = 0;
		foreach ( $attachments as $attachment )
		{
			$img_url = wp_get_attachment_url( $attachment->ID );
			$img_title = apply_filters( 'the_title', $attachment->post_title );	
			
			$attached_image .= '<div class="slide"><img title=' .$img_title. ' alt=' .$img_title. ' src=' . $img_url. '></div>'; 

		}
	}

	$thecontent = $post->post_content;
	$thecontent = apply_filters('the_content', $thecontent);
	$thecontent = str_replace(']]>', ']]&gt;', $thecontent);	
	
	$output = 	'<li style="display:none;" id="post-id-'.$my_id.'">	
					<div class="top">
						<div class="left">
							<div class="blogname">
								<span class="category">residential</span><span class="blogname_white">'.$post->post_title.'</span>													
							</div>
							<div class="sign">
								<span class="more">more</span><span class="plus">&nbsp;</span>
							</div>
							<div class="blogdetails">'.$thecontent.'</div>
						</div>
					</div>
					<div class="bottom">
						<div class="move moveleft">left</div>
						<div class="top-spaced">
							<div id="slideshow-blog-post-type" class="dragdealer">
								<div class="handle">
										'.$attached_image.'
								</div>
							</div>
						</div>
						<div class="move moveright">right</div>
					</div>
				</li>';
}
else{
	$output = '';
}

$result = array('output'=>$output,'thisid'=>$my_id);

echo json_encode($result);

?>
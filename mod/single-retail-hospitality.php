<?php
/**
 * The Template for displaying all single posts for "post_type_three".
 *
 */

get_header(); ?>

    <div id="content" class="content">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						
							<div class="entry-content">		
							
								<div id="blog-post-type">
									<!-- start: blog slider(anything slider) -->
									
									<div class="top_panel">
										<span class="sign-cross"><a href="<?php echo bloginfo('url'); ?>">cross</a></span>
										<span class="txt">next</span>
										<span class="sign-next">&nbsp;</span> <!-- button for next project after clicking -->
									</div> 
									
									
									
									<ul id="slider-post-type" class="retail-hospitality"> <!-- class is used in projects-detail.js for post retrive -->
									
										<?php
											$my_id = $_GET['post_id'];
											$lastposts = get_post($my_id); 
										?>
										
										<li id="post-id-<?php echo $my_id; ?>">	
											<div class="top">
												<div class="left">
													<div class="blogname">
														<span class="category">retail hospitality</span><span class="blogname_white"><?php echo $lastposts->post_title; ?></span>													
													</div>
													<div class="sign">
														<span class="more">more</span><span class="plus">&nbsp;</span>
													</div>
													<div class="blogdetails">
                                                    	<?php the_content(); ?>
														<?php //echo $lastposts->post_content; ?>
													</div>
												</div>
											</div>
											<div class="bottom">
                                            	<div class="move moveleft">left</div><!-- to scroll right; for images of individual projects -->										
												<div class="top-spaced">
												  <div id="slideshow-blog-post-type" class="dragdealer">
														<div class="handle">
															<?php
																/*
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
																			//echo '<div class="slide"><li><div>'.wp_get_attachment_image( $attachment->ID, false ).'</div></li></div>'; 
																			$img_url = wp_get_attachment_url( $attachment->ID );
																			$img_title = apply_filters( 'the_title', $attachment->post_title );
																			echo '<div class="slide"><img title=' .$img_title. ' alt=' .$img_title. ' src=' . $img_url. '></div>';
																	}
																}	
																*/
															?>
														</div>
												  </div>
												</div>
												<div class="move moveright">right</div> <!-- to scroll left; for images of individual projects -->  
											</div>
										</li>	
																	
									</ul> <!-- end: blog slider(anything slider) -->
									
									
								</div>
																	
							</div><!-- .entry-content -->
						</div><!-- #post-## -->

		<?php endwhile; ?>
        
		<div class="clear"></div>    
    </div>
	</div><!-- #container -->
	
<?php get_footer(); ?>    

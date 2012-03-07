<?php
/**
 * Template Name: Homepage
 */
get_header(); ?>
    <div id="content" class="content">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<div class="entry-content">
								<div id="blog-home">
									<div class="home-one strips">
										<div class="title">residential</div>
										<div id="pbtn-home-one" class="pbtn-home">&nbsp;</div>
										<div class="top-spaced">
											<div id="slideshow-one" class="dragdealer cslider" style="margin-left:-20px;">
												<div class="handle" >
													<ul>
														<?php
															$args = array( 'post_type' => 'residential', 'numberposts' => -1);
															$lastposts = get_posts( $args );
															foreach($lastposts as $post) : setup_postdata($post); ?>
																<div class="slide">
																<li>
																	<div class="blog-img-container">
																		<?php echo get_the_post_thumbnail($post->ID, array(241,153), array('alt' => get_the_title(),'title' => get_the_title())); ?>
                                                                        <?php
																			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' );
																			
																			$url = $thumb['0'];
																		?>
                                                                        <!--img style="display:none" id="timg<?php echo $post->ID;?>" src=<?php echo $url; ?> /-->
                                                                        <script>
																			//$("#timg<?php echo $post->ID; ?>").load(function(){
																			//	$(this).fadeIn();
																			//	});
																		</script>
																		<div class="clear"></div>
																	</div>		
																	<div class="blogname">
																		<span class="blogname_white"><?php the_title(); ?></span>
																		<span class="sign-plus"><a href="<?php the_permalink(); echo '?post_id='.$post->ID; ?>"><img src="<?php bloginfo('template_directory'); ?>/images/sign-plus.png"></a></span>
																	</div>														
																</li>
																</div>
														<?php endforeach; ?>
													</ul>
										        </div>
											</div>
										</div>
										<div id="nbtn-home-one" class="nbtn-home">&nbsp;</div>
									</div>
									<div class="home-two strips">
										<div class="title">commercial</div>
										<div id="pbtn-home-two" class="pbtn-home">&nbsp;</div>
										<div class="top-spaced">
											<div id="slideshow-two" class="dragdealer cslider">
												<div class="handle">
													<ul>
														<?php
															$args = array( 'post_type' => 'commertial', 'numberposts' => -1);
															$lastposts = get_posts( $args );
															foreach($lastposts as $post) : setup_postdata($post); ?>
																<div class="slide">
																<li>
																	<div class="blog-img-container">
																		<?php echo get_the_post_thumbnail($post->ID, array(241,153), array('alt' => get_the_title(),'title' => get_the_title())); ?>
																		<div class="clear"></div>
																	</div>		
																	<div class="blogname">
																		<span class="blogname_white"><?php the_title(); ?></span>
																		<span class="sign-plus"><a href="<?php the_permalink(); echo '?post_id='.$post->ID; ?>"><img src="<?php bloginfo('template_directory'); ?>/images/sign-plus.png"></a></span>
																	</div>														
																</li>
																</div>
														<?php endforeach; ?>
													</ul>
										        </div>
											</div>
										</div>
										<div id="nbtn-home-two" class="nbtn-home">&nbsp;</div>
									</div>
									<div class="home-three strips">
										<div class="title">retail / hospitality</div>
										<div id="pbtn-home-three" class="pbtn-home">&nbsp;</div>
										<div class="top-spaced">
											<div id="slideshow-three" class="dragdealer cslider" style="margin-left:-20px;">
												<div class="handle" >
													<ul>
														<?php
															$args = array( 'post_type' => 'retail-hospitality', 'numberposts' => -1);
															$lastposts = get_posts( $args );
															foreach($lastposts as $post) : setup_postdata($post); ?>
																<div class="slide">
																<li>
																	<div class="blog-img-container">
																		<?php echo get_the_post_thumbnail($post->ID, array(241,153), array('alt' => get_the_title(),'title' => get_the_title())); ?>
																		<div class="clear"></div>
																	</div>		
																	<div class="blogname">
																		<span class="blogname_white"><?php the_title(); ?></span>
																		<span class="sign-plus"><a href="<?php the_permalink(); echo '?post_id='.$post->ID; ?>"><img src="<?php bloginfo('template_directory'); ?>/images/sign-plus.png"></a></span>
																	</div>														
																</li>
																</div>
														<?php endforeach; ?>
													</ul>
										        </div>
											</div>
										</div>
										<div id="nbtn-home-three" class="nbtn-home">&nbsp;</div>
									</div>
							</div><!-- .entry-content -->
						</div><!-- #post-## -->

		<?php endwhile; ?>
     <div class="clear"></div>    
    </div>
	</div><!-- #container -->
<?php get_footer(); ?>
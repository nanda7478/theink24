<?php
/*
Template Name: Home page Template
*/
?>
<?php get_header();?>

<div class="home_slider">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 my flexslider">
			<ul class="slides">
				<?php
				// check if the repeater field has rows of data
				if( have_rows('slider_repeter') ):
				 	// loop through the rows of data
				    while ( have_rows('slider_repeter') ) : the_row();
						$post_object = get_sub_field('title');
						if( $post_object ): 
							// override $post
							$post = $post_object;
							setup_postdata( $post ); 
							?>
						    <li>
							 <div class="slide_img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
							 
			                 <div class="slide_content">
			                 
				                <!--  <div class="slide_para"><?php  //the_content(); ?></div> -->
							 <div class="slide_title"><h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5></div>
				             <div class="sliderDate">
				             	<div class="slidecat-name">
				             		 <?php  
					                   $post = get_post();
					                   $term_names = wp_get_post_terms($post->ID, 'interviews_category', array('fields' => 'all')); // returns an array of term names
											
											foreach ( $term_names as $term ) {
											    $term_link = get_term_link( $term );
											    if ( is_wp_error( $term_link ) ) {
											        continue;
											    }
											    echo '<span class="name_tag"><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></span>';
											}
										//echo implode('</span> <span class="name_tag"> ', $term_names);
									  ?>
					                  <?php
										 	 $post = get_post();
						                   $term_names = wp_get_post_terms($post->ID, 'category', array('fields' => 'all')); // returns an array of term names
												foreach ( $term_names as $term ) {
												    $term_link = get_term_link( $term );
												    if ( is_wp_error( $term_link ) ) {
												        continue;
												    }
												    echo '<span class="name_tag"><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></span>';
												}
											//echo implode('</span> <span class="name_tag"> ', $term_names);
										  ?>
									
					                </div>
								 <div class="slide_date">
								 	<div class="user_date">
										<span> <i class="fa fa-user" aria-hidden="true"></i>
											<?php $custom_author = get_field('custo_post_author');
											 if($custom_author){

											 	echo $custom_author;

											 }else{
											 	echo get_the_author();
											 }
											  ?>
								 </div>	
				                </div>
				            </div>
				        </div>
				  </li>
				    <?php wp_reset_postdata(); 
				    endif; 
				    endwhile;
				endif;
				?>

		</ul>	
	</div>

			<div class="col-lg-4">
				<div class="fresh-single">
					<div class="page_heading-fresh-left text-left"><a href="<?php echo site_url(); ?>/share-story">#अपनी कहानी साझा करें </a> </div>
					<div class="page_heading-fresh-right text-right"><a href="<?php echo site_url(); ?>/share-start-up-story"> #फ्रेश कहानिया साझा करे </a></div>	
					
							<?php
							$args = array(
							    'post_type' => 'interviews',
							    'posts_per_page'	=> 1,
							    'tax_query' => array(
							        array(
							            'taxonomy' => 'interviews_category',
							            'field' => 'slug', //can be set to ID
							            'terms' => 'fresh-basket' //if field is ID you can reference by cat/term number
							        )
							    )
							);
							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post();

							?>
								<div class="fresh-story-box">
			                    <div class="post_details">
									<div class="cat-names">
					               <?php  
					                   $post = get_post();
					                   $term_names = wp_get_post_terms($post->ID, 'interviews_category', array('fields' => 'all')); // returns an array of term names
											
											foreach ( $term_names as $term ) {
											    $term_link = get_term_link( $term );
											    if ( is_wp_error( $term_link ) ) {
											        continue;
											    }
											    echo '<span class="name_tag sss"><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></span>';
											}
										//echo implode('</span> <span class="name_tag"> ', $term_names);
									  ?>
									 <div class="post-share-icon">
									<span class="on_hover"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
									<div class="showhide slider-left-social">
									<?php echo  othr_crunchify_social_sharing_buttons($socailshare); ?>
								</div>
								</div>
					                </div>
			                	 <div class="feature-title"><h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h5></div>
								  
								 <div class="post_para features-str">
								 	<?php $content = get_the_content();
									$trimmed_content = wp_trim_words( $content, 30, NULL );
									echo $trimmed_content; ?>
								 </div>	
								  
								 <div class="date_time readmore-fresh">
								 		<a class="slider-left-box-a" href="<?php echo site_url(); ?>/interviews_category/fresh-basket">और पढ़े फ्रेश कहनी </a>
								 	</div>					
			                
			                	</div>
			               	</div>	
							<?php
							endwhile;
						?>					
				</div>
			</div>
		</div>
	</div>
	</div>				


		<!-- FEATURED STORIES  Start-->

<div class="container">
		        	<div class="story-section first-story-box">
				<div class="page_heading heading-border"><h3 class="home_heading">प्रमुख कहानियां </h3> <span class="page_heading-see-all"><a href="<?php echo site_url(); ?>/all-stories">सभी देखें</a> </span></div>

			<div class="row">
				<?php
				//$myf = get_field('featured_story');
					$args = array(
					'post_type'		=> 'interviews',
					'posts_per_page'	=> 8,
					'meta_query'		=> array(
						array(
							'key' => 'featured_story',
							'value' => $myf,
							'compare' => '!=',
							)
						)
					);
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();

				?>
					<div class="col-lg-3 col-md-6 story-box">
                    <div class="post_details">
                    <div class="fix_img">
					 <div class="post_thumbnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
                     
				<div class="cat-name">
               <?php  
                   $post = get_post();
                   $term_names = wp_get_post_terms($post->ID, 'interviews_category', array('fields' => 'all')); // returns an array of term names
						
						foreach ( $term_names as $term ) {
						    $term_link = get_term_link( $term );
						    if ( is_wp_error( $term_link ) ) {
						        continue;
						    }
						    echo '<span class="name_tag"><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></span>';
						}
					//echo implode('</span> <span class="name_tag"> ', $term_names);
				  ?>
				 
                </div>
                </div>
                
                	 <div class="feature-title"><h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5></div>
					  
					 <div class="post_para features-str">
					 	<?php $content = get_the_content();
						$trimmed_content = wp_trim_words( $content, 16, NULL );
						echo $trimmed_content; ?>
					 </div>	
					 <div class="date_time">
					 	<span><i class="fa fa-user" aria-hidden="true"></i> 
					 	<?php $custom_author = get_field('custo_post_author');
											 if($custom_author){

											 	echo $custom_author;

											 }else{
											 	?>
											<?php echo get_the_author(); ?> <?php
											 }
											  ?>


					 	</span>
					 	 <!-- <p class="right_time"><i class="fa fa-clock-o" aria-hidden="true"></i><span> <?php  //echo get_the_date( M ); ?></span> <span> <?php //echo get_the_date( d ); ?>,<?php  //echo get_the_date( Y); ?></span></p> -->
					 	</div>	
					 	 <div class="post-share-icon">
							<span class="on_hover"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
							<div class="showhide story-social">
							<?php echo  othr_crunchify_social_sharing_buttons($socailshare); ?>
						</div>
						</div>				
                
                	</div>
               	</div>	
				<?php
				endwhile;
			?>
			</div></div></div>
			<!-- FEATURED STORIES  End-->

						<!-- LATEST STORY start  -->
						<div class="container">
                        <div class="story-section latest-story">
                        	<div class="page_heading heading-border"><h3 class="home_heading">नवीनतम कहानियां </h3> <span class="page_heading-see-all"><a href="<?php echo site_url(); ?>/all-stories">सभी देखें</a> </span></div>
								<div class="row">
						
										<?php
										$tech = 1;	
										$args = array( 'post_type' => 'interviews', 'posts_per_page' => 9  );
										$loop = new WP_Query( $args );
										while ( $loop->have_posts() ) : $loop->the_post(); ?>
											<?php if($tech < 3): ?>
												<div class="col-lg-4 col-md-6 left_technology">
												
												<div class="tech_thumbnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
												<div class="cat-name">
								                 <?php  
								                   $post = get_post();
								                   $term_names = wp_get_post_terms($post->ID, 'interviews_category', array('fields' => 'all')); // returns an array of term names
														
														foreach ( $term_names as $term ) {
														    $term_link = get_term_link( $term );
														    if ( is_wp_error( $term_link ) ) {
														        continue;
														    }
														    echo '<span class="name_tag"><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></span>';
														}
													//echo implode('</span> <span class="name_tag"> ', $term_names);
												  ?>
								                </div>

												<div class="fixed-height">
												 <div class="feature-title"><h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5></div>

												 <div class="post_para"> <?php $content = get_the_content();
												$trimmed_content = wp_trim_words( $content, 40, NULL );
												echo $trimmed_content; ?>
												
												</div>
												<div class="user_date">
													<span><i class="fa fa-user" aria-hidden="true"></i> 
													 	<?php $custom_author = get_field('custo_post_author');
																			 if($custom_author){

																			 	echo $custom_author;

																			 }else{
																			 	 echo get_the_author(); 
																			 }
																			  ?>


													 	</span>
													<!-- <span class="right_span"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php  echo get_the_date( M ); echo get_the_date( d ); ?>,<?php  echo get_the_date( Y); ?></span> -->
												</div>
												<div class="post-share-icon">
													<span class="on_hover"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
													<div class="showhide">
													<?php echo  othr_crunchify_social_sharing_buttons($socailshare); ?>
												</div>
												</div>
												</div>
                                                <div class="read-more"><a class="Read_More" href="<?php the_permalink(); ?>">और पढो</a></div>
 
												</div>
                                                
                                               
											<?php else : ?>
											<?php endif; ?>
											<?php $tech ++; ?>
										<?php endwhile;	?>
                                           <div class="col-lg-4 col-md-6 blogs-post">
                                               <?php $args = array( 'post_type' => 'interviews', 'posts_per_page' => 5, 'offset' => 2  );
										$loop = new WP_Query( $args );
										while ( $loop->have_posts() ) : $loop->the_post(); ?>
												<div class="right_boxess">
                                             
												<div class="right_box_thumbnail">

													<div class="ovrflow-imgs">
														<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'full' ); ?></a>
                                                </div>
                                                
                                                <!-- <div class="user_content">
                                                	<div class="user_date">
														<span> <i class="fa fa-user" aria-hidden="true"></i><a href="<?php //echo get_author_posts_url( $post->post_author ); ?>"><?php //echo get_the_author(); ?></a></span>
														 <span class="right_span"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php  //echo get_the_date( M ); echo get_the_date( d ); ?>,<?php  //echo get_the_date( Y); ?></span> 
													</div>	
												</div> -->
                                                
                                                </div>
                                                 
												   <div class="right_box_contents">
												   	<div class="cat-names">
								                 <?php  
								                   $post = get_post();
								                   $term_names = wp_get_post_terms($post->ID, 'interviews_category', array('fields' => 'all')); // returns an array of term names
														
														foreach ( $term_names as $term ) {
														    $term_link = get_term_link( $term );
														    if ( is_wp_error( $term_link ) ) {
														        continue;
														    }
														    echo '<span class="name_tag ss"><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></span>';
														}
													//echo implode('</span> <span class="name_tag"> ', $term_names);
												  ?>
								                </div>
												 <div class="feature-title"><h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5></div>
                                                   <!--  <div class="read-more"><a class="Read_More" href="<?php //the_permalink(); ?>">Read More</a></div> -->
                                                   	
													</div>
												</div>
                                                 <?php endwhile;	?>

												</div>
											
								
							</div>
						</div>
					</div>
						<!-- LATEST STORY end  -->



<!-- custom editor -->

<?php $id_first = get_option('myplugin_option_name_post'); 
           // echo get_the_post_thumbnaill($id_first); 
           // echo get_the_title($id_first);

            ?>

<br><?php $id_second = get_option('myplugin_option_name_post2');
   // echo get_the_post_thumbnail($id_second); 
   // echo get_the_title($id_second);
 ?>


 <br><?php $id_third = get_option('myplugin_option_name_post3');
   // echo get_the_post_thumbnail($id_third); 
    //echo get_the_title($id_third);
   // echo $id_third;
 ?>

<div class="container">
<div class="edit_pick_secton">	
	      <div class="page_heading heading-border"><h3 class="home_heading">संपादकों की पसंद </h3> </div>

		<div class="row">
	<div class="col-lg-12 edit_left">
                <div class="edit_left_border">
               
				
								<div class="edit_box_left col-lg-4">
									<div class="edit_thumbnail"><a href="<?php  echo get_permalink($id_first); ?>"><?php

									echo get_the_post_thumbnail($id_first);
									 ?> </a></div>
										<div class="cat-name">
					                    <?php
										 	 $post = get_post();
						                   $term_names = wp_get_post_terms($post->ID, 'category', array('fields' => 'all')); // returns an array of term names
												foreach ( $term_names as $term ) {
												    $term_link = get_term_link( $term );
												    if ( is_wp_error( $term_link ) ) {
												        continue;
												    }
												    echo '<span class="name_tag"><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></span>';
												}
											//echo implode('</span> <span class="name_tag"> ', $term_names);
										  ?>
										  	<?php
											 	 $post = get_post();
							                   $term_names = wp_get_post_terms($post->ID, 'interviews_category', array('fields' => 'all')); // returns an array of term names
													foreach ( $term_names as $term ) {
													    $term_link = get_term_link( $term );
													    if ( is_wp_error( $term_link ) ) {
													        continue;
													    }
													    echo '<span class="name_tag"><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></span>';
													}
												//echo implode('</span> <span class="name_tag"> ', $term_names);
											  ?>
									 
					                </div>
                                    <div class="feature-title post_matter"><h5><a href="<?php the_permalink($id_first); ?>"><?php echo get_the_title($id_first); ?></a></h5></div>
									<div class="user_date"><span class="display-inline-block"><i class="fa fa-user" aria-hidden="true"></i>
										<?php
											$author_id = get_post_field ('post_author', $id_first);
											$display_name = get_the_author_meta( 'display_name' , $author_id ); 
											echo $display_name;
											 ?></span>
                                             <div class="post-share-icon">
										<span class="on_hover"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
										<div class="showhide">
											<div class="crunchify-social">
											<h5>Share via:</h5>
											<a class=" fa fa-twitter" href="https://twitter.com/intent/tweet?text=<?php echo get_the_title($id_first); ?>&url=<?php the_permalink($id_first); ?>" target="_blank"><span class="text-hide">Twitter</span></a>
											<a class=" fa fa-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink($id_first); ?>" target="_blank"><span class="text-hide">instagram</span><span class="text-hide">Facebook</span></a>
											<a class=" fa fa-pinterest-p" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink($id_first)?>&media=<?php wp_get_attachment_image_src( get_post_thumbnail_id( $loop->ID ), 'full' ) ?>&description=<?php echo get_the_title($id_first)?>" data-pin-custom="true" target="_blank"><span class="text-hide">Pin It</span></a>
											<a class=" fa fa-whatsapp" href="whatsapp://send?text=<?php echo get_the_title($id_first); ?> – <?php urlencode(the_permalink($id_first));?>" data-action="share/whatsapp/share"  data-pin-custom="true" target="_blank"><span class="text-hide">WhatApp</span></a>
										</div>
										<?php //echo  othr_crunchify_social_sharing_buttons($socailshare); ?>
									</div>
									</div>
                                             
										<span class="right_span"> <i class="fa fa-clock-o" aria-hidden="true"></i><?php  echo get_the_date( M ); echo get_the_date( d ); ?>,<?php  echo get_the_date( Y); ?></span>
									</div>
									
                                     <div class="post_para">
                                     			<div class="fix-align"> <?php
                                     			$post_object = get_post( $id_first );
                								$trimmed =  $post_object->post_content;
                								echo $trimmed_cont = wp_trim_words( $trimmed, 22, NULL );
                								 ?></div>

												<div class="read-more"><a class="Read_More" href="<?php the_permalink($id_first); ?>">और पढो </a></div>

												</div> 

								</div>
									<div class="edit_box_left col-lg-4">
									<div class="edit_thumbnail"><a href="<?php  echo get_permalink($id_second); ?>"><?php

									 echo get_the_post_thumbnail($id_second); ?></a></div>
										<div class="cat-name">
						                   <?php  
						                   $post = get_post();
						                   $term_names = wp_get_post_terms($post->ID, 'interviews_category', array('fields' => 'all')); // returns an array of term names
												foreach ( $term_names as $term ) {
												    $term_link = get_term_link( $term );
												    if ( is_wp_error( $term_link ) ) {
												        continue;
												    }
												    echo '<span class="name_tag"><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></span>';
												}
											//echo implode('</span> <span class="name_tag"> ', $term_names);
										  ?>
										  <?php
										 	 $post = get_post();
						                   $term_names = wp_get_post_terms($post->ID, 'category', array('fields' => 'all')); // returns an array of term names
												foreach ( $term_names as $term ) {
												    $term_link = get_term_link( $term );
												    if ( is_wp_error( $term_link ) ) {
												        continue;
												    }
												    echo '<span class="name_tag"><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></span>';
												}
											//echo implode('</span> <span class="name_tag"> ', $term_names);
										  ?>
					                </div>
					                <div class="feature-title post_matter"><h5> <a href="<?php echo get_permalink($id_second); ?>"><?php echo get_the_title($id_second); ?></a>  </h5></div>
									<div class="user_date"><span class="display-inline-block"><i class="fa fa-user" aria-hidden="true"></i>
										<?php $author_id = get_post_field ('post_author', $id_second);
											$display_name = get_the_author_meta( 'display_name' , $author_id ); 
											echo $display_name;
											?>
									</span>
                                    <div class="post-share-icon">
										<span class="on_hover"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
										<div class="showhide">
											<div class="crunchify-social">
											<h5>Share via:</h5>
											<a class=" fa fa-twitter" href="https://twitter.com/intent/tweet?text=<?php echo get_the_title($id_second); ?>&url=<?php the_permalink($id_second); ?>" target="_blank"><span class="text-hide">Twitter</span></a>
											<a class=" fa fa-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink($id_second); ?>" target="_blank"><span class="text-hide">instagram</span><span class="text-hide">Facebook</span></a>
											<a class=" fa fa-pinterest-p" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink($id_second)?>&media=<?php wp_get_attachment_image_src( get_post_thumbnail_id( $loop->ID ), 'full' ) ?>&description=<?php echo get_the_title($id_second)?>" data-pin-custom="true" target="_blank"><span class="text-hide">Pin It</span></a>
											<a class=" fa fa-whatsapp" href="whatsapp://send?text=<?php echo get_the_title($id_second); ?> – <?php urlencode(the_permalink($id_second));?>" data-action="share/whatsapp/share"  data-pin-custom="true" target="_blank"><span class="text-hide">WhatApp</span></a>
										</div>
										<?php //echo  othr_crunchify_social_sharing_buttons($socailshare); ?>
									</div>
									</div>
										<span class="right_span"> <i class="fa fa-clock-o" aria-hidden="true"></i><?php  echo get_the_date( M ); echo get_the_date( d ); ?>,<?php  echo get_the_date( Y); ?></span>
									</div>
									
                                     <div class="post_para"> 
                                     		<div class="fix-align">	<?php $post_object = get_post( $id_second );
                								$trimmed =  $post_object->post_content;
                								echo $trimmed_cont = wp_trim_words( $trimmed, 22, NULL ); ?></div>
												<div class="read-more"><a class="Read_More" href="<?php the_permalink($id_second); ?>">और पढो </a></div>

										</div> 
								</div>

									<div class="edit_box_left col-lg-4">
									<div class="edit_thumbnail"><a href="<?php  echo get_permalink($id_third); ?>"><?php

									 echo get_the_post_thumbnail($id_third); ?></a></div>
										<div class="cat-name">
						                   <?php  
						                   $post = get_post();
						                   $term_names = wp_get_post_terms($post->ID, 'interviews_category', array('fields' => 'all')); // returns an array of term names
												foreach ( $term_names as $term ) {
												    $term_link = get_term_link( $term );
												    if ( is_wp_error( $term_link ) ) {
												        continue;
												    }
												    echo '<span class="name_tag"><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></span>';
												}
											//echo implode('</span> <span class="name_tag"> ', $term_names);
										  ?>
										  <?php
										 	 $post = get_post();
						                   $term_names = wp_get_post_terms($post->ID, 'category', array('fields' => 'all')); // returns an array of term names
												foreach ( $term_names as $term ) {
												    $term_link = get_term_link( $term );
												    if ( is_wp_error( $term_link ) ) {
												        continue;
												    }
												    echo '<span class="name_tag"><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></span>';
												}
											//echo implode('</span> <span class="name_tag"> ', $term_names);
										  ?>
					                </div>
										<div class="feature-title post_matter"><h5> <a href="<?php echo get_permalink($id_third); ?>"><?php echo get_the_title($id_third); ?></a>  </h5></div>
									<div class="user_date"><span class="display-inline-block"><i class="fa fa-user" aria-hidden="true"></i>
										<?php $author_id = get_post_field ('post_author', $id_third);
											$display_name = get_the_author_meta( 'display_name' , $author_id ); 
											echo $display_name;
											?>
										</span>
                                    <div class="post-share-icon">
										<span class="on_hover"><i class="fa fa-share-alt" aria-hidden="true"></i></span>

										<div class="showhide">
										<div class="crunchify-social">
											<h5>Share via:</h5>
											<a class=" fa fa-twitter" href="https://twitter.com/intent/tweet?text=<?php echo get_the_title($id_third); ?>&url=<?php the_permalink($id_third); ?>" target="_blank"><span class="text-hide">Twitter</span></a>
											<a class=" fa fa-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink($id_third); ?>" target="_blank"><span class="text-hide">instagram</span><span class="text-hide">Facebook</span></a>
											<a class=" fa fa-pinterest-p" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink($id_third)?>&media=<?php wp_get_attachment_image_src( get_post_thumbnail_id( $loop->ID ), 'full' ) ?>&description=<?php echo get_the_title($id_third)?>" data-pin-custom="true" target="_blank"><span class="text-hide">Pin It</span></a>
											<a class=" fa fa-whatsapp" href="whatsapp://send?text=<?php echo get_the_title($id_third); ?> – <?php urlencode(the_permalink($id_third));?>" data-action="share/whatsapp/share"  data-pin-custom="true" target="_blank"><span class="text-hide">WhatApp</span></a>
										</div>	
										<?php //echo  othr_crunchify_social_sharing_buttons($socailshare); ?>

									</div>
									</div>
										<span class="right_span"> <i class="fa fa-clock-o" aria-hidden="true"></i><?php  echo get_the_date( M ); echo get_the_date( d ); ?>,<?php  echo get_the_date( Y); ?></span>
									</div>
									
                                     <div class="post_para"><div class="fix-align"> <?php $post_object = get_post( $id_third );
                								$trimmed =  $post_object->post_content;
                								echo $trimmed_cont = wp_trim_words( $trimmed, 22, NULL ); ?></div>
												<div class="read-more"><a class="Read_More" href="<?php the_permalink($id_third); ?>">और पढो</a></div>

										</div> 
								</div>

								</div>

							</div>
						</div>
					</div>
				</div>

<!-- custom editor end -->

					<!-- Life Quotes START -->
					<div class="container">
                    <div class="life_quote_sectn">
                    <div class="life-quot">चित्र उद्धरण -  <a href=""> फेसबुक,</a><a href=""> ट्विटर,</a><a href="">गूगल+,</a> और <a href=""> पिनटेरेस्ट </a> पर हमारे सुंदर उद्धरण साझा करें। <a href="<?php echo site_url(); ?>/life-quote"> अधिक तस्वीर -> </a> </div>
				<ul>
		
					<?php
					$args = array( 'post_type' => 'life_quotes', 'posts_per_page' => 5 ,'category' => 37  );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();?>
					<li>
						<?php if( get_field( "video_url")) {?>
						<a href="<?php the_permalink(); ?>"><iframe width="315" height="150" src="https://www.youtube.com/embed/<?php  echo $value = get_field( "video_url"); ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
						</a>
						<div class="feature-title"><h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5></div>
						<?php } else { ?>
						<div class="life_img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
						<div class="feature-title"><h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5></div>
						<?php } ?>
							<div class="social_icon">
								<a class=" fa fa-twitter" href="https://twitter.com/intent/tweet?text=<?php the_title() ?>&url=<?php the_permalink(); ?>" target="_blank"><span class="text-hide">Twitter</span></a>
								<a class=" fa fa-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><span class="text-hide">instagram</span><span class="text-hide">Facebook</span></a>
								<a class=" fa fa-pinterest-p" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink()?>&media=<?php wp_get_attachment_image_src( get_post_thumbnail_id( $loop->ID ), 'full' ) ?>&description=<?php the_title()?>" data-pin-custom="true" target="_blank"><span class="text-hide">Pin It</span></a>
								<a class=" fa fa-whatsapp" href="whatsapp://send?text=<?php the_title(); ?> – <?php urlencode(the_permalink());?>" data-action="share/whatsapp/share"  data-pin-custom="true" target="_blank"><span class="text-hide">WhatApp</span></a>
							</div>
						</li>
					<?php endwhile;	?>
					</ul>
				</div></div>
				<!-- Life Quotes START -->

				<!-- Latest blog and post  Start-->
				<div class="container">
        	<div class="story-section">
                <div class="page_heading heading-border"><h3 class="home_heading">ब्लॉग और समाचार </h3> <span class="page_heading-see-all"><a href="<?php echo site_url(); ?>/blog">सभी देखें </a> </span></div>
			<div class="row">
				<?php
					$args = array( 	'post_type'	=> 'post', 'posts_per_page'	=> 4, 
					);
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();

				?>
					<div class="col-lg-3 col-md-6 story-box">
                    <div class="post_details">
                    <div class="fix_img">
					 <div class="post_thumbnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
					
					<div class="cat-name">
 
                   <?php  
		                   $post = get_post();
		                   $term_names = wp_get_post_terms($post->ID, 'interviews_category', array('fields' => 'all')); // returns an array of term names
								foreach ( $term_names as $term ) {
								    $term_link = get_term_link( $term );
								    if ( is_wp_error( $term_link ) ) {
								        continue;
								    }
								    echo '<span class="name_tag"><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></span>';
								}
							//echo implode('</span> <span class="name_tag"> ', $term_names);
						  ?>

						 <?php
						 	 $post = get_post();
		                   $term_names = wp_get_post_terms($post->ID, 'category', array('fields' => 'all')); // returns an array of term names
								foreach ( $term_names as $term ) {
								    $term_link = get_term_link( $term );
								    if ( is_wp_error( $term_link ) ) {
								        continue;
								    }
								    echo '<span class="name_tag"><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></span>';
								}
							//echo implode('</span> <span class="name_tag"> ', $term_names);
						  ?>
                </div>
            </div>
                	 <div class="feature-title"><h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5></div>
					 <div class="date_time">
					 	<span class="display-inline-block"><i class="fa fa-user" aria-hidden="true"></i> 
						 	<?php $custom_author = get_field('custo_post_author');
												 if($custom_author){

												 	echo $custom_author;

												 }else{
												 	echo get_the_author(); 
												 }
												  ?>

						 	</span>
							<div class="post-share-icon">
							<span class="on_hover"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
							<div class="showhide story-social">
							<?php echo  othr_crunchify_social_sharing_buttons($socailshare); ?>
						</div>
						</div>
					  <p class="right_time"><i class="fa fa-clock-o" aria-hidden="true"></i><span> <?php  echo get_the_date( M ); ?></span> <span> <?php echo get_the_date( d ); ?>,<?php  echo get_the_date( Y); ?></span></p>
					</div>	
									
                
                	</div>
                	</div>	
				<?php
				endwhile;
			?>
<!-- 			<div class="view-all-post text-center read-more"><a class="text-center view-alls Read_More" href="<?php //echo site_url() ?>/blog">View All</a></div>
 -->
			</div></div></div>
			<!-- latest  End-->


</div>
	</div>

<?php get_footer();?>

<script type="text/javascript">
	/*slider*/
jQuery(document).ready(function($){
    
    $(window).load(function() {
      $('.flexslider').flexslider({
        animation: "slide",
        slideshow: true,
      });
    });

    });
/*end slider*/

</script>


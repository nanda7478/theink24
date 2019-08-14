<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<?php if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
	<div class="col-lg-3 right-int"> 
	<aside id="secondary" class="sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>


	</aside><!-- .sidebar .widget-area -->
</div>
<?php endif; ?>

<div class="col-lg-3 right-int"> 
		<section class="latest-fress" id="nav_menu-fresh">
					<div class="fresh-single">
					<div class="page_heading-fresh-left text-left"><a href="<?php echo site_url(); ?>/share-story">#अपनी कहानी साझा करें </a> </div>
					<div class="page_heading-fresh-right text-right"><a href="<?php echo site_url(); ?>/share-start-up-story">#चालू  कहानी साझा करें </a></div>	
					
							<?php
							if ( is_single() ) {
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
									 
					                </div>
			                	 <div class="feature-title"><h5> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h5></div>
								  
								 <div class="post_para features-str">
								 	<?php $content = get_the_content();
									$trimmed_content = wp_trim_words( $content, 30, NULL );
									echo $trimmed_content; ?>
								 </div>	
								 <div class="date_time readmore-fresh">
								 		<a href="<?php echo site_url(); ?>/interviews_category/fresh-basket">और पढ़ें ताजा कहानी</a>
								 	</div>					
			                
			                	</div>
			               	</div>	
							<?php
							endwhile;
						} elseif ( is_search() ) {

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
									 
					                </div>
			                	 <div class="feature-title"><h5> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h5></div>
								  
								 <div class="post_para features-str">
								 	<?php $content = get_the_content();
									$trimmed_content = wp_trim_words( $content, 30, NULL );
									echo $trimmed_content; ?>
								 </div>	
								 <div class="date_time readmore-fresh">
								 		<a href="<?php echo site_url(); ?>/interviews_category/fresh-basket">और पढ़ें ताजा कहानी</a>
								 	</div>					
			                
			                	</div>
			               	</div>	
							<?php
							endwhile;
   
							} else{
								echo '';
							}
						?>
				</div>
			</section>



	<!--<aside id="secondary" class="sidebar widget-area" role="complementary">-->
		<section class="widget widget_nav_menu side_scton" id="nav_menu-3">
					<h2 class="widget-title">श्रेणियाँ </h2>
						<ul class="side-cat">
						<?php
							$args = array('pad_counts' => true, 'get' => 'all');
							$cats = get_terms('interviews_category', $args);
							?>
							<?php foreach( $cats as $category ) : ?>
							<li>
								<a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->name; ?></a>
								<span class="count-numb"><?php echo $category->count; ?></span>
								<?php unset( $category ); ?>
							<?php endforeach; unset( $cats ); ?>
						</li>
						</ul>
			</section>
					<section class="recent_post">
				 <ul class="nav nav-pills">
				    <li class="active"><a data-toggle="pill" href="#recent">हाल के पोस्ट </a></li>
				    <li><a data-toggle="pill" href="#popular">लोकप्रिय पोस्ट </a></li>
				  </ul>

				    <div class="tab-content">
					    <div id="recent" class="tab-pane active">
			
						<?php
						    $recent_posts = wp_get_recent_posts(array('post_status'=>'publish','post_type'=>'interviews', 'posts_per_page' => 3 ));
						    foreach( $recent_posts as $recent ){
								?>
                                <div class="tab_content">
                                	<div class="img-title-fix">
                                	<div class="ovrflow-img">
											<?php	echo	'<a href="' . get_permalink($recent["ID"]) . '">'; ?><?php echo get_the_post_thumbnail( $recent["ID"] ); ?>
										
								<?php	echo	'</a>'; ?>
                                    </div>
                                     <div class="title-fix">
		                                 <?php
								        echo '<a class="posts-title-bold" href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> ';
											?>
								</div>
							</div>
							 <div class="date-socail-fix">
								 <div class="date_time">
								 	<span><i class="fa fa-user" aria-hidden="true"></i> 

									 	<?php 
									 	 $au_id = $recent['ID'];
										 $custom_author = get_field('custo_post_author' , $au_id);
																 if($custom_author){

															 	echo $custom_author;

															 }else{
															 	the_author_meta( 'display_name', $recent['post_author'] ); 
															
															
															 }
															  ?>


									 	</span>
								 	 <!-- <p class="right_time"><i class="fa fa-clock-o" aria-hidden="true"></i>
								 	 	<span> <?php  //echo get_the_date( M ); ?></span> <span> <?php //echo get_the_date( d ); ?>,<?php  //echo get_the_date( Y); ?>
								 	 </span>
								 	</p> -->
								 </div>	
								 <div class="post-share-icon">
									<span class="on_hover"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
									<div class="showhide">
									<?php echo  othr_crunchify_social_sharing_buttons($socailshare); ?>
								</div>
								</div>	
								</div>			
								</div>
								<?php						    
						    }
						?>
                        </div>
					
				
					    <div id="popular" class="tab-pane fade">
					 <?php
					    global $post;
					    $args = array( 'orderby' => 'comment_count','numberposts' => 3, 'post_type' => 'interviews' );
					    $myposts = get_posts( $args );
					    foreach( $myposts as $post ) :  setup_postdata($post); ?>
					    <div class="tab_content">

					    	<div class="img-title-fix">
 							<div class="ovrflow-img">
 								<?php	echo	'<a href="' . get_permalink($post->ID) . '">'; ?><?php echo get_the_post_thumbnail($post->ID); ?>
										
								<?php	echo	'</a>'; ?>
                            </div>
                            <div class="title-fix">
								<a class="posts-title-bold" href="<?php the_permalink(); ?>" title="<?php printf(esc_attr('Permalink to %s'), the_title_attribute('echo=0')); ?>" rel="bookmark"><?php the_title(); ?></a>
							 </div>
							 </div>
							 <div class="date-socail-fix">
							 <div class="date_time">
							 	<span><i class="fa fa-user" aria-hidden="true"></i> 
								 	<?php $custom_author = get_field('custo_post_author');
														 if($custom_author){

														 	echo $custom_author;

														 }else{
														 	 echo get_the_author(); 
														 }
														  ?>


								 	</span>
							 	<!-- <p class="right_time"><i class="fa fa-clock-o" aria-hidden="true"></i>
							 		<span> <?php  //echo get_the_date( M ); ?></span> <span> <?php //echo get_the_date( d ); ?>,<?php  //echo get_the_date( Y); ?>
							 	</span>
							 </p> -->
							</div>	
							<div class="post-share-icon">
								<span class="on_hover"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
								<div class="showhide">
								<?php echo  othr_crunchify_social_sharing_buttons($socailshare); ?>
							</div>
							</div>
							</div>
											
						</div>
					    <?php endforeach; ?>
					    </div>
					   </div>
					</section>

	<!--</aside><!-- .sidebar .widget-area -->
</div>

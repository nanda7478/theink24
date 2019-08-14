<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	<div class="blog_page">
<div class="inner_page_headings">
<div class="container">
				<h3 class="inner_home_headings">Blog and News</h3>
                <div class="taxonomy-description">
                <p>Latest News and Blog</p>
</div>			</div></div>

<div class="container">
	<div id="primary" class="content-area">
		<!-- <main id="main" class="site-main" role="main">
 -->
		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>
			<div class="row">
			<div class="col-lg-9 col-md-12 left-intrv left_blogs">	
				<div class="top-section-div">
					<?php
			$tech = 1;	
			$args = array( 'post_type' => 'post', 'posts_per_page' => 9  );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<?php if($tech < 5): ?>
					<div class="left_technology-etc">
					<div class="main-top-section">
					<div class="tech_thumbnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
					

					<div class="blog_page_matter">
                    <div class="cat-name not-posistioning">
	                 <?php  
	                   $post = get_post();
	                   $term_names = wp_get_post_terms($post->ID, 'category', array('fields' => 'all')); // returns an array of term names
							
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
                    
					 <div class="feature-title"><h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5></div>
					<div class="post_para features-str">
					 	<?php $content = get_the_content();
						$trimmed_content = wp_trim_words( $content, 25, NULL );
						echo $trimmed_content; ?>
					 </div>
					
					<!-- </div> -->
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
				</div>
					
                   <!--  <div class="read-more"><a class="Read_More" href="<?php //the_permalink(); ?>">Read More</a></div> -->

					</div>
                    <div class="clearfix"></div>
                   
				<?php else : ?>
				<?php endif; ?>
				<?php $tech ++; ?>
			<?php endwhile;	?>
              </div>
              <div class="row">
            <?php $args = array( 'post_type' => 'post', 'posts_per_page' => 10, 'offset' => 4  );
			$loop = new WP_Query( $args );
			if($loop->have_posts()){
				?>
				<div class="col-lg-12 col-md-12 ">
				<div class="page_heading"><h3 class="home_heading">More Blog</h3></div>
			</div>
				 <?php
			}
			while ( $loop->have_posts() ) : $loop->the_post(); ?>

			<div class="col-lg-4 col-md-6 blog_box">
                    <div class="post_details">
                    <div class="fix_img">
					<div class="post_thumbnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
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
												 	 echo get_the_author(); 
												 }
												  ?>


						 	</span>
					 	 <!-- <p class="right_time"><i class="fa fa-clock-o" aria-hidden="true"></i><span> <?php  //echo get_the_date( M ); ?></span> <span> <?php //echo get_the_date( d ); ?>,<?php  //echo get_the_date( Y); ?></span></p> -->
					 	</div>	

					 	<div class="post-share-icon">
							<span class="on_hover"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
							<div class="showhide">
							<?php echo  othr_crunchify_social_sharing_buttons($socailshare); ?>
							</div>
						</div>				
                
                	</div>
               	</div>
                     <?php endwhile;	?>

				



			<?php
			// Start the loop.
			//while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				//get_template_part( 'template-parts/content', get_post_format() );

			// End the loop.
			//endwhile;

			// Previous/next page navigation.
			/*the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentysixteen' ),
				'next_text'          => __( 'Next page', 'twentysixteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
			) );*/

		// If no content, include the "No posts found" template.
		//else :
			//get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
	
		</div>	

	<!-- .site-main -->

	</div><!-- .content-area -->

<?php get_sidebar(); ?>
</div></div></div></div>

<?php get_footer(); ?>

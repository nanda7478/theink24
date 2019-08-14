<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
<div class="container">
<div class="post_details space_top_mar">
<div class="row">
<div class="col-lg-9 left_details">
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the single post content template.
			get_template_part( 'template-parts/content', 'single' );
			echo '<div class="page_heading"><h3 class="home_heading">SIMILAR POSTS </h3></div>';

           ?>
             <div class="row space_left">
               <?php
				//get the taxonomy terms of custom post type
				$customTaxonomyTerms = wp_get_object_terms( $post->ID, 'category', array('fields' => 'ids') );

				//query arguments
				$args = array(
				    'post_type' => 'post',
				    'post_status' => 'publish',
				    'posts_per_page' => 3,
				    'orderby' => 'rand',
				    'tax_query' => array(
				        array(
				            'taxonomy' => 'category',
				            'field' => 'id',
				            'terms' => $customTaxonomyTerms
				        )
				    ),
				    'post__not_in' => array ($post->ID),
				);

				//the query
				$relatedPosts = new WP_Query( $args );

				//loop through query
				if($relatedPosts->have_posts()){
				    
				    while($relatedPosts->have_posts()){ 
				        $relatedPosts->the_post();
				?>
				        <div class="col-lg-4 col-md-6 story-box">
				                <div class="post_details">
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
				    }
				    
				}else{
				    //no posts found
				}

				//restore original post data
				wp_reset_postdata();



			

			// End of the loop.
		endwhile;
		?>
         </div>
         <?php
		 // If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			if ( is_singular( 'attachment' ) ) {
				// Parent post navigation.
				the_post_navigation( array(
					'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'twentysixteen' ),
				) );
			} elseif ( is_singular( 'post' ) ) {
				// Previous/next post navigation.
				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentysixteen' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Next post:', 'twentysixteen' ) . '</span> ' .
						'<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentysixteen' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Previous post:', 'twentysixteen' ) . '</span> ' .
						'<span class="post-title">%title</span>',
				) );
			}
		 ?>
	</main><!-- .site-main -->

	<?php //get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->
</div>
<?php get_sidebar(); ?>
</div></div></div>


<?php get_footer(); ?>

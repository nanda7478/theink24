<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div class="inner_page_headings">
<div class="container">
				<?php
				$current_category = get_queried_object();
				$category = get_queried_object();
				$cat_id  =  $category->term_id;
				$cat_name  =  $category->name;
				echo '<h3 class="inner_home_headings">' .$cat_name. '</h3>';

					//the_archive_title( '<h3 class="home_heading">', '</h3>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</div></div><!-- .page-header -->

<div class="container">
<div class="inteview-cats">
			<div class="row">
			<div class="col-lg-9 left-int">
				<div  class="row reach">
					<?php if ( have_posts() ) : ?>
					<?php
						$tech = 1;	
						$args = array( 'post_type' => 'post','posts_per_page' => 6,
						'tax_query' => array(
					        array(
					            'taxonomy' => 'category',
					            'field' => 'id',
					            'terms' => $cat_id
					        )
					        )

						//$args = array( 'post_type' => 'post', 'posts_per_page' => 9 , 'taxonomy' => 'category'
							 );
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
                    
                   
				<?php else : ?>
				<?php endif; ?>
				<?php $tech ++; ?>
			<?php endwhile;	?>
              </div>
              <div class="row" id="ajax-posts">
            <?php 
            $count  = 1;
            $args = array( 'post_type' => 'post',  'offset' => 4 , 'posts_per_page' => 6,
			'tax_query' => array(
					        array(
					            'taxonomy' => 'category',
					            'field' => 'id',
					            'terms' => $cat_id
					        )
					        )

             );

			$loop = new WP_Query( $args );
			if($loop->have_posts()){

				?>
				<div class="col-lg-12 col-md-12 ">
				<div class="page_heading"><h3 class="home_heading">More <?php echo $cat_name; ?></h3></div>
			</div>
				 <?php
			}
			while ( $loop->have_posts() ) : $loop->the_post();  $count++; ?>

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
                     <?php endwhile;

		else :
echo '<div class="col-lg-12 col-md-12 "><h3 class="home_heading text-center">Post not found</h3></div>';
			endif;  
		?>


		<!-- </main> --><!-- .site-main -->
	<!-- </div> --><!-- .content-area -->
</div>
<?php if($count > 6){ ?>
<div class="laod-more text-center"><a data-category="<?php echo  $cat_id; ?>" class="load-more-buuton " id="more_posts">Load More</a></div>
<?php } ?>
</div>
<?php get_sidebar(); 
 ?>

</div>
</div>
</div>
<?php get_footer(); ?>

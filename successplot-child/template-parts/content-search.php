<?php
/**
 * The template part for displaying results in search pages
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>





<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="page_heading"><?php the_title( '<h3 class="home_heading">', '</h3>' ); ?></div>
		<div class="both-cat">
		<div class="cat-names-details">

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
				<!-- <p class="right_time"><i class="fa fa-clock-o" aria-hidden="true"></i><span> <?php  //echo get_the_date( M ); ?></span> <span> <?php //echo get_the_date( d ); ?>,<?php  //echo get_the_date( Y); ?></span>
				</p> -->
			</div>					
		</div>
	</header><!-- .entry-header -->

	
	
	<div class="img-socailicon">
		<?php echo crunchify_social_sharing_buttons($content); ?>
	<?php

		if( get_field('video_url') ){
			?>
		<!-- <iframe width="840" height="473" src="https://www.youtube.com/embed/<?php //the_field('video_url'); ?>?autoplay=1" frameborder="0"  encrypted-media allowfullscreen></iframe> -->

				<iframe width="840" height="473" src="https://www.youtube.com/embed/<?php the_field('video_url'); ?>?rel=0;showinfo=0;autoplay=1" frameborder="0"  encrypted-media allowfullscreen></iframe> 

			<?php
		}else{

			twentysixteen_post_thumbnail();

		}
 ?>
</div>
<?php twentysixteen_excerpt(); ?>


</article><!-- #post-## -->



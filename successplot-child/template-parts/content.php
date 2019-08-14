<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
<div class="col-lg-4 col-md-6 blogs-post">
<div class="post_details">	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<span class="sticky-post"><?php _e( 'Featured', 'twentysixteen' ); ?></span>
		<?php endif; ?>

		<?php //the_title( sprintf( '<div class="entry-titles"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></div>' ); ?>
	</header><!-- .entry-header -->

	<?php //twentysixteen_excerpt(); ?>

	<?php //twentysixteen_post_thumbnail(); ?>
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
					 <div class="feature-title"><h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5></div>
				<div class="date_time">
					<span><i class="fa fa-user" aria-hidden="true"></i> 
					 	<?php $custom_author = get_field('custo_post_author');
							 if($custom_author){

							 	echo $custom_author;

							 }else{
							 	?>
							<a href="<?php echo get_author_posts_url( $post->post_author ); ?>"><?php echo get_the_author(); ?></a> <?php
							 }
							  ?>


	 	</span>
	<!-- <p class="right_time">
		<i class="fa fa-clock-o" aria-hidden="true"></i>
		<span> <?php  //echo get_the_date( M ); ?></span> <span> <?php //echo get_the_date( d ); ?>,<?php  //echo get_the_date( Y); ?></span>
	</p> -->
</div>					
                
	<div class="entry-content">

		<?php
			/* translators: %s: Name of current post */
			/*the_content( sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
				get_the_title()
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );*/
		?>
	</div><!-- .entry-content -->

	<!-- <footer class="entry-footer"> -->
 		<?php //twentysixteen_entry_meta(); ?>
		<?php
			//edit_post_link(
			//	sprintf(
					/* translators: %s: Name of current post */
				//	__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
				//	get_the_title()
				//),
				//'<span class="edit-link">',
				//'</span>'
			//);
		//?>
	<!-- </footer> --><!-- .entry-footer -->
</article><!-- #post-## -->
</div>
</div>





<?php 
/* Template Name:  Who we are */
get_header();
 ?>
		 	<!-- Who we are  Start-->

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->

	<?php //get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->


<div id="team" class="our_team">
	<div class="team_details">
		<div class="page_heading_two">
		<h3>Our Team</h3>
		</div>
		<div id="team" class="our_team">
		<div class="team_details">
			<div id="id-awts-wrapper" class="awts-wrapper-main">
				<div class="awts-members"><header class="awts-header">
				<h1 class="awts-title"></h1>
				</header></div>

			<ul>
			<?php 
			if( have_rows('add_new_team_member') ):
			    while ( have_rows('add_new_team_member') ) : the_row(); ?>
			 	<li>
				<div class="mem-image"><img src="<?php the_sub_field('member_image'); ?>"></div>
				<div class="mem-short-det">
				<div class="mem-name"><?php the_sub_field('member_name'); ?></div>
				<div class="mem-role"><?php the_sub_field('member_position'); ?></div>
				</div></li>
				<?php 
			 endwhile;
			else :
			    // no rows found
			endif;
			?>

			</ul>
			</div>
		</div>
		</div>
	</div>
</div>

<?php get_footer(); 

?>			

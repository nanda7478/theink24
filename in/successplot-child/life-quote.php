<?php

/* Template Name: Life Quote*/
?>
<?php get_header();?>

<?php the_content(); ?>

<div class="container">
<div class="life_quote_page">
		<div class="row">

			<div class="col-md-12">
            <div class="row">
			<?php
				$args = array( 'post_type' => 'life_quotes' );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();
				?>
				<div class="col-lg-3 col-sm-6 life_quote_box">
                <div class="quote_box">
                	<?php if( get_field( "video_url")) {?>
						<iframe width="315" height="150" src="https://www.youtube.com/embed/<?php  echo $value = get_field( "video_url"); ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
						
						<?php } else { ?>
						<div class="life_img"> <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail(); ?></a>
							
						</div>
						<?php } ?>
						<div class="main-socail">
						<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
							<div class="social_icon">
								<a class="fa fa-twitter" href="https://twitter.com/intent/tweet?text=<?php the_title() ?>&url=<?php the_permalink(); ?>" target="_blank"><span class="text-hide">Twitter</span></a>
								<a class="fa fa-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><span class="text-hide">instagram</span><span class="text-hide">Facebook</span></a>	
								<a class="fa fa-pinterest-p" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink()?>&media=<?php wp_get_attachment_image_src( get_post_thumbnail_id( $loop->ID ), 'full' ) ?>&description=<?php the_title()?>" data-pin-custom="true" target="_blank"><span class="text-hide">Pin It</span></a>
								<a class=" fa fa-whatsapp" href="whatsapp://send?text=<?php the_title(); ?> – <?php urlencode(the_permalink());?>" data-action="share/whatsapp/share"  data-pin-custom="true" target="_blank"><span class="text-hide">WhatApp</span></a>
							</div>
						</div>
						</div>
					</div>	
				<?php endwhile; ?>
			</div></div>

		</div>
</div></div>


<?php get_footer();?>



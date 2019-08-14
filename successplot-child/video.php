<?php
/* Template Name: Video*/
?>
<?php get_header();?>
		<!-- Life Quotes START -->
        <section class="video_page">
        <?php the_content(); ?>
        <div class="container">
        	
        <div class="videos">
        <div class="top_full_video" >
				<iframe id="_jsIframe" src="" ></iframe>
                </div>

				<div class="all_videos">
					<ul class="video_item_ul">
					<?php
					$args = array(
						'post_type' => 'videos', // Custom post type
						 'posts_per_page' => -1
						 );
						/*$args = array(
						'post_type' => 'life_quotes', // Custom post type
						 'posts_per_page' => -1,
						'tax_query' => array(
							array(
								'taxonomy' => 'life_quotes_category', // custom category name
								'field'    => 'slug', //  slug and term_id 
								'terms'    => 'life-quote-video', // category slug name and category id
							),
						),
					);*/
					$query = new WP_Query( $args ); 
					while ( $query->have_posts() ) :$query->the_post();?>
					<li>
                    <div class="fix_video">
						<div id="top_vid" class="video_img _jsClickonVideo" data-href="https://www.youtube.com/embed/<?php  echo get_field( "video_url"); ?>?rel=0;showinfo=0;autoplay=1" ><?php the_post_thumbnail(); ?>
						<div class="play_btn"><img src="<?php echo site_url(); ?>/wp-content/uploads/2018/04/playhover.png" alt="a" /></div>	
						</div>	</div>
                        
                        <div class="title_video"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div> 
							<!--<div class="social_icon">
								<a class=" fa fa-twitter" href="https://twitter.com/intent/tweet?text=<?php the_title() ?>&url=<?php the_permalink(); ?>" target="_blank"><span class="text-hide">Twitter</span></a>
								<a class=" fa fa-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><span class="text-hide">instagram</span><span class="text-hide">Facebook</span></a>
								<a class=" fa fa-pinterest-p" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink()?>&media=<?php wp_get_attachment_image_src( get_post_thumbnail_id( $loop->ID ), 'full' ) ?>&description=<?php the_title()?>" data-pin-custom="true" target="_blank"><span class="text-hide">Pin It</span></a>
							</div>-->
						</li>
					<?php endwhile;	?>
                    
                    </ul>
					</div>
				</div>
                </div>
                </section>
				<!-- Life Quotes START -->

<?php get_footer();?>

<script type="text/javascript">
	$('._jsClickonVideo').click(function(e){
		$href = $(this).data('href');
		$('#_jsIframe').attr('src' ,  $href+'?autoplay=1&loop=1&rel=0&wmode=transparent');
	});
	$href = $('._jsClickonVideo:first').data('href');
	$('#_jsIframe').attr('src' , $href);
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('._jsClickonVideo').click(function(){
    $('html, body').animate({scrollTop:150}, 'slow');
    return false;
});
    });
</script>
<?php
/* Template Name: Fresh basket */
get_header();
 ?>
 <?php the_title(); ?>
 <div class="container">
	 <div class="fresh-single">
			<?php
				$args = array(
				    'post_type' => 'interviews',
				    'posts_per_page'	=> 10,
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
	                   /*$post = get_post();
	                   $term_names = wp_get_post_terms($post->ID, 'interviews_category', array('fields' => 'all')); // returns an array of term names
							
							foreach ( $term_names as $term ) {
							    $term_link = get_term_link( $term );
							    if ( is_wp_error( $term_link ) ) {
							        continue;
							    }
							    echo '<span class="name_tag"><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></span>';
							}*/
						//echo implode('</span> <span class="name_tag"> ', $term_names);
					  ?>
					 
	                </div>
            	 <div class="feature-title"><h5><?php the_title(); ?></h5></div>
				  
				 <div class="post_para features-str">
				 	<?php $content = get_the_content();
					$trimmed_content = wp_trim_words( $content, 16, NULL );
					echo $trimmed_content; ?>
				 </div>	
            	</div>
           	</div>	
			<?php
			endwhile;
		?>
		</div>					
		</div>
	</div>
 <?php get_footer(); ?>
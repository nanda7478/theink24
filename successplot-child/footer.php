<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
		<footer id="colophon" class="site-footer" role="contentinfo">
			<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<nav class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Primary Menu', 'twentysixteen' ); ?>">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_class'     => 'primary-menu',
						 ) );
					?>
				</nav><!-- .main-navigation -->
			<?php endif; ?>

			<?php if ( has_nav_menu( 'social' ) ) : ?>
				<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'twentysixteen' ); ?>">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'social',
							'menu_class'     => 'social-links-menu',
							'depth'          => 1,
							'link_before'    => '<span class="screen-reader-text">',
							'link_after'     => '</span>',
						) );
					?>
				</nav><!-- .social-navigation -->
			<?php endif; ?>


	<div class="subcribe">
        <div class="container">
		<div class="row">
       
			<div class="col-lg-5 newsletter_text">
			<h4><span>SUBSCRIBE TO</span> OUR NEWS LETTER</h4>
			</div>
			<div class="col-lg-7 newsletter_input">
			<form role="search" method="get" id="searchform"   class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		        <input type="text" value="<?php echo get_search_query(); ?>" name="new-footer" id="news-footer" placeholder="Enter Your Email Address" required	 />
		        <input type="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'SEND', 'submit button' ); ?>" />
			</form>
			</div>
		</div>
	</div>
	</div>
        <div class="main-footer">
        	<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-4 first_logo"><?php dynamic_sidebar('sidebar-2'); ?></div>
					<div class="col-lg-5 col-md-5 second_menu"><?php dynamic_sidebar('sidebar-3'); ?></div>
					<div class="col-lg-3 col-md-3 forth_connectd"><?php dynamic_sidebar('sidebar-5'); ?>
					</div>
				</div>
			</div>
		</div>
        <div class="copyright-info">
        <div class="container">
		<p>&copy <?php echo date(Y); ?> The Success Today Crafted with <span class="fa fa-heart-o heart"></span> by  <a href="https://www.ptiwebtech.com">PTI WebTech</a> </p>
			
		</div>
		</div>

		</footer><!-- .site-footer -->


<?php wp_footer(); ?>


</body>
</html>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo site_url(); ?>/wp-content/themes/successplot-child/slider/css/flexslider.css" type="text/css" media="screen" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>


  <!-- FlexSlider -->
  <script defer src="<?php echo site_url(); ?>/wp-content/themes/successplot-child/slider/js/jquery.flexslider.js"></script>
  
   <!-- Bootstrap Core -->
  <script defer src="<?php echo site_url(); ?>/wp-content/themes/successplot-child/bootstrap/js/bootstrap.min.js"></script>


<script>
$(document).ready(function(){
    $("#menu-toggle").click(function(){
        $("body").addClass("Open_Menu");
    });
});
</script>


<script>
$(document).ready(function(){
    $("#close_menu").click(function(){
        $("body").removeClass("Open_Menu");
    });
});
</script>


<script type="text/javascript">
jQuery.noConflict();
/*(function ($) { 
$(document).ready(function(){
        $('.story-box').filter(function() {
        return $.trim($(this).text()) === '';
        }).remove();
});
}(jQuery)); */
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript">
var ppp = 6; // Post per page
var cat = $('#more_posts').attr('data-category');
//alert(cat);
var pageNumber = 0;
var ajaxUrl = "<?php echo admin_url('admin-ajax.php')?>";


function load_posts(){
    pageNumber++;
    var str = '&cat=' + cat + '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax';
   // alert(str);
    $.ajax({
        type: "POST",
        dataType: "html",
        url: "<?php echo admin_url('admin-ajax.php')?>",
        data: str,
        success: function(data){
            var $data = $(data);
            if($data.length){
                $("#ajax-posts").append($data);
                $("#more_posts").show();
            } else{
                $("#more_posts").hide(); 
            }
        },
        error : function(jqXHR, textStatus, errorThrown) {
            $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
        }

    });
    return false;
}

$("#more_posts").on("click",function(){ // When btn is pressed.
    $("#more_posts").hide(); // Disable the button, temp.
    load_posts();
});
</script>

<script>
$(document).ready(function(){
    $(".recent_post .nav-pills li a").click(function(){
        $(".recent_post .nav-pills li.active").removeClass("active");
    });
});
</script>




<!--<script>
    window.onscroll = function() {myFunction()};

    var header = document.getElementById("successplot_header");
    var sticky = header.offsetTop;

    function myFunction() {
      if (window.pageYOffset >= sticky) {
        header.classList.add("fix-header");
      } else {
        header.classList.remove("fix-header");
      }
    }
</script>  
-->

<script>

$(window).scroll(function(){
    if ($(window).scrollTop() >= 118) {
       $('.successplot-main-navbar').addClass('fix-header');
    }
    else {
       $('.successplot-main-navbar').removeClass('fix-header');
    }
});

</script>

<!--<script>

$(window).scroll(function(){
    if ($(window).scrollTop() >= 180) {
       $('.img-socailicon .crunchify-social').addClass('fix-social');
    }
    else {
       $('.img-socailicon .crunchify-social').removeClass('fix-social');
    }
});

</script>-->
<!-- <li class="fixed-logo"><a href="<?php echo site_url(); ?>"><img src="<?php echo site_url(); ?>/wp-content/uploads/2018/04/cropped-successplot_logo2.png"></a></li> -->

<script>

 var logo_url = '<li class="fixed-logo"><a href="<?php echo site_url(); ?>"><img src="<?php echo site_url(); ?>/wp-content/uploads/2018/04/fixed-log.png"></a></li>';


 $("#menu-header-menu:first").prepend(logo_url);

//$("#menu-header-menu").append("<li><a href="/user/messages">Message Center</a></li>");

  /*$(".menu-item a").on('click', function(event) {
    if (this.hash !== "") {
      event.preventDefault();
      var hash = this.hash;
        $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        window.location.hash = hash;
      });
    } // End if
  });*/

</script>

<style type="text/css">

.mem-show-full{display: none;}
.archive .latest-fress{display: none;}
.tax-interviews_category .latest-fress{display: none;}
.blog .latest-fress{display: none;}
.page-template-interview .latest-fress{display: none;}
.right_box_contents .read-more{margin-top: -20px;}
.img-socailicon .fa.fa-instagram{background: #d6249f;
  background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
  box-shadow: 0px 3px 10px rgba(0,0,0,.25);}
.fa.fa-whatsapp{background-color: #25D366;}
.img-socailicon .fa.fa-envelope{background-color: #ff0000; color: ##ffffff}
.copyright-info .container a {
  color: #ffffff;
}
div#wpdInfo{display: none;}
</style>



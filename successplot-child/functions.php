<?php

/****************************custom post type for Interviews*********/

/**/
function custom_interviews_type() {
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Stories', 'Post Type General Name', 'modernizer' ),
        'singular_name'       => _x( 'Stories', 'Post Type Singular Name', 'modernizer' ),
        'menu_name'           => __( 'Stories', 'modernizer' ),
        'parent_item_colon'   => __( 'Parent Movie', 'modernizer' ),
        'all_items'           => __( 'All Stories', 'modernizer' ),
        'view_item'           => __( 'View Stories', 'modernizer' ),
        'add_new_item'        => __( 'Add New Stories', 'modernizer' ),
        'add_new'             => __( 'Add Stories', 'modernizer' ),
        'edit_item'           => __( 'Edit Stories', 'modernizer' ),
        'update_item'         => __( 'Update Stories', 'modernizer' ),
        'search_items'        => __( 'Search Stories', 'modernizer' ),
        'not_found'           => __( 'Not Found', 'modernizer' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'modernizer' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'Stories', 'modernizer' ),
        'description'         => __( 'Stories Templates and Snippets', 'modernizer' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( '' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'interviews', $args );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'custom_interviews_type', 0 );




//========================= Categories for interviews Custom Type ===========================//
//create a custom taxonomy name it topics for your posts
 
function interviews_categories_taxonomy() {
 
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
 
  $interviews_cats = array(
    'name' => _x( 'Stories Categories', 'taxonomy general name' ),
    'singular_name' => _x( ' ', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Stories Categories' ),
    'all_items' => __( 'All Stories Categories' ),
    'parent_item' => __( 'Parent interviews Category' ),
    'parent_item_colon' => __( 'Parent interviews Category' ),
    'edit_item' => __( 'Edit Stories Category' ), 
    'update_item' => __( 'Update Stories Category' ),
    'add_new_item' => __( 'Add New Stories Category' ),
    'new_item_name' => __( 'New Stories Category' ),
    'menu_name' => __( 'Stories Categories' ),
  );    
 
// Now register the taxonomy. Replace the parameter interviewss withing the array by the name of your custom post type.
  register_taxonomy('interviews_category',array('interviews'), array(
    'hierarchical' => true,
    'labels' => $interviews_cats,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'interviews_category' ),
  ));
 
}
add_action( 'init', 'interviews_categories_taxonomy', 0 );
//========================= Tags for interviews Custom Type ===========================//

//hook into the init action and call create_topics_nonhierarchical_taxonomy when it fires
function interviews_tags_taxonomy() { 
// Labels part for the GUI
 
  $interviews_tags = array(
    'name' => _x( ' Tags', 'taxonomy general name' ),
    'singular_name' => _x( 'Stories Tag', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Stories Tags' ),
    'popular_items' => __( 'Popular Stories Tags' ),
    'all_items' => __( 'All Stories Tags' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Stories Tag' ), 
    'update_item' => __( 'Update Stories Tag' ),
    'add_new_item' => __( 'Add New Stories Tag' ),
    'new_item_name' => __( 'New Stories Tag Name' ),
    'separate_items_with_commas' => __( 'Separate Stories tags with commas' ),
    'add_or_remove_items' => __( 'Add or remove Stories tags' ),
    'choose_from_most_used' => __( 'Choose from the most used interviews tags' ),
    'menu_name' => __( 'Stories Tags' ),
  );
 
// Now register the non-hierarchical taxonomy like tag. . Replace the parameter interviewss withing the array by the name of your custom post type.
  register_taxonomy('interviews_tags','interviews',array(
    'hierarchical' => false,
    'labels' => $interviews_tags,
    'show_ui' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'interviews_tags' ),
  ));
}
add_action( 'init', 'interviews_tags_taxonomy', 0 );

/**/


/*custom video*/

/**/
function custom_videos_type() {
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Videos', 'Post Type General Name', 'modernizer' ),
        'singular_name'       => _x( 'Videos', 'Post Type Singular Name', 'modernizer' ),
        'menu_name'           => __( 'Videos', 'modernizer' ),
        'parent_item_colon'   => __( 'Parent Movie', 'modernizer' ),
        'all_items'           => __( 'All Videos', 'modernizer' ),
        'view_item'           => __( 'View Videos', 'modernizer' ),
        'add_new_item'        => __( 'Add New Videos', 'modernizer' ),
        'add_new'             => __( 'Add Videos', 'modernizer' ),
        'edit_item'           => __( 'Edit Videos', 'modernizer' ),
        'update_item'         => __( 'Update Videos', 'modernizer' ),
        'search_items'        => __( 'Search Videos', 'modernizer' ),
        'not_found'           => __( 'Not Found', 'modernizer' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'modernizer' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'Videos', 'modernizer' ),
        'description'         => __( 'Videos Templates and Snippets', 'modernizer' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( '' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'videos', $args );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'custom_videos_type', 0 );




//========================= Categories for videos Custom Type ===========================//
//create a custom taxonomy name it topics for your posts
 
function stories_videos_taxonomy() {
 
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
 
  $videos_cats = array(
    'name' => _x( 'Videos Categories', 'taxonomy general name' ),
    'singular_name' => _x( ' ', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Videos Categories' ),
    'all_items' => __( 'All Videos Categories' ),
    'parent_item' => __( 'Parent videos Category' ),
    'parent_item_colon' => __( 'Parent videos Category' ),
    'edit_item' => __( 'Edit Videos Category' ), 
    'update_item' => __( 'Update Videos Category' ),
    'add_new_item' => __( 'Add New Videos Category' ),
    'new_item_name' => __( 'New Videos Category' ),
    'menu_name' => __( 'Videos Categories' ),
  );    
 
// Now register the taxonomy. Replace the parameter videoss withing the array by the name of your custom post type.
  register_taxonomy('videos_category',array('videos'), array(
    'hierarchical' => true,
    'labels' => $videos_cats,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'videos_category' ),
  ));
 
}
add_action( 'init', 'stories_videos_taxonomy', 0 );
//========================= Tags for videos Custom Type ===========================//

//hook into the init action and call create_topics_nonhierarchical_taxonomy when it fires
function videos_tags_taxonomy() { 
// Labels part for the GUI
 
  $videos_tags = array(
    'name' => _x( ' Tags', 'taxonomy general name' ),
    'singular_name' => _x( 'Videos Tag', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Videos Tags' ),
    'popular_items' => __( 'Popular Videos Tags' ),
    'all_items' => __( 'All Videos Tags' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Videos Tag' ), 
    'update_item' => __( 'Update Videos Tag' ),
    'add_new_item' => __( 'Add New Videos Tag' ),
    'new_item_name' => __( 'New Videos Tag Name' ),
    'separate_items_with_commas' => __( 'Separate Videos tags with commas' ),
    'add_or_remove_items' => __( 'Add or remove Videos tags' ),
    'choose_from_most_used' => __( 'Choose from the most used videos tags' ),
    'menu_name' => __( 'Videos Tags' ),
  );
 
// Now register the non-hierarchical taxonomy like tag. . Replace the parameter videoss withing the array by the name of your custom post type.
  register_taxonomy('videos_tags','videos',array(
    'hierarchical' => false,
    'labels' => $videos_tags,
    'show_ui' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'videos_tags' ),
  ));
}
add_action( 'init', 'videos_tags_taxonomy', 0 );

/**/




/****************************custom post type for Life Quote*********/
add_action('init', 'life_quotes_custom_init');  
 
/*-- Custom Post Init Begin --*/
function life_quotes_custom_init()
{
  $labels = array(
    'name' => _x('Life Quotes', 'post type general name'),
    'singular_name' => _x('Life Quotes', 'post type singular name'),
    'add_new' => _x('Add New', 'Life Quotes'),
    'add_new_item' => __('Add New Life Quotes'),
    'edit_item' => __('Edit Life Quotes'),
    'new_item' => __('New Life Quotes'),
    'view_item' => __('View Life Quotes'),
    'search_items' => __('Search Life Quotes'),
    'not_found' =>  __('No Life Quotes found'),
    'not_found_in_trash' => __('No Life Quotes found in Trash'),
    'parent_item_colon' => '',
    'menu_name' => 'Life Quotes'
 
  );
   
 $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title','editor','author','thumbnail','excerpt','comments')
  );
  // The following is the main step where we register the post.
  register_post_type('life_quotes',$args);
   
  // Initialize New Taxonomy Labels
  $labels = array(
    'name' => _x( 'Life Quotes Category', 'taxonomy general name' ),
    'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Types' ),
    'all_items' => __( 'All Category' ),
    'parent_item' => __( 'Parent Category' ),
    'parent_item_colon' => __( 'Parent Category' ),
    'edit_item' => __( 'Edit Category' ),
    'update_item' => __( 'Update Category' ),
    'add_new_item' => __( 'Add New Category' ),
    'new_item_name' => __( 'New Tag Name' ),
  );
    // Custom taxonomy for Project Tags
    register_taxonomy('life_quotes_category',array('life_quotes'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'life_quotes_category' ),
  ));

    //register taxonomy for custom post tags
register_taxonomy( 
'life-quotes', //taxonomy 
'life_quotes', //post-type
array( 
    'hierarchical'  => false, 
    'label'         => __( 'My Custom Tags','taxonomy general name'), 
    'singular_name' => __( 'Tag', 'taxonomy general name' ), 
    'rewrite'       => true, 
    'query_var'     => true 
));
   
}
/*-- Custom Post Init End --*/





add_shortcode( 'tab_content', 'themeprefix_tabbed_content' ); 
//Position the content with a shortcode [tab_content]
function themeprefix_tabbed_content() {
ob_start();
// My ACF Fields for reference
// tabs - field group
// tab_link - sub-field tab link
// tab_content - sub-field tab content
// check if the repeater field has rows of data
// loop through the rows of data
// display a sub field value
echo '<div id="responsive-tabs">
        <ul class="horizontal">';
if( have_rows('tabs') ):
        $i = 1;
        while ( have_rows('tabs' ) ) : the_row();
echo '<li><a href="#tab-' . $i . '">' . get_sub_field( "tab_link" ) . '</a></li>';
        $i++;
        endwhile;
echo '</ul>';
        $i = 1;
        while ( have_rows('tabs') ) : the_row();
echo '<div id="tab-' . $i . '">' . get_sub_field( "tab_content" ) . '</div>';
        $i++;
        endwhile;
echo '</div>';
else :
    // no rows found
endif;
return ob_get_clean();
}


/*custom post  24 feb */

function crunchify_social_sharing_buttons($content) {
    global $post;
    if(is_single()){
    
        // Get current page URL 
        $crunchifyURL = urlencode(get_permalink());
 
        // Get current page title
        $crunchifyTitle = str_replace( ' ', '%20', get_the_title());
        
        // Get Post Thumbnail for pinterest
        $crunchifyThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
 
        // Construct sharing URL without using any script
        $twitterURL = 'https://twitter.com/intent/tweet?text='.$crunchifyTitle.'&amp;url='.$crunchifyURL.'&amp;via=Crunchify';
        $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$crunchifyURL;
        $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$crunchifyURL.'&amp;media='.$crunchifyThumbnail[0].'&amp;description='.$crunchifyTitle;
        $whatsappURL = 'https://api.whatsapp.com/send?text='.$crunchifyURL; 
        $whatsappURL_desk = 'https://web.whatsapp.com/send?text='.$crunchifyURL;

        $mailURL = 'mailto:type%20email%20address%20here?subject=I%20wanted%20to%20share%20this%20post%20with%20you%20from%20&body=';
        $instagramURL = 'http://instagram.com/';




        // Add sharing button at the end of page/page content
        $content .= '<!-- Crunchify.com social sharing. Get your copy here: http://crunchify.me/1VIxAsz -->';
        $content .= '<div class="extracrunchify-social">';
        $content .= '<div class="crunchify-social">';
        $content .= '<h5>SHARE ON</h5>';
        $content .= '<a class=" fa fa-twitter" href="'. $twitterURL .'" target="_blank"><span class="text-hide">Twitter</span></a>';
        $content .= '<a class=" fa fa-facebook" href="'.$facebookURL.'" target="_blank"><span class="text-hide">instagram</span><span class="text-hide">Facebook</span></a>';
        $content .= '<a class=" fa fa-pinterest-p" href="'.$pinterestURL.'" data-pin-custom="true" target="_blank"><span class="text-hide">Pin It</span></a>';
        $content .= '<a class=" mobile fa fa-whatsapp" href="'.$whatsappURL.'" data-action="share/whatsapp/share" data-pin-custom="true" target="_blank"><span class="text-hide">WhatsApp</span></a>';
        $content .= '<a class=" desktop fa fa-whatsapp" href="'.$whatsappURL_desk.'" data-action="share/whatsapp/share" data-pin-custom="true" target="_blank"><span class="text-hide">WhatsApp</span></a>';
        $content .= '<a class=" fa fa-envelope" href="'.$mailURL.'" data-action="share/whatsapp/share" data-pin-custom="true" target="_blank"><span class="text-hide">WhatsApp</span></a>';
        $content .= '<a class=" fa fa-instagram" href="'.$instagramURL.'" data-action="share/whatsapp/share" data-pin-custom="true" target="_blank"><span class="text-hide">WhatsApp</span></a>';
        $content .= '</div>';
        $content .= '</div>';
        
        return $content;
    }else{
        // if not a post/page then don't include sharing button
        return $content;
    }
};
//add_filter( 'the_content', 'crunchify_social_sharing_buttons');



function othr_crunchify_social_sharing_buttons($socailshare) {
    global $post;
   // if(is_single()){
    
        // Get current page URL 
        $crunchifyURL = urlencode(get_permalink());
 
        // Get current page title
        $crunchifyTitle = str_replace( ' ', '%20', get_the_title());
        
        // Get Post Thumbnail for pinterest
        $crunchifyThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
 
        // Construct sharing URL without using any script
        $twitterURL = 'https://twitter.com/intent/tweet?text='.$crunchifyTitle.'&amp;url='.$crunchifyURL.'&amp;via=Crunchify';
        $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$crunchifyURL;
        $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$crunchifyURL.'&amp;media='.$crunchifyThumbnail[0].'&amp;description='.$crunchifyTitle;
        $whatsappURL = 'https://api.whatsapp.com/send?text='.$crunchifyURL; 
        $whatsappURL_desk = 'https://web.whatsapp.com/send?text='.$crunchifyURL;

        // Add sharing button at the end of page/page content
        $socailshare .= '<!-- Crunchify.com social sharing. Get your copy here: http://crunchify.me/1VIxAsz -->';
        $socailshare .= '<div class="crunchify-social">';
        $socailshare .= '<h5>Share via:</h5>';
        $socailshare .= '<a class=" fa fa-twitter" href="'. $twitterURL .'" target="_blank"><span class="text-hide">Twitter</span></a>';
        $socailshare .= '<a class=" fa fa-facebook" href="'.$facebookURL.'" target="_blank"><span class="text-hide">instagram</span><span class="text-hide">Facebook</span></a>';
        $socailshare .= '<a class=" fa fa-pinterest-p" href="'.$pinterestURL.'" data-pin-custom="true" target="_blank"><span class="text-hide">Pin It</span></a>';
        $socailshare .= '<a class=" mobile fa fa-whatsapp" href="'.$whatsappURL.'" data-action="share/whatsapp/share" data-pin-custom="true" target="_blank"><span class="text-hide">WhatsApp</span></a>';
        $socailshare .= '<a class=" desktop fa fa-whatsapp" href="'.$whatsappURL_desk.'" data-action="share/whatsapp/share" data-pin-custom="true" target="_blank"><span class="text-hide">WhatsApp</span></a>';
        $socailshare .= '</div>';
        
        return $socailshare;
   // }
};



/*editor post setting*/
function myplugin_register_settings() {
   add_option( 'myplugin_option_name_post', 'This is my option value.');
   register_setting( 'myplugin_options_group', 'myplugin_option_name_post', 'myplugin_callback' );
}

function myplugin_register_settings_2() {
   add_option( 'myplugin_option_name_post2', 'This is my option value.');
   register_setting( 'myplugin_options_group2', 'myplugin_option_name_post2', 'myplugin_callback' );
}

function myplugin_register_settings_3() {
   add_option( 'myplugin_option_name_post3', 'This is my option value.');
   register_setting( 'myplugin_options_group3', 'myplugin_option_name_post3', 'myplugin_callback' );
}

add_action( 'admin_init', 'myplugin_register_settings' );
add_action( 'admin_init', 'myplugin_register_settings_2' );
add_action( 'admin_init', 'myplugin_register_settings_3' );


function myplugin_register_options_page() {
  add_options_page('Page Title', 'Editor Choice Post ', 'manage_options', 'myplugin', 'myplugin_options_page');
}
add_action('admin_menu', 'myplugin_register_options_page');

function myplugin_options_page()
{
?>
  <div class="main-div">
  <?php screen_icon(); ?>
  <form method="post" action="options.php">
  <?php settings_fields( 'myplugin_options_group' ); ?>
<h3>Editor Post 1</h3>
  <table>
  <tr valign="top">
  <th scope="row"><label for="myplugin_option_name">Enter Valid post id</label></th>
  <td><input type="number" id="myplugin_option_name" name="myplugin_option_name_post" value="<?php echo get_option('myplugin_option_name_post'); ?>" /></td>
  </tr>
  </table>
  <?php  submit_button(); ?>
  </form>

<span>Post Id :</span> <?php echo get_option('myplugin_option_name_post'); ?><br>
 <span>Post Name :</span> <?php $id_first = get_option('myplugin_option_name_post'); 
           // echo get_the_post_thumbnail($id_first);
            echo get_the_title($id_first);
            ?>

 <form method="post" action="options.php">
   <?php settings_fields( 'myplugin_options_group2' ); ?>
<h3>Editor Post 2</h3>

  <table>
  <tr valign="top">
  <th scope="row"><label for="myplugin_option_name">Enter Valid post id </label></th>
  <td><input type="number" id="myplugin_option_name" name="myplugin_option_name_post2" value="<?php echo get_option('myplugin_option_name_post2'); ?>" /></td>
  </tr>
  </table>

  <?php  submit_button(); ?>
  </form>

    <span>Post Id : </span><?php echo get_option('myplugin_option_name_post2'); ?><br>
     <span>Post Name :</span> <?php $id_second = get_option('myplugin_option_name_post2'); 
               // echo get_the_post_thumbnail($id_first);
                echo get_the_title($id_second);
    ?>

 <form method="post" action="options.php">
   <?php settings_fields( 'myplugin_options_group3' ); ?>
<h3>Editor Post 2</h3>

  <table>
  <tr valign="top">
  <th scope="row"><label for="myplugin_option_name">Enter Valid post id </label></th>
  <td><input type="number" id="myplugin_option_name" name="myplugin_option_name_post3" value="<?php echo get_option('myplugin_option_name_post3'); ?>" /></td>
  </tr>
  </table>

  <?php  submit_button(); ?>
  </form>

    <span>Post Id : </span><?php echo $id_third = get_option('myplugin_option_name_post3'); ?><br>
     <span>Post Name :</span> <?php $id_third = get_option('myplugin_option_name_post3'); 
                //echo get_the_post_thumbnail($id_third);
                echo get_the_title($id_third);

                $post_object = get_post( $id_third );
                //echo $post_object->post_content;
    ?>



  </div>
<?php
} 

/*load more*/
wp_localize_script( 'twentyfifteen-script', 'ajax_posts', array(
    'ajaxurl' => admin_url( 'admin-ajax.php' ),
    'noposts' => __('No older posts found', 'twentyfifteen'),
));

function more_post_ajax(){

    $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 6;
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 1;
    $cat = (isset($_POST['cat']) && ((int)$_POST['cat'] > 0))? (int)$_POST['cat'] : 0;

    header("Content-Type: text/html");

    $args = array(
        'suppress_filters' => true,
        'post_type' => 'interviews',
        'posts_per_page' => $ppp,
        'offset' => 4 + ($page*$ppp), 
        // 'paged'    => $page,
    );
    if($cat > 0){
        $args['tax_query'] = array(
        array(
        'taxonomy' => 'interviews_category', 

        'field' => 'term_id',
        'terms' => $cat
         )
      );
    }


    $loop = new WP_Query($args);

      while ( $loop->have_posts() ) : $loop->the_post();
              ?>
                <div class="col-lg-4 col-md-6 blog_box">
                    <div class="post_details">
                    <div class="fix_img">
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
                         
                        </div>  

                        <div class="post-share-icon">
                            <span class="on_hover"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
                            <div class="showhide">
                            <?php echo  othr_crunchify_social_sharing_buttons($socailshare); ?>
                            </div>
                        </div>              
                
                    </div>
                </div> 
              <?php
              endwhile;
    wp_reset_postdata();
    die($out);
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');



////////////////////////////////////////////////////////////////////////
// BuddyPress Profile URL Integration //////////////////////////////////
////////////////////////////////////////////////////////////////////////
add_filter('wpdiscuz_profile_url', 'wpdiscuz_bp_profile_url', 10, 2);
function wpdiscuz_bp_profile_url($profile_url, $user) {
    if ($user && class_exists('BuddyPress')) {
        $profile_url = bp_core_get_user_domain($user->ID);
    }
    return $profile_url;
}

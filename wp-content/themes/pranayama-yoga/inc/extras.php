<?php 
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package pranayama_yoga
 */

if( ! function_exists( 'pranayama_yoga_get_post_meta' ) ) :
/**
 * Post meta info
*/
function pranayama_yoga_get_post_meta(){
    
    printf( '<span class="byline"><a class="url fn n" href="%1$s">%2$s</a></span>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), esc_html( get_the_author() ) );

    if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
    		echo '<span class="comments-link">';
    		/* translators: %s: post title */
    		 comments_popup_link( esc_html__( 'Leave a comment', 'pranayama-yoga' ), esc_html__( '1 Comment', 'pranayama-yoga' ), esc_html__( '% Comments', 'pranayama-yoga' ) );
    		echo '</span>';
	  }

	  printf( '<span class="posted-on"><a href="%1$s" rel="bookmark"><time class="entry-date published updated" datetime="%2$s">%3$s</time></a></span>', esc_url( get_permalink() ), esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date( 'j M Y' ) ) );
  

}
endif;


if ( ! function_exists( 'pranayama_yoga_entry_footer' ) ) :
/**
 * Prints edit links
 */
function pranayama_yoga_entry_footer() {	

    	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'pranayama-yoga' ) );
		if ( $categories_list && pranayama_yoga_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( ' %1$s ', 'pranayama-yoga' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'pranayama-yoga' ) );
		if ( $tags_list ) {
			printf( '<span class="tag-links">' . esc_html__( ' %1$s ', 'pranayama-yoga' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'pranayama-yoga' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function pranayama_yoga_categorized_blog() {
	
	if ( false === ( $all_the_cool_cats = get_transient( 'pranayama_yoga_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'pranayama_yoga_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so pranayama_yoga_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so pranayama_yoga_categorized_blog should return false.
		return false;
	}
}

/**
 * Return sidebar layouts for pages
*/
function pranayama_yoga_sidebar_layout(){
    global $post;
    
    if( get_post_meta( $post->ID, 'pranayama_yoga_sidebar_layout', true ) ){
        return get_post_meta( $post->ID, 'pranayama_yoga_sidebar_layout', true );    
    }else{
        return 'right-sidebar';
    }
}

if( ! function_exists( 'pranayama_yoga_pagination' ) ):

	function pranayama_yoga_pagination(){
        
    if( is_single() ){
        the_post_navigation();
    }else{
        the_posts_pagination( array(
					'prev_text'          => __( 'Prev', 'pranayama-yoga' ),
					'next_text'          => __( 'Next', 'pranayama-yoga' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'pranayama-yoga' ) . ' </span>',
			  ) );
    }
	}

endif;



if( ! function_exists('pranayama_yoga_social_cb')):
/** Callback for Social Links */
 function pranayama_yoga_social_cb(){
    $facebook  = get_theme_mod( 'pranayama_yoga_facebook' );
    $twitter   = get_theme_mod( 'pranayama_yoga_twitter' );
    $google    = get_theme_mod( 'pranayama_yoga_google_plus' );
    $pinterest = get_theme_mod( 'pranayama_yoga_pinterest' );
    $linkedin  = get_theme_mod( 'pranayama_yoga_linkedin' );
    $instagram = get_theme_mod( 'pranayama_yoga_instagram' );
    $youtube   = get_theme_mod( 'pranayama_yoga_youtube' );
    
    if( $facebook || $twitter || $google || $linkedin || $pinterest || $instagram || $youtube ){
    ?>
    <ul class="social-networks">
      
      <?php if( $facebook ){ ?>
            
            <li><a href="<?php echo esc_url( $facebook );?>" target="_blank" title="<?php esc_attr_e( 'Facebook', 'pranayama-yoga' ); ?>"><span class="fa fa-facebook"></span></a></li>
      
      <?php } if( $twitter ){?>    
           
            <li><a href="<?php echo esc_url( $twitter );?>" target="_blank" title="<?php esc_attr_e( 'Twitter', 'pranayama-yoga' ); ?>"><span class="fa fa-twitter"></span></a></li>
      
      <?php } if( $google ){?>
            
            <li><a href="<?php echo esc_url( $google );?>" target="_blank" title="<?php esc_attr_e( 'Google Plus', 'pranayama-yoga' ); ?>"><span class="fa fa-google-plus"></span></a></li>
      
      <?php } if( $linkedin ){?>
            
            <li><a href="<?php echo esc_url( $linkedin );?>" target="_blank" title="<?php esc_attr_e( 'LinkedIn', 'pranayama-yoga' ); ?>"><span class="fa fa-linkedin"></span></a></li>

      <?php } if( $pinterest ){?>
            
            <li><a href="<?php echo esc_url( $pinterest );?>" target="_blank" title="<?php esc_attr_e( 'Pinterest', 'pranayama-yoga' ); ?>"><span class="fa fa-pinterest"></span></a></li>

      <?php } if( $instagram ){?>
            
            <li><a href="<?php echo esc_url( $instagram );?>" target="_blank" title="<?php esc_attr_e( 'Instagram', 'pranayama-yoga' ); ?>"><span class="fa fa-instagram"></span></a></li>

      <?php } if( $youtube ){?>
            
            <li><a href="<?php echo esc_url( $youtube );?>" target="_blank" title="<?php esc_attr_e( 'Youtube', 'pranayama-yoga' ); ?>"><span class="fa fa-youtube"></span></a></li>
        
        <?php } ?>
    </ul>
    <?php
    }
 }
 endif;

 if( !function_exists( 'pranayama_yoga_breadcrumbs_cb' ) ):
/**
 * Breadcrumb
*/
  function pranayama_yoga_breadcrumbs_cb(){
    
      $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
      $delimiter = esc_html( get_theme_mod( 'pranayama_yoga_breadcrumb_separator', __( '>', 'pranayama-yoga' ) ) ); // delimiter between crumbs
      $home = esc_html( get_theme_mod( 'pranayama_yoga_breadcrumb_home_text', __( 'Home', 'pranayama-yoga' ) ) ); // text for the 'Home' link
      $showCurrent = get_theme_mod( 'pranayama_yoga_ed_current', '1' ); // 1 - show current post/page title in breadcrumbs, 0 - don't show
      $before = '<span class="current">'; // tag before the current crumb
      $after = '</span>'; // tag after the current crumb
      $before_text = 'You are here: ';
      $ed_breadcrumb = get_theme_mod( 'pranayama_yoga_ed_breadcrumb' );
      
      global $post;
      $homeLink = esc_url( home_url( ) );
      
      if( $ed_breadcrumb ){
          if ( is_front_page() ) {
          
              if ( $showOnHome == 1 ) echo '<div id="crumbs"><a href="' . esc_url( $homeLink ) . '">' . esc_html( $home ) . '</a></div>';
          
          } else {
          
              echo '<div id="crumbs">' . $before_text . '<a href="' . esc_url( $homeLink ) . '">' . esc_html( $home ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
          
              if ( is_category() ) {
                  $thisCat = get_category( get_query_var( 'cat' ), false );
                  if ( $thisCat->parent != 0 ) echo get_category_parents( $thisCat->parent, TRUE, ' <span class="separator">' . $delimiter . '</span> ' );
                  echo $before .  esc_html( single_cat_title( '', false ) ) . $after;
              
              } elseif ( is_search() ) {
                  echo $before . esc_html__( 'Search Results for "', 'pranayama-yoga' ) . esc_html( get_search_query() ) . esc_html__( '"', 'pranayama-yoga' ) . $after;
              
              } elseif ( is_day() ) {
                  echo '<a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . esc_html( get_the_time( 'Y' ) ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                  echo '<a href="' . esc_url( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) ) . '">' . esc_html( get_the_time( 'F' ) ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                  echo $before . esc_html( get_the_time( 'd' ) ) . $after;
              
              } elseif ( is_month() ) {
                  echo '<a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . esc_html( get_the_time( 'Y' ) ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                  echo $before . esc_html( get_the_time( 'F' ) ) . $after;
              
              } elseif ( is_year() ) {
                  echo $before . esc_html( get_the_time( 'Y' ) ) . $after;
          
              } elseif ( is_single() && !is_attachment() ) {
                  if ( get_post_type() != 'post' ) {
                      $post_type = get_post_type_object(get_post_type());
                      $slug = $post_type->rewrite;
                      echo '<a href="' . esc_url( $homeLink . '/' . $slug['slug'] ) . '/">' . esc_html( $post_type->labels->singular_name ) . '</a>';
                      if ( $showCurrent == 1 ) echo ' <span class="separator">' . esc_html( $delimiter ) . '</span> ' . $before . esc_html( get_the_title() ) . $after;
                  } else {
                      $cat = get_the_category(); 
                      if( $cat ){
                          $cat = $cat[0];
                          $cats = get_category_parents( $cat, TRUE, ' <span class="separator">' . esc_html( $delimiter ) . '</span> ' );
                          if ( $showCurrent == 0 ) $cats = preg_replace( "#^(.+)\s$delimiter\s$#", "$1", $cats );
                          echo $cats;
                      }
                      if ( $showCurrent == 1 ) echo $before . esc_html( get_the_title() ) . $after;
                  }
              
              } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
                  $post_type = get_post_type_object(get_post_type());
                  echo $before . esc_html( $post_type->labels->singular_name ) . $after;
              
              } elseif ( is_attachment() ) {
                  $parent = get_post( $post->post_parent );
                  $cat = get_the_category( $parent->ID ); 
                  if( $cat ){
                      $cat = $cat[0];
                      echo get_category_parents( $cat, TRUE, ' <span class="separator">' . esc_html( $delimiter ) . '</span> ');
                      echo '<a href="' . esc_url( get_permalink( $parent ) ) . '">' . esc_html( $parent->post_title ) . '</a>' . ' <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                  }
                  if ( $showCurrent == 1 ) echo  $before . esc_html( get_the_title() ) . $after;
              
              } elseif ( is_page() && !$post->post_parent ) {
                  if ( $showCurrent == 1 ) echo $before . esc_html( get_the_title() ) . $after;
          
              } elseif ( is_page() && $post->post_parent ) {
                  $parent_id  = $post->post_parent;
                  $breadcrumbs = array();
                  while( $parent_id ){
                      $page = get_page( $parent_id );
                      $breadcrumbs[] = '<a href="' . esc_url( get_permalink( $page->ID ) ) . '">' . esc_html( get_the_title( $page->ID ) ) . '</a>';
                      $parent_id  = $page->post_parent;
                  }
                  $breadcrumbs = array_reverse( $breadcrumbs );
                  for ( $i = 0; $i < count( $breadcrumbs) ; $i++ ){
                      echo $breadcrumbs[$i];
                      if ( $i != count( $breadcrumbs ) - 1 ) echo ' <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                  }
                  if ( $showCurrent == 1 ) echo ' <span class="separator">' . esc_html( $delimiter ) . '</span> ' . $before . esc_html( get_the_title() ) . $after;
              
              } elseif ( is_tag() ) {
                  echo $before . esc_html( single_tag_title( '', false ) ) . $after;
              
              } elseif ( is_author() ) {
                  global $author;
                  $userdata = get_userdata( $author );
                  echo $before . esc_html( $userdata->display_name ) . $after;
              
              } elseif ( is_404() ) {
                  echo $before . esc_html__( '404 Error - Page not Found', 'pranayama-yoga' ) . $after;
              } elseif( is_home() ){
                  echo $before;
                  single_post_title();
                  echo $after;
              }
          
              echo '</div>';   
          }
      }
      
  } // end pranayama_yoga_breadcrumbs()
endif;


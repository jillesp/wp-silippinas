<?php
/*
 * Template Name: Post
 * Template Post Type: post
 */
  
 get_header();
 
 $show_default_title = get_post_meta( get_the_ID(), '_et_pb_show_title', true );
 
 $is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );
 
 ?>
 

<style>
    .post-main {}
    .post-main .post_meta_custom a {color: inherit; cursor: text;}
    .post-main .entry-content img {width: 100%; padding: 20px 10px;}
    .post-main .et_pb_section {padding: 0;}
    
    #tabs {margin-top: 20px; border: 0 !important;}
    #tabs ul {padding: 0 !important; background: none !important; border: 0 !important;}
    #tabs ul li {border-color: #CCC !important;}
    #tabs > div {border: 1px solid #CCC;}

    #tabs > div > div {padding: 20px 0;}

    .slp-knn_images > img {display: 'inline-block'; max-width: calc(50% - 4px);}
    
</style>

 <main class="post-main">
 <div id="main-content">
     <?php
         if ( et_builder_is_product_tour_enabled() ):
             // load fullwidth page in Product Tour mode
             while ( have_posts() ): the_post(); ?>
 
                 <article id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_post' ); ?>>
                     <div class="entry-content">
                         
                            <?php the_content(); ?>

                     </div> <!-- .entry-content -->
 
                 </article> <!-- .et_pb_post -->
 
         <?php endwhile;
         else:
     ?>
     <div class="container">
         <div id="content-area" class="clearfix">
             <div id="left-area">
             <?php while ( have_posts() ) : the_post(); ?>
                 <?php if (et_get_option('divi_integration_single_top') !== '' && et_get_option('divi_integrate_singletop_enable') === 'on') echo et_core_intentionally_unescaped( et_get_option('divi_integration_single_top'), 'html' ); ?>
                 <article id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_post' ); ?>>
                     <?php if ( ( 'off' !== $show_default_title && $is_page_builder_used ) || ! $is_page_builder_used ) { ?>
                         <div class="et_post_meta_wrapper">
                             <h1 class="entry-title"><?php the_title(); ?></h1>
 
                            <?php if ( ! post_password_required() ) : ?>
                                <?php if ( in_category('SilipBalita') ) { ?>
                                    <div class="post_meta_custom">
                                        <p>
                                            <!--<strong>By: </strong><?php the_author(); ?> <br/>-->
                                            <strong>Region: </strong><?php echo get_the_term_list( $post->ID, 'region', '', ', ', '' ); ?> <br/>
                                            <strong>Province: </strong><?php echo get_the_term_list( $post->ID, 'province', '', ', ', '' ); ?> <br/>
                                        </p>
                                    </div>
                                    <?php the_content(); ?>
                                    <div id="tabs">
                                        <ul>
                                            <li><a href="#tabs-1">
                                                <?php 
                                                    echo ( "Tagalog" );
                                                ?>
                                            </a></li>
                                            
                                            <?php 
                                                if(types_render_field('anong-diyalekto', array('raw'=>'true'))) { 
                                            ?>
                                                <li><a href="#tabs-2">
                                                    <?php echo ( types_render_field('anong-diyalekto', array()) ); ?>
                                                </a></li>
                                            <?php }; ?>  
                                        </ul>
                                        <div id="tabs-1">
                                            <div> <?php echo ("<b>SINO/ANO:</b> <span>" . types_render_field('sino-ano', array() ) . "</span>");?> </div>
                                            <div> <?php  echo ("<b>KAILAN/SAAN:</b> <span>" . types_render_field('kailan-saan', array() ) . "</span>");?> </div>
                                            <div> <?php echo ("<b>PAANO/BAKIT:</b> <span>" . types_render_field('paano-bakit', array() ) . "</span>");?> </div>
                                        </div>
                                        <?php 
                                            if(types_render_field('anong-diyalekto', array('raw'=>'true'))) { 
                                        ?>
                                        <div id="tabs-2">
                                            <div> <?php echo ("<b>SINO/ANO:</b> <span>" . types_render_field('sino-ano-diyalekto', array() ) . "</span>");?> </div>
                                            <div> <?php echo ("<b>KAILAN/SAAN:</b> <span>" . types_render_field('kailan-saan-diyalekto', array() ) . "</span>");?> </div>
                                            <div> <?php echo ("<b>PAANO/BAKIT:</b> <span>" . types_render_field('paano-bakit-diyalekto', array() ) . "</span>");?> </div>
                                        </div>
                                        <?php }; ?>  
                                    </div>
                                    <div>
                                        <p>
                                            <br />
                                            <strong>Source: </strong><?php echo (types_render_field('source', array() ));?>
                                        </p>
                                    </div>
                                <?php }; ?>  

                                <?php if ( in_category('SilipKainan') || in_category('SilipTulugan') ) { ?>
                                    <div class="slp-knn_images"> 
                                        <?php if(get_post_meta(get_the_ID(), 'wpcf-image-1', true)) {?>
                                            <img src="<?php echo get_post_meta(get_the_ID(), 'wpcf-image-1', true); ?>" />
                                        <?php }; ?>  
                                        <?php if(get_post_meta(get_the_ID(), 'wpcf-image-2', true)) {?>
                                            <img src="<?php echo get_post_meta(get_the_ID(), 'wpcf-image-2', true); ?>" />
                                        <?php }; ?>  
                                    </div>
                                    <div class="slp-knn_content">
                                        <hr/>
                                        <div>
                                            <br/>
                                            <label><strong>About <?php the_title() ?></strong></label>
                                            <br/>
                                            <?php if(get_post_meta(get_the_ID(), 'wpcf-restaurant-description', true)) {?>
                                                <p><?php echo get_post_meta(get_the_ID(), 'wpcf-restaurant-description', true); ?></p>
                                            <?php }; ?>  
                                        </div>
                                        <br/>
                                        <div>
                                            <label><strong>Address:</strong></label>
                                            <?php if(get_post_meta(get_the_ID(), 'wpcf-restaurant-address', true)) {?>
                                                <span><?php echo get_post_meta(get_the_ID(), 'wpcf-restaurant-address', true); ?></span>
                                            <?php }; ?>  
                                        </div>
                                        <div>
                                            <label><strong>Email:</strong></label>
                                            <?php if(get_post_meta(get_the_ID(), 'wpcf-restaurant-email', true)) {?>
                                                <span><?php echo get_post_meta(get_the_ID(), 'wpcf-restaurant-email', true); ?></span>
                                            <?php }; ?>  
                                        </div>
                                        <div>
                                            <label><strong>Amenities:</strong></label>
                                            <?php if(get_post_meta(get_the_ID(), 'wpcf-restaurant-amenities', true)) {?>
                                                <span><?php echo get_post_meta(get_the_ID(), 'wpcf-restaurant-amenities', true); ?></span>
                                            <?php }; ?>  
                                        </div>
                                        <div>
                                            <label><strong>Extras:</strong></label>
                                            <?php if(get_post_meta(get_the_ID(), 'wpcf-restaurant-extras', true)) {?>
                                                <span><?php echo get_post_meta(get_the_ID(), 'wpcf-restaurant-extras', true); ?></span>
                                            <?php }; ?>  
                                        </div>
                                        
                                        <div>
                                            <label><strong>Landmarks:</strong></label>
                                            <?php if(get_post_meta(get_the_ID(), 'wpcf-restaurant-nearest-landmark', true)) {?>
                                                <span><?php echo get_post_meta(get_the_ID(), 'wpcf-restaurant-nearest-landmark', true); ?></span>
                                            <?php }; ?>  
                                        </div>
                                        <div>
                                            <label><strong>Operating Hours:</strong></label>
                                            <?php if(get_post_meta(get_the_ID(), 'wpcf-restaurant-operating-hours', true)) {?>
                                                <span><?php echo get_post_meta(get_the_ID(), 'wpcf-restaurant-operating-hours', true); ?></span>
                                            <?php }; ?>  
                                        </div>
                                        <div>
                                            <label><strong>Phone No.:</strong></label>
                                            <?php if(get_post_meta(get_the_ID(), 'wpcf-restaurant-phone-no', true)) {?>
                                                <span><?php echo get_post_meta(get_the_ID(), 'wpcf-restaurant-phone-no', true); ?></span>
                                            <?php }; ?>  
                                        </div>
                                        <div>
                                            <label><strong>Promos:</strong></label>
                                            <?php if(get_post_meta(get_the_ID(), 'wpcf-restaurant-promos', true)) {?>
                                                <span><?php echo get_post_meta(get_the_ID(), 'wpcf-restaurant-promos', true); ?></span>
                                            <?php }; ?>  
                                        </div>
                                    </div>
                                <?php }; ?> 
                                
                                <!-- --- -->
                                
                                <?php 
                                 $thumb = '';
 
                                 $width = (int) apply_filters( 'et_pb_index_blog_image_width', 1080 );
 
                                 $height = (int) apply_filters( 'et_pb_index_blog_image_height', 675 );
                                 $classtext = 'et_featured_image';
                                 $titletext = get_the_title();
                                 $thumbnail = get_thumbnail( $width, $height, $classtext, $titletext, $titletext, false, 'Blogimage' );
                                 $thumb = $thumbnail["thumb"];
 
                                 $post_format = et_pb_post_format();
 
                                 if ( 'video' === $post_format && false !== ( $first_video = et_get_first_video() ) ) {
                                     printf(
                                         '<div class="et_main_video_container">
                                             %1$s
                                         </div>',
                                         et_core_esc_previously( $first_video )
                                     );
                                 } else if ( ! in_array( $post_format, array( 'gallery', 'link', 'quote' ) ) && 'on' === et_get_option( 'divi_thumbnails', 'on' ) && '' !== $thumb ) {
                                     print_thumbnail( $thumb, $thumbnail["use_timthumb"], $titletext, $width, $height );
                                 } else if ( 'gallery' === $post_format ) {
                                     et_pb_gallery_images();
                                 }
                             ?>
 
                             <?php
                                 $text_color_class = et_divi_get_post_text_color();
 
                                 $inline_style = et_divi_get_post_bg_inline_style();
 
                                 switch ( $post_format ) {
                                     case 'audio' :
                                         $audio_player = et_pb_get_audio_player();
 
                                         if ( $audio_player ) {
                                             printf(
                                                 '<div class="et_audio_content%1$s"%2$s>
                                                     %3$s
                                                 </div>',
                                                 esc_attr( $text_color_class ),
                                                 et_core_esc_previously( $inline_style ),
                                                 et_core_esc_previously( $audio_player )
                                             );
                                         }
 
                                         break;
                                     case 'quote' :
                                         printf(
                                             '<div class="et_quote_content%2$s"%3$s>
                                                 %1$s
                                             </div> <!-- .et_quote_content -->',
                                             et_core_esc_previously( et_get_blockquote_in_content() ),
                                             esc_attr( $text_color_class ),
                                             et_core_esc_previously( $inline_style )
                                         );
 
                                         break;
                                     case 'link' :
                                         printf(
                                             '<div class="et_link_content%3$s"%4$s>
                                                 <a href="%1$s" class="et_link_main_url">%2$s</a>
                                             </div> <!-- .et_link_content -->',
                                             esc_url( et_get_link_url() ),
                                             esc_html( et_get_link_url() ),
                                             esc_attr( $text_color_class ),
                                             et_core_esc_previously( $inline_style )
                                         );
 
                                         break;
                                 }
 
                             endif;
                         ?>
                     </div> <!-- .et_post_meta_wrapper -->
                 <?php  } ?>
 
                     <div class="entry-content">
                     <?php
                         do_action( 'et_before_content' );
 
                         the_content();
 
                         wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'Divi' ), 'after' => '</div>' ) );
                     ?>
                     </div> <!-- .entry-content -->
                     <div class="et_post_meta_wrapper">
                     <?php
                     if ( et_get_option('divi_468_enable') === 'on' ){
                         echo '<div class="et-single-post-ad">';
                         if ( et_get_option('divi_468_adsense') !== '' ) echo et_core_intentionally_unescaped( et_get_option('divi_468_adsense'), 'html' );
                         else { ?>
                             <a href="<?php echo esc_url(et_get_option('divi_468_url')); ?>"><img src="<?php echo esc_attr(et_get_option('divi_468_image')); ?>" alt="468" class="foursixeight" /></a>
                 <?php  }
                         echo '</div> <!-- .et-single-post-ad -->';
                     }
                 ?>
 
                     <?php if (et_get_option('divi_integration_single_bottom') !== '' && et_get_option('divi_integrate_singlebottom_enable') === 'on') echo et_core_intentionally_unescaped( et_get_option('divi_integration_single_bottom'), 'html' ); ?>
 
                     <?php
                         if ( ( comments_open() || get_comments_number() ) && 'on' === et_get_option( 'divi_show_postcomments', 'on' ) ) {
                             comments_template( '', true );
                         }
                     ?>
                     </div> <!-- .et_post_meta_wrapper -->
                 </article> <!-- .et_pb_post -->
 
             <?php endwhile; ?>
             </div> <!-- #left-area -->
 
             <?php get_sidebar(); ?>
         </div> <!-- #content-area -->
     </div> <!-- .container -->
     <?php endif; ?>
 </div> <!-- #main-content -->
 </main>
 
 <?php
 
 get_footer();
 
<?php /* Template Name: Silippinas Map */ ?>

<?php

get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

?>
  <style>
  body {height: auto; width: auto;}
  path {cursor: pointer;}

  * {font-family: Arial, Helvetica, sans-serif; box-sizing: border-box;}

  #snapper {height: 1800px; width: 1200px; transform-origin: 0 0; opacity: 0; transition: .5s;}
  #snapper.active {opacity: 1;}

  .layover .container:before {display: none !important; padding-top: 0 !important;}

  .layover {max-width: 100%; width: 183px; padding: 20px; background-color: #FFF; border-radius: 5px; display: none; position: absolute; z-index: 999; opacity: 0; box-shadow: 0px 0px 15px 1px rgba(0,0,0,0.25);}
  .layover .thumb, .layover .content {display: inline-block; vertical-align: top;}
  .layover .thumb {width: 100%; padding: 10px;}
  .layover .content {width: calc(100% - 125px); width: 100%; color: #333; font-size: 10px;}
  .layover .content p {font-size: inherit; color: inherit; display: block; float: none; margin: 0 auto; padding: 0; line-height: normal;}
  .layover .content p strong {font-size: 14px;}
  .layover .content img {display: none; margin: 0 auto; height: 60px; max-width: 100%; cursor: pointer;}
  .layover .content img.active {display: block;}

  .snapper-wrapper {overflow: hidden;}
  .snapper-zoom {position: fixed; top: 260px; left: calc(50% - 350px); transform: translateX(-50%); z-index: 999;}
  .snapper-zoom a {display: block; margin-bottom: 10px; border: 1px solid #000; border-radius: 5px; transition: .5s; line-height: 35px; height: 35px; width: 35px; text-align: center; background-color: #FFF; text-decoration: none !important; font-weight: bold; color: #000;}
  .snapper-zoom a:hover {color: #000; background-color: rgba(255, 255, 255, .5);}
  .layover.active {display: block; opacity: 1;}
  @media only screen and (max-width: 600px) { .snapper-zoom {position: fixed; top: 520px; left: calc(50% - 350px); transform: translateX(-184%); z-index: 999;} }
  @media only screen and (max-width: 768px) { .snapper-zoom {position: fixed; top: 360px; left: calc(50% - 350px); transform: translateX(-100%); z-index: 999;} }
  
  #snapper text {opacity: 0; display: none; transition: .5s; font-size: 8px; font-weight: bold;}
  #snapper.zoomed text {opacity: 1; display: block;}

  .snap {position: relative; height: 900px; width: 600px; margin: 0 auto; overflow: visible;}

  article {position: relative;}

  @media screen and (max-width: 1024px) {
    .snapper-zoom {left: 100px;}
  }
  </style>

<div id="main-content">

<?php if ( ! $is_page_builder_used ) : ?>

  <div class="container">
    <div id="content-area" class="clearfix">
      <div id="left-area">

<?php endif; ?>

      <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <?php if ( ! $is_page_builder_used ) : ?>

          <!-- <h1 class="entry-title main_title"><?php the_title(); ?></h1> -->
        <?php
          $thumb = '';

          $width = (int) apply_filters( 'et_pb_index_blog_image_width', 1080 );

          $height = (int) apply_filters( 'et_pb_index_blog_image_height', 675 );
          $classtext = 'et_featured_image';
          $titletext = get_the_title();
          $thumbnail = get_thumbnail( $width, $height, $classtext, $titletext, $titletext, false, 'Blogimage' );
          $thumb = $thumbnail["thumb"];

          if ( 'on' === et_get_option( 'divi_page_thumbnails', 'false' ) && '' !== $thumb )
            print_thumbnail( $thumb, $thumbnail["use_timthumb"], $titletext, $width, $height );
        ?>

        <?php endif; ?>
        
        <div style='padding-top: 50px; padding-bottom: 15px;'>
            <p style='font-size: 28px; font-weight: bold; color: red; font-family: proxima-n-w01-reg,sans-serif; max-width: 80%; margin: 0 auto; text-align: center; padding: 20px'>
                MAGANDANG ARAW KABAYAN! <br> SAAN MO GUSTONG <span style='color: #0E3E9B;'>SUMILIP</span> NGAYON?<br>
                <span style="font-weight: 500;">(Klik Ka lang sa Bayan mo!)</span> <p>
        </div>

              <div class="snapper-wrapper">
                <div class="snapper-zoom">
                  <a class="zoom-in" href="#">&plus;</a>
                  <a class="zoom-out" href="#">&minus;</a>
                </div>
                <div class="snap">
                  <div class="snap-container">
                    <svg id="snapper"></svg>
                  </div>
                  <div class="layover">
                    <div class="layover-container">
                      <div class="content">
                        <img src="https://via.placeholder.com/100x100" alt="placeholder-thumb" class="default"/>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <div style='background-color:#d5163e; padding-top: 15px; padding-bottom: 15px;'>
            <p style='font-size: 26px; color: white; font-family: Arial; max-width: 80%; margin: 0 auto; text-align: center; padding: 20px'>
                HUWAG MAGING BANYAGA SA SARILING BAYAN... SILIP NA SA PINAS, KABAYAN!
            </p>
        </div>

        <?php
          if ( ! $is_page_builder_used && comments_open() && 'on' === et_get_option( 'divi_show_pagescomments', 'false' ) ) comments_template( '', true );
        ?>
        </article> <!-- .et_pb_post -->

      <?php endwhile; ?>

<?php if ( ! $is_page_builder_used ) : ?>

      </div> <!-- #left-area -->

      <?php get_sidebar(); ?>
    </div> <!-- #content-area -->
  </div> <!-- .container -->
<?php endif; ?>
</div> <!-- #main-content -->
  <!-- <script src="../wp-content/uploads/assets/vendor/jquery/3.3.1.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/interact.js/1.2.9/interact.min.js"></script>
  <script src="https://silippinas.com/wp-content/uploads/assets/vendor/snap.svg/0.5.1.js"></script>
  <script src="https://silippinas.com/wp-content/uploads/assets/vendor/snap.svg/src/paper.js"></script>
  <script src="https://silippinas.com/wp-content/uploads/assets/vendor/snap.svg/src/matrix.js"></script>
  <script src="https://silippinas.com/wp-content/uploads/assets/js/settings.js"></script>
  <script src="https://silippinas.com/wp-content/uploads/assets/js/map.js"></script>

<?php

get_footer();

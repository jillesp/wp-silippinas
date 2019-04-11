<?php

/*
 * Template Name: SilipKainan
 * Template Post Type: page
 */
  

get_header();

$show_default_title = get_post_meta( get_the_ID(), '_et_pb_show_title', true );

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

?>

 
<style>
 
#left-area {padding-bottom: 0 !important;}
.et_pb_post {margin-bottom: 0 !important;}

#et-main-area {margin-top: 182px;}

.carousel-group {text-align: center; max-width: 1000px; margin: 0 auto;}
.carousel-group > .carousel {display: inline-block; width: 400px; margin: 0 25px 25px; height: 520px;}
.carousel-group > .carousel .carousel-inner {width: auto; height: 100%;}
.carousel-group > .carousel .carousel-inner .carousel-item {height: 100%;}
.carousel-group > .carousel .carousel-inner .carousel-item img {height: 100%; width: auto; max-width: none;}
.carousel-group > .carousel .carousel-caption {background: rgba(255,255,255,.8); padding: 15px;}
.carousel-group > .carousel .carousel-caption a {color: inherit; text-decoration: underline; transition: .5s;}
.carousel-group > .carousel .carousel-caption a:hover {color: #0143B3;}
.carousel-group > .carousel .carousel-caption h5 {margin: 0 auto; padding: 0; font-size: 22px; color: '#333';}
.carousel-group > .carousel .carousel-caption p {margin: 0 auto; padding: 0; font-size: 14px; position: relative; padding-left: 30px; color: #333;}
.carousel-group > .carousel .carousel-caption .address p {padding: 0; line-height: normal; margin-bottom: 20px;}
.carousel-group > .carousel .carousel-caption .extras * {color: #333; font-size: 16px; padding: 0;}
.carousel-group > .carousel .carousel-caption .promos p {padding: 0;}
.carousel-group > .carousel .carousel-caption .promos strong {display: block; color: #333; font-size: 16px;}
.carousel-group > .carousel .carousel-caption .text-with-icons {text-align: left;}
.carousel-group > .carousel .carousel-caption .text-with-icons * {line-height: 24px;}
.carousel-group > .carousel .carousel-caption .text-with-icons span {width: 30px; position: absolute; left: 0; font-size: 18px; top: 3px;}
.carousel-group > .carousel .carousel-caption .text-with-icons i {margin-right: 10px;}
</style>


<div id="main-content">
	<?php
		if ( et_builder_is_product_tour_enabled() ):
			// load fullwidth page in Product Tour mode
			while ( have_posts() ): the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_post' ); ?>>
					<div class="entry-content">
					<?php
						the_content();
					?>  
					</div> <!-- .entry-content -->

				</article> <!-- .et_pb_post -->

		<?php endwhile;
		else:
	?>
	<!-- <div class="container"> -->
		<div id="content-area" class="clearfix">
			<div id="left-area">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php
				/**
				 * Fires before the title and post meta on single posts.
				 *
				 * @since 3.18.8
				 */
				do_action( 'et_before_post' );
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_post' ); ?>>
					<div class="entry-content">
						<?php

							$p_id = $post->ID;
							$terms = get_the_terms( $p_id, 'province' );
							if ( !empty( $terms ) ){
								$term = array_shift( $terms );
							};

							$the_query = new WP_Query(
								array(
									'post_type' => 'post',
									'tax_query' => array(
										'relation' => 'AND',
										array(
											'taxonomy' => 'category',
											'field'    => 'slug',
											'terms'    => 'silipkainan',
										),
										array(
											'taxonomy' => 'province',
											'field'    => 'slug',
											'terms'    => $term->slug
										),
									),
								)
							);
						?>


<div class='carousel-group'>
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<div id="carousel-<?php echo get_the_ID(); ?>" class="carousel slide" data-ride="carousel" data-interval="false">
								<div class="carousel-inner">
									<div class="carousel-item active">
										<?php echo (types_render_field('image-1', array() ));?>
										<div class="carousel-caption d-none d-md-block">
											<h5><?php echo (types_render_field('restaurant-name', array() ));?></h5>
											<div class='address'>
												<?php echo (types_render_field('restaurant-address', array() ));?>
											</div>
											<div class='text-with-icons'>
												<p class='phone'>
													<span><i class='fa fa-phone'></i></span>
													<?php echo (types_render_field('restaurant-phone-no', array() ));?>
												</p>
												<p class='email'>
													<span><i class='fa fa-envelope'></i></span>
													<?php echo (types_render_field('restaurant-email', array() ));?>
												</p>
												<p class='hours'>
													<span><i class='fa fa-clock-o'></i></span>
													<?php echo (types_render_field('restaurant-operating-hours', array() ));?>
												</p>
												<p class='landmark'>
													<span><i class='fa fa-search'></i></span>
													<?php echo (types_render_field('restaurant-nearest-landmark', array() ));?>
												</p>
												<p class='amenities'>
													<span><i class='fa fa-star'></i></span>
													<?php echo (types_render_field('restaurant-amenities', array() ));?>
												</p>
											</div>
										</div>
									</div>
									<div class="carousel-item">
										<?php echo (types_render_field('image-2', array() ));?>
										<div class="carousel-caption d-none d-md-block">
											<div class='extras'>
												<?php echo (types_render_field('restaurant-extras', array() ));?>
											</div>
											<div class='promos'>
												<strong>Promos: </strong>
												<?php echo (types_render_field('restaurant-promos', array() ));?>
											</div>
										</div>
									</div>
								</div>
								<a class="carousel-control-prev" href="carousel-<?php echo get_the_ID(); ?>" role="button" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next" href="carousel-<?php echo get_the_ID(); ?>" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
						<?php 
							endwhile; 
							wp_reset_postdata()
						?>
						</div>
						
						<div style="text-align: center; margin: 0 auto; padding: 20px 0;">
						    <img src="https://silippinas.com/wp-content/uploads/2019/03/gweb-ad.png" />
						</div>
						
						<?php
							do_action( 'et_before_content' );
							
				// 			the_content();

							wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'Divi' ), 'after' => '</div>' ) );
						?>

						
						
					</div> <!-- .entry-content -->
					<div class="et_post_meta_wrapper">
					<?php
					if ( et_get_option('divi_468_enable') === 'on' ){
						echo '<div class="et-single-post-ad">';
						if ( et_get_option('divi_468_adsense') !== '' ) echo et_core_intentionally_unescaped( et_core_fix_unclosed_html_tags( et_get_option('divi_468_adsense') ), 'html' );
						else { ?>
							<a href="<?php echo esc_url(et_get_option('divi_468_url')); ?>"><img src="<?php echo esc_attr(et_get_option('divi_468_image')); ?>" alt="468" class="foursixeight" /></a>
				<?php 	}
						echo '</div> <!-- .et-single-post-ad -->';
					}

					/**
					 * Fires after the post content on single posts.
					 *
					 * @since 3.18.8
					 */
					do_action( 'et_after_post' );

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
	<!-- </div> .container -->
	<?php endif; ?>
</div> <!-- #main-content -->


<script>
    jQuery('.carousel > a').click(function(e){
        e.preventDefault();
        var target = jQuery(this).parent();
        jQuery(target).carousel( jQuery(this).attr('data-slide') );
    })
</script>


<?php

get_footer();

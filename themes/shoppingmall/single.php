<?php


get_header(); ?>
<?php 
    $postID = $post->ID;
    $categories = get_the_category();
    $category_id = $categories[0]->cat_ID; 
    $category_name = get_cat_name($category_id);
    $shopGallery = get_post_meta($postID, 'Shop Gallery', true);
    $shopLogo = get_post_meta($postID, 'Shop Logo', true); 
    $location = get_post_meta($postID, 'Location', true);
?>
<?php if( have_posts() ) : while ( have_posts() ) : the_post();
    
    $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large'); ?>
    <main id="header-banner"  class="topspace" style="background-image: url(<?php echo $src[0]; ?> ) !important;background-repeat:no-repeat;background-size: cover;background-position:center;">
    </main>

    <section class="post-container-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="post-desc-section">
                        <div class="post-details-block-title">
                            <?php if(in_category('11')){  ?>
                                <h1><?php the_title() ?></h1>
                                <span><?php echo $category_name;?></span>
                            <?php }else{ ?>
                                <h1><?php the_title() ?></h1>
                                <div class="date-and-formats">
                                    <div class="date-box updated"><?php the_time('dS F Y'); ?></div>
                                </div>
                            <?php } ?>
                        </div>

                        <div class="post-details-block-content">
                            <?php the_content(); ?>
                            <?php if(in_category('4')){  ?>
                                <?php echo do_shortcode('[addthis tool="addthis_inline_share_toolbox_714f"]'); ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 post-side-bar"><?php get_sidebar(); ?></div>
            </div>
        </div>
    </section>
    <?php if($shopGallery != ''){ ?>
        <section  id="shopes-gallery">
            <div class="container">
                <h2>Gallery</h2>
                <div class="row gallery-sec">
                    <?php echo do_shortcode($shopGallery); ?>
                </div>
                </div>
        </section>
    <?php } ?>
<?php endwhile; endif; ?>
<?php if(in_category('11')){  ?>
    <section id="related-post">
        <div class="container">
            <div class="row related_posts">
                <h3>You Might Also Like</h3>
                <?php 
                    $RelatedPosts = new WP_Query( 
                        array(
                            'cat' => 11,
                            'orderby' => 'rand', 
                            'posts_per_page' => '3'
                        ));

                    if ($RelatedPosts->have_posts()) : while ( $RelatedPosts->have_posts()) :  $RelatedPosts->the_post(); ?>                
                        <div class="related-thumbnail listing-shop-boxs col-md-4 mb-3">
                            <a class="shops-box" href="<?php the_permalink() ?>">
                                <div class="shops-logo-wrapper">
                                    <img class="shops-logo" alt="<?php the_title() ?>" src="<?php echo $shopLogo;?>" width="600" height="450">
                                    </div>

                                <div class="shops-name">
                                    <h4><?php the_title() ?></h4>
                                    <span><?php echo $category_name;?></span>
                                </div>

                                <div class="shops-details-wrap">
                                    <p class="shops-details shops-location"><?php echo $location; ?></p>
                                </div>
                            </a>
                        </div>
                <?php endwhile; else : endif;
                wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
<?php } ?>





<?php 
get_footer(); ?>
<?php


get_header(); ?>
<?php 
    $postID = $post->ID;
    $categories = get_the_category();
    $category_id = $categories[0]->cat_ID; 
    $category_name = get_cat_name($category_id);
    $shopGallery = get_post_meta($postID, 'Shop Gallery', true);
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

<?php 
get_footer(); ?>
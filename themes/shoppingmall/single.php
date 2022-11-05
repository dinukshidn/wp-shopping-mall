<?php


get_header(); ?>

    <div id="inner-pages">
        <div class="center-wrapper clearfix topspace">
            <div class="inner-wrapper">
                <?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="page-title">
                    <h1><?php the_title() ?></h1>
                </div>
                <div class="pages-content-wrapper cms-page clearfix">
                    <div class="news-wrapper news-single float-l">
                        <?php if ( has_post_thumbnail() ) {
                        $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large'); 
                        ?>
                        <div class="single-post-image" style="background-image: url(<?php echo $src[0]; ?> ) !important;background-repeat:no-repeat;background-size: cover;background-position:center;">
                        <!-- <img class="single-post-image" src="<?php //echo $src[0]; ?>"> -->
                        </div>
                        <?php }?>
                        <div class="news-des-details">
                            <div class="date-and-formats">
                                <div class="date-box updated">
                                    <?php the_time('dS F Y'); ?>
                                </div>
                            </div>
                        <?php the_content(); ?>
                            <?php echo do_shortcode('[addthis tool="addthis_inline_share_toolbox_z19j"]'); ?>
                        </div>

                    </div>
                    <div class="news-side-bar float-l clearfix">
                        <div id="news-sidebar"><?php get_sidebar(); ?></div>
                    </div>
                </div>
                    <?php endwhile;
                    endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php 
get_footer(); ?>
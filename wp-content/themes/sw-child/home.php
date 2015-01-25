<?php get_header(); ?>

<?php if (intval(of_get_option('of_sn_fea_nr')) > 0 ) { ?>
    <div id="featured_wrapper">

        <div class="wrapper">

            <div id="featured_posts">

                <div id="featured-slider" class="sliderwrapper">
                    <?php
                    $count = 0;

                    $post_count=0;

                    if ( of_get_option('of_sn_fea_recent') == 1 ) {
                        $args = array(
                            'post__not_in'=>$do_not_duplicate,
                            'posts_per_page' => -1,
                            'orderby' => 'date',
                            'order' => 'DESC'
                        );
                    } else {
                        if ( of_get_option('of_sn_fea_tag') <> "" ) {
                            $args = array(
                                'post_type' => 'any',
                                'post__not_in'=>$do_not_duplicate,
                                'posts_per_page' => -1,
                                'tag' => of_get_option('of_sn_fea_tag'),
                                'orderby' => 'date',
                                'order' => 'DESC'
                            );
                        } elseif ( of_get_option('of_sn_fea_cf') == 1 ) {
                            $args = array(
                                'post_type' => 'any',
                                'post__not_in'=>$do_not_duplicate,
                                'posts_per_page' => -1,
                                'meta_key' => 'featured',
                                'meta_value' => 'true',
                                'orderby' => 'date',
                                'order' => 'DESC'
                            );
                        } else {
                            $args = array(
                                'post__not_in'=>$do_not_duplicate,
                                'posts_per_page' => -1,
                                'cat' => of_get_option('of_sn_fea_cat' , 1),
                                'orderby' => 'date',
                                'order' => 'DESC'
                            );
                        }
                    }

                    $gab_query = new WP_Query();$gab_query->query($args);
                    while ($post_count < 6 && $gab_query->have_posts()  ) :

                        $gab_query->the_post();
                        $do_not_duplicate[] = $post->ID;
                        ?>

<?php

//                        print_r(get_field( "feature_on_homepage?" ));
                        $is_featured = get_field( "feature_on_homepage?" );
//                        echo $is_featured[0];
                        if($is_featured[0]=="Yes"): ?>

                            <div class="item">
                                <div class="sliderPostPhoto">
                                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'journey' ), the_title_attribute( 'echo=0' ) ); ?>">
                                        <img src="<?php echo the_field("home_page_slider_image");  ?>" class="thumb alignleft" alt=""/>
                                    </a>
                                </div><!-- end of sliderphoto/video -->

                                <?php if (($gab_flv == '') and ($gab_video == '') and ($gab_iframe == '') ) { /* if this is not a video*/ ?>
                                    <div class="caption">
                                        <h2 class="posttitle">
                                            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'journey' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a>
                                        </h2>

                                        <p><?php print string_limit_words(get_the_excerpt(), 13); ?>&hellip;</p>

                                    </div>
                                <?php } ?>

                            </div><!-- /item -->
                            <?php $post_count++; endif; ?>

                        <?php $count++; endwhile; wp_reset_query(); ?>

                </div><!-- /slides -->

                <div id="arrows"><a href="#" class="prev"><?php _e('Previous', 'journey'); ?></a><a href="#" class="next"><?php _e('Next', 'journey'); ?></a></div>

                <div id="nav">

                    <ul>
                        <?php
                        $count = 1;
                        $gab_query = new WP_Query();$gab_query->query($args);
                        while ($gab_query->have_posts()) : $gab_query->the_post();
                            /*Uncomment to avoid duplicate post issue */
                            /* $do_not_duplicate[] = $post->ID */
                            ?>

                            <?php if(get_field(  "feature_on_homepage?" )): ?>
                                <li>
                                    <a href="#">
                                        <img src="<?php echo the_field("home_page_slider_image");  ?>" class="thumb alignleft" alt=""/>
                                    </a>

                                    <a href="#" class="posttitle"><?php gab_posttitle('55','&hellip;'); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php $count++; endwhile; wp_reset_query(); ?>
                    </ul>
                </div>

            </div><!-- /featured_posts -->

        </div><!-- /wrapper -->



    </div><!-- /featured wrapper -->
<?php } ?>

<?php gab_dynamic_sidebar( 'Featured' ); ?>

<div class="wrapper">
    <div id="container">
        <div id="main">
            <div class="holder margin_bottom_25">
                <div id="secondary_top" class="border_bottom_30">
                    <div class="col_narrow border_right_15">
                        <?php
                        gab_dynamic_sidebar( 'Se_Top_Left1' );
                        include_once(TEMPLATEPATH . '/ads/home_120x600.php');
                        gab_dynamic_sidebar( 'Se_Top_Left2' );
                        ?>
                    </div>

                    <div class="col_wide border_right_15">
                        <?php gab_dynamic_sidebar( 'Se_Top_Mid1' ); ?>

                        <?php if (intval(of_get_option('of_sn_nr2')) > 0 ) { ?>

                            <span class="catname">
                                <a href="<?php echo get_category_link(of_get_option('of_sn_cat2'));?>"><?php echo get_cat_name(of_get_option('of_sn_cat2')); ?></a>
                            </span>

                            <?php
                            $count = 1;
                            $args = array(
                                'posts_per_page' => of_get_option('of_sn_nr2'),
                                'cat' => of_get_option('of_sn_cat2')
                            );
                            $gab_query = new WP_Query();$gab_query->query($args);
                            while ($gab_query->have_posts()) : $gab_query->the_post();
                                ?>

                                <div class="featuredpost<?php if ($count == of_get_option('of_sn_nr2')) { echo " lastpost"; } ?>">
                                    <h2 class="posttitle"><a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'snapwire' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php echo substr($post->post_title, 0, 50); ?></a></h2>

                                    <div class="wrap-content">
                                        <?php if(get_field('post_image')) : ?>
                                            <a href="<?php the_permalink() ?>" >

                                                <!--                                <img class="thumbnail alignleft" src="--><?php //the_field('post_image'); ?><!--" alt="" /> -->
                                            </a>
                                        <?php endif; ?>
                                        <?php the_post_thumbnail(array(100,100), array('class' => 'alignleft')); ?>
                                        <p><?php echo string_limit_words(get_the_excerpt(), 22); ?>&hellip;</p>
                                    </div>

                                    <span class="postmeta<?php if ($count == of_get_option('of_sn_nr2')) { echo " lastpost"; } ?>">
                                        <p class="postmetadata"><span class="label-cat">Category: </span> <br /> <?php the_category(', ') ?>  <br />
                                            <span class="date"><?php echo get_the_date(''); ?></span> <?php edit_post_link(__('Edit','snapwire'),' / ',''); ?>
                                        </p>
                                    </span>

                                </div>
                                <?php $count++; endwhile; wp_reset_query(); ?>

                        <?php } ?>

                        <?php gab_dynamic_sidebar( 'Se_Top_Mid2' ); ?>
                    </div>

    <div class="col_wide last">
        <?php gab_dynamic_sidebar( 'Se_Top_Right1' ); ?>

        <?php if (intval(of_get_option('of_sn_nr3')) > 0 ) { ?>

            <span class="catname">
								<a href="<?php echo get_category_link(of_get_option('of_sn_cat3'));?>"><?php echo get_cat_name(of_get_option('of_sn_cat3')); ?></a>
							</span>

            <?php
            $count = 1;
            $args = array(
                'posts_per_page' => of_get_option('of_sn_nr3'),
                'cat' => of_get_option('of_sn_cat3')
            );
            $gab_query = new WP_Query();$gab_query->query($args);
            while ($gab_query->have_posts()) : $gab_query->the_post();
                ?>

                <div class="featuredpost<?php if ($count == of_get_option('of_sn_nr2')) { echo " lastpost"; } ?>">

                    <h2 class="posttitle"><a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'snapwire' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php echo substr($post->post_title, 0, 50); ?></a></h2>
                    <div class="wrap-content">
                        <?php if(get_field('post_image')) : ?>
                            <!--                            <a href="--><?php //the_permalink() ?><!--" ><img class="thumbnail alignleft" src="--><?php //the_field('post_image'); ?><!--" alt="" /> </a>-->
                        <?php endif; ?>
                        <?php the_post_thumbnail(array(100,100), array('class' => 'alignleft')); ?>
                        <p><?php echo string_limit_words(get_the_excerpt(), 22); ?>&hellip;</p>
                    </div>

                    <span class="postmeta<?php if ($count == of_get_option('of_sn_nr2')) { echo " lastpost"; } ?>">
                        <p class="postmetadata"><span class="label-cat">Category: </span> <br /> <?php the_category(', ') ?>  <br />
                            <span class="date"><?php echo get_the_date(''); ?></span> <?php edit_post_link(__('Edit','snapwire'),' / ',''); ?>
                        </p>
                    </span>

                </div>
                <?php $count++; endwhile; wp_reset_query(); ?>

        <?php } ?>



        <?php gab_dynamic_sidebar( 'Se_Top_Right2' );?>
    </div>

    <div class="clear"></div>

</div>

<div id="secondary_top" class="border_bottom_30">
    <div class="col_wide border_right_15 more">
        <div class="wrap-readmore">
            <a class="readmore_news" href="<?php echo get_category_link(of_get_option('of_sn_cat2'));?>?section=industrynews">READ MORE NEWS</a>
        </div>
    </div>
    <div class="col_wide last">
        <div class="wrap-readmore">
            <a class="readmore_news" href="<?php echo get_category_link(of_get_option('of_sn_cat3'));?>?section=industrynews">READ MORE NEWS</a>
        </div>
    </div>
    <div class="clear"></div>
</div>


<?php gab_dynamic_sidebar( 'Secondary1' ); ?>
<?php
if (intval(of_get_option('of_sn_nr4')) > 0 && intval(of_get_option('of_sn_nr5')) > 0) { ?>
    <div id="secondary_bottom" class="border_bottom_30">

        <div class="col_left border_right_20">
            <?php gab_dynamic_sidebar( 'Se_Bot_Left1' ); ?>

            <?php
            if (intval(of_get_option('of_sn_nr4')) > 0 ) { ?>

                <span class="catname">
								<a href="<?php echo get_category_link(of_get_option('of_sn_cat4'));?>"><?php echo get_cat_name(of_get_option('of_sn_cat4')); ?></a>
							</span>

                <?php
                $count = 1;
                $args = array(

                    'posts_per_page' => of_get_option('of_sn_nr4'),
                    'cat' => of_get_option('of_sn_cat4')
                );
                $gab_query = new WP_Query();$gab_query->query($args);
                while ($gab_query->have_posts()) : $gab_query->the_post();
                    ?>

                    <div class="featuredpost<?php if ($count == of_get_option('of_sn_nr4')) { echo " lastpost"; } ?>">

                        <h2 class="posttitle"><a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'snapwire' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

                        <?php
                        gab_media(array(   'imgtag' => 1,   'link' => 1,
                            'name' => 'snpw-pri_bot',
                            'enable_video' => 0,
                            'catch_image' => of_get_option('of_sn_catch_img'),
                            'enable_thumb' => 1,
                            'resize_type' => 'c',
                            'media_width' => '80',
                            'media_height' => '60',
                            'thumb_align' => 'alignleft',
                            'enable_default' => of_get_option('of_sn_end5'),
                            'default_name' => 'primary_bot1.jpg'
                        ));
                        ?>

                        <p><?php echo string_limit_words(get_the_excerpt(), 18); ?>&hellip;</p>

								<span class="postmeta<?php if ($count == of_get_option('of_sn_nr4')) { echo " lastpost"; } ?>">
                                    <p class="postmetadata"><span class="label-cat">Category: </span> <br /> <?php the_category(', ') ?>  <br />
                                        <span class="date"><?php echo get_the_date(''); ?></span> <?php edit_post_link(__('Edit','snapwire'),' / ',''); ?>
                                    </p>

								</span>

                    </div>
                    <?php $count++; endwhile; wp_reset_query(); ?>
                <a class="readmore_news" href="<?php echo get_category_link(of_get_option('of_sn_cat4'));?>?section=industrynews">READ MORE NEWS</a>
            <?php } ?>


            <?php gab_dynamic_sidebar( 'Se_Bot_Left2' ); ?>
        </div>

        <div class="col_right last">
            <?php gab_dynamic_sidebar( 'Se_Bot_Right1' );  ?>

            <?php if (intval(of_get_option('of_sn_nr5')) > 0 ) { ?>

                <span class="catname">
							<a href="<?php echo get_category_link(of_get_option('of_sn_cat5'));?>"><?php echo get_cat_name(of_get_option('of_sn_cat5')); ?></a>
						</span>

                <?php
                $count = 1;
                $args = array(
                    'posts_per_page' => of_get_option('of_sn_nr5'),
                    'cat' => of_get_option('of_sn_cat5')
                );
                $gab_query = new WP_Query();$gab_query->query($args);
                while ($gab_query->have_posts()) : $gab_query->the_post();
                    ?>

                    <div class="featuredpost<?php if ($count == of_get_option('of_sn_nr5')) { echo " lastpost"; } ?>">

                        <h2 class="posttitle"><a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'snapwire' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

                        <?php
                        gab_media(array(   'imgtag' => 1,   'link' => 1,
                            'name' => 'snpw-pri_bot',
                            'enable_video' => 0,
                            'catch_image' => of_get_option('of_sn_catch_img'),
                            'enable_thumb' => 1,
                            'resize_type' => 'c',
                            'media_width' => '80',
                            'media_height' => '60',
                            'thumb_align' => 'alignleft',
                            'enable_default' => of_get_option('of_sn_end6'),
                            'default_name' => 'primary_bot2.jpg'
                        ));
                        ?>

                        <p><?php echo string_limit_words(get_the_excerpt(), 18); ?>&hellip;</p>

							<span class="postmeta<?php if ($count == of_get_option('of_sn_nr5')) { echo " lastpost"; } ?>">
                                    <p class="postmetadata"><span class="label-cat">Category: </span> <br /> <?php the_category(', ') ?>  <br />
                                        <span class="date"><?php echo get_the_date(''); ?></span> <?php edit_post_link(__('Edit','snapwire'),' / ',''); ?>
                                    </p>

							</span>

                    </div>
                    <?php $count++; endwhile; wp_reset_query(); ?>
                <a class="readmore_news" href="<?php echo get_category_link(of_get_option('of_sn_cat5'));?>?section=industrynews">READ MORE NEWS</a>
            <?php } ?>

            <?php gab_dynamic_sidebar( 'Se_Bot_Right2' ); ?>
        </div>
        <div class="clear"></div>
    </div>
<?php } ?>

<?php gab_dynamic_sidebar( 'Secondary2' ); ?>

<?php if (intval(of_get_option('of_sn_nr6')) > 0 ) { ?>
    <h2 class="title">WHITE PAPER RESEARCH LIBRARY</h2>
    <div id="mediabar">
        <div id="previous_button"></div>
        <div id="next_button"></div>

        <div class="container">
            <ul>
                <?php
                $count=1;
                $args = array(
                    'posts_per_page' => of_get_option('of_sn_nr6'),
                    'cat' => of_get_option('of_sn_cat6')
                );
                $gab_query = new WP_Query();$gab_query->query($args);
                while ($gab_query->have_posts()) : $gab_query->the_post();
                    ?>
                    <li class="car">
                        <div class="thumb">
                            <?php
                            gab_media(array(   'imgtag' => 1,   'link' => 1,
                                'name' => 'snpw-med_slide',
                                'enable_video' => 1,
                                'video_id' => 'mediabar',
                                'enable_thumb' => 1,
                                'catch_image' => 0,
                                'resize_type' => 'c', /* c to crop, h to resize only height, w to resize only width */
                                'media_width' => '130',
                                'media_height' => '120',
                                'thumb_align' => 'mediabar_item',
                                'enable_default' => of_get_option('of_sn_end7'),
                                'default_name' => 'p_gallery.jpg'
                            ));

                            $attachments = get_posts( array(
                                'post_type' => 'attachment',
                                'posts_per_page' => -1,
                                'post_parent' => $post->ID,
                            ) );

                            if ( $attachments ) {
                                foreach ( $attachments as $attachment ) {
                                    $class = "post-attachment mime-" . sanitize_title( $attachment->post_mime_type );
                                    $thumbimg = wp_get_attachment_link( $attachment->ID, 'thumbnail-size', true );
                                    echo  $thumbimg;
                                }

                            }
                            ?>


                        </div>
                        <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'snapwire' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php echo substr($post->post_title, 0, 50); ?></a>

                    </li>
                    <?php $count++; endwhile; wp_reset_query(); ?>
            </ul>
        </div>

        <script type="text/javascript">
            (function($) { $(document).ready(function(){
                $("#mediabar .container").jCarouselLite({
                    <?php if(of_get_option('of_sn_media_rotate') == 1){ ?>
                    auto:<?php if ( of_get_option('of_sn_media_pause') <> "" ) { echo of_get_option('of_sn_media_pause').'000'; } else { echo '5000'; } ?>,
                    <?php } ?>
                    scroll: <?php if ( of_get_option('of_sn_media_scroll') <> "" ) { echo of_get_option('of_sn_media_scroll'); } else { echo '2'; } ?>,
                    speed: <?php if ( of_get_option('of_sn_media_speed') <> "" ) { echo of_get_option('of_sn_media_speed').'000'; } else { echo '1000'; } ?>,
                    visible: 4,
                    start: 0,
                    circular: false,
                    btnPrev: "#previous_button",
                    btnNext: "#next_button"
                });
            })})(jQuery)
        </script>

    </div><!-- end of Mediabar -->
<?php } ?>

<?php gab_dynamic_sidebar( 'Below_Mediabar' ); ?>

<div id="subnews">
    <div class="col border_right_15">
        <?php gab_dynamic_sidebar( 'SubnewsLeft1' ); ?>

        <?php if (intval(of_get_option('of_sn_nr7')) > 0 ) { ?>
            <span class="catname">
								<a href="<?php echo get_category_link(of_get_option('of_sn_cat7'));?>"><?php echo get_cat_name(of_get_option('of_sn_cat7')); ?></a>
							</span>

            <?php
            $count = 1;
            $args = array(
                'posts_per_page' => of_get_option('of_sn_nr7'),
                'cat' => of_get_option('of_sn_cat7')
            );
            $gab_query = new WP_Query();$gab_query->query($args);
            while ($gab_query->have_posts()) : $gab_query->the_post();
                ?>

                <div class="featuredpost<?php if ($count == of_get_option('of_sn_nr7')) { echo " lastpost"; } ?>">
                    <?php the_post_thumbnail(array(100,100), array('class' => 'alignleft')); ?>
                    <h2 class="posttitle"><a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'snapwire' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php echo substr($post->post_title, 0, 40); ?></a></h2>
                    <div class="wrap-content">
                        <p><?php echo myExcerpt($post->post_content, 115); ?> </p>
                    </div>

<!--                    <p>--><?php //echo substr($post->post_content, 0, 95); ?><!--&hellip;</p>-->

								<span class="postmeta<?php if ($count == of_get_option('of_sn_nr7')) { echo " lastpost"; } ?>">
                                    <p class="postmetadata"><span class="label-cat">Category: </span> <br /> <?php the_category(', ') ?>  <br />
                                        <span class="date"><?php echo get_the_date(''); ?></span> <?php edit_post_link(__('Edit','snapwire'),' / ',''); ?>
                                    </p>
								</span>


                </div>
                <?php $count++; endwhile; wp_reset_query(); ?>

        <?php } ?>

        <?php gab_dynamic_sidebar( 'SubnewsLeft2' ); ?>
    </div>

    <div class="col border_right_15">
        <?php gab_dynamic_sidebar( 'SubnewsMid1' );  ?>

        <?php if (intval(of_get_option('of_sn_nr8')) > 0 ) { ?>
            <span class="catname">
								<a href="<?php echo get_category_link(of_get_option('of_sn_cat8'));?>"><?php echo get_cat_name(of_get_option('of_sn_cat8')); ?></a>
							</span>

            <?php
            $count = 1;
            $args = array(
                'posts_per_page' => of_get_option('of_sn_nr8'),
                'cat' => of_get_option('of_sn_cat8')
            );
            $gab_query = new WP_Query();$gab_query->query($args);
            while ($gab_query->have_posts()) : $gab_query->the_post();
                ?>

                <div class="featuredpost<?php if ($count == of_get_option('of_sn_nr8')) { echo " lastpost"; } ?>">
                    <?php the_post_thumbnail(array(100,100), array('class' => 'alignleft')); ?>
                    <h2 class="posttitle"><a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'snapwire' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php echo substr($post->post_title, 0, 40); ?></a></h2>
                    <div class="wrap-content">
                        <p><?php echo myExcerpt($post->post_content, 115); ?> </p>
                    </div>
<!--                    <p>--><?php //echo substr($post->post_content, 0, 95); ?><!--&hellip;</p>-->

								<span class="postmeta<?php if ($count == of_get_option('of_sn_nr8')) { echo " lastpost"; } ?>">
                                    <p class="postmetadata"><span class="label-cat">Category: </span> <br /> <?php the_category(', ') ?>  <br />
                                        <span class="date"><?php echo get_the_date(''); ?></span> <?php edit_post_link(__('Edit','snapwire'),' / ',''); ?>
                                    </p>
								</span>


                </div>
                <?php $count++; endwhile; wp_reset_query(); ?>

        <?php } ?>
        <?php gab_dynamic_sidebar( 'SubnewsMid2' ); ?>
    </div>

    <div class="col last">

        <?php gab_dynamic_sidebar( 'SubnewsRight1' ); ?>

        <?php if (intval(of_get_option('of_sn_nr9')) > 0 ) { ?>

            <span class="catname">
								<a href="<?php echo get_category_link(of_get_option('of_sn_cat9'));?>"><?php echo get_cat_name(of_get_option('of_sn_cat9')); ?></a>
							</span>

            <?php
            $count = 1;
            $args = array(
                'posts_per_page' => of_get_option('of_sn_nr9'),
                'cat' => of_get_option('of_sn_cat9')
            );
            $gab_query = new WP_Query();$gab_query->query($args);
            while ($gab_query->have_posts()) : $gab_query->the_post();
                ?>

                <div class="featuredpost<?php if ($count == of_get_option('of_sn_nr9')) { echo " lastpost"; } ?>">
                    <?php the_post_thumbnail(array(100,100), array('class' => 'alignleft')); ?>
                    <h2 class="posttitle"><a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'snapwire' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php echo substr($post->post_title, 0, 40); ?></a></h2>
                    <div class="wrap-content">
                        <p><?php echo myExcerpt($post->post_content, 115); ?> </p>
                    </div>

								<span class="postmeta<?php if ($count == of_get_option('of_sn_nr9')) { echo " lastpost"; } ?>">
                                    <p class="postmetadata"><span class="label-cat">Category: </span> <br /> <?php the_category(', ') ?>  <br />
                                        <span class="date"><?php echo get_the_date(''); ?></span> <?php edit_post_link(__('Edit','snapwire'),' / ',''); ?>
                                    </p>
								</span>


                </div>
                <?php $count++; endwhile; wp_reset_query(); ?>

        <?php } ?>
        <?php gab_dynamic_sidebar( 'SubnewsRight2' ); ?>
    </div>
    <div class="clear"></div>
</div><!-- /border_bottom_30 -->

<div id="subnews" class="more">
    <div class="col border_right_15">
        <a class="readmore_news" href="<?php echo get_category_link(of_get_option('of_sn_cat7'));?>?section=industrynews">READ MORE NEWS</a>
    </div>

    <div class="col border_right_15">
        <a class="readmore_news" href="<?php echo get_category_link(of_get_option('of_sn_cat8'));?>?section=industrynews">READ MORE NEWS</a>
    </div>

    <div class="col last">
        <a class="readmore_news" href="<?php echo get_category_link(of_get_option('of_sn_cat9'));?>?section=industrynews">READ MORE NEWS</a>
    </div>
    <div class="clear"></div>
</div><!-- /border_bottom_30 -->



<?php gab_dynamic_sidebar( 'MainBottom' ); ?>
</div><!-- /holder -->
</div> <!-- /main -->

<div id="sidebar">
    <div class="holder margin_bottom_25">
        <?php get_sidebar(); ?>
    </div><!-- /holder -->
</div><!-- /sidebar -->

<div class="clear"></div>
</div><!-- End of container -->

<?php get_footer(); ?>

<?php

global $wp_query;
global $query;
if($_REQUEST['section'] == 'industrynews' || 57 == $id) {
    $section_label = 'News and Views';
    $section_id = 57;
    $section_class = 'news';
    $more = 'READ THIS ARTICLE';
}
elseif($_REQUEST['section'] == 'whitepapers' || 19 == $id ) {
    $section_label = 'whitepapers';
    $section_id = 19;
    $section_class = 'white-paper';
    $more ='FREE DOWNLOAD';
}


$cur_cat_id = get_cat_id( single_cat_title("",false) );
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$my_query_args = array(
    'category__and' => array($section_id, $cur_cat_id ),
    'paged' => $paged,
    'posts_per_page' => 5
);

$wp_query = new WP_Query();
$wp_query->query($my_query_args );
?>

<?php
$count = 1;


if (have_posts()) : while (have_posts()) : the_post();
    $gab_thumb = get_post_meta($post->ID, 'thumbnail', true);
    $gab_video = get_post_meta($post->ID, 'video', true);
    $gab_flv = get_post_meta($post->ID, 'videoflv', true);
    $ad_flv = get_post_meta($post->ID, 'adflv', true);
    $gab_iframe = get_post_meta($post->ID, 'iframe', true);
    ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('holder archive '.$section_class);?>>
        <?php if(($gab_flv !== '') or ($gab_video !== '') or ($gab_iframe !== '') ) {
            gab_media(array(   'imgtag' => 1,   'link' => 1,
                'name' => 'snpw-fea',
                'enable_video' => 1,
                'video_id' => 'featured',
                'enable_thumb' => 0,
                'resize_type' => 'c', /* c to crop, h to resize only height, w to resize only width */
                'media_width' => '604',
                'media_height' => '350',
                'thumb_align' => 'videowrapper',
                'enable_default' => of_get_option('of_sn_enfea6'),
                'default_name' => 'featured.jpg'
            ));
        }
        else
        {
            the_post_thumbnail(array(150), array('class' => 'alignleft'));
        }
        ?>

        <?php the_tags('<p>', ' \ ', '</p>'); ?>
        <h2 class="archiveTitle">
            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'snapwire' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
        </h2>
        <?php
        the_excerpt();
        ?>

        <div class="clear"></div>
    </div>


    <div class="postmeta_bar">
        <div class="dateholder border_right_30">
            <span class="day"><?php echo get_the_date('d'); ?></span>
					<span class="dateandyear">
						<span class="month"><?php echo get_the_date('M'); ?></span>
						<span class="year"><?php echo get_the_date('Y'); ?></span>
					</span>
        </div>

        <div class="col border_right_30">
            <p><?php _e('Posted by','snapwire');?></p>
            <?php the_author_posts_link(); ?>
        </div>

        <?php if (get_post_type() == 'post') { ?>
            <div class="col border_right_30">
                <p><?php _e('Posted in','snapwire');?></p>

                <?php category_section($post->ID); ?>
            </div>

            <div class="col border_right_30 last">
                <p><?php _e('Comments','snapwire');?></p>
                <?php comments_popup_link(__('No Comment','snapwire'), __('1 Comment','snapwire'), __('% Comments','snapwire'));?>
            </div>

        <?php } ?>

        <div class="more">
            <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'snapwire' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
                <span><?php _e($more, 'snapwire'); ?></span>
            </a>
        </div>

        <div class="clear"></div>
    </div>

    <?php $count++; endwhile; else :  ?>
    <div <?php post_class('holder archive');?>>
        <h2 class="archiveTitle"><?php _e('Sorry, nothing matched your criterias','snapwire');?></h2>
    </div>
<?php endif; ?>

<?php


if (($wp_query->max_num_pages > 1) && (function_exists("pagination"))) {
    pagination($wp_query->max_num_pages);
}
?>

<?php wp_reset_postdata(); wp_reset_query();  ?>


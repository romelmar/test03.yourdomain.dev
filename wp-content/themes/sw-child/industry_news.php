<?php
/*
Template Name Posts: Industry News
*/

//    if(isset($_REQUEST['slug'])) $slug =  $_REQUEST['slug'];
//    else $slug = "ugs";
//

//    $the_query = new WP_Query( $args );
get_header();


//print_r($_REQUEST['post_id']);
?>

<?php  ?>
<div class="wrapper">
    <div id="container">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>

            <div class="metasingle">
                <span class="postdate"><?php echo get_the_date('') ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                <span class="postcategory"><?php _e('Filed under','snapwire'); ?>: <?php the_category(',') ?>&nbsp;&nbsp;</span>
                <span class="postauthor"><?php _e('Posted by','snapwire'); ?>: <?php the_author_posts_link(); ?></span>
            </div><!-- /metas -->


                <?php the_content(); ?>

                <?php
                $categories = get_the_category();
                $separator = ' ';
                $output = '';
                if($categories){
                    foreach($categories as $category) {
                        if($category->term_id != 21)
                            $output .= '<a id="'.$category->term_id.'" href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'. "< Back to " . $category->cat_name. ' News ' . '</a>'.$separator;
                    }
                    echo '<div class="floatleft">'. trim($output, $separator) . '</div>';
                }
                ?>

                <div class="floatright"><a href="<?php the_field('industry_news_article'); ?>" target="_blank">Open this article in new window (You Will Be Redirected To Partner Site) </a> </div>

                <br />
                <iframe src="<?php the_field('industry_news_article'); ?>" frameborder="0" style="width: 100%; height: 1200px;  "></iframe>


            <!--        --><?php //the_content(); ?>
            <?php wp_link_pages( array( 'before' => '<div class="nextpage">' . __( 'Pages:', 'wpzoom' ) . '', 'after' => '</div>' ) ); ?>


            <div class="clear"></div>
            <?php endwhile; else: ?>

                <p>Sorry, no posts matched your criteria.</p>

            <?php endif; ?>


        <div class="clear"></div>
    </div><!-- End of container -->



<?php get_footer(); ?>




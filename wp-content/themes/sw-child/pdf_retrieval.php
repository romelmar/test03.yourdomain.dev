<?php
/*
Template Name: PDF Retrieval
*/


get_header();
query_posts('p=' . $_REQUEST['post_id']);
$postId = $_REQUEST['post_id'];

$tech_paper = get_field("tech_paper", $postId);
$video = get_field("video", $postId);
?>

<?php ?>
<div class="wrapper">
    <div id="container">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>

            <div class="metasingle">
                <span class="postdate"><?php echo get_the_date('') ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                <span class="postcategory"><?php _e('Filed under', 'snapwire'); ?>: <?php the_category(',') ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                <span class="postauthor"><?php _e('Posted by', 'snapwire'); ?>: <?php the_author_posts_link(); ?></span>
            </div><!-- /metas -->

            <?php if (strlen($tech_paper)): ?>
                <a href='<?php the_field('tech_paper'); ?>'> Right click here to download the PDF file </a>

                <br/>
                <br/>
                If you are unable to view the white paper below, please download the PDF or get the <a href="http://get.adobe.com/reader/">Adobe Reader</a>.
                <br/>

                <iframe src='http://docs.google.com/viewer?url=<?php the_field('tech_paper'); ?>&hl=en_US&embedded=true' frameborder="0" style="width: 900px; height: 1000px;  "></iframe>

            <?php
            elseif (strlen($video)): ?>
                <iframe width="100%" height="500px" src="<?php echo $video; ?>" frameborder="0" allowfullscreen></iframe>
            <?php endif; ?>
            <!--        --><?php //the_content(); ?>
            <?php wp_link_pages(array('before' => '<div class="nextpage">' . __('Pages:', 'wpzoom') . '', 'after' => '</div>')); ?>


            <div class="clear"></div>
        <?php endwhile;
        else: ?>

            <p>Sorry, no posts matched your criteria.</p>

        <?php endif; ?>


        <div class="clear"></div>
    </div>
    <!-- End of container -->

    <?php get_footer(); ?>




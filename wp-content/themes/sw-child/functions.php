<?php

function ST4_get_featured_status($post_ID) {
    $post_featured_id = get_field( "feature_on_homepage?" ,$post_ID);
    if ($post_featured_id[0] == "Yes") {
        return "Yes";
    }
    else return "No";
}


function ST4_columns_head($defaults) {
    $defaults['featured_status'] = "<a href='http://marketingtechwire.com/wp-admin/edit.php?tag=featured_status'>".'Featured'."</a>";
    return $defaults;
}

// SHOW THE FEATURED IMAGE  
function ST4_columns_content($column_name, $post_ID) {
    if ($column_name == 'featured_status') {
        $post_featured_status = ST4_get_featured_status($post_ID);
        if($post_featured_status == "Yes"){
            if(!has_tag('featured_status', $post_ID ))
                wp_set_post_tags( $post_ID, 'featured_status', true );
            echo "<b>".$post_featured_status."<b>";
        }

        else echo $post_featured_status;
    }
}

add_filter('manage_posts_columns', 'ST4_columns_head');
add_action('manage_posts_custom_column', 'ST4_columns_content', 10, 2);

function category_section($post_id,$section = null){
    $post_categories = wp_get_post_categories($post_id);
    $count_cat = 0;

    foreach($post_categories as $c){
        $cat = get_category( $c );

        $sec = "";
        if( 'white-papers' != $cat->slug && 'industry-news' != $cat->slug  ){
            if(isset($_REQUEST['section']))
                $sec = "?section=" . $_REQUEST['section'];
           else $sec = "?section=" . $section;
        }

        echo "<a href='{$cat->slug}{$sec}' >" . $cat->name . "</a>";
        if($count_cat < (sizeof($post_categories) - 1)) echo " ,";
        $count_cat++;
    }

}
function myExcerpt($str,$limit = 50){
    if( strlen(strip_tags($str)) < $limit ) return strip_tags($str);
    return substr(strip_tags($str), 0, $limit) . '...';
// return strip_tags($str);
}
?>
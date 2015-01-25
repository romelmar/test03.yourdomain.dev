<?php
$number_photos = -1; 		// -1 to display all
$photo_size = 'large';		// The standard WordPress size to use for the large image
$thumb_size = 'thumbnail';	// The standard WordPress size to use for the thumbnail
$thumb_width = 65;			// Size of thumbnails to embed into img tag
$thumb_height = 50;			// Size of thumbnails to embed into img tag
$photo_width = 604;		// Width of photo
$wraper_width = 610;		// Width of wrapper div that surrounds image
$themeurl = get_template_directory_uri();

$attachments = get_children( array(
'post_parent' => $post->ID,
'numberposts' => $number_photos,
'post_type' => 'attachment',
'post_mime_type' => 'image',
'order' => 'ASC', 
'orderby' => 'menu_order date')
);

$siteurl = get_bloginfo('template_url');

if ( !empty($attachments) ) :
	$counter = 0;
	$photo_output = '';
	$thumb_output = '';	
	foreach ( $attachments as $att_id => $attachment ) {
		$counter++;
		
		# Caption
		$caption = "";
		if ($attachment->post_excerpt) 
			$caption = $attachment->post_excerpt;	
			
		# Large photo
		$src = wp_get_attachment_image_src($attachment->ID, 'snpw-innerslide', true);
		$full = wp_get_attachment_image_src($attachment->ID, 'large', true);
		if (of_get_option('of_wpmumode')==0) {
			if(is_multisite()) { 
				$photo_output .= '<img style="width:'.$photo_width.'px;display:block;" src="' . esc_url($themeurl) . '/timthumb.php?src='.urlencode(redirect_wpmu($full[0])).'&amp;q=90&amp;w='.$photo_width.'&amp;zc=1" width="'.$photo_width.'" alt="" />';
			} else {
				$photo_output .= '<img style="width:'.$photo_width.'px;display:block;" src="' . esc_url($themeurl) . '/timthumb.php?src='.urlencode($full[0]).'&amp;q=90&amp;w='.$photo_width.'&amp;zc=1" width="'.$photo_width.'" alt="" />';
			}		
		} else {
			$photo_output .= '<img style="width:'.$photo_width.'px;display:block;" src="'. $src[0] .'" width="'.$photo_width.'" alt="" />';
		} 
	}  
endif; ?>

<?php if ($counter > 1) : ?>

	<div id="slides" style="width:<?php echo $wraper_width; ?>px;">
		<a href="#" class="next"><img src="<?php esc_url( bloginfo('template_url') ); ?>/images/framework/images/arrow-next.png" alt=""></a>	
		<a href="#" class="prev"><img src="<?php esc_url( bloginfo('template_url') ); ?>/images/framework/images/arrow-prev.png" alt=""></a>
		
		<div class="slides_container" style="width:<?php echo $wraper_width; ?>px;">
			<?php echo $photo_output; ?>
		</div>

		<div class="clear"></div>
	</div>
	
	<div class="clear"></div>
<?php endif; ?>
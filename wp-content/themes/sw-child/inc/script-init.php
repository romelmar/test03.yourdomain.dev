<?php 
function theme_scripts() {
	$options_feaslide = array("scrollUp", "scrollDown", "scrollLeft", "scrollRight", "turnUp", "turnDown", "turnLeft", "turnRight", "fade");
?>

	<script type='text/javascript'>
	(function($) {
		$(document).ready(function() { 
			<?php if(is_home()) { ?>
				$('#featured_posts .sliderwrapper').cycle({ 
					pauseOnPagerHover: 1,
					prev:   '.prev',
					next:   '.next',
					pauseOnPagerHover: 1,
						fx: '<?php echo $options_feaslide[of_get_option('of_sn_sfunc', 8)]; ?>',
						speed: '<?php echo of_get_option('of_sn_feaspeed', 1); if (intval(of_get_option('of_sn_feaspeed')) > 0 ) { echo "000"; } ?>',
						timeout: '<?php echo of_get_option('of_sn_featimeout', 5); if (intval(of_get_option('of_sn_featimeout')) > 0 ) { echo "000"; } ?>',
					pager:  '#nav ul',
					pagerAnchorBuilder: function(idx, slide) { 
						// return selector string for existing anchor 
						return '#nav ul li:eq(' + idx + ') a'; 
					} 
				});

			<?php } elseif(is_single() or (is_page())) {?>
			$('#slides').slides({
				<?php if(of_get_option('of_sn_inner_rotate') == 1) { ?>
				play: <?php if ( of_get_option('of_sn_inner_pause') <> "" ) { echo of_get_option('of_sn_inner_pause').'000'; } else { echo '5000'; } ?>,
				pause: 2500,
				hoverPause: true,
				<?php } ?>
				preload: true,
				autoHeight: true
			});		
			<?php } ?>		
			
			$("ul.tabs").tabs("div.panes > div");
			$("ul.sc_tabs").tabs("div.sc_tabs-content > div");
			$('a[href=#top]').click(function(){	$('html, body').animate({scrollTop:0}, 'slow');	return false;});

		});
	})(jQuery);
	</script>
<?php } 

/* ********************
 * Share Items
 * Required JS libraries for share items
 ******************************************************************** */
 function gab_twitter() {
	echo '<script type=\'text/javascript\'>
	<!--
	!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
	// -->
	</script>';
 }
 
 function gab_facebook() {
	$language = get_bloginfo('language'); 
	$language = str_replace("-", "_", $language); 

	echo '
	<div id="fb-root"></div>
	<script type=\'text/javascript\'>
	<!--
	(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/'. $language .'/all.js#xfbml=1";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, \'script\', \'facebook-jssdk\'));
	// -->
	</script>';
 }
 
 function gab_googleplus() {
	echo '<script type="text/javascript">
	  <!--
	  (function() {
		var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;
		po.src = \'https://apis.google.com/js/plusone.js\';
		var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);
	  })();
	  // -->
	</script>';
 
 }
 function gab_pinterest() {
	echo '<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
	
	<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js">
	<!--
		document.body.innerHTML = document.body.innerHTML.replace(/&amp;;/g, "a");
	// -->
	</script>';
 }

add_action("wp_head", "theme_scripts"); 
add_action("wp_footer", "gab_facebook"); 
</div><!-- end of wrapper -->

<div id="footer">
	<div class="wrapper">
		<div id="foo_widget1">
			<?php if ( ! dynamic_sidebar( 'Footer1' ) ) : ?>
			
				<h3 class="widgettitle">Widgetized Section</h3>
				<p>Go to Admin &raquo; appearance &raquo; Widgets &raquo;  and move a widget into Footer1 Widget Zone</p>
				
			<?php endif; if(of_get_option('of_sn_widget') == 1) { echo '<span class="widgetname">Footer1</span>'; } ?>
		</div>

		<div id="foo_widget2">
			<?php if ( ! dynamic_sidebar( 'Footer2' ) ) : ?>
			
				<h3 class="widgettitle">Widgetized Section</h3>
				<p>Go to Admin &raquo; appearance &raquo; Widgets &raquo;  and move a widget into Footer2 Widget Zone</p>
				
			<?php endif; if(of_get_option('of_sn_widget') == 1) { echo '<span class="widgetname">Footer2</span>'; } ?>
			<div class="clear"></div>
		</div>
		
		<div id="foo_widget3">	
			<?php if ( ! dynamic_sidebar( 'Footer3' ) ) : ?>
			
				<h3 class="widgettitle">Widgetized Section</h3>
				<p>Go to Admin &raquo; appearance &raquo; Widgets &raquo;  and move a widget into Footer1 Widget Zone</p>
				
			<?php endif; 	if(of_get_option('of_sn_widget') == 1) { echo '<span class="widgetname">Footer3</span>'; } ?>
		</div>

		<div class="clear"></div>
	</div><!-- /wrapper -->
</div><!-- /footer -->

<div id="footer_data">
	<div class="wrapper">
		<div id="footer-left-side">
			<?php /* Replace default text if option is set */
			if( of_get_option('of_sn_footer_left') == 1){
				echo of_get_option('of_sn_footer_left_text');
			} else { 
			?>
                <a href="http://marketingtechwire.com/about-marketingtechwire/">About</a> &nbsp; &nbsp;
                <a href="http://marketingtechwire.com/advertise/">Advertise</a> &nbsp; &nbsp;
                <a href="http://marketingtechwire.com/contact-us/">Contact</a> &nbsp; &nbsp;
                <a href="http://marketingtechwire.com/terms-of-service/">Terms & Privacy</a>


<p>The listed brands on this website and its newsletters are in no way
    affiliated with Marketing TechWire and TechPRO Media. All logos and
    trademarks are the property of their respective owners.</p>


            <?php } ?>
		</div><!-- #site-info -->
				
		<div id="footer-right-side">
			<?php /* Replace default text if option is set */
			if( of_get_option('of_sn_footer_right') == 1){ 
				echo of_get_option('of_sn_footer_right_text');
			} else {
//				wp_loginout();
//				if ( is_user_logged_in() ) {
//					echo '-'; ?>
<!--					<a href="--><?php //bloginfo('url'); ?><!--/wp-admin/edit.php">Posts</a> - -->
<!--					<a href="--><?php //bloginfo('url'); ?><!--/wp-admin/post-new.php">Add New</a>-->
<!--				--><?php //} ?><!-- - -->
			<?php } ?>
			<a href="http://wordpress.org/" title="<?php esc_attr_e('Semantic Personal Publishing Platform', 'snapwire'); ?>" rel="generator"><?php _e('&copy; Copyright 2013 Marketing TechWire and TechPRO Media. All Rights Reserved.
', 'snapwire'); ?></a>
			<?php wp_footer(); ?>
		</div> <!-- #footer-right-side -->
		<div class="clear"></div>
	</div><!-- /wrapper -->
</div><!-- /footer_data -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-47149317-1', 'marketingtechwire.com');
    ga('send', 'pageview');

</script>

<!-- Google Code for Remarketing Tag -->
<script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 1015817974;
    var google_custom_params = window.google_tag_params;
    var google_remarketing_only = true;
    /* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1015817974/?value=0&amp;guid=ON&amp;script=0"/>
    </div>
</noscript>


</body>
</html>
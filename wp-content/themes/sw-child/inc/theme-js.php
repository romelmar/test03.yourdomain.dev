<?php
if (!is_admin()) add_action( 'wp_print_scripts', 'gabfire_js_init' );
if (!function_exists('gabfire_js_init')) {
	function gabfire_js_init() {
		wp_deregister_script( 'jquery' );  
		wp_enqueue_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');
		wp_enqueue_script('jquery-migrate', GABFIRE_JS_DIR .'/jquery-migrate-1.0.0.min.js', array('jquery'), '');
		if(is_home()) {
			wp_enqueue_script('jcycle', GABFIRE_JS_DIR .'/jquery.cycle.all.min.js',array( 'jquery' ));
			wp_enqueue_script('jCarouselLite', GABFIRE_JS_DIR .'/jCarouselLite.js',array( 'jquery' ));	
		} else {
			wp_enqueue_script('slidesjs', GABFIRE_JS_DIR .'/slides.min.jquery.js',array( 'jquery' ));
		}
		wp_enqueue_script('jquerytools', GABFIRE_JS_DIR .'/jquery.tools.min.js', array('jquery'), '');
		wp_enqueue_script('flowplayer', GABFIRE_JS_DIR .'/flowplayer/flowplayer-3.2.6.min.js');
		wp_enqueue_script('superfish', GABFIRE_JS_DIR .'/superfish-1.4.8.js');
	}
}
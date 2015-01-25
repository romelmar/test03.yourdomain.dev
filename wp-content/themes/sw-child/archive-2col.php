<div class="wrapper">
	<div id="container">
		<div id="main">
		
			<h3 id="bcrumb">
				<?php gab_breadcrumb(); ?>
			</h3>

			<?php 	
			include (TEMPLATEPATH . '/loop-2col.php'); 

//			?><!--	-->

		</div> <!-- /main -->
		
		<div id="sidebar">
			<div class="holder margin_bottom_25">
				<?php get_sidebar(); ?>
			</div><!-- /holder -->
		</div><!-- /sidebar -->
	
		<div class="clear"></div>
	</div><!-- End of container -->
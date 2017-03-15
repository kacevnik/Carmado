<!-- Page Title -->
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="page-title">
					<h2><?php 
						if( is_archive() ){ 
						
							the_archive_title(); 
							
						}
						else if( is_home() ){
							
							wp_title(' ');
							
						}
						else{ 
						
							the_title(); 
						}  
						?></h2>
					<p><?php bloginfo('description');?></p>
				</div>
			</div>
			<?php if ( is_active_sidebar('header-widget-area') ) { ?>	
			<div class="col-md-6">
				<div class="header-sidebar">
				<?php dynamic_sidebar('header-widget-area' );  ?>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>	
</section>
<!-- End of Page Title -->
<div class="clearfix"></div>
<?php $current_options = wp_parse_args(  get_option( 'busiprof_pro_theme_options', array() ), theme_data_setup() );?>
<script type="text/javascript">
//Hompage Clients Logo Scroll Js
	jQuery(window).load(function(){
      jQuery('#clients').flexslider({
        animation: "slide",
		slideshowSpeed: "<?php echo $current_options['client_strip_slide_speed']; ?>",
        animationSpeed: 1500,
		pauseOnAction: true,
        animationLoop: false,
        slideshow: true,
		directionNav: false,	
        itemWidth: 230,
        itemMargin: 0,
        minItems: 2,
        maxItems: "<?php echo $current_options['client_strip_total']; ?>",
		move: 1,
		after: function (slider) {            
            if (!slider.playing) {
                slider.play();
            }
        }
      });
    });
</script>	
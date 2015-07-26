<?php
/**
 * The template for displaying the footer.
 *
 * @package tolerance-break
 */
?>		
		<footer class="footer clearfix">
			
			<p class="footer-left">
				&copy; 2015
			</p>
			
			<a class="footer-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="nofollow">
				<img src="<?php bloginfo('template_url') ?>/images/logo_black.png" alt="">
			</a>
		</footer>
		<?php wp_footer(); ?>
	</body>

	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-65630107-1', 'auto');
		ga('send', 'pageview');
	</script>
</html>

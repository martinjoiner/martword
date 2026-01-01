		<div class="clear"></div>
	</div>

	<div id="footer">
		<?php
		$blog_name = '<a href="'.get_bloginfo('url').'">'.get_bloginfo('name').'</a>';
		printf(__('Copyright %s %s %s &middot; Powered by %s <br/>','martword'),'&copy;',date('Y'),$blog_name,'<a href="http://www.wordpress.org" title="WordPress" target="_blank">WordPress</a>')
		;?>
	</div><!-- /#footer -->

	<?php wp_footer(); ?>
</div><!-- /#wrapper -->

</body>
</html>

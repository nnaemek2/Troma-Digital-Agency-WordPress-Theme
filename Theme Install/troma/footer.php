<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after.
 *
 * @package Troma
 */

$back_totop_on = troma_get_opt('back_totop_on', true); ?>

		</div><!-- #content inner -->
	</div><!-- #content -->

	<?php troma_footer(); ?>

	</div><!-- #page -->
	
	<?php troma_popup_search(); ?>

	<?php troma_hidden_sidebar(); ?>
	
	<?php wp_footer(); ?>
	
	<?php echo troma_get_opt( 'site_footer_code', '' ); ?>

	</body>
</html>

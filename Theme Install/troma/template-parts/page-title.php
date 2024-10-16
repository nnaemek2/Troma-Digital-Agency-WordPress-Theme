<?php
if(is_404()) {
	return;
}
$titles = troma_get_page_titles();
ob_start();
if ( $titles['title'] )
{
    printf( '<h1 class="page-title">%s</h1>', esc_attr($titles['title']) );
}
$titles_html = ob_get_clean();
$ptitle_on = troma_get_opt( 'ptitle_on', 'show');
$page_ptitle_on = troma_get_page_opt( 'ptitle_on', 'themeoption');
$custom_sub_title = troma_get_page_opt( 'custom_sub_title' );
if(!empty($page_ptitle_on) && $page_ptitle_on != 'themeoption') {
	$ptitle_on = $page_ptitle_on;
} 
$ptitle_breadcrumb_on = troma_get_opt( 'ptitle_breadcrumb_on', 'show' );
$post_layout = troma_get_opt( 'post_layout', 'layout1' );
?>
<?php if($ptitle_on == 'show') : ?>

	<div id="pagetitle" class="page-title bg-overlay">
	    <div class="container">
	        <div class="page-title-inner">
	        	<?php if(is_singular('post') && $post_layout == 'layout2') { ?>
	        		<?php while ( have_posts() ) { the_post(); ?>
		        		<div class="author-image">
		                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 90 ); ?>
		                </div>
		                <div class="author-name">
	                        <span><?php echo esc_html__('By', 'troma'); ?>&nbsp;</span>
	                        <?php the_author_posts_link(); troma_get_user_position(); ?>
	                    </div>
	        			<?php printf( '%s', wp_kses_post($titles_html)); ?>
	        		<?php } ?>
	        	<?php } else { ?>
		        	<?php if($ptitle_breadcrumb_on == 'show') : ?>
		            	<?php troma_breadcrumb(); ?>
		            <?php endif; ?>
		            <?php printf( '%s', wp_kses_post($titles_html)); ?>
		            <?php if(!empty($custom_sub_title)) : ?>
		            	<div class="page-subtitle"><?php echo wp_kses_post($custom_sub_title); ?></div>
		        	<?php endif; ?>
		        <?php } ?>
	        </div>
	    </div>
	</div>
<?php endif; ?>
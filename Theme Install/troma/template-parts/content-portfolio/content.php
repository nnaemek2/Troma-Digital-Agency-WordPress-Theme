<?php
/**
 * Template part for displaying posts in loop
 *
 * @package Troma
 */

$portfolio_layout = troma_get_opt( 'portfolio_layout', 'default' );

$portfolio_date = troma_get_opt( 'portfolio_date' );
$portfolio_date_page = troma_get_page_opt( 'portfolio_date' );
$portfolio_client = troma_get_page_opt( 'portfolio_client' );
$portfolio_scope = troma_get_page_opt( 'portfolio_scope' );
$portfolio_btn_text = troma_get_page_opt( 'portfolio_btn_text' );
$portfolio_btn_link = troma_get_page_opt( 'portfolio_btn_link' );
$portfolio_btn_target = troma_get_page_opt( 'portfolio_btn_target', '_self' );
$portfolio_gallery = troma_get_page_opt( 'portfolio_gallery' );
$portfolio_gallery_list = explode(',', $portfolio_gallery);
$portfolio_show_social = troma_get_opt( 'portfolio_show_social', true );
$portfolio_show_navigation = troma_get_opt( 'portfolio_show_navigation', true );
$portfolio_label_date = troma_get_opt( 'portfolio_label_date' );
$portfolio_label_client = troma_get_opt( 'portfolio_label_client' );
$portfolio_label_scope = troma_get_opt( 'portfolio_label_scope' );
$portfolio_label_tag = troma_get_opt( 'portfolio_label_tag' );
$label_tags = '';
if(!empty($portfolio_label_tag)) {
   $label_tags = $portfolio_label_tag;
} else {
    $label_tags = esc_html__( 'Tags:', 'troma' );
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if($portfolio_layout == 'default') { ?>
        <div class="post-type-inner">
            <div class="row">
                <div class="post-type-media col-md-6 col-lg-6 col-xl-6">
                    <?php if(!empty($portfolio_gallery)) { ?>
                        <div class="post-type-gallery images-light-box">
                            <?php foreach ($portfolio_gallery_list as $img_id): ?>
                                <?php $attachment_meta = troma_get_attachment($img_id); ?>
                                <div class="post-type-gallery-item">
                                    <div class="post-type-gallery-inner">
                                        <?php if(!empty($attachment_meta['description'])) { ?>
                                            <a href="<?php echo esc_url($attachment_meta['description']);?>" target="_blank">
                                                <img src="<?php echo esc_url(wp_get_attachment_image_url($img_id, 'large'));?>" />
                                            </a>
                                        <?php } else { ?>
                                            <a class="light-box" href="<?php echo esc_url(wp_get_attachment_image_url($img_id, 'full'));?>">
                                                <img src="<?php echo esc_url(wp_get_attachment_image_url($img_id, 'large'));?>" />
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php } else {
                        the_post_thumbnail('full'); 
                    } ?>
                </div>
                <div class="post-type-content col-md-6 col-lg-6 col-xl-6">
                	<div class="entry-cateogry subtitle"><?php the_terms( $post->ID, 'portfolio-category', '', ', ' ); ?></div>
                    <h2 class="entry-title"><?php the_title(); ?></h2>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                    <ul class="entry-fmeta">
                        <?php if(isset($portfolio_date) && $portfolio_date) : ?>
                        	<li>
                                <label><?php if(!empty($portfolio_label_date)) { echo esc_attr($portfolio_label_date); } else { echo esc_html__( 'Date:', 'troma' ); } ?></label>
                                <span>
                                    <?php if(!empty($portfolio_date_page)) { echo esc_attr($portfolio_date_page); } else { the_date(); } ?>
                                </span>
                            </li>
                        <?php endif; ?>
                        <?php if(!empty($portfolio_client)): ?>
                            <li>
                                <label><?php if(!empty($portfolio_label_client)) { echo esc_attr($portfolio_label_client); } else { echo esc_html__( 'Client:', 'troma' ); } ?></label>
                                <span><?php echo esc_attr( $portfolio_client ); ?></span>
                            </li>
                        <?php endif; ?>
                        <?php if(!empty($portfolio_scope)): ?>
                            <li>
                                <label><?php if(!empty($portfolio_label_scope)) { echo esc_attr($portfolio_label_scope); } else { echo esc_html__( 'Scope:', 'troma' ); } ?></label>
                                <span><?php echo esc_attr( $portfolio_scope ); ?></span>
                            </li>
                        <?php endif; ?>
                        <li class="entry-tag"><?php the_terms( $post->ID, 'portfolio-tag', '<label>'.$label_tags.'</label>', ', ' ); ?></li>
                    </ul>
                    <div class="entry-footer">
                        <?php if(!empty($portfolio_btn_text)) : ?>
                            <div class="footer-button"><a class="btn" href="<?php echo esc_url($portfolio_btn_link); ?>" target="<?php echo esc_attr($portfolio_btn_target); ?>"><?php echo esc_attr($portfolio_btn_text); ?></a></div>
                        <?php endif; ?>
                        <?php if($portfolio_show_social) : ?>
                            <div class="footer-social"><?php troma_socials_share_portfolio(); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php if($portfolio_show_navigation) : ?>
            <div class="post-type-nav"><?php troma_post_nav_portfolio(); ?></div>
        <?php endif; ?>
    <?php } else { ?>
        <div class="post-type-content">
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </div>
    <?php } ?>
</article><!-- #post -->
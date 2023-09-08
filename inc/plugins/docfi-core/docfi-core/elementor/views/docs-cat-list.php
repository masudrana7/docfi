<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Docfi_Core;
use DocfiTheme;
use DocfiTheme_Helper;
use \WP_Query;
// sort
$post_sorting = $data['orderby'];
// order
$post_ordering = $data['post_ordering'];
$p_ids = array();
foreach ( $data['posts_not_in'] as $p_idsn ) {
	$p_ids[] = $p_idsn['post_not_in'];
}
$col_class = "col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-xs-{$data['col_xs']} "; ?>
<div class="rt-cat-list best-online-documentation-section">
    <div class="row">
        <?php
            if ( !empty( $data['category_list'] ) ) {
                foreach ( $data['category_list'] as $cat ) {
                    $cats[] = array(
                        'cat_multi_box' => $cat['cat_multi_box'],
                    );
                }
            } else {
                $docs_terms = get_terms( 'docfi_docs_category', array(
                    'hide_empty' => true,
                ) );
                foreach ( $docs_terms as $docs_term ){
                    $cats[] = array(
                        'cat_multi_box' => $docs_term->term_id,
                    );
                }	
            }
            if ( !empty( $cats ) ) {
            // Category
            $category_number = count( $cats );
                foreach ( $cats as $cat ) {
                    if ( $cat['cat_multi_box'] != 0 ) {
                    $get_image = get_term_meta( $cat['cat_multi_box'], 'rt_term_image', true );
                    $image_id = wp_get_attachment_image_src( $get_image, 'full' );
                    $group_link = get_category_link($cat['cat_multi_box']);
                    $cat_id = $cat['cat_multi_box'];
                    $category_desc = category_description($cat_id);
                    
                ?>
                <div class="<?php echo esc_attr( $col_class ); ?>">
                        
                    <a href="<?php echo esc_url($group_link); ?>">
                        <div class="logo-card logo-card--style-1 d-flex justify-content-between align-items-center wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="400ms">
                            <div class="logo">
                                <?php if ( $image_id ) { ?>
                                    <img src="<?php echo $image_id[0]; ?>" alt="logo" />
                                        <?php } else { ?>
                                            <img src="assets/img/logo.svg" alt="logo">
                                        <?php }
                                    ?>

                                    <?php if($data['cat_text']){ ?>
                                        <p class="text"><?php echo esc_html( $data['cat_text'] );?> </p>
                                    <?php } ?>

                                    <?php if ( $data['cat_desc_display']  == 'yes' ) { ?> 
                                        <div class="cat_desc">       
                                            <?php echo wp_kses($category_desc, 'docfi-core'); ?>
                                    </div> 
                                    <?php } ?>
                                    
                            </div>
                            <?php if ( $data['icon_display']  == 'yes' ) { ?> 
                                <svg width="22" height="23" viewBox="0 0 22 23" fill="#D3D3D3" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 0.75C17.0586 0.75 22 5.69141 22 11.75C22 17.8516 17.0586 22.75 11 22.75C4.89844 22.75 0 17.8516 0 11.75C0 5.69141 4.89844 0.75 11 0.75ZM15.3828 12.7383C15.6406 12.4805 15.8125 12.1367 15.8125 11.75C15.8125 11.4062 15.6406 11.0625 15.3828 10.8047L10.5703 5.99219C10.0547 5.43359 9.15234 5.43359 8.63672 5.99219C8.07812 6.50781 8.07812 7.41016 8.63672 7.92578L12.4609 11.75L8.63672 15.6172C8.07812 16.1328 8.07812 17.0352 8.63672 17.5508C9.15234 18.1094 10.0547 18.1094 10.5703 17.5508L15.3828 12.7383Z" fill=""/>
                                </svg>
                            <?php } ?>
                        </div>
                    </a>
                </div>
        <?php } } } ?>
    </div>
</div>





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
$excerpt_count = $data['excerpt_count'];
$number_of_post = $data['itemnumber'];
// sort
$post_sorting = $data['orderby'];
// order
$post_ordering = $data['post_ordering'];
$excerpt_count = $data['excerpt_count'];
$p_ids = array();
foreach ( $data['posts_not_in'] as $p_idsn ) {
	$p_ids[] = $p_idsn['post_not_in'];
}
?>
<div class="best-online-documentation-section section-padding">
    <div class="row">
        <div class="col-md-12 col-lg-4">
            <div class="tab-btn-wrapper">
                <ul class="theme-logo-wrapper nav nav-pills" id="pills-tab" role="tablist">
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
                            $count = 0;
                            foreach ( $cats as $cat ) {
                                if ( $cat['cat_multi_box'] != 0 ) {
                                $get_image = get_term_meta( $cat['cat_multi_box'], 'rt_term_image', true );
                                $image_id = wp_get_attachment_image_src( $get_image, 'full' );
                                $count++; 
                            ?>
                            <li class="nav-item" role="presentation">
                                <div class="logo-card logo-card--style-1 nav-link <?php if ( $count == 1 ) { ?>active<?php } ?> d-flex justify-content-between align-items-center wow animate__fadeInLeft animate__animated" data-wow-duration="1200ms" data-wow-delay="400ms" data-bs-toggle="pill" data-bs-target="#pills-list-<?php echo esc_attr($count); ?>" role="tab" aria-selected="true">
                                    <div class="logo">
                                        <?php 
                                            if ( $image_id ) { ?>
                                                <img src="<?php echo $image_id[0]; ?>" alt="logo"/>
                                                <?php } else { ?>
                                                    <img src="assets/img/logo.svg" alt="logo">
                                                <?php }
                                            ?>
                                        <p class="text"><?php echo esc_html( $data['cat_text'] );?></p>
                                    </div>
                                    <a href="#" class="logo-card-btn">
                                        <svg width="22" height="23" viewBox="0 0 22 23" fill="#D3D3D3" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11 0.75C17.0586 0.75 22 5.69141 22 11.75C22 17.8516 17.0586 22.75 11 22.75C4.89844 22.75 0 17.8516 0 11.75C0 5.69141 4.89844 0.75 11 0.75ZM15.3828 12.7383C15.6406 12.4805 15.8125 12.1367 15.8125 11.75C15.8125 11.4062 15.6406 11.0625 15.3828 10.8047L10.5703 5.99219C10.0547 5.43359 9.15234 5.43359 8.63672 5.99219C8.07812 6.50781 8.07812 7.41016 8.63672 7.92578L12.4609 11.75L8.63672 15.6172C8.07812 16.1328 8.07812 17.0352 8.63672 17.5508C9.15234 18.1094 10.0547 18.1094 10.5703 17.5508L15.3828 12.7383Z" fill=""/>
                                        </svg>
                                    </a>
                                </div>
                            </li>
                    <?php } } } ?>
                </ul>
            </div>
        </div>
        <!-- col end -->
        <div class="col-md-12 col-lg-8 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="400ms">
            <div class="tab-content" id="pills-tabContent">
               <?php
                    $i = 0; 
                    foreach ( $cats as $cat ) {
                        $i++;  
                        $args = array(
                            'post_type' => 'docfi_docs',
                            'posts_per_page' => $number_of_post,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'docfi_docs_category',
                                    'field' => 'id',
                                    'terms' => $cat['cat_multi_box'],
                                ),
                            ),
                            
                        );
                        $args['orderby'] = $post_sorting;
                        $query = new WP_Query( $args );
                    ?>
                    <div class="tab-pane fade<?php if ( $i == 1 ) { ?> show active<?php } ?>" id="pills-list-<?php echo esc_attr($i); ?>" role="tabpanel">
                        <div class="best-documentation-info-wrapper">
                            <div class="row">
                                <?php 
                                    if ( $query->have_posts() ) {
                                        while ( $query->have_posts() ) {  
                                            $query->the_post(); 
                                            $id            	= get_the_id();
                                            $excerpt        = wp_trim_words( get_the_excerpt(), $excerpt_count, '' );
                                            $p_checkbox     = get_post_meta($id, 'docly_check_post', true);
                                            $p_color3   	= get_post_meta( $id, 'docfi_icon_bg', true );
                                            $icon_path   	= get_post_meta( $id, 'docfi_icon_img', true );
                                            $icon_id        = wp_get_attachment_image_src( $icon_path, 'full' );
                                            ?>
                                            <?php if($p_checkbox == 'on'){?>
                                                <div class="col-xl-6 child">
                                                    <div class="rt-card rt-card--style-3 rt-color-shade1-bg rt-border-radius-style-1">
                                                        <div class="icon d-flex justify-content-center align-items-center rt-color-shade4-bg rt-border-radius-style-2" style="--docfi-post-color: <?php echo esc_attr($p_color3); ?>;">
                                                            <?php 
                                                            if (!empty($icon_id[0])) { ?>
                                                                <img src="<?php echo $icon_id[0]; ?>" alt="icon" />
                                                                <?php } else { ?>
                                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M6.66667 18.3333H13.3333C16.6833 18.3333 17.2833 16.9917 17.4583 15.3583L18.0833 8.69167C18.3083 6.65833 17.725 5 14.1667 5H5.83333C2.275 5 1.69166 6.65833 1.91666 8.69167L2.54166 15.3583C2.71666 16.9917 3.31666 18.3333 6.66667 18.3333Z" stroke="#F84436" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                                    <path d="M6.66663 4.99984V4.33317C6.66663 2.85817 6.66663 1.6665 9.33329 1.6665H10.6666C13.3333 1.6665 13.3333 2.85817 13.3333 4.33317V4.99984" stroke="#F84436" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                                    <path d="M11.6667 10.8333V11.6667C11.6667 11.675 11.6667 11.675 11.6667 11.6833C11.6667 12.5917 11.6584 13.3333 10 13.3333C8.35004 13.3333 8.33337 12.6 8.33337 11.6917V10.8333C8.33337 10 8.33337 10 9.16671 10H10.8334C11.6667 10 11.6667 10 11.6667 10.8333Z" stroke="#F84436" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                                    <path d="M18.0416 9.1665C16.1166 10.5665 13.9166 11.3998 11.6666 11.6832" stroke="#F84436" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                                    <path d="M2.18335 9.3916C4.05835 10.6749 6.17502 11.4499 8.33335 11.6916" stroke="#F84436" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                                </svg>
                                                                <?php }
                                                            ?>
                                                        </div>
                                                        <h3 class="card-title">
                                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                        </h3>
                                                        <p class="card-info">
                                                            <?php echo wp_kses_post( $excerpt );?>
                                                        </p>
                                                    </div>
                                                </div>  
                                            <?php } ?> 
                                            <?php 
                                        }
                                    } wp_reset_postdata(); 
                                ?>
                            </div>
                        </div>
                    </div> 
                <?php } ?>                                 
            </div>
        </div>
        <!-- col end -->
    </div>
</div>





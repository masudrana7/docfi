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
use Elementor\Group_Control_Typography;
$number_of_post = $data['itemnumber'];
// sort
$post_sorting = $data['orderby'];
// order
$post_ordering = $data['post_ordering'];
$p_ids = array();

foreach ( $data['posts_not_in'] as $p_idsn ) {
	$p_ids[] = $p_idsn['post_not_in'];
}

$gap_class = '';
if ( $data['column_no_gutters'] == 'hide' ) {
   $gap_class  = 'no-gutters';
}
$col_class = "col-xl-{$data['col_lg']} col-lg-{$data['col_md']} col-md-{$data['col_sm']} col-sm-{$data['col_xs']} "; ?>
<div class="docs-default docs-multi-layout-1 rt-isotope-wrapper">

    <?php if ( $data['all_button'] == 'show' ) {?>
    <div class="text-center">
        <div class="rt-docs-tab rt-isotope-tab">
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
                $count++;
                $get_color  = get_term_meta( $cat['cat_multi_box'], 'rt_category_color', true ); 
                $hexcolor = DocfiTheme_Helper::hex2rgb( $get_color );
                $r = hexdec(substr($get_color,0,2));
				$g = hexdec(substr($get_color,2,2));
				$b = hexdec(substr($get_color,4,2));

                if ( $cat['cat_multi_box'] != 0 ) {
                $term_name = get_term( $cat['cat_multi_box'], 'docfi_docs_category' );						
                $cat_filter = $term_name->slug; ?>

                <a style="--docfi-red: <?php echo absint( $r ); ?>;--docfi-green: <?php echo absint( $g ); ?>; --docfi-blue: <?php echo absint( $b ); ?>;" class="<?php if ( $count == 1 ) { ?>current<?php } ?>" href="#" data-filter=".<?php echo esc_attr( $cat_filter );?>"><?php echo esc_html( $term_name->name ); ?></a>
            <?php } } }  ?>
        </div>
    </div>  
    <?php } ?>

    <div class="row <?php echo esc_attr( $gap_class ); ?> rt-docs-content rt-isotope-content rt-masonry-grid"> 
        <?php 
            $item_terms = get_terms( 'docfi_docs_category', array(
                'hide_empty' => true,
            ) );
            $term_links = array();
            foreach ( $item_terms as $term ) {
                $term_links[] = $term->slug;

            }
            $terms_of_item = join( " ", $term_links );
            $args = array(
                'taxonomy'   => 'docfi_docs_group',
                'hide_empty' => false, 
            );
            $post_count = 0;
            $docs_groups = get_categories($args);
            if ($docs_groups) {
                foreach ($docs_groups as $docs_group) {
                    $post_count = $docs_group->count;
                    $get_item_bg  = get_term_meta( $docs_group->term_id, 'rt_item_bg', true ); 
                    $get_color    = get_term_meta( $docs_group->term_id, 'rt_group_color', true ); 
                    $hexcolor     = DocfiTheme_Helper::hex2rgb( $get_item_bg );
                    $r = hexdec(substr($get_item_bg,0,2));
                    $g = hexdec(substr($get_item_bg,2,2));
                    $b = hexdec(substr($get_item_bg,4,2));

                    
                    $get_image = get_term_meta( $docs_group->term_id, 'rt_term_image', true );
                    $image_id = wp_get_attachment_image_src( $get_image, 'full' );
                    $group_link = get_category_link($docs_group->cat_ID);
                    $group_id = $group_link;

                    ob_start();
                        $args = array(
                            'post_type' => 'docfi_docs',
                            'posts_per_page' => $number_of_post,
                            'meta_query' => array(
                                array(
                                    'key'     => 'group_post_select', 
                                    'value'   => $docs_group->term_id, 
                                    'compare' => 'LIKE', 
                                    'type'    => 'CHAR', 
                                ),
                            ),
                            'post__not_in'   => $p_ids,
                        );
                        $args['orderby'] = $post_sorting;
                        
                        $query = new WP_Query( $args );
                        $post_count = $query->found_posts;
                        $term_links = [];
                        if ( $query->have_posts() ) {
                            while ( $query->have_posts() ) {  
                                $query->the_post(); 
                                $item_terms = get_the_terms( get_the_ID(), 'docfi_docs_category' );
                                
                                foreach ( $item_terms as $term ) {
                                    $term_links[] = $term->slug;
                                } ?>
                                <li>
                                    <i class="fa-solid fa-angles-right"></i><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </li>    
                                <?php 
                            }
                        } wp_reset_postdata(); 
                        $term_slug = join( ' ', array_unique( $term_links ) );
                    $RTDocsItem = ob_get_clean();
                ?>

                <div class="<?php echo esc_attr( $col_class . ' ' . $term_slug ); ?> rt-grid-item">
                    <div class="explore-topics-card" style="--docfi-red2: <?php echo absint( $r ); ?>;--docfi-green2: <?php echo absint( $g ); ?>;--docfi-blue2: <?php echo absint( $b ); ?>">
                        <div class="explore-topics-header d-flex justify-content-between align-items-center">
                            <div class="title-area d-flex align-items-center">
                                <div style="background:#<?php echo esc_attr( $get_color ); ?>" class="icon d-flex justify-content-center align-items-center rt-color-shade12-bg">
                                    <?php 
                                        if ( $image_id ) { ?>
                                        <img src="<?php echo $image_id[0]; ?>" alt="icon image" />
                                        <?php } else { ?>
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.68998 1.69513L14.5725 4.32763C15.1425 4.63513 15.1425 5.51263 14.5725 5.82013L9.68998 8.45263C9.25498 8.68513 8.74498 8.68513 8.30998 8.45263L3.42748 5.82013C2.85748 5.51263 2.85748 4.63513 3.42748 4.32763L8.30998 1.69513C8.74498 1.46263 9.25498 1.46263 9.68998 1.69513Z" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M2.70752 7.59848L7.24502 9.87098C7.80752 10.156 8.16752 10.7335 8.16752 11.3635V15.6535C8.16752 16.276 7.51502 16.6735 6.96002 16.396L2.42252 14.1235C1.86002 13.8385 1.50002 13.261 1.50002 12.631V8.34098C1.50002 7.71848 2.15252 7.32098 2.70752 7.59848Z" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M15.2925 7.59848L10.755 9.87098C10.1925 10.156 9.8325 10.7335 9.8325 11.3635V15.6535C9.8325 16.276 10.485 16.6735 11.04 16.396L15.5775 14.1235C16.14 13.8385 16.5 13.261 16.5 12.631V8.34098C16.5 7.71848 15.8475 7.32098 15.2925 7.59848Z" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <?php }
                                    ?>
                                </div>
                                <h3 class="title">
                                    <a href="<?php echo esc_url($group_id); ?>"><?php echo esc_html( $docs_group->name );?></a>
                                </h3>
                            </div>
                            <a href="<?php echo esc_url($group_id); ?>" class="number-of-article">
                               <?php echo esc_html($post_count);  echo esc_html_e(' articles', 'docfi'); ?> 
                            </a>
                        </div>
                        <div class="explore-topics-body">
                            <ul class="explore-topics-list">
                                <?php echo wp_kses_post( $RTDocsItem ); ?>
                            </ul>
                        </div>
                        <?php if ( $data['more_button'] == 'show' ) { ?>
                        <a href="<?php echo esc_url($group_id); ?>" class="view-all-btn"><?php echo esc_html( $data['see_button_text'] );?></a>
                        <?php } ?>
                    </div>
                </div>
                <?php  } }
        ?> 
    </div>             
</div>
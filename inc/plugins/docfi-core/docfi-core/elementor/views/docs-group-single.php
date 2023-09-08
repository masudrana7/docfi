

    <?php
        if ( !empty( $data['category_list'] ) ) {
            foreach ( $data['category_list'] as $cat ) {
                $cats[] = array(
                    'cat_multi_box' => $cat['cat_multi_box'],
                );
            }
        } else {
            $docs_terms = get_terms( 'docfi_docs_group', array(
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
        $get_item_bg  = get_term_meta( $cat['cat_multi_box'], 'rt_item_bg', true ); 
        $get_color    = get_term_meta( $cat['cat_multi_box'], 'rt_group_color', true ); 
        $hexcolor     = DocfiTheme_Helper::hex2rgb( $get_item_bg );
        $r = hexdec(substr($get_item_bg,0,2));
        $g = hexdec(substr($get_item_bg,2,2));
        $b = hexdec(substr($get_item_bg,4,2));
        $get_image = get_term_meta( $cat['cat_multi_box'], 'rt_term_image', true );
        $image_id = wp_get_attachment_image_src( $cat, 'full' );  
        if ( $cat['cat_multi_box'] != 0 ) {
            $term_name = get_term( $cat['cat_multi_box'], 'docfi_docs_group' ); 
        ?>

        <div class="rt-docs-wrapper">
            <div class="row">
                <div class="col-md-4">
                    <div class="rt-group-single-list rt-single-sidebar-list" style="--docfi-red2: <?php echo absint( $r ); ?>;--docfi-green2: <?php echo absint( $g ); ?>;--docfi-blue2: <?php echo absint( $b ); ?>">
                        <div class="explore-topics-header">
                            <div class="title-area d-flex align-items-center">
                                <div style="background:#<?php echo esc_attr( $get_color ); ?>" class="icon d-flex justify-content-center align-items-center rt-color-shade12-bg">
                                    <?php 
                                        if ( $image_id ) { ?>
                                        <img src="<?php echo $image_id[0]; ?>" />
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
                                    <a href="#"><?php echo esc_html( $term_name->name ); ?></a>
                                </h3>
                            </div>
                        </div>

                        <div class="explore-topics-body">
                            <ul class="explore-topics-list">
                                <?php 
                                    $args = array(
                                        'post_type' => 'docfi_docs',
                                        'posts_per_page' => -1,
                                        'meta_query' => array(
                                            array(
                                                'key'     => 'group_post_select', 
                                                'value'   => $cat['cat_multi_box'], 
                                                'compare' => 'LIKE', 
                                                'type'    => 'CHAR', 
                                            ),
                                        ),
                                    );
                                    $query = new WP_Query( $args );
                                    if ( $query->have_posts() ) {
                                        while ( $query->have_posts() ) {  
                                            $query->the_post(); ?>
                                            <li class="rt-list-">
                                                <a href="#"><?php the_title(); ?></a>
                                            </li>    
                                            <?php 
                                        }
                                } wp_reset_postdata(); ?>
                            </ul>
                        </div> 
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="explore-topics-body">
                        <?php 
                            $args = array(
                                'post_type' => 'docfi_docs',
                                'posts_per_page' => -1,
                                'meta_query' => array(
                                    array(
                                        'key'     => 'group_post_select', 
                                        'value'   => $cat['cat_multi_box'], 
                                        'compare' => 'LIKE', 
                                        'type'    => 'CHAR', 
                                    ),
                                ),
                            );
                            $query = new WP_Query( $args );
                            if ( $query->have_posts() ) {
                                while ( $query->have_posts() ) {  
                                    $query->the_post();
                                    the_content(); 
                                }
                        } wp_reset_postdata(); ?>
                    </div>                 
                </div>
            </div>    
        </div>    

            

            
        


    <?php } } }  ?>


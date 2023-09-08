<div class="rt-docs-single-content rt-group-single-list">
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
        if ( $cat['cat_multi_box'] != 0 ) {
            $term_name = get_term( $cat['cat_multi_box'], 'docfi_docs_group' ); 
            $tl = $term_name->name;
            $uid = strtolower(str_replace(array('%', ':', '\\', '/', '*', '?', '.', ';', ' '), '', $tl));
        ?>

        <div id="rt-<?php echo esc_attr($uid); ?>" class="rt-single-sidebar-list">
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
                $contentElementor = " ";
                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {  
                        $query->the_post();
                        $post_id = get_the_ID();

                        $pluginElementor = \Elementor\Plugin::instance();
                        $contentElementor = $pluginElementor->frontend->get_builder_content($post_id);

                        ?>
                        <div id="rt-post-<?php echo $post_id; ?>" class="rt-single-content-wrapper">
                            <?php echo $contentElementor; ?>
                        </div>
                    <?php }
                } wp_reset_postdata(); 
            ?>  
        </div>
    <?php } } }  ?>
</div>

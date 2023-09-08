<?php 

/**
 * Author Info
 * @param string $args
 * @return string|void
 */
function docfi_authors_list( $args = '' ) {
    global $wpdb;
    $defaults_data = array(
        'orderby'       => 'name',
        'order'         => 'ASC',
        'number'        => '',
        'optioncount'   => false,
        'exclude_admin' => true,
        'show_fullname' => false,
        'hide_empty'    => true,
        'feed'          => '',
        'feed_image'    => '',
        'feed_type'     => '',
        'echo'          => true,
        'style'         => 'list',
        'html'          => true,
        'exclude'       => '',
        'include'       => '',
    );
    $args = wp_parse_args( $args, $defaults_data );
    $return = '';
    $query_args           = wp_array_slice_assoc( $args, array( 'orderby', 'order', 'number', 'exclude', 'include' ) );
    $query_args['fields'] = 'ids';
    $authors              = get_users( $query_args );
    $author_count = array();
    foreach ( (array) $wpdb->get_results( "SELECT DISTINCT post_author, COUNT(ID) AS count FROM $wpdb->posts WHERE " . get_private_posts_cap_sql( 'post' ) . ' GROUP BY post_author' ) as $row ) {
        $author_count[ $row->post_author ] = $row->count;
    }
    foreach ( $authors as $author_id ) {
        $posts = isset( $author_count[ $author_id ] ) ? $author_count[ $author_id ] : 0;

        if ( ! $posts && $args['hide_empty'] ) {
            continue;
        }
        $author = get_userdata( $author_id );
        if ( $args['exclude_admin'] && 'admin' === $author->display_name ) {
            continue;
        }
        if ( $args['show_fullname'] && $author->first_name && $author->last_name ) {
            $name = "$author->first_name $author->last_name";
        } else {
            $name = $author->display_name;
        }
        if ( ! $args['html'] ) {
            $return .= $name . ', ';

            continue; // No need to go further to process HTML.
        }
        $link = sprintf(
            '<div class="col-lg-4"><a class="rt-author-inner" href="%1$s" title="%2$s">',
            esc_url( get_author_posts_url( $author->ID, $author->user_nicename ) ),
            /* translators: %s: Author's display name. */
            esc_attr( sprintf( __( 'Posts by %s', 'docfi-core' ), $author->display_name ) )
        );

        /** Author Avatar **/
        $link .= "<div class='rt-author-image'>";
            $link .= get_avatar($author->ID, 70, '', '', array('class' => 'rounded-circle'));
        $link .= "</div>";

        /** Author with Description **/
        $link .= "<div class='rt-author-info'>";
            $link .= "<h4 class='author-name'> $name ";
            if ( $args['optioncount'] ) {
                $link .= '<small class="post-count"> (' . $posts . ') </small>';
            }
            $link .= "</h4>";
            $link .= "<p class='desc mb-0'>$author->description</p>";
        $link .= "</div>";

        $link .= "</a> </div>";
        $return .= $link;
    }
    $return = rtrim( $return, ', ' );
    if ( $args['echo'] ) {
        echo $return;
    } else {
        return $return;
    }
}

add_shortcode('authors', function($atts, $content){
    ob_start();

    $atts = shortcode_atts( array(
        'number' => '1',
    ), $atts );
    
     echo "<div class='rt-authors-wrapper row'>";
        docfi_authors_list(array(
            'optioncount' => true,
            'hide_empty' => false,
            'order'         => 'DESC',
        ));
    echo "</div>";
    $html = ob_get_clean();
    return $html;
});



?>
<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

echo '<div class="pagination-area"><ul>' . "\n";

/**	Previous Post Link */
if ( get_previous_posts_link() )
	printf( '<li>%s</li>' . "\n", get_previous_posts_link( '<svg width="14" height="11" viewBox="0 0 14 11" fill="#1D2746" xmlns="http://www.w3.org/2000/svg">
							<path d="M13.2227 5.75C13.2227 6.24219 12.8398 6.625 12.375 6.625H3.98047L6.85156 9.52344C7.20703 9.85156 7.20703 10.4258 6.85156 10.7539C6.6875 10.918 6.46875 11 6.25 11C6.00391 11 5.78516 10.918 5.62109 10.7539L1.24609 6.37891C0.890625 6.05078 0.890625 5.47656 1.24609 5.14844L5.62109 0.773438C5.94922 0.417969 6.52344 0.417969 6.85156 0.773438C7.20703 1.10156 7.20703 1.67578 6.85156 2.00391L3.98047 4.875H12.375C12.8398 4.875 13.2227 5.28516 13.2227 5.75Z" fill=""></path>
						</svg>' ) );

/**	Link to first page, plus ellipses if necessary */
if ( ! in_array( 1, $links ) ) {
	$class = 1 == $paged ? ' class="active"' : '';

	printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

	if ( ! in_array( 2, $links ) )
		echo '<li>...</li>';
}

/**	Link to current page, plus 2 pages in either direction if necessary */
sort( $links );
foreach ( (array) $links as $link ) {
	$class = $paged == $link ? ' class="active"' : '';
	printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
}

/**	Link to last page, plus ellipses if necessary */
if ( ! in_array( $max, $links ) ) {
	if ( ! in_array( $max - 1, $links ) )
		echo '<li>...</li>' . "\n";

	$class = $paged == $max ? ' class="active"' : '';
	printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
}

/**	Next Post Link */
if ( get_next_posts_link() )
	printf( '<li>%s</li>' . "\n", get_next_posts_link( '<svg width="13" height="11" viewBox="0 0 13 11" fill="#1D2746" xmlns="http://www.w3.org/2000/svg">
						<path d="M11.9766 6.37891L7.60156 10.7539C7.4375 10.918 7.21875 11 7 11C6.75391 11 6.53516 10.918 6.37109 10.7539C6.01562 10.4258 6.01562 9.85156 6.37109 9.52344L9.24219 6.625H0.875C0.382812 6.625 0 6.24219 0 5.75C0 5.28516 0.382812 4.875 0.875 4.875H9.24219L6.37109 2.00391C6.01562 1.67578 6.01562 1.10156 6.37109 0.773438C6.69922 0.417969 7.27344 0.417969 7.60156 0.773438L11.9766 5.14844C12.332 5.47656 12.332 6.05078 11.9766 6.37891Z" fill=""></path>
					</svg>' ) );

echo '</ul></div>' . "\n";
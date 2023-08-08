<div class="rt-group-single-list">
    <?php
        if ( is_active_sidebar( 'docs-right-sidebar' ) ) {
            get_sidebar('docs-right-sidebar');
        }
    ?>
    <div class="font-size-controller-btn-area">
        <div class="font-size-controller-btn-wrapper d-flex align-items-center">
            <button class="font-size-minus"><?php echo esc_html__( 'A-' , 'docfi' ) ?></button>
            <button class="active font-size-normal"><?php echo esc_html__( 'A' , 'docfi' ) ?></button>
            <button class="font-size-plus"><?php echo esc_html__( 'A+' , 'docfi' ) ?></button>
        </div>
    </div>
</div>
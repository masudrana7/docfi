<div class="rt-banner-search rt-hero-section-content-wrapper">
    <div class="rt-searchbox-container">
        <form class="rt-searchbox-form d-flex justify-content-between align-items-center" role="search" method="get" action="<?php echo esc_url(home_url('/')) ?>">
            <div class="searchbox-textfield">
                <div class="input-area d-flex align-items-center">
                    <div class="input-group-addon rt-input-wrap flex-grow-1">
                        <input type="text" class="searchbox-input" name="search" id="rtsearchInput" placeholder="<?php esc_html_e( 'What are you looking for?', 'docfi' );?>" autocomplete="off">
                        <span id="cleanText">x</span>
                    </div>   
                </div>
            </div>
            <div class="searchbox-submit">
                <button class="search-btn coolBeans btn-dark rt-searchbox-btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i><?php esc_html_e( 'Submit', 'docfi' );?></button>
            </div>
            <div id="rt_datafetch"></div>
        </form>
    </div>
    <div class="search-text d-md-flex wow animate__fadeInUp animate__animated" data-wow-duration="1200ms" data-wow-delay="900ms">
        <p><span><?php echo esc_html( DocfiTheme::$options['banner_popular_text'] ); ?></span> </p>
        <ul class="rt-banner-search-key rt-search-key">
            <li class="keyword"><a href="#"><?php echo esc_html( DocfiTheme::$options['banner_popular_tag1'] ); ?></a></li>
            <li class="keyword"><a href="#"><?php echo esc_html( DocfiTheme::$options['banner_popular_tag2'] ); ?></a></li>
            <li class="keyword"><a href="#"><?php echo esc_html( DocfiTheme::$options['banner_popular_tag3'] ); ?></a></li>
            <li class="keyword"><a href="#"><?php echo esc_html( DocfiTheme::$options['banner_popular_tag4'] ); ?></a></li>
        </ul>
    </div>
</div>

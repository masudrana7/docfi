<div class="rt-banner-search rt-hero-section-content-wrapper">
    <div class="rt-searchbox-container">
        <form class="rt-searchbox-form d-flex justify-content-between align-items-center" role="search" method="get" action="<?php echo esc_url(home_url('/')) ?>">
            <div class="searchbox-textfield">
                <div class="input-area d-flex align-items-center">
                    <span>
                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.1875 13.124C10.4667 13.124 13.125 10.4657 13.125 7.18652C13.125 3.90733 10.4667 1.24902 7.1875 1.24902C3.90831 1.24902 1.25 3.90733 1.25 7.18652C1.25 10.4657 3.90831 13.124 7.1875 13.124Z" stroke="#8D8D8D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M13.75 13.749L12.5 12.499" stroke="#8D8D8D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    <div class="input-group-addon rt-input-wrap flex-grow-1">
                        <input type="text" class="searchbox-input" name="search" id="rtsearchInput" placeholder="Search in..." autocomplete="off">
                        <span id="cleanText">x</span>
                    </div>   
                </div>
            </div>
            <div class="searchbox-submit">
                <button class="search-btn coolBeans btn-dark rt-searchbox-btn" type="submit"><?php esc_html_e( 'submit', 'docfi' );?></button>
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

<header id="header" class="header transparent has-transparent nav-dark toggle-nav-dark">
    <div class="header-wrapper">
        <div id="masthead" class="header-main hide-for-sticky">
            <div class="header-inner flex-row container logo-left medium-logo-center" role="navigation">
                <div id="logo" class="flex-col logo"> 
                    <a href="{{ route('web.home.index') }}">
                        <img style="
                        width: 100px;
                        height: 66px;
                    " src="{{ ImageURL::getImageUrl(@$settings['website']['logo'], 'setting', '') }}" alt="">
                    </a>
                </div>
                <div class="flex-col show-for-medium flex-left">
                   
                </div>
                <div class="flex-col hide-for-medium flex-left flex-grow">
                    
                </div>
                <div class="flex-col hide-for-medium flex-right dark">
                    <ul class="header-nav header-nav-main nav nav-right  nav-size-medium nav-spacing-xlarge">
                        <li id="menu-item-355"
                            class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-355"><a
                                href="{{ route('web.lienhe.index') }}" class="nav-top-link" data-wpel-link="internal">Liên
                                hệ</a></li>
                        {{-- <li class="header-search-form search-form html relative has-icon">
                            <div class="header-search-form-wrapper">
                                <div class="searchform-wrapper ux-search-box relative form-flat is-normal">
                                    <form role="search" method="get" class="searchform"
                                        action="https://luci.vn/">
                                        <div class="flex-row relative">
                                            <div class="flex-col flex-grow"> <label class="screen-reader-text"
                                                    for="woocommerce-product-search-field-0">Tìm kiếm:</label> <input
                                                    type="search" id="woocommerce-product-search-field-0"
                                                    class="search-field mb-0" placeholder="Tìm kiếm…" value=""
                                                    name="s" autocomplete="off"> <input type="hidden"
                                                    name="post_type" value="product"> <input type="hidden"
                                                    name="lang" value="vi"></div>
                                            <div class="flex-col"> <button type="submit" value="Tìm kiếm"
                                                    class="ux-search-submit submit-button secondary button icon mb-0">
                                                    <i class="icon-search"></i> </button></div>
                                        </div>
                                        <div class="live-search-results text-left z-top">
                                            <div class="autocomplete-suggestions"
                                                style="position: absolute; display: none; max-height: 300px; z-index: 9999;">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </li> --}}
                    </ul>
                </div>
                <div class="flex-col show-for-medium flex-right">
                    <ul class="mobile-nav nav nav-right ">
                        <li class="nav-icon has-icon"> <a href="#" data-open="#main-menu" data-pos="left"
                                data-bg="main-menu-overlay" data-color="" class="is-small" aria-label="Thực đơn"
                                aria-controls="main-menu" aria-expanded="false"> <i class="icon-menu"></i> </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-bg-container fill">
            <div class="header-bg-image fill"></div>
            <div class="header-bg-color fill"></div>
        </div>
    </div>
</header>

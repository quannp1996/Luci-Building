<footer id="footer" class="footer-wrapper">
    <section class="section" id="section_865017060">
        <div class="bg section-bg fill bg-fill bg-loaded"></div>
        <div class="section-content relative">
            <div class="row row-small" id="row-1507271370">
                <div class="col col1 medium-4 small-12 large-4">
                    <div class="col-inner">
                        <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_582286090">
                            <div class="img-inner dark">
                                <img width="612" height="403"
                                    src="{{ ImageURL::getImageUrl(@$settings['website']['logo_footer'], 'setting', '') }}"
                                    class="attachment-original size-original" alt=""
                                    sizes="(max-width: 612px) 100vw, 612px" />
                            </div>
                            <style scope="scope">
                                #image_582286090 {
                                    width: 40%;
                                }
                            </style>
                        </div>
                        {!! nl2br(@$settings['website']['description'] ?? '') !!}
                        <div class="icon-box icon-box-awesome featured-box icon-box-left text-left align-top">
                            <div class="icon-box-img" style="width: 15px;">
                                <div class="icon">
                                    <div class="icon-inner"><i class="fas fa-phone-alt" style="font-size: 15px;"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="icon-box-text last-reset">
                                <a href="tel:{{ @$settings['contact']['hotline'] }}" data-wpel-link="internal">Phone:
                                    <b>{{ @$settings['contact']['hotline'] }}</b></a>
                            </div>
                        </div>
                        <div class="icon-box icon-box-awesome featured-box icon-box-left text-left align-top">
                            <div class="icon-box-img" style="width: 15px;">
                                <div class="icon">
                                    <div class="icon-inner"><i class="fas fa-envelope" style="font-size: 15px;"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="icon-box-text last-reset"><a href="mailto:info@luci.vn">Email:
                                    <b>{{ @$settings['contact']['email'] }} </b></a></div>
                        </div>
                        @if (!empty($settings['website']['address']))
                            <div class="icon-box icon-box-awesome featured-box icon-box-left text-left align-top">
                                <div class="icon-box-img" style="width: 15px;">
                                    <div class="icon">
                                        <div class="icon-inner"><i class="fas fa-map-marker-alt"
                                                style="font-size: 15px;"></i></div>
                                    </div>
                                </div>
                                <div class="icon-box-text last-reset"><b>Trụ sở Hà Nội:
                                    </b>{{ $settings['website']['address'] }}</div>
                            </div>
                        @endif
                        @if (!empty($settings['website']['address_hcm']))
                            <div class="icon-box icon-box-awesome featured-box icon-box-left text-left align-top">
                                <div class="icon-box-img" style="width: 15px;">
                                    <div class="icon">
                                        <div class="icon-inner"><i class="fas fa-map-marker-alt"
                                                style="font-size: 15px;"></i></div>
                                    </div>
                                </div>
                                <div class="icon-box-text last-reset"><b>Văn phòng Hồ Chí Minh:
                                    </b>{{ $settings['website']['address_hcm'] }}<b> </b></div>
                            </div>
                        @endif
                        <div class="social-icons follow-icons" style="font-size: 168%;">
                            @if (!empty($settings['contact']['facebook']))
                                <a href="{{ $settings['contact']['facebook'] }}" target="_blank" data-label="Facebook"
                                    rel="noopener noreferrer nofollow external" class="icon plain facebook tooltip"
                                    title="Theo dõi trên Facebook" data-wpel-link="external">
                                    <i class="icon-facebook"></i>
                                </a>
                            @endif
                            @if (!empty($settings['contact']['youtube']))
                                <a href="{{ $settings['contact']['youtube'] }}" target="_blank"
                                    rel="noopener noreferrer nofollow" data-label="YouTube"
                                    class="icon plain youtube tooltip" title="Theo dõi trên YouTube">
                                    <i class="icon-youtube"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col medium-2 small-6 large-2">
                    <div class="col-inner">
                        <h4>
                            <span><strong>Sitemap</strong></span>
                        </h4>
                        <div class="menu-sitemap-container">
                            <ul id="menu-sitemap" class="menu">
                                <li id="menu-item-318"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-318">
                                    <a href="https://luci.vn/gioi-thieu/" data-wpel-link="internal">Giới thiệu</a>
                                </li>
                                <li id="menu-item-320"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-320">
                                    <a href="https://luci.vn/tu-van-giai-phap/" data-wpel-link="internal">Tư vấn
                                        giải pháp</a>
                                </li>
                                <li id="menu-item-321"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-321">
                                    <a href="https://luci.vn/tin-tuc/" data-wpel-link="internal">Tin tức</a>
                                </li>
                                <li id="menu-item-322"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-322">
                                    <a href="https://luci.vn/tuyen-dung/" data-wpel-link="internal">Tuyển dụng</a>
                                </li>
                                <li id="menu-item-323"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-323">
                                    <a href="https://luci.vn/lien-he/" data-wpel-link="internal">Liên hệ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col medium-3 small-6 large-3">
                    <div class="col-inner">
                        <h4>
                            <span><strong>Chính sách</strong></span>
                        </h4>
                        <div class="menu-chinh-sach-container">
                            <ul id="menu-chinh-sach" class="menu">
                                <li id="menu-item-973"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-973">
                                    <a href="https://luci.vn/chinh-sach-bao-mat-thong-tin/"
                                        data-wpel-link="internal">Chính sách bảo mật thông tin</a>
                                </li>
                                <li id="menu-item-971"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-971">
                                    <a href="https://luci.vn/hinh-thuc-thanh-toan/" data-wpel-link="internal">Hình
                                        thức thanh toán</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col medium-3 small-12 large-3">
                    <div class="col-inner" style="max-height: 250">
                        @if (!empty($settings['other']['gg_map_sm']))
                            {!! $settings['other']['gg_map_sm'] !!}
                        @endif
                    </div>
                </div>
                <style scope="scope"></style>
            </div>
        </div>
        <style scope="scope">
            #section_865017060 {
                padding-top: 30px;
                padding-bottom: 30px;
            }
        </style>
    </section>
    <div class="absolute-footer dark medium-text-center small-text-center">
        <div class="container clearfix">
            <div class="footer-secondary pull-right">
                <div class="footer-text inline-block small-block">2022 Công ty Cổ Phần Luci Việt Nam</div>
            </div>
            <div class="footer-primary pull-left">
                <div class="copyright-footer"></div>
            </div>
        </div>
    </div>
    <a href="#top" class="back-to-top button icon invert plain fixed bottom z-1 is-outline circle"
        id="top-link"><i class="icon-angle-up"></i></a>
</footer>

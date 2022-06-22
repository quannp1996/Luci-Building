@if (!empty($module))
    <section class="section" id="section_1892691832">
        <div class="bg section-bg fill bg-fill bg-loaded"></div>
        <div class="section-content relative">
            <div class="row" id="row-848263922">
                <div class="col small-12 large-12">
                    <div class="col-inner">
                        <div class="row align-bottom" id="row-825781908">
                            <div class="col pb-0 col-download-img medium-4 small-12 large-4">
                                <div class="col-inner">
                                    <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_1601823878">
                                        <div class="img-inner dark">
                                            <img width="348" height="469"
                                                src="{{ @$module['imageLink'] }}"
                                                class="attachment-original size-original" alt=""
                                                sizes="(max-width: 348px) 100vw, 348px" />
                                        </div>
                                        <style scope="scope">
                                            #image_1601823878 {
                                                width: 100%;
                                            }
                                        </style>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-download pb-0 medium-8 small-12 large-8">
                                <div class="col-inner dark">
                                    <div class="row" id="row-1409796554">
                                        <div class="col pb-0 medium-5 small-12 large-5">
                                            <div class="col-inner text-center">
                                                <div id="gap-209935154" class="gap-element clearfix"
                                                    style="display: block; height: auto;">
                                                    <style scope="scope">
                                                        #gap-209935154 {
                                                            padding-top: 15px;
                                                        }
                                                    </style>
                                                </div>
                                                <h3>{{ $module['title'] }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-middle" id="row-51315805">
                                        <div class="col medium-5 small-12 large-5">
                                            <div class="col-inner text-center">
                                                <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_326542146">
                                                    <div class="img-inner dark">
                                                        <a href="" target="_blank">

                                                        </a>
                                                        <img width="198" height="199"
                                                            src="{{ @$module['image_bgLink'] }}"
                                                            class="attachment-large size-large" alt=""
                                                            loading="lazy"
                                                            srcset="https://luci.vn/wp-content/uploads/2019/11/app-QR.png 198w, https://luci.vn/wp-content/uploads/2019/11/app-QR-100x100.png 100w"
                                                            sizes="(max-width: 198px) 100vw, 198px" />
                                                    </div>
                                                    <style scope="scope">
                                                        #image_326542146 {
                                                            width: 74%;
                                                        }
                                                    </style>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="col medium-7 small-12 large-7">
                                            <div class="col-inner">
                                                <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_264206931">
                                                    <a class=""
                                                        href="{{ @$module['linkAndroid'] }}">
                                                        <div class="img-inner dark">
                                                            <img width="300" height="90"
                                                                src="{{ asset('template/wp-content/uploads/2019/11/Google-Play-App-Store.png') }}"
                                                                class="attachment-large size-large" alt=""
                                                                loading="lazy" />
                                                        </div>
                                                    </a>
                                                    <style scope="scope">
                                                        #image_264206931 {
                                                            width: 62%;
                                                        }
                                                    </style>
                                                </div>
                                                <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_82331100">
                                                    <a class=""
                                                        href="{{ @$module['linkIOS'] }}">
                                                        <div class="img-inner dark">
                                                            <img width="300" height="90"
                                                                src="{{ asset('template/wp-content/uploads/2019/11/Google-Play.png') }}"
                                                                class="attachment-large size-large" alt=""
                                                                loading="lazy" />
                                                        </div>
                                                    </a>
                                                    <style scope="scope">
                                                        #image_82331100 {
                                                            width: 62%;
                                                        }
                                                    </style>
                                                </div>
                                            </div>
                                        </div>
                                        <style scope="scope"></style>
                                    </div>
                                </div>
                            </div>
                            <style scope="scope"></style>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style scope="scope">
            #section_1892691832 {
                padding-top: 60px;
                padding-bottom: 60px;
            }
        </style>
    </section>
@endif

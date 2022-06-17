@if (!empty($module))
    <section class="section dark" id="section_1054442960">
        <div class="bg section-bg fill bg-fill bg-loaded" style="background-image: url('{{ @$module['image_bgLink'] }}')">
            <div class="section-bg-overlay absolute fill"></div>
        </div>
        <div class="section-content relative">
            <div class="row" id="row-276835845">
                <div class="col pb-0 small-12 large-12">
                    <div class="col-inner text-center">
                        <h2 class="uppercase"><span style="font-size: 85%;">{{ $module['title'] }}</span></h2>
                    </div>
                </div>
                <div class="col pb-0 small-12 large-12">
                    <div class="col-inner text-center">
                        @if (!empty($module['items']))
                        <div class="slider-wrapper relative" id="slider-1016018644">
                            <div class="slider slider-nav-dots-simple slider-nav-simple slider-nav-large slider-nav-light slider-style-normal"
                                data-flickity-options='{
                                "cellAlign": "center",
                                "imagesLoaded": true,
                                "lazyLoad": 1,
                                "freeScroll": false,
                                "wrapAround": true,
                                "autoPlay": 6000,
                                "pauseAutoPlayOnHover" : true,
                                "prevNextButtons": true,
                                "contain" : true,
                                "adaptiveHeight" : true,
                                "dragThreshold" : 10,
                                "percentPosition": true,
                                "pageDots": true,
                                "rightToLeft": false,
                                "draggable": true,
                                "selectedAttraction": 0.1,
                                "parallax" : 0,
                                "friction": 0.6        }'>
                                @foreach ($module['items'] as $list)
                                    <div class="row" id="row-642225816">
                                        <div class="col small-12 large-12">
                                            <div class="col-inner">
                                                <p>
                                                    <img loading="lazy" class="alignnonewp-image-850"
                                                        src="../../wp-content/uploads/2019/11/chi-tiet-sp-icon1.png"
                                                        alt="" width="127" height="127"
                                                        srcset="https://luci.vn/wp-content/uploads/2019/11/chi-tiet-sp-icon1.png 192w, https://luci.vn/wp-content/uploads/2019/11/chi-tiet-sp-icon1-100x100.png 100w"
                                                        sizes="(max-width: 127px) 100vw, 127px" />
                                                </p>
                                                <p class="uppercase">
                                                    <span style="font-size: 1.5rem;">
                                                        {!! nl2br($list['title']) !!}
                                                    </span>
                                                </p>
                                                <p>
                                                    <span style="font-size: 1rem;">
                                                        {!! nl2br($list['descrption']) !!}
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                            </div>
                            <div class="loading-spin dark large centered"></div>
                            <style scope="scope"></style>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <style scope="scope">
            #section_1054442960 {
                padding-top: 60px;
                padding-bottom: 60px;
            }

            #section_1054442960 .section-bg-overlay {
                background-color: rgba(0, 155, 113, 0.77);
            }
        </style>
    </section>
@endif

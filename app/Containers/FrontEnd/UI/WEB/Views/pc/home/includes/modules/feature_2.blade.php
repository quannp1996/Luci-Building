@if (!empty($module))
    <section class="section ss-chi-tiet-bg" id="section_952772915">
        <div class="section-content relative">
            <div class="row" id="row-1005566459">
                <div class="col medium-6 small-12 large-6">
                    <div class="col-inner">
                        <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_217548346">
                            <div class="img-inner dark">
                                <img width="513" height="511" src="{{ @$module['imageLink'] }}"
                                    class="attachment-original size-original" alt=""
                                    sizes="(max-width: 513px) 100vw, 513px" />
                            </div>
                            <style scope="scope">
                                #image_217548346 {
                                    width: 90%;
                                }
                            </style>
                        </div>
                    </div>
                </div>
                <div class="col col2 medium-6 small-12 large-6">
                    <div class="col-inner dark">
                        <h2 class="uppercase">
                            <span style="font-size: 1.875rem;">
                                {!! nl2br($module['title']) !!}
                            </span>
                        </h2>
                        @if ($module['items'])
                            @foreach ($module['items'] as $list)
                                <div
                                    class="icon-box icon-box-awesome featured-box icon-box-left text-left align-middle">
                                    <div class="icon-box-img" style="width: 45px;">
                                        <div class="icon">
                                            <div class="icon-inner">
                                                <?xml version="1.0" encoding="UTF-8"?>
                                                <img src="{{ @$list['imageLink'] }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="icon-box-text last-reset">
                                        <p><span style="font-size: 1rem;">{!! nl2br($list['title']) !!}</span></p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <style scope="scope">
            #section_952772915 {
                padding-top: 60px;
                padding-bottom: 60px;
            }
        </style>
    </section>
    <div id="gap-1348935347" class="gap-element clearfix" style="display: block; height: auto;">
        <style scope="scope">
            #gap-1348935347 {
                padding-top: 60px;
            }
            .ss-chi-tiet-bg{
                background-image: url('{{ @$module['image_bgLink'] }}')
            }
            .ss-chi-tiet-bg:before{
                background-color: {{ @$landingPage->color }};
                opacity: {{ @$landingPage->transparent ?? '0.77' }};
            }
            .ss-chi-tiet-bg::after{
                content: "";
                width: 50vw;
                height: 45vw;
                position: absolute;
                right: 0;
                opacity: {{ @$landingPage->transparent ?? '0.77' }};
                background-color: {{ @$landingPage->color }};
            }
        </style>
    </div>
@endif

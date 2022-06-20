@if (!empty($module))
    <section class="section ss-chi-tiet-tinh-nang" id="section_1372355915">
        <div class="bg section-bg fill bg-fill bg-loaded"></div>
        <div class="section-content relative">
            <div class="row" id="row-847492185">
                <div class="col small-12 large-12">
                    <div class="col-inner text-center">
                        <h2 class="uppercase">
                            <span style="font-size: 85%;">
                                {{ $module['title'] }}
                            </span>
                        </h2>
                    </div>
                </div>
            </div>
            @php
                if (!empty($module['items'])) {
                    $subArrays = array_chunk($module['items'], ceil(count($module['items']) / 2));
                }
            @endphp
            <div class="row align-middle" id="row-1434208316">
                @if (!empty($subArrays[0]) && is_array($subArrays[0]))
                    <div class="col medium-4 small-12 large-4">
                        <div class="col-inner text-left">
                            @foreach ($subArrays[0] ?? [] as $list)
                                <div
                                    class="icon-box icon-box-awesome featured-box icon-box-left text-left align-middle">
                                    <div class="icon-box-img" style="width: 68px;">
                                        <div class="icon">
                                            <div class="icon-inner" style="color: rgb(255, 255, 255);">
                                                <?xml version="1.0" encoding="UTF-8"?>
                                                <img src="{{ @$list['imageLink'] }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="icon-box-text last-reset">
                                        <p style="text-align: left;">
                                            <span style="font-size: 1rem;">{!! nl2br($list['title']) !!}</span>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                <div class="col medium-4 small-12 large-4">
                    <div class="col-inner text-center">
                        <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_502235348">
                            <div class="img-inner dark">
                                <img width="301" height="585" src="{{ @$module['imageLink'] }}"
                                    class="attachment-original size-original" alt=""
                                    sizes="(max-width: 301px) 100vw, 301px" />
                            </div>
                            <style scope="scope">
                                #image_502235348 {
                                    width: 80%;
                                }
                            </style>
                        </div>
                    </div>
                </div>
                @if (!empty($subArrays[1]) && is_array($subArrays[1]))
                    <div class="col medium-4 small-12 large-4">
                        <div class="col-inner text-left">
                            @foreach ($subArrays[1] ?? [] as $list)
                                <div
                                    class="icon-box icon-box-awesome featured-box icon-box-left text-left align-middle">
                                    <div class="icon-box-img" style="width: 68px;">
                                        <div class="icon">
                                            <div class="icon-inner" style="color: rgb(255, 255, 255);">
                                                <?xml version="1.0" encoding="UTF-8"?>
                                                <img src="{{ @$list['imageLink'] }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="icon-box-text last-reset">
                                        <p style="text-align: left;">
                                            <span style="font-size: 1rem;">{!! nl2br($list['title']) !!}</span>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                <style scope="scope"></style>
            </div>
        </div>
        <style scope="scope">
            #section_1372355915 {
                padding-top: 60px;
                padding-bottom: 60px;
            }
            
        </style>
    </section>
@endif

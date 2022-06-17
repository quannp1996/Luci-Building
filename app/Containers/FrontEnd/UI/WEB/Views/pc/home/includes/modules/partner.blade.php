@if (!empty($module))
    <section class="section dark" id="section_1888303823">
        <div class="bg section-bg fill bg-fill bg-loaded" style="background-image: url('{{ $module['image_bgLink'] }}')">
            <div class="section-bg-overlay absolute fill"></div>
        </div>
        <div class="section-content relative">
            <div class="row" id="row-844241537">
                <div class="col small-12 large-12">
                    <div class="col-inner text-center">
                        <h2 class="uppercase">
                            <span style="font-size: 1.875rem;">
                                {{ @$module['title'] }}
                            </span>
                        </h2>
                        <div>
                            <span style="font-size: 1rem;">
                                {!! nl2br(@$module['description'] ?? '') !!}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-center" id="row-1755626422">
                <div class="col medium-11 small-12 large-11">
                    <div class="col-inner">
                        <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_686444642">
                            <div class="img-inner dark">
                                <img width="1146" height="366"
                                    src="{{ @$module['imageLink'] }}"
                                    class="attachment-original size-original" alt=""
                                    sizes="(max-width: 1146px) 100vw, 1146px" />
                            </div>
                            <style scope="scope">
                                #image_686444642 {
                                    width: 100%;
                                }
                            </style>
                        </div>
                    </div>
                </div>
                <style scope="scope"></style>
            </div>
            <div class="row align-center" id="row-101701215">
                <div class="col medium-11 small-12 large-11">
                    <div class="col-inner">
                        <div class="row" id="row-825925580">
                            @foreach ($module['items'] ?? [] as $list)
                            <div class="col medium-6 small-12 large-6">
                                <div class="col-inner">
                                    <div
                                        class="icon-box icon-box-awesome featured-box icon-box-left text-left align-middle">
                                        <div class="icon-box-img" style="width: 60px;">
                                            <div class="icon">
                                                <div class="icon-inner" style="color: rgb(255, 255, 255);">
                                                    <?xml version="1.0" encoding="UTF-8"?>
                                                    <img src="{{ @$list['imageLink'] }}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="icon-box-text last-reset">
                                            <p style="text-align: left;">
                                                <span style="font-size: 1rem;">
                                                    {{ $list['title'] }}
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <style scope="scope"></style>
            </div>
        </div>
        <style scope="scope">
            #section_1888303823 {
                padding-top: 60px;
                padding-bottom: 60px;
            }

            #section_1888303823 .section-bg-overlay {
                background-color: rgba(0, 155, 113, 0.77);
            }

            #section_1888303823 .section-bg.bg-loaded {
                background-image: url(../../wp-content/uploads/2019/11/daniel-dinuzzo.jpg);
            }
        </style>
    </section>
@endif

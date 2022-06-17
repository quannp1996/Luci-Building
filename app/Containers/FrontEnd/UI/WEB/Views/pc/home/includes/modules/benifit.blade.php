@if (!empty($module))
    <section class="section" id="section_661476298">
        <div class="bg section-bg fill bg-fill bg-loaded"></div>
        <div class="section-content relative">
            <div class="row" id="row-450036992">
                <div class="col small-12 large-12">
                    <div class="col-inner text-center">
                        <h2 class="uppercase"><span style="font-size: 1.875rem;">{!! nl2br($module['title']) !!}</span></h2>
                    </div>
                </div>
            </div>
            <div class="row" id="row-2093903577">
                @if (!empty($module['items']))
                    @foreach ($module['items'] as $list)
                        <div class="col medium-4 small-12 large-4">
                            <div class="col-inner">
                                <div class="box has-hover has-hover box-text-bottom">
                                    <div class="box-image" style="width: 41%;">
                                        <div class="">
                                            <img width="192" height="192" src="{{ $list['imageLink'] }}"
                                                class="attachment-original size-original" alt="" />
                                        </div>
                                    </div>
                                    <div class="box-text text-center">
                                        <div class="box-text-inner">
                                            <h3 class="uppercase">
                                                <span style="font-size: 1.25rem;">
                                                    {{ $list['title'] }}
                                                </span>
                                            </h3>
                                            <p>
                                                <span style="font-size: 1rem;">
                                                    {!! nl2br($list['descrption']) !!}
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <style scope="scope">
            #section_661476298 {
                padding-top: 60px;
                padding-bottom: 60px;
            }
        </style>
    </section>

@endif

@if (!empty($module))
    <section class="section dark" id="section_2000709245">
        <div class="bg section-bg fill bg-fill bg-loaded" style="background-image: url('{{ $module['imageLink'] }}')">
            <div class="section-bg-overlay absolute fill"></div>
        </div>
        <div class="section-content relative">
            <div id="gap-1370462045" class="gap-element clearfix" style="display: block; height: auto;">
                <style scope="scope">
                    #gap-1370462045 {
                        padding-top: 80px;
                    }
                </style>
            </div>
            <div class="row" id="row-2097722545">
                <div class="col small-12 large-12">
                    <div class="col-inner text-center">
                        <h1 class="uppercase">
                            <span style="font-size: 2rem;">
                            {!! nl2br($module['title']) !!}
                            </span>
                        </h1>
                        <div>
                            <span style="font-size: 1rem;">
                                {!! nl2br($module['description']) !!}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style scope="scope">
            #section_2000709245 {
                padding-top: 30px;
                padding-bottom: 30px;
                min-height: 480px;
            }

            #section_2000709245 .section-bg-overlay {
                background-color: rgba(0, 155, 113, 0.77);
            }

            #section_2000709245 .section-bg.bg-loaded {
                background-image: url(../../wp-content/uploads/2019/11/daniel-dinuzzo.jpg);
            }
        </style>
    </section>
@endif

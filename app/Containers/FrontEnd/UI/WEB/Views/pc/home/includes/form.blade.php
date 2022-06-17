<section class="section ss-dang-ky-nhan-tin" id="section_802990329">
    <div class="bg section-bg fill bg-fill bg-loaded"></div>
    <div class="section-content relative">
        <div class="row" id="row-555705963">
            <div class="col pb-0 small-12 large-12">
                <div class="col-inner dark">
                    <h3 class="uppercase" style="text-align: center;">Đăng ký để nhận thêm tin
                    </h3>
                </div>
            </div>
            <div class="col pb-0 small-12 large-12">
                <div class="col-inner">
                    <div role="form" class="wpcf7" id="wpcf7-f10-p671-o1" lang="en-US" dir="ltr">
                        <div class="screen-reader-response"></div>
                        <form action="{{ route('api_contact_create_contact') }}" method="post" id="contact_form" class="wpcf7-form" novalidate="novalidate">
                            @csrf
                            <div class="flex-row medium-flex-wrap">
                                <div class="flex-col">
                                    <span class="wpcf7-form-control-wrap shop_name">
                                        <input type="text" name="shop_name" id="shop_name" value="" size="40"
                                            class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                            aria-required="true" aria-invalid="false" placeholder="Họ và tên *" />
                                    </span>
                                </div>
                                <div class="flex-col">
                                    <span class="wpcf7-form-control-wrap phone">
                                        <input type="tel" name="phone" id="phone" value="" size="40"
                                            class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel"
                                            aria-required="true" aria-invalid="false" placeholder="Số điện thoại *" />
                                    </span>
                                </div>
                                <div class="flex-col">
                                    <span class="wpcf7-form-control-wrap email">
                                        <input type="email" name="email" id="email" value="" size="40"
                                            class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email"
                                            aria-required="true" aria-invalid="false" placeholder="Email *" />
                                    </span>
                                </div>
                                <div class="flex-col">
                                    <input type="button" id="submit_contact" value="Đăng ký" class="button secondary" />
                                </div>
                            </div>
                            <div class="wpcf7-response-output wpcf7-display-none"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style scope="scope">
        #section_802990329 {
            padding-top: 60px;
            padding-bottom: 60px;
        }
    </style>
</section>
@push('js_bot_all')
    <script>
        jQuery(document).ready(function($){
            $('#submit_contact').click(function(){
                $('.wpcf7-not-valid-tip').remove();
                $('#contact_form .medium-flex-wrap').addClass('processing');
                $.post('{{ route('api_contact_create_contact') }}', $('#contact_form').serialize()).then(function(json){
                    $('#contact_form input').val('');
                }).fail(function(json){
                    const errors = json.responseJSON.errors;
                    Object.keys(errors).forEach(item => {
                        $('#contact_form .flex-col input#' + item).after('<span role="alert" class="wpcf7-not-valid-tip">'+ errors[item] +'</span>')
                    })
                }).always(function(){
                    $('#contact_form .medium-flex-wrap').removeClass('processing');
                })
            })
        })
    </script>
@endpush

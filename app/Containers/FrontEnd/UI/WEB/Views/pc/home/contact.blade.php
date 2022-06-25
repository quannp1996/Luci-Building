@extends('basecontainer::frontend.pc.layouts.home')
@section('content')
    <div id="content" role="main" class="content-area">
        <section class="section" id="section_103927741">
            <div class="bg section-bg fill bg-fill bg-loaded"></div>
            <div class="section-content relative">
                <div class="row" id="row-2117431281">
                    <div class="col pb-0 small-12 large-12">
                        <div class="col-inner text-center dark">
                            <h1 class="mb-0">Liên hệ</h1>
                        </div>
                    </div>
                </div>
            </div>
            <style scope="scope">
                #section_103927741 {
                    padding-top: 30px;
                    padding-bottom: 30px;
                    min-height: 300px
                }

                #section_103927741 .section-bg.bg-loaded {
                    background-image: url(https://luci.vn/wp-content/uploads/2019/11/lien-he-bg.jpg)
                }
            </style>
        </section>
        <section class="section lien-he-ss1" id="section_1801491991">
            <div class="bg section-bg fill bg-fill bg-loaded">
                <div class="section-bg-overlay absolute fill"></div>
            </div>
            <div class="section-content relative">
                <div id="page-header-1802780298" class="page-header-wrapper">
                    <div class="page-title breadcrumbs-left light simple-title">
                        <div class="page-title-inner container align-center flex-row medium-flex-wrap">
                            <div class="title-content flex-col flex-right text-right medium-text-center">
                                <div class="title-breadcrumbs pb-half pt-half">
                                    <nav class="woocommerce-breadcrumb breadcrumbs ">
                                        <a href="https://luci.vn/" data-wpel-link="internal">Trang chủ</a> <span
                                            class="divider">/</span>
                                        Liên hệ
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <style scope="scope"></style>
                    </div>
                </div>
                <div class="row row1" id="row-1463025791">
                    <div class="col col1 medium-6 small-12 large-6">
                        <div class="col-inner">
                            <h3>Thông tin liên hệ</h3>
                            <p><strong>Mọi thắc mắc vui lòng liên hệ với Luci để được tư vấn hỗ trợ tốt
                                    nhất.</strong></p>
                            <div class="icon-box icon-box-awesome featured-box icon-box-left text-left align-top">
                                <div class="icon-box-img" style="width: 15px">
                                    <div class="icon">
                                        <div class="icon-inner"> <i class="fas fa-phone-alt" style="font-size:15px;"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="icon-box-text last-reset">
                                    <p><a href="tel:0902239589" data-wpel-link="internal">Phone:
                                            <b>{{ @$settings['contact']['hotline'] }}</b></a></p>
                                </div>
                            </div>
                            <div class="icon-box icon-box-awesome featured-box icon-box-left text-left align-top">
                                <div class="icon-box-img" style="width: 15px">
                                    <div class="icon">
                                        <div class="icon-inner"> <i class="fas fa-envelope" style="font-size:15px;"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="icon-box-text last-reset">
                                    <p>
                                        <a href="mailto:{{ @$settings['contact']['email'] }}">Email:
                                            <b>{{ @$settings['contact']['email'] }}</b> </a>
                                    </p>
                                </div>
                            </div>
                            <div class="icon-box icon-box-awesome featured-box icon-box-left text-left align-top">
                                <div class="icon-box-img" style="width: 15px">
                                    <div class="icon">
                                        <div class="icon-inner"> <i class="fas fa-map-marker-alt"
                                                style="font-size:15px;"></i></div>
                                    </div>
                                </div>
                                <div class="icon-box-text last-reset">
                                    @if (!empty(@$settings['website']['address']))
                                        <p><b>Trụ sở Hà Nội: {{ @$settings['website']['address'] }}</b></p>
                                    @endif
                                    @if ($settings['website']['address_hcm'])
                                        <p><b>Văn phòng Hồ Chí Minh: {{ @$settings['website']['address_hcm'] }}</b></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col medium-6 small-12 large-6">
                        <div class="col-inner">
                            <h3>Điền form tư vấn</h3>
                            <p>Đăng ký thông tin ngay để nhận được sự hỗ trợ tận tình từ đội ngũ của Luci!</p>
                            <div role="form" class="wpcf7" id="wpcf7-f606-p312-o1" lang="vi" dir="ltr">
                                <form action="#" method="post" id="contact_form" class="wpcf7-form invalid"
                                    novalidate="novalidate">
                                    @csrf
                                    <div class="row row-small">
                                        <div class="col pb-0 large-12">
                                            <div class="col-inner">
                                                <span class="wpcf7-form-control-wrap shop_name">
                                                    <input type="text" name="shop_name" id="shop_name" value=""
                                                        size="40"
                                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                                        aria-required="true" aria-invalid="true" placeholder="Họ và tên *">
                                                </span>
                                            </div>
                                            <p></p>
                                        </div>
                                        <div class="col pb-0 large-6">
                                            <div class="col-inner">
                                                <span class="wpcf7-form-control-wrap phone">
                                                    <input type="tel" name="phone" id="phone" value=""
                                                        size="40" maxlength="10" minlength="10"
                                                        class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel"
                                                        aria-required="true" aria-invalid="true"
                                                        placeholder="Số điện thoại *" />
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col pb-0 large-6">
                                            <div class="col-inner">
                                                <span class="wpcf7-form-control-wrap email">
                                                    <input type="email" name="email" id="email" value=""
                                                        size="40"
                                                        class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email"
                                                        aria-required="true" aria-invalid="true" placeholder="Email *">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col pb-0 large-12">
                                            <div class="col-inner"> <span class="wpcf7-form-control-wrap message">
                                                    <textarea name="message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea"
                                                        aria-invalid="false" placeholder="Nội dung cần tư vấn"></textarea>
                                                </span></div>
                                            <p></p>
                                        </div>
                                        <div class="col pb-0 large-12">
                                            <div class="col-inner">
                                                <button type="button" id="submit_contact"
                                                    style="background-color: #f15a29;border-radius: 0 8px;"
                                                    class="wpcf7-form-control wpcf7-submit button secondary">Gửi
                                                    đi</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <style scope="scope">
                #section_1801491991 {
                    padding-top: 0;
                    padding-bottom: 0
                }

                #section_1801491991 .section-bg-overlay {
                    background-color: rgba(255, 255, 255, .58)
                }
            </style>
        </section>
        <section class="section" id="section_123308484">
            <div class="bg section-bg fill bg-fill bg-loaded"></div>
            <div class="section-content relative">
                {!! @$settings['other']['gg_map'] !!}
            </div>
            <style scope="scope">
                #section_123308484 {
                    padding-top: 30px;
                    padding-bottom: 30px
                }
            </style>
        </section>
    </div>
@endsection
@push('js_bot_all')
    <script>
        jQuery(document).ready(function($) {
            $('#submit_contact').click(function() {
                $('.wpcf7-not-valid-tip').remove();
                $('#contact_form .wpcf7-form-control-wrap input').removeClass('wpcf7-not-valid');
                $('#contact_form .medium-flex-wrap').addClass('processing');
                $.post('{{ route('api_contact_create_contact') }}', $('#contact_form').serialize()).then(
                    function(json) {
                        Swal.fire({
                            type: 'success',
                            text: json.message
                        }).then(json => {
                            $('#contact_form input').val('');
                            $('#contact_form textarea').val('');
                        });
                    }).fail(function(json) {
                    const errors = json.responseJSON.errors;
                    Object.keys(errors).forEach(item => {
                        $('#contact_form .wpcf7-form-control-wrap input#' + item).addClass(
                            'wpcf7-not-valid');
                        $('#contact_form .wpcf7-form-control-wrap input#' + item).after(
                            '<span role="alert" class="wpcf7-not-valid-tip">' + errors[
                                item] + '</span>')
                    })
                }).always(function() {
                    $('#contact_form .medium-flex-wrap').removeClass('processing');
                })
            })
        })
    </script>
@endpush

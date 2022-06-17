@extends('basecontainer::frontend.pc.layouts.home')
@section('content')
    <div class="shop-container">
        @if (!empty($landingPage))
            <div id="product-671"
                class="product type-product post-671 status-publish first instock product_cat-san-pham has-post-thumbnail taxable shipping-taxable product-type-simple">
                <div class="product-container">
                    @foreach ($landingPage->arrayModule() ?? [] as $key => $item)
                        @if (view()->exists('frontend::pc.home.includes.modules.' . $item['type']) && $item['display'] == 1)
                            @include('frontend::pc.home.includes.modules.' . $item['type'], [
                                'module' => $item,
                            ])
                        @endif
                    @endforeach
                    @include('frontend::pc.home.includes.form')
                </div>
            </div>
        @endif
    </div>
@endsection

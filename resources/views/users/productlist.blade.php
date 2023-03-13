@extends('layoutshome.indext')
@section('conten')
    <!DOCTYPE html>
    <html lang="en-US" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml" style="--vh:9.04px;">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="./Etsy - Shopping Cart_files/settings-overlay.20220906191844.css" type="text/css">
        <title>Etsy - Shopping Cart</title>
        <link rel="stylesheet" href="./Etsy - Shopping Cart_files/adaptive-height-desktop.20220906191844.css"
            type="text/css">
    </head>

    <body class="ui-toolkit transitional-wide is-responsive no-touch en-US VND VN">
        <main role="main" id="content">
            <div id="checkout"
                class="wt-horizontal-center wt-bg-white wt-width-full wt-body-max-width wt-pl-xs-2 wt-pr-xs-2 wt-pl-lg-6 wt-pr-lg-6 wt-pt-xs-4 min-width-desktop-view">
                <div>
                    <div data-selector="cart-header-loading" class="wt-pb-xs-4">
                        <div class="" data-checkout-header="">
                            <div
                                class="wt-display-flex-xs wt-justify-content-space-between wt-align-items-center wt-mt-xs-2">
                                
                            </div>
                        </div>
                    </div>
                    <div class="wt-position-relative">
                        <div id="multi-shop-cart-list" class="wt-align-items-center">
                            <div class="cart-panel">
                                <div class="wt-mt-xs-1 wt-mt-lg-0 wt-mb-xs-5 wt-position-relative">

                                    <div class="wt-grid wt-position-relative wt-pl-xs-0 wt-pr-xs-0">
                                        <ul
                                            class="cart-list-items wt-grid__item-xs-12 wt-grid__item-sm-12 wt-grid__item-md-7 wt-grid__item-lg-8 wt-p-xs-0 wt-pr-md-3 wt-height-full wt-list-unstyled wt-pt-xs-2 wt-bt-xs">
                                            <li class="multi-shop-cart-single wt-bt-xs wt-mt-xs-3 wt-mt-md-5 wt-pt-xs-3">

                                                <ul class="wt-list-unstyled">
                                                    @foreach ($cartproducts as $item => $product)
                                                        <li class="wt-pb-lg-2 wt-mb-xs-2">
                                                            <div class="wt-display-flex-xs wt-pt-xs-1 wt-pt-lg-0">
                                                                <div class="wt-display-flex-xs wt-pt-xs-1 wt-pt-lg-0">
                                                                    <a href="">
                                                                        <img src="{{ $product->picture }}"
                                                                            class="wt-width-full wt-rounded-01">
                                                                    </a>
                                                                </div>
                                                                <div class="wt-flex-xs-3 wt-pl-xs-2 wt-pl-lg-3">
                                                                    <div class="wt-grid">
                                                                        <div class="wt-grid__item-xs-12 wt-grid__item-lg-7">
                                                                            <p class="wt-display-block wt-pb-xs-1">

                                                                                <a class="wt-text-link-no-underline wt-text-body-01 wt-line-height-tight wt-break-word"
                                                                                    href="">
                                                                                    {{ $product->posts }}
                                                                                </a>
                                                                            </p>
                                                                            <div>
                                                                                <ul
                                                                                    class="wt-list-inline wt-pt-xs-1 wt-pt-sm-0">
                                                                                    <li
                                                                                        class="wt-list-inline__item wt-pb-xs-2 wt-mr-xs-0">
                                                                                        <a   href="{{ route('home.reducesp', ['product_id' => $product->product_id]) }}"
                                                                                            role="button"
                                                                                            rel="save-for-later-guest"
                                                                                            class="inline-overlay-trigger save-for-later-action"
                                                                                            data-listing-key="6976503597|1121649214|8438087799|1082685796126">
                                                                                            <span
                                                                                                class="wt-btn wt-btn--transparent wt-btn--small wt-btn--transparent-flush-left">

                                                                                                Giảm sản phẩm
                                                                                            </span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <span>{{$product->amount}}</span>
                                                                                    <li
                                                                                        class="wt-list-inline__item wt-pb-xs-2 wt-pr-xs-1">
                                                                                        <a href="{{ route('home.addsp', ['product_id' => $product->product_id]) }}"
                                                                                            rel="remove" role="button"
                                                                                            aria-label="Remove listing">
                                                                                            <span
                                                                                                class="wt-btn wt-btn--transparent wt-btn--small ">
                                                                                               Tăng sản phẩm
                                                                                            </span>
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="wt-grid__item-xs-5 wt-hide-xs wt-show-lg wt-pl-xs-3">
                                                                            <div class="wt-grid">

                                                                                <div class="wt-grid__item-xs-7">
                                                                                    <div class="wt-text-right-xs wt-text-strikethrough">
                                                                                        <p class="wt-text-title-01"><span
                                                                                                class="money"><span
                                                                                                    class="currency-value">{{ $product->promotional_price* $product->amount }}</span><span
                                                                                                    class="currency-symbol">₫</span></span>
                                                                                        </p>
                                                                                    </div>
                                                                                    <div
                                                                                        class="wt-text-right-xs  wt-text-caption wt-text-gray">
                                                                                        <div class="wt-text-right-xs">
                                                                                            <p class="wt-text-title-01">
                                                                                                <span class="money"><span
                                                                                                        class="currency-value">{{ $product->original_price* $product->amount}}</span><span
                                                                                                        class="currency-symbol">₫</span></span>
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="wt-grid__item-xs-12">
                                                                                    <div class="wt-mb-xs-2 wt-mt-xs-2">
                                                                                        <section
                                                                                            class="wt-text-body-01 wt-line-height-tight ">
                                                                                            <div
                                                                                                class="wt-display-flex-xs wt-justify-content-flex-end">
                                                                                                <div
                                                                                                    class="wt-display-flex-xs wt-align-self-center">
                                                                                                    <div
                                                                                                        class="wt-text-slime">
                                                                                                        <span
                                                                                                            class="strong">Sale:</span>
                                                                                                        ({{ promotionPercentage($product->original_price, $product->promotional_price)}}%)
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="wt-display-flex-xs wt-flex-nowrap wt-align-self-center">
                                                                                                </div>
                                                                                            </div>
                                                                                        </section>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>

                                    <a class="wt-btn  wt-width-full"
                                        href="{{ route('home.giohang') }}">
                                        Đặt hàng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </body>

    </html>
    <script>
        $(document).ready(function() {
            $("#alert").toggle(15000);
        })
    </script>
@endsection

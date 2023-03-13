@extends('layoutshome.indext')
@section('conten')
    <!DOCTYPE html>
    <html lang="en-US">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="content-language" content="en-VN">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./detail_files/settings-overlay.20220906191844.css" type="text/css">
        <title>Vietnamese Gift Oil Painting Vietnamese Woman in Ao Dai - Etsy Vietnam</title>
        <link rel="stylesheet" href="./detail_files/desktop_sidesheet.20220906191844.css" type="text/css">

    </head>

    <body class="ui-toolkit transitional-wide is-responsive no-touch en-US VND VN">

        <main role="main" id="content">
            <div data-selector="listing-page-content" class="content-wrap listing-page-content">
                <div class="wt-pt-xs-5 listing-page-content-container-wider wt-horizontal-center">
                    <div id="listing-right-column" class="listing-buy-box-experiment">
                        <div>
                            <div class="body-wrap wt-body-max-width wt-display-flex-md wt-flex-direction-column-xs">
                                <div class="image-col wt-order-xs-1 wt-mb-lg-6">
                                    <div
                                        class="wt-display-flex-lg wt-position-relative wt-flex-lg-6 wt-flex-direction-row-lg wt-mb-xs-2 wt-mb-lg-0 wt-pl-md-4 wt-pl-lg-5 wt-pl-xs-2 wt-pr-xs-2 wt-pr-xl-2 wt-pr-md-4 wt-pr-lg-0">
                                        <div
                                            class="wt-position-relative wt-flex-lg-6 wt-flex-direction-row-lg wt-mb-md-2 wt-mb-lg-0 wt-mr-lg-3 wt-pr-xl-2">

                                            <div class="image-wrapper wt-position-relative carousel-container-responsive">
                                                <div
                                                    class="listing-page-image-carousel-component wt-display-flex-xs is-initialized">

                                                    <div
                                                        class="image-carousel-container wt-position-relative wt-flex-xs-6 wt-order-xs-2 show-scrollable-thumbnails">

                                                        <ul class="wt-list-unstyled wt-overflow-hidden wt-position-relative carousel-pane-list"
                                                            style="padding-top: 96.3666666667%;" data-carousel-pane-list=""
                                                            tabindex="0">
                                                            @foreach ($products as $item=>$productes)
                                                            <li class=" wt-position-absolute wt-width-full wt-height-full wt-position-top wt-position-left carousel-pane"
                                                                data-carousel-pane="" data-index="0"
                                                                data-image-id="3461579983" data-palette-listing-image="">
                                                                <img class="wt-max-width-full wt-horizontal-center wt-vertical-center carousel-image wt-rounded"
                                                                    alt="Vietnamese Gift Oil painting Vietnamese Woman In Ao Dai image 1"
                                                                    src="{{$productes->picture}}">
                                                            </li>
                                                          
                                                        </ul>
                                                    </div>
                                                    <div>
                                                        <div
                                                            class="carousel-pagination-item-v2 wt-position-absolute wt-position-top wt-position-left wt-z-index-9">
                                                        </div>
                                                        <div class="carousel-pagination-item-v2 wt-position-absolute wt-position-bottom wt-position-left wt-z-index-9"
                                                            data-thumbnail-scroll-down="">

                                                        </div>
                                                        <div
                                                            class="wt-position-absolute wt-overflow-scroll wt-position-top wt-position-bottom wt-position-left scroll-container-no-scrollbar">
                                                            <ul data-carousel-pagination-list=""
                                                                class="wt-list-unstyled wt-display-flex-xs wt-order-xs-1 wt-flex-direction-column-xs wt-align-items-flex-end">
                                                                
                                                                    <li
                                                                        class="wt-mr-xs-1 wt-mb-xs-1 wt-bg-gray wt-flex-shrink-xs-0 wt-rounded carousel-pagination-item-v2 is-active">
                                                                        <img class="wt-animated wt-max-width-full wt-width-full wt-animated--appear-01"
                                                                            src="{{$productes->picture_detail}}"
                                                                            alt="Vietnamese Gift Oil painting Vietnamese Woman In Ao Dai image 1">
                                                                    </li>
                                                               
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="cart-col wt-order-xs-2 wt-mb-lg-6">
                                    <div id="listing-page-cart"
                                        class="wt-display-flex-lg wt-flex-direction-column-md wt-flex-lg-3 wt-pl-md-4 wt-pr-md-4 wt-pl-lg-0 wt-pr-lg-5 wt-pl-xs-2 wt-pr-xs-2">
                                        <div class="wt-mb-xs-2">
                                            <h1 class="wt-text-body-03 wt-line-height-tight wt-break-word">
                                               {{$productes->posts}}
                                            </h1>
                                        </div>
                                        <div class="wt-mb-xs-6 wt-mb-lg-0">
                                            <div>
                                                <div class="wt-mb-xs-3">
                                                    <div class="wt-mb-xs-3">
                                                        <div>
                                                            <div
                                                                class="wt-display-flex-xs wt-align-items-center wt-justify-content-space-between">
                                                                <div
                                                                    class="wt-display-flex-xs wt-align-items-center wt-flex-wrap">
                                                                    <p class="wt-text-title-03 wt-mr-xs-1">
                                                                        <span class="wt-screen-reader-only">Price:</span>
                                                                        <span>
                                                                            {{$productes->promotional_price}}
                                                                           
                                                                        </span>
                                                                    </p>
                                                                    <div
                                                                        class="wt-display-flex-xs wt-text-caption wt-text-gray">
                                                                        <div class="wt-text-strikethrough wt-mr-xs-1">
                                                                            <span class="wt-screen-reader-only">Original
                                                                                Price:</span>
                                                                                {{$productes->original_price}}
                                                                        </div>
                                                                        <div class="wt-mr-xs-1">
                                                                             (-{{ promotionPercentage($productes->original_price, $productes->promotional_price) }}%)
                                                                        </div>
                                                                    </div>

                                                                    <div class="wt-spinner wt-spinner--01 wt-display-none"
                                                                        aria-live="assertive" data-buy-box-price-spinner="">
                                                                        <span class="wt-icon"><svg
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                viewBox="0 0 24 24" aria-hidden="true"
                                                                                focusable="false">
                                                                                <circle fill="transparent" cx="12"
                                                                                    cy="12" r="10"></circle>
                                                                            </svg>
                                                                        <h1></h1></span>
                                                                        Loading
                                                                    </div>

                                                                </div>
                                                                <div data-buy-box-region="stock_indicator">
                                                                    <p class="wt-text-caption wt-text-brick">
                                                                        <strong>{{$productes->amount}}</strong>
                                                                    </p>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                   
                                                </div>
                                                <div
                                                    class="wt-display-flex-xs wt-flex-direction-column-xs wt-flex-wrap wt-flex-direction-row-md wt-flex-direction-column-lg">

                                                    <div class="wt-validation wt-flex-xs-1">
                                                        <form action="https://www.etsy.com/cart/listing.php" method="post"
                                                            class="add-to-cart-form">
                                                            <div  class="wt-width-full">
                                                                @if ($productes->amount!=0)
                                                                <a class="wt-btn wt-btn--filled wt-width-full"
                                                                href="{{ route('home.carts', ['product_id' => $productes->id]) }}">
                                                                Thêm vào giỏ hàng</a>
                                                                @else
                                                                <span style="color: red ;font-size: 25px ">Hết Hàng</span>
                                                                @endif
                                                               
                                                                
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="listing-info info-col description-right wt-order-xs-5">
                                    <div
                                        class="wt-flex-lg-3 wt-order-xs-1 wt-order-lg-3 wt-max-width-full wt-pl-md-4 wt-pr-md-4 wt-pl-lg-0 wt-pr-lg-5 wt-pl-xs-2 wt-pr-xs-2">
                                        <h2 class="wt-flex-xs-auto wt-width-full">
                                            <button type="button"
                                                class="wt-content-toggle--btn wt-content-toggle--flush wt-width-full wt-btn wt-btn--transparent wt-content-toggle--with-icon ">
                                                Description
                                            </button>
                                        </h2>
                                        <div id="product-description-content-toggle" class="wt-mb-xs-3" aria-hidden="false">
                                            <div>
                                                <div class="wt-m-xs-2">
                                                </div>
                                                <div>
                                                    <div id="wt-content-toggle-product-details-read-more"
                                                        class="wt-content-toggle__body--truncated-03 wt-content-toggle__body--truncated">
                                                        <p class="wt-text-body-01 wt-break-word">
                                                            {{ $productes->posts}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="listing-info review-col wt-order-xs-6">
                                    <div
                                        class="wt-flex-lg-5 wt-align-items-flex-start wt-order-xs-2 wt-order-lg-1 wt-max-width-full wt-pl-md-4 wt-pr-md-4 wt-pr-lg-0 wt-pl-lg-5 wt-pl-xs-2 wt-pr-xs-2">
                                        <div>
                                            <div id="recs_ribbon_container">
                                                <div class="wt-position-relative">
                                                    <div class="wt-body-max-width wt-pt-xs-0 ">
                                                        <div class="recs-appears-logger">
                                                            <div class="wt-grid__item-xs-12 appears-ready">
                                                                <div class="wt-pb-xs-3">
                                                                    <div
                                                                        class="wt-display-flex-xs wt-justify-content-space-between wt-align-items-flex-end wt-height-full">
                                                                        <div class="wt-width-full">
                                                                            <div
                                                                                class="wt-display-flex-xs wt-flex-direction-row wt-align-items-center wt-justify-content-space-between">
                                                                                <div
                                                                                    class="wt-display-flex-xs wt-flex-direction-row wt-align-items-center">
                                                                                    <h2 class="wt-text-heading-01 ">Gợi ý
                                                                                        </h2>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="recs-ribbon-grid wt-pb-xs-8">
                                                                    <div>
                                                                        <ul
                                                                            class="responsive-listing-grid wt-grid wt-grid--block wt-justify-content-flex-start wt-list-unstyled">
                                                                            <div
                                                                                class="js-merch-stash-check-listing v2-listing-card wt-position-relative wt-grid__item-xs-6 wt-flex-shrink-xs-1 wt-grid__item-xl-3 wt-grid__item-lg-3 wt-grid__item-md-6 listing-card-experimental-style">
                                                                                <a class="listing-link wt-display-inline-block wt-transparent-card"
                                                                                    href=""
                                                                                    target="etsy.1106688895"
                                                                                    title="Oil Painting Of Vietnamese Gifts, Painting Of Vietnamese Women Selling Flowers, Vietnamese Handmade Oil Painting, Living Room Wall Art">
                                                                                    <div
                                                                                        class="v2-listing-card__img wt-position-relativelisting-card-image-no-shadow">
                                                                                        <div class="">
                                                                                            <div
                                                                                                class="placeholder wt-mb-xs-1 placeholder-landscape wt-rounded-01 ">
                                                                                                <div
                                                                                                    class="placeholder-content">
                                                                                                    <div class="placeholder vertically-centered-placeholder placeholder-landscape "
                                                                                                        style="background-color: #A3968A;">
                                                                                                        <div
                                                                                                        @foreach ($productfist as $item=>$product)
                                                                                                            
                                                                                                       
                                                                                                            class="height-placeholder">
                                                                                                            <img data-listing-card-listing-image=""
                                                                                                                data-src="{{$product->picture}}"
                                                                                                                class="wt-width-full wt-height-full wt-display-block wt-position-absolute loaded"
                                                                                                                alt="Oil Painting Of Vietnamese Gifts, Painting Of Vietnamese Women Selling Flowers, Vietnamese Handmade Oil Painting, Living Room Wall Art"
                                                                                                                loading="lazy"
                                                                                                                src="{{$product->picture}}"
                                                                                                                data-ll-status="loaded">

                                                                                                                @endforeach
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>


                                                                                    <div
                                                                                        class="v2-listing-card__info">
                                                                                        <div class="">

                                                                                            <h3
                                                                                                class="wt-text-caption v2-listing-card__title wt-text-truncate">
                                                                                                {{ $productes->posts}}
                                                                                            </h3>
                                                                                            <p>
                                                                                            </p>
                                                                                            <div class="">
                                                                                                <p
                                                                                                    class="wt-text-caption wt-text-truncate wt-text-gray wt-mb-xs-1">
                                                                                                    <span class="tibtcb6nb"
                                                                                                        aria-hidden="true">ad
                                                                                                        <span
                                                                                                            class="pxyglo796">vertisement</span>
                                                                                                        by
                                                                                                        GreenAntGallery</span>
                                                                                                    <span
                                                                                                        class="tibtcb6nb wt-screen-reader-only">Ad
                                                                                                        from shop
                                                                                                        GreenAntGallery</span>
                                                                                                    <span class="fi12bwbul"
                                                                                                        aria-hidden="true">{{ $productes->author}}</span>
                                                                                                    <span
                                                                                                        class="fi12bwbul wt-screen-reader-only">From
                                                                                                        shop
                                                                                                        GreenAntGallery</span>
                                                                                                </p>
                                                                                            </div>
                                                                                            <div
                                                                                                class="wt-align-items-center">
                                                                                            </div>
                                                                                            <div
                                                                                                class="n-listing-card__price  wt-display-block recs-listing-grid-price wt-pr-xs-1 wt-text-title-01 ">


                                                                                                <p
                                                                                                    class="recs-listing-grid-price wt-pr-xs-1 wt-text-title-01 ">
                                                                                                  
                                                                                                    <span
                                                                                                        aria-hidden="true">
                                                                                                        <span
                                                                                                            class="currency-value">{{ $productes->promotional_price}}</span><span
                                                                                                            class="currency-symbol">₫</span>
                                                                                                    </span>
                                                                                                </p>
                                                                                                <p
                                                                                                    class="wt-text-caption search-collage-promotion-price wt-text-slime wt-text-truncate wt-no-wrap">
                                                                                                    <span
                                                                                                        class="wt-text-strikethrough"
                                                                                                        aria-hidden="true"><span
                                                                                                            class="currency-value">{{ $productes->original_price}}</span><span
                                                                                                            class="currency-symbol">₫</span></span>
                                                                                                 
                                                                                                    <span>
                                                                                                        (-{{ promotionPercentage($productes->original_price, $productes->promotional_price) }}%)
                                                                                                    </span>
                                                                                                </p>
                                                                                                <p></p>

                                                                                            </div>

                                                                                            <div
                                                                                                class="promotion-badge-line">
                                                                                                <p
                                                                                                    class="wt-text-truncate wt-text-caption-title">
                                                                                                    <span
                                                                                                        class="wt-badge wt-badge--small wt-badge--sale-01">
                                                                                                        FREE shipping
                                                                                                    </span>
                                                                                                </p>
                                                                                            </div>
                                                                                            <p></p>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                                <div data-favorite-button-wrapper=""
                                                                                    class="v2-listing-card__actions wt-z-index-1 wt-position-absolute ">
                                                                                    <button
                                                                                        class="btn--focus  wt-position-absolute wt-btn wt-btn--light wt-btn--small wt-z-index-2 wt-btn--filled wt-btn--icon neu-default-favorite wt-position-right wt-position-top fav-opacity-hidden neu-hover-on-card neu-default-button-position--grid"
                                                                                        data-ui="favorite-listing-button"
                                                                                        data-listing-id="1106688895"
                                                                                        data-accessible-btn-fave=""
                                                                                        data-favorite-label="Add to Favorites"
                                                                                        data-favorited-label="Remove from Favorites">
                                                                                        <div class="favorite-listing-button-icon-container should-animate "
                                                                                            data-source="recs_ribbon_same_shop"
                                                                                            data-btn-fave=""
                                                                                            data-neu-fave=""
                                                                                            data-favorite-icon-container="">
                                                                                            <span
                                                                                                class="etsy-icon wt-nudge-t-2 wt-icon--smaller-xs wt-display-block"
                                                                                                data-not-favorited-icon=""><svg
                                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                                    viewBox="0 0 24 24"
                                                                                                    aria-hidden="true"
                                                                                                    focusable="false">
                                                                                                    <path
                                                                                                        d="M12,21C10.349,21,2,14.688,2,9,2,5.579,4.364,3,7.5,3A6.912,6.912,0,0,1,12,5.051,6.953,6.953,0,0,1,16.5,3C19.636,3,22,5.579,22,9,22,14.688,13.651,21,12,21ZM7.5,5C5.472,5,4,6.683,4,9c0,4.108,6.432,9.325,8,10,1.564-.657,8-5.832,8-10,0-2.317-1.472-4-3.5-4-1.979,0-3.7,2.105-3.721,2.127L11.991,8.1,11.216,7.12C11.186,7.083,9.5,5,7.5,5Z">
                                                                                                    </path>
                                                                                                </svg></span>
                                                                                            <span
                                                                                                class="etsy-icon wt-nudge-t-2 wt-icon--smaller-xs wt-text-brick wt-display-none"
                                                                                                data-favorited-icon=""><svg
                                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                                    viewBox="0 0 24 24"
                                                                                                    aria-hidden="true"
                                                                                                    focusable="false">
                                                                                                    <path
                                                                                                        d="M16.5,3A6.953,6.953,0,0,0,12,5.051,6.912,6.912,0,0,0,7.5,3C4.364,3,2,5.579,2,9c0,5.688,8.349,12,10,12S22,14.688,22,9C22,5.579,19.636,3,16.5,3Z">
                                                                                                    </path>
                                                                                                </svg></span>
                                                                                        </div>
                                                                                        <!--icon font and display:none; elements -->
                                                                                        <span aria-hidden="true"
                                                                                            class="icon"></span>
                                                                                        <span class="wt-screen-reader-only"
                                                                                            data-a11y-label="">

                                                                                            Add to Favorites
                                                                                        </span>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
       
    </body>
    @endforeach
    </html>
@endsection

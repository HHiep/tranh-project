@extends('layoutshome.indext')
@section('conten')
    <div class="wt-mt-xs-2 wt-text-black">

            <div class="wt-grid__item-xs-12 wt-pr-xs-1 wt-pl-xs-1 wt-pl-md-3 wt-pr-md-3">
             
                <div id="search-results-header" class="wt-mt-xs-3 wt-mb-xs-2 clearfix">
                    <div class="float-left">
                        <h2 class="wt-text-heading-01">
                            Sản phẩm
                        </h2>
                    </div>

                    <ul
                        class="wt-block-grid wt-list-unstyled wt-block-grid-xs-2 wt-block-grid-sm-3 wt-block-grid-md-3 wt-block-grid-lg-6 ">
                        @foreach ($productCate as $item => $products)
                        @php
                        $param = [
                            'id' => $products->id,
                        ];
                    @endphp
                            <li class="wt-block-grid__item wt-p-xs-1">
                                <a class="wt-display-block wt-text-link-no-underline wt-height-full wt-rounded-02 wt-b-xs hobbies_card"
                                    href="{{route('home.productDetail', $param)}}"
                                    rel="nofollow">
                                    <div class="placeholder placeholder-landscape">
                                        <img class="hobby-listings__listing-card-image wt-width-full wt-height-full wt-display-block placeholder-content"
                                            src="{{ $products->picture }}" alt="Painting">
                                        <form action=""></form>
                                    </div>
                                    <div class="v2-listing-card__info">
                                        <div class="">
                                            <h2 class="wt-text-caption v2-listing-card__title wt-text-truncate">
                                                {{ $products->posts }}
                                            </h2>
                                            <div>
                                                <span
                                                    class="wt-position-top wt-line-height-tight wt-nudge-t-2 wt-display-block">
                                                    <span class="stars-svg stars-smaller ">
                                                        <input type="hidden" name="initial-rating" value="5">
                                                        <input type="hidden" name="rating" value="5">
                                                        <span class="screen-reader-only">5
                                                            out of 5 stars</span>
                                                        <span data-rating="1" class="rating lit rating-first wt-nudge-b-2"
                                                            aria-hidden="true">
                                                            <span class="etsy-icon stars-svg-star">
                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="3 3 18 18"
                                                                    aria-hidden="true" focusable="false">
                                                                    <path
                                                                        d="M19.985,10.36a0.5,0.5,0,0,0-.477-0.352H14.157L12.488,4.366a0.5,0.5,0,0,0-.962,0l-1.67,5.642H4.5a0.5,0.5,0,0,0-.279.911L8.53,13.991l-1.5,5.328a0.5,0.5,0,0,0,.741.6l4.231-2.935,4.215,2.935a0.5,0.5,0,0,0,.743-0.6l-1.484-5.328,4.306-3.074A0.5,0.5,0,0,0,19.985,10.36Z">
                                                                    </path>
                                                                </svg>
                                                            </span>
                                                            <span data-rating="2" class="rating lit">
                                                                <span class="etsy-icon stars-svg-star">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="3 3 18 18" aria-hidden="true"
                                                                        focusable="false">
                                                                        <path
                                                                            d="M19.985,10.36a0.5,0.5,0,0,0-.477-0.352H14.157L12.488,4.366a0.5,0.5,0,0,0-.962,0l-1.67,5.642H4.5a0.5,0.5,0,0,0-.279.911L8.53,13.991l-1.5,5.328a0.5,0.5,0,0,0,.741.6l4.231-2.935,4.215,2.935a0.5,0.5,0,0,0,.743-0.6l-1.484-5.328,4.306-3.074A0.5,0.5,0,0,0,19.985,10.36Z">
                                                                        </path>
                                                                    </svg>
                                                                </span>
                                                                <span data-rating="3" class="rating lit">
                                                                    <span class="etsy-icon stars-svg-star">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="3 3 18 18" aria-hidden="true"
                                                                            focusable="false">
                                                                            <path
                                                                                d="M19.985,10.36a0.5,0.5,0,0,0-.477-0.352H14.157L12.488,4.366a0.5,0.5,0,0,0-.962,0l-1.67,5.642H4.5a0.5,0.5,0,0,0-.279.911L8.53,13.991l-1.5,5.328a0.5,0.5,0,0,0,.741.6l4.231-2.935,4.215,2.935a0.5,0.5,0,0,0,.743-0.6l-1.484-5.328,4.306-3.074A0.5,0.5,0,0,0,19.985,10.36Z">
                                                                            </path>
                                                                        </svg>
                                                                    </span>
                                                                    <span data-rating="4" class="rating lit">
                                                                        <span class="etsy-icon stars-svg-star">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                viewBox="3 3 18 18" aria-hidden="true"
                                                                                focusable="false">
                                                                                <path
                                                                                    d="M19.985,10.36a0.5,0.5,0,0,0-.477-0.352H14.157L12.488,4.366a0.5,0.5,0,0,0-.962,0l-1.67,5.642H4.5a0.5,0.5,0,0,0-.279.911L8.53,13.991l-1.5,5.328a0.5,0.5,0,0,0,.741.6l4.231-2.935,4.215,2.935a0.5,0.5,0,0,0,.743-0.6l-1.484-5.328,4.306-3.074A0.5,0.5,0,0,0,19.985,10.36Z">
                                                                                </path>
                                                                            </svg>
                                                                        </span>
                                                                        <span data-rating="5" class="rating lit">
                                                                            <span class="etsy-icon stars-svg-star">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    viewBox="3 3 18 18" aria-hidden="true"
                                                                                    focusable="false">
                                                                                    <path
                                                                                        d="M19.985,10.36a0.5,0.5,0,0,0-.477-0.352H14.157L12.488,4.366a0.5,0.5,0,0,0-.962,0l-1.67,5.642H4.5a0.5,0.5,0,0,0-.279.911L8.53,13.991l-1.5,5.328a0.5,0.5,0,0,0,.741.6l4.231-2.935,4.215,2.935a0.5,0.5,0,0,0,.743-0.6l-1.484-5.328,4.306-3.074A0.5,0.5,0,0,0,19.985,10.36Z">
                                                                                    </path>
                                                                                </svg>
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                    <span
                                                        class="wt-text-body-01 wt-nudge-b-1 wt-text-gray wt-display-inline-block">
                                                        
                                                    </span>
                                                </span>
                                            </div>
                                            <div
                                                class="n-listing-card__price  wt-display-flex-xs wt-align-items-center wt-width-full wt-flex-wrap wt-width-full wt-text-title-01 lc-price">
                                                <p class="wt-text-title-01 lc-price">
                                                    <span class="currency-value">{{ $products->promotional_price }}</span><span
                                                        class="currency-symbol">₫</span>
                                                </p>
                                                </p>
                                                <p
                                                    class="wt-text-caption search-collage-promotion-price wt-text-slime
                                    wt-text-truncate wt-no-wrap">
                                                    <span class="wt-text-strikethrough" aria-hidden="true"><span
                                                            class="currency-value">{{ $products->original_price }}</span><span
                                                            class="currency-symbol">₫</span></span>
                                                    <span class="percent">
                                                        (-{{ promotionPercentage($products->original_price, $products->promotional_price) }}%)
                                                    </span>
                                                   
                                                </p>
                                                <p></p>
                                            </div>
                                            <div class="">
                                                <p class="wt-text-caption wt-text-truncate wt-text-gray wt-mb-xs-1">
                                                    <span class="da8e3fpnq" aria-hidden="true">ad <span
                                                            class="da8e3fpnq">vertisement</span>
                                                        by Etsy seller</span>
                                                    <span class="da8e3fpnq wt-screen-reader-only" aria-hidden="true">Ad
                                                        from Etsy
                                                        seller</span>
                                                    <span class="moxjb3yfo" aria-hidden="true">{{ $products->author }}</span>
                                                    <span class="moxjb3yfo wt-screen-reader-only">From
                                                        shop TzecheeStudio</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endsection

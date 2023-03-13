<div class="wt-display-flex-lg wt-position-relative wt-align-items-center">
    <div class="wt-order-lg-1 wt-flex-lg-1 cat-header wt-position-relative wt-mb-md-3 wt-mb-lg-0">
        <div class="overflow-bg"></div>
        <div class="contains-categories wt-z-index-2 wt-pb-xs-3 wt-position-relative wt-pl-lg-2 wt-pr-lg-2">
            <div class="wt-mb-xs-1">
                <div data-category-page-header="">
                    <div
                        class="wt-position-relative wt-pl-xs-3 wt-pl-lg-2 wt-pr-xs-1 wt-pr-lg-0 wt-pt-lg-3 wt-pt-xs-3 wt-body-max-width">
                        <a href="https://www.etsy.com/c/art-and-collectibles?explicit=1&amp;ref=cat_back_arrow"
                            class="wt-arrow-link wt-arrow-link--back wt-hide-lg wt-nudge-b-4"></a>
                        <h1 class="wt-text-heading-01 wt-display-inline wt-mb-xs-2 wt-overflow-hidden">
                            Bức Tranh
                        </h1>
                        <div class=" wt-mt-xs-1 wt-ml-xs-4 wt-ml-lg-0">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wt-order-lg-2 wt-flex-lg-3 wt-position-relative wt-pr-lg-2">
        <div>
            <div class="wt-block-grid-xs-8">
                @foreach ($category as $item => $categories)
                @php
                     $param = [
                                    'id' => $categories->id,
                                ];
                @endphp
                    <div class="wt-block-grid__item wt-text-center-xs wt-break-word wt-pl-xs-1 wt-pr-xs-1 wt-mb-xs-3">
                        <a href="{{route('home.productcate',$param )}}"
                            class="parent-hover-underline">
                            <div
                                class="wt-circle wt-position-relative wt-horizontal-center img-hover-effect wt-mb-xs-1">
                                <img src="{{ $categories->picture }}" class="wt-width-full wt-horizontal-center"
                                    alt="{{ $categories->name }}" aria-hidden="true">
                            </div>
                            <div class="wt-pt-xs-1 category-grid-text-width-center" data-category-text="">
                                <p class="ingress-title wt-text-truncate--multi-line wt-text-caption-title child-hover-underline"
                                    data-category-name="">
                                    {{ $categories->name }}
                                </p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>

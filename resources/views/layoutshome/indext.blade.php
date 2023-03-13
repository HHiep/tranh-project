<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Painting - Etsy Vietnam</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/users/assets/css/adaptive.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/users/assets/css/overrides.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/users/assets/css/settings-overlay.css') }}" type="text/css">
    <link rel="shortcut icon" href="https://www.etsy.com/favicon.ico">
    <script src="{{ asset('assets/admin/assets/js/jquery.min.js') }}"></script>
    
</head>

<body class="ui-toolkit transitional-wide is-responsive no-touch en-US VND VN">
    <div id="gnav-header"
        class="gnav-header global-nav v2-toolkit-gnav-header wt-z-index-5 wt-bg-white wt-position-relative">
        <!-- Header -->
        @include('layoutshome.header')
        <!-- End Header -->
    </div>
    <nav aria-label="Categories" class="wt-hide-xs wt-show-lg">
        <div data-ui="cat-nav" id="desktop-category-nav" class="cat-nav  v2-toolkit-cat-nav wt-ml-xs-0 wt-mr-xs-0">
            <div class="wt-bg-white wt-text-caption wt-position-relative wt-z-index-4 v2-toolkit-cat-nav-tab-bar">
                <div
                    class="wt-grid wt-body-max-width wt-pl-xs-2 wt-pr-xs-2 wt-pl-md-4 wt-pr-md-4 wt-pl-lg-6 wt-pr-lg-6">
                    <ul class="wt-list-unstyled wt-grid__item-xs-12 wt-body-max-width wt-display-flex-xs wt-justify-content-space-between"
                        role="menubar" data-ui="top-nav-category-list"
                        aria-activedescendant="catnav-primary-link-10855">
                        <!-- Danh sách danh mục sản phẩm -->
                        <li class="top-nav-item wt-pb-xs-2 wt-mr-xs-2 wt-display-flex-xs wt-align-items-center"
                            data-linkable="true" data-ui="top-nav-category-link" data-node-id="10855"
                            role="presentation" tabindex="-1">
                            <a href="https://www.etsy.com/c/jewelry-and-accessories?ref=catnav-10855"
                                class="wt-text-link-no-underline" tabindex="-1">
                                <span id="catnav-primary-link-10855" class="wt-text-black" role="menuitem"
                                    aria-haspopup="true" tabindex="0">
                                    Jewelry &amp; Accessories
                                </span>
                            </a>
                        </li>
                        <!-- Danh sách danh mục sản phẩm -->
                    </ul>
                    <span class="active-nav-item-indicator wt-position-absolute wt-display-inline-block"
                        data-ui="active-nav-item-indicator"></span>
                </div>
            </div>
        </div>
    </nav>
    <main role="main" id="content">
        <div>
            <div
                class="wt-bg-white wt-grid__item-md-12 wt-pl-xs-1 wt-pr-xs-0 wt-pr-md-1 wt-pl-lg-0 wt-pr-lg-0 wt-mt-xs-0 wt-overflow-x-hidden wt-bb-xs-1">
                <div class="wt-body-max-width">
                    @include('layoutshome.menu')
                    @yield('conten')

                </div>
            </div>
        </div>
    </main>
    <div id="collage-footer" class="site-footer wt-horizontal-center responsive-nav-experiment wt-pt-xs-4">
        <!-- Footer -->
        @include('layoutshome.footer')
        <!-- Footer -->
    </div>
</body>

</html>

<div class="breadcrumbs__section breadcrumbs__section-thin brk-bg-center-cover lazyload" data-bg="{{ asset('storage/images/Products/product_header.jpg') }}" data-brk-library="component__breadcrumbs_css">
    <span class="brk-abs-bg-overlay brk-bg-grad opacity-80"></span>
    <div class="breadcrumbs__wrapper">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6">
                    <div class="pr-40 d-flex justify-content-lg-end justify-content-start pr-xs-0 breadcrumbs__title">
                        <h2 class="brk-white-font-color font__weight-semibold font__size-48 line__height-68 font__family-montserrat">
                            {{-- sub pages title section --}}
                            @if (is_numeric(last(request()->segments())))
                                {{-- user selected one of products or ptypes --}}
                                {{ Dictionary()['Products'][app()->getLocale()] }}
                            @else
                                {{-- user selected one of menus other than products --}}
                                {{ Dictionary()[last(request()->segments())][app()->getLocale()] }}
                            @endif
                        </h2>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

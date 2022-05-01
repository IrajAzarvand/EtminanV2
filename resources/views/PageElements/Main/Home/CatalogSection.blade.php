<section dir="ltr">
    <div class="main-wrapper">
        <main class="main-container">
            <h4 class="title__divider title__divider--line font__size-21 font__weight-bold font__family-montserrat line__height-24 text-center mt-90 mb-50" data-brk-library="component__dividers">
                <span class="title__divider__wrapper">
                    {{ Dictionary()['ProductCataloges'][app()->getLocale()] }} <span class="line brk-base-bg-gradient-right"></span>
                </span>
            </h4>
    </div>

    <div class="overflow-hid brk-bg-center-cover lazyload" data-bg="{{ $Catalog_bg }}" data-brk-library="component__parallax">
        <div class="container">
            <div class="row no-gutters triangle__wrap triangle__wrap-double scroll-show content__side-right">
                <span class="parallax__bg-shape-sm brk-parallax__bg-color"></span>
                <span class="parallax__bg-shape-lg brk-parallax__bg-gradient"></span>
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <div class="all-light text-left pt-lg-210 pt-50 pb-lg-210 pb-50">
                        <h4 class="font__family-montserrat font__weight-medium font__size-24 line__height-32 text-uppercase highlight-underline mt-0 show-inline-block text-middle">
                            <span class="before wow fadeInUp"></span>Start with us right now
                        </h4>
                        <a href="#" class="btn btn-sm btn-simple border-radius-50 ml-30 mt-1">
                            <i class="icon-inside icon-inline fa fa-angle-right font__size-24 mr-0" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if (isset($Events) && !empty($Events))
    <div class="main-wrapper">
        <main class="main-container">
            <h4 class="title__divider title__divider--line font__size-21 font__weight-bold font__family-montserrat line__height-24 text-center mt-90 mb-50" data-brk-library="component__dividers">
                <span class="title__divider__wrapper">
                    {{ Dictionary()['Events'][app()->getLocale()] }} <span class="line brk-base-bg-gradient-right"></span>
                </span>
            </h4>
    </div>

    <div class="container mb-80">
        <div class="row">


            @foreach ($Events as $event)

                <div class="col-xl-4 mb-20">
                    <div class="brk-base-box-shadow" data-brk-library="component__content_slider">

                        <div class="post-rounded__thumb lazyload post-angle-slider" data-slick='{
                                        "slidesToShow": 1,
                                        "slidesToScroll": 1,
                                        "autoplaySpeed": 2800,
                                        "centerMode": true,
                                        "centerPadding": 0
                                    }' data-brk-library="slider__slick">

                            @foreach ($event['image'] as $image)
                                <div class="brk-sc-angle-post" data-brk-library="slider__slick,component__shop_row">
                                    <div class=" brk-sc-angle-post__container lazyload" data-bg="{{ $image }}">
                                        <div class="brk-base-bg-gradient-10deg"></div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="post-rounded__text">

                            <h3 class="font__family-montserrat font__weight-bold font__size-19">{{ $event['EventTitle_' . app()->getLocale()] }}</h3>

                            <p class="font__family-open-sans font__size-16 brk-dark-font-color line__height-28">{{ $event['EventDescription_' . app()->getLocale()] }}</p>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>


    </div>
@endif

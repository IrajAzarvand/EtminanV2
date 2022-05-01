<section>


    <div class="main-wrapper">
        <main class="main-container">
            <h4 class="title__divider title__divider--line font__size-21 font__weight-bold font__family-montserrat line__height-24 text-center mt-90 mb-50" data-brk-library="component__dividers">
                <span class="title__divider__wrapper">
                    {{ Dictionary()['NewProducts'][app()->getLocale()] }} <span class="line brk-base-bg-gradient-right"></span>
                </span>
            </h4>
    </div>
    <div class="container-fluid">
        <div class="triple-slider slick-loading arrows-classic" data-brk-library="slider__slick,component__image_caption">

            @foreach ($NP as $Item)
                <div>
                    <div class="brk-ic-left-slide brk-ic-left-slide__pointer" data-brk-library="component__image_caption_css">
                        <a href="#" class="brk-ic-left-slide__link"></a>
                        <a href="{{ route('ViewProduct', $Item['id']) }}">
                            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ $Item['image'] }}" alt="alt" class="brk-ic-left-slide__img lazyload">
                            <div class="brk-ic-left-slide__overlay brk-base-bg-gradient-6-black"></div>
                            <div class="brk-ic-left-slide__wrapper brk-ic-left-slide__wrapper_gradient brk-base-bg-gradient-50deg-a">
                                <h3 class="brk-ic-left-slide__title font__size-21 line__height-28">
                                    <span class="font__family-montserrat font__weight-light">
                                        {{ $Item['Ptype' . app()->getlocale()] }}
                                    </span>
                                    <br>
                                    <span class="font__family-montserrat font__weight-bold letter-spacing--20">
                                        {{ $Item['ShortText' . app()->getlocale()] }}
                                    </span>
                                </h3>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach


        </div>
    </div>

    </main>
    </div>
</section>

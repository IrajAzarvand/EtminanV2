@isset($CertificateItems)
    <section class="pt-60 pb-50 bg-white">
        <div class="main-wrapper">
            <main class="main-container">
                <h4 class="title__divider title__divider--line font__size-21 font__weight-bold font__family-montserrat line__height-24 text-center mt-90 mb-50" data-brk-library="component__dividers">
                    <span class="title__divider__wrapper">
                        {{ Dictionary()['Certificates'][app()->getLocale()] }} <span class="line brk-base-bg-gradient-right"></span>
                    </span>
                </h4>
        </div>
        {{-- @dd($CertificateItems) --}}
        <div class="container">
            <div class="default-slider slick-loading arrows-classic-dark fa-req" data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "arrows": true,
                                        "responsive": [
                                        {"breakpoint": 992, "settings": {"slidesToShow": 3}},
                                        {"breakpoint": 768, "settings": {"slidesToShow": 2}},
                                        {"breakpoint": 480, "settings": {"slidesToShow": 1}}
                                        ], "autoplay": true, "autoplaySpeed": 3000}' data-brk-library="slider__slick">

                @foreach ($CertificateItems as $C_img)
                    <div class="pl-15 pr-15">
                        <div class="brk-team-strict" data-brk-library="component__team" style="background-image: url('{{ $C_img }}')">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endisset

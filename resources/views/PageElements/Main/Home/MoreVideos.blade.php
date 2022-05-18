<section class="mb-80">
    <div class="container">
        <div class="text-left mb-80">
            <h3 class="font__family-montserrat font__size-28 font__weight-bold">
                {{ Dictionary()['MoreVideos'][app()->getLocale()] }}
            </h3>
        </div>
    </div>
    <div class="brk-backgrounds" style="background-image: url({{ asset('storage/images/background/MoreVideos_bg.jpg') }})" data-brk-library="component__button,component__backgrounds_css">
        <div class="opacity-50 brk-backgrounds__before brk-base-bg-gradient-16"></div>
        <div class="brk-backgrounds__impuls">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="brk-backgrounds__content pt-40 pb-40">
            <div class="container mt-200 mb-200">
                <div class="row no-gutters align-items-center">
                    <div class="col-lg-6 text-right">
                        <a target="_blank" href="https://www.aparat.com/ADV.Etminan">
                            <button class="btn-backgrounds btn-backgrounds_white font__family-montserrat font__weight-bold text-uppercase font__size-13" data-brk-library="component__button">
                                <span class="text">Play</span>
                                <span class="before"><i class="fas fa-caret-right"></i></span>
                            </button>
                        </a>
                    </div>
                    <div class="col-lg-6 text-left pl-50">
                        <h4 class="font__family-roboto font__size-42 line__height-26 brk-white-font-color font__weight-semibold pt-15">{{ Dictionary()['MoreVideos'][app()->getLocale()] }}</h4>
                        {{-- <h3 class="font__family-roboto font__size-16 line__height-30 brk-white-font-color font__weight-light text-uppercase opacity-40">Some subtitle here</h3> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="brk-footer position-relative" data-brk-library="component__footer,twitter_init">
    <div class="brk-footer__wrapper pt-70 pt-md-90 border-bottom-3 brk-border-color-light brk-bg-center-cover" style="background-image: url({{ asset('storage/images/Footer/footer_bg.jpg') }})">
        <div class="brk-abs-bg-overlay brk-base-gradient-29"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-12 col-md-6">
                    <h6 class="sr-only">Twitter posts</h6>
                    <a href="#" class="text-center d-sm-inline-block d-block mb-45" style="margin-top:-10px">
                        <img class="brk-header-mobile__logo-1 lazyload" @if (SiteLang()[app()->getLocale()]['rtl']) src="{{ asset('storage/images/logo/LogoTextWhiteRtl.png') }}"  @else src="{{ asset('storage/images/logo/LogoTextWhiteLtr.png') }}" @endif alt="alt">
                        <img class="brk-header-mobile__logo-2 lazyload" @if (SiteLang()[app()->getLocale()]['rtl']) src="{{ asset('storage/images/logo/LogoTextBlueRtl.png') }}" @else src="{{ asset('storage/images/logo/LogoTextBlueLtr.png') }}" @endif alt="alt">

                    </a>

                </div>
                {{-- <div class="col-xl-3 col-12 col-md-6">
                    <h6 class="mb-40 text-center brk-white-font-color mb-md-25 font__family-montserrat font__weight-semibold font__size-24 text-sm-left">
                        Latest news
                    </h6>
                    <article class="mb-20 brk-tiles-simple lazyload" data-bg="img/tiles-simple-1.jpg" data-brk-library="component__tiles">
                        <div class="before"></div>
                        <div class="brk-tiles-simple__content pt-30">
                            <h4 class="font__family-montserrat font__weight-semibold font__size-21 text-truncate">Wrap up the project</h4>
                            <p>Aenean vulputate eleifend tellus. Renean leo ligula, porttitor euequat vitae.</p>
                            <a class="brk-tiles-simple__link" href="#">
                                <span class="before"></span>
                                <i class="fas fa-angle-right"></i>
                                <span class="after"></span>
                            </a>
                        </div>
                    </article>
                </div> --}}
                <div class="col-xl-3 col-12 col-md-6">
                    <h6 class="mb-40 text-center brk-white-font-color mb-md-25 font__family-montserrat font__weight-semibold font__size-24 text-sm-left mt-xs-20">{{ Dictionary()['RandomImgs'][app()->getLocale()] }}</h6>
                    <ul class="flex-wrap mb-20 brk-latest-works d-flex">
                        @for ($i = 1; $i <= 9; $i++)
                            <li class="brk-latest-works__item position-relative">
                                <a href="#" class="brk-latest-works__link">
                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ asset('storage/images/Footer/f1 (' . $i . ').jpg') }}" alt="alt" class="brk-abs-img lazyload">
                                </a>
                            </li>
                        @endfor
                    </ul>
                </div>
                <div class="col-xl-3 col-12 col-md-6">
                    <h6 class="text-center brk-white-font-color mb-25 font__family-montserrat font__weight-semibold font__size-24 text-sm-left mt-xs-20">{{ Dictionary()['FollowUs'][app()->getLocale()] }}</h6>
                    <hr class="mt-0 horiz-line">
                    <div class="pb-1 brk-social-links brk-white-font-color font__size-23" data-brk-library="component__social_links">

                        <a href="https://www.instagram.com/etminan.icecream/" target="_blank" class="brk-social-links__item">
                            <i class="fab fa-instagram"></i>
                        </a>

                    </div>
                    <hr class="mt-0 horiz-line mb-35">
                    <p class="mb-40 text-center font__size-26 text-sm-left">
                        <a href="#" class="brk-white-font-color font__family-open-sans font__weight-light line__height-36">04134328221-4</a>
                    </p>
                    <p class="mb-10 text-center font__family-open-sans font__weight-bold font__size-14 brk-white-font-color text-sm-left">
                        <i class="brk-footer-icon text-middle fa fa-envelope line__height-24"></i>
                        <a href="mailto:info@etminan.net" class="show-inline-block">info@etminan-icecream.com, info@etminan.net</a>
                    </p>
                    <p class="mb-10 text-center font__family-open-sans font__weight-bold font__size-12 brk-white-font-color text-sm-left">
                        <i class="mb-20 brk-footer-icon text-middle fas fa-map-marker-alt line__height-10"></i>
                        <span>{{ Dictionary()['Address'][app()->getLocale()] }}</span>
                    </p>
                </div>
            </div>
            <hr class="mb-20 horiz-line mt-750">
            <div class="flex-wrap d-flex align-items-center justify-content-sm-between justify-content-center flex-lg-row flex-column mb-25">
                <p class="brk-dark-font-color-3 font__family-open-sans font__size-14">
                    © {{ Dictionary()['AllRightsReserved'][app()->getLocale()] }}
                </p>

            </div>
        </div>
    </div>
</footer>

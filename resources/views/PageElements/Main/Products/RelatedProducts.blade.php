@if ($RelatedProducts)
    <section class="pb-80 pt-60 pt-sm-70 pt-lg-0">
        <div class="container">
            <div class="text-center mb-80">
                <h4 class="title__heading-04 title__heading-sub font__family-montserrat font__size-50 font__weight-bold wow zoomIn" data-brk-library="component__title"><span class="brk-base-font-color">{{ Dictionary()['RelatedProducts'][app()->getLocale()] }}</span></h4>
                <h2 class="title__heading-04 title__heading-main font__family-pacifico font__size-36" data-brk-library="component__title"><span class="brk-base-font-color">{{ Dictionary()['RelatedProducts'][app()->getLocale()] }}</span></h2>
            </div>
            <div class="row">

                @foreach ($RelatedProducts as $RP)
                    <div class="col-md-6 col-xl-3">
                        <figure class="shape-box shape-box_wave text-center" data-brk-library="component__shape_box">
                            <span class="before"></span>
                            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ $RP['image'] }}" class="lazyload" alt="alt">
                            <div class="brk-abs-overlay z-index-0 bg-black opacity-60"></div>
                            <figcaption>
                                <span class="wave-circle-1"></span>
                                <div class="mt-20">
                                </div>
                                <h4 class="font__family-montserrat font__weight-bold font__size-24 text-uppercase main-title">{{ $RP['ShortText' . app()->getlocale()] }}</h4>
                                <p class="main-description font__family-open-sans font__size-14 text-gray">
                                    {{ Dictionary()['Weight'][app()->getLocale()] }} {{ $RP['weight'] }}
                                    <br> {{ $RP['Flavor' . app()->getlocale()] }}
                                </p>
                                <a href="{{ route('ViewProduct', $RP['id']) }}" class="btn btn-inside-out btn-lg border-radius-30 font__weight-bold" data-brk-library="component__button">
                                    <span class="before">{{ Dictionary()['ViewProduct'][app()->getLocale()] }}</span><span class="text">{{ Dictionary()['ViewProduct'][app()->getLocale()] }}</span><span class="after">{{ Dictionary()['ViewProduct'][app()->getLocale()] }}</span>
                                </a>
                                <span class="wave-circle-2"></span>
                                <span class="after">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 270 113">
                                        <defs>
                                            <style>
                                                .cls-1 {
                                                    isolation: isolate;
                                                }

                                                .cls-2 {
                                                    fill: #fff;
                                                    fill-rule: evenodd;
                                                }

                                            </style>
                                        </defs>
                                        <title>Asset 2</title>
                                        <g>
                                            <g class="cls-1">
                                                <g>
                                                    <path class="cls-2" d="M0,0V113S11.42,90.78,62,90.78,124.54,113,174,113s71.05-27,96-27V0Z" />
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </span>
                            </figcaption>
                        </figure>
                    </div>
                @endforeach





            </div>
        </div>
    </section>
@endif

<div style="background: white; fill: #fff" class="col-12 text-center mt-80 mb-80">

</div>

<section class="overflow-hid pt-lg-80 pb-lg-200 position-relative brk-bg-center-cover parallax-bg lazyload" data-bg="{{ $Gallery_bg }}">


    <span class="brk-svg-pattern-container brk-svg-pattern-container-1 brk-svg-pattern-container_top" data-brk-library="component__svg_pattern">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1922 149">
            <defs>
                <path id="svg-pattern-id-1" d="M0 4050.12s200.64 67.84 459 61.88c371.06-8.57 855.17-71.9 984-71.9 252.85 0 422.43 53.4 477 77.06V4033H0z" />
            </defs>
            <g>
                <g transform="translate(1 -4032)">
                    <use fill="#fff" xlink:href="#svg-pattern-id-1" />
                </g>
            </g>
        </svg>
    </span>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="brk-bg-circle wow fadeInLeft pt-lg-110 pt-50 pb-50 pb-lg-80 pl-50">
                    <h2 class="brk-white-font-color font__size-56 line__height-60 mb-30">
                        @if (!SiteLang()[app()->getLocale()]['rtl'])
                            <span class="font__family-playfair font__weight-light font__style-italic">{{ Dictionary()['Gallery'][app()->getLocale()] }}</span>
                        @else
                            <span class="font__family-playfair font__weight-light">{{ Dictionary()['Gallery'][app()->getLocale()] }}</span>
                        @endif
                    </h2>
                    <p class="font__size-16 line__height-26 brk-white-font-color opacity-80 mb-30">

                        <a href="{{ route('Gallery') }}" class="btn btn-prime btn-lg btn-prime-white-transparent btn-min-width-200 border-radius-30 ml-0 btn-no-shadow" data-brk-library="component__button">
                            <span class="before"></span><span class="after"></span><span class="border-btn"></span> {{ Dictionary()['More'][app()->getLocale()] }}

                        </a>
                </div>
            </div>
        </div>
    </div>

    {{-- <span class="brk-svg-pattern-container brk-svg-pattern-container-1 brk-svg-pattern-container_bottom" data-brk-library="component__svg_pattern">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 197.02">
            <defs>
                <style>
                    .a5 {
                        fill: url(#some-id-1);
                    }

                    .a5,
                    .b5 {
                        fill-rule: evenodd;
                    }

                    .b5 {
                        fill: #fff;
                    }

                </style>
                 <linearGradient id="some-id-1" y1="240" x2="1787" y2="240" gradientUnits="userSpaceOnUse">
                    <stop offset="0%" stop-color="var(--brand-primary)" />
                    <stop offset="80%" stop-color="var(--secondary)" />
                </linearGradient>
             </defs>
            <path class="a5" d="M1231,109.07C974.2,70.21,708.37,12,477,1.12,258.44-9.18,54.57,54.45,0,78.08V197H1920V31.1S1603.21,165.38,1231,109.07Z" />
            <path class="b5" d="M1920,131.06s-316.79,72.31-689,16C974.2,108.19,706.37,41,475,30.1,256.44,19.81,54.57,70.55,0,94.18V197H1920Z" />
        </svg>
    </span> --}}
</section>

<section class="position-relative pt-80 pb-lg-180 pb-80 z-index-3 brk-bg-right-center lazyload">

    <div class="container">

        <div class="row">

            <img src="{{ $Product['image'] }}" alt="">
            <div class="mr-20"></div>
            <div class="col-12 col-lg-5 pt-80">

                <div class="text-center text-lg-left">
                    <h5 class="font__family-montserrat font__size-28  text-uppercase mb-60">
                        <span class="font__weight-bold"> {{ Dictionary()['ProductIntro'][app()->getLocale()] }}</span>
                    </h5>
                    <p class="font__size-15 font__weight-normal mt--50  mb-25 pr-xs-0 pr-45 brk-dark-font-color">
                        {{ $Product['IntroText' . app()->getlocale()] }}
                    </p>

                </div>

                <div class="text-center text-lg-left mt-50">
                    <h5 class="font__family-montserrat font__size-28  text-uppercase mb-40">
                        <span class="font__weight-bold"> {{ Dictionary()['ProductNutrition'][app()->getLocale()] }}</span>
                    </h5>
                    <p style="white-space: pre-line;" class="font__size-15 font__weight-normal mt--50  mb-25 pr-xs-0 pr-45 brk-dark-font-color">
                        {{ trim($Product['NutritionText' . app()->getlocale()]) }}
                    </p>

                </div>

            </div>

        </div>
    </div>
</section>

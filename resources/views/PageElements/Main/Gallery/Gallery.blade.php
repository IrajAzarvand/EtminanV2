@foreach ($GItems as $GItem)
    @isset($GItem['images'])
        <section class="pt-lg-100 pt-60 pb-lg-100 pb-70 bg-white" id="portfolio">
            <div class="container">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-12 col-md-6">
                        <div class="text-center mb-40 mb-lg-100">
                            <h2 class="font__family-montserrat font__size-56 font__weight-ultralight line__height-60 mb-25">{{ $GItem['Title_' . app()->getlocale()] }}</h2>
                            <h3 class="brk-dark-font-color font__size-15 font__weight-normal line__height-24 title-lines-solid title-lines-main" data-brk-library="component__title">
                                <span class="line" style="background:rgba(var(--brand-primary-rgb), 0.2)"></span>
                                <br>
                                <span class="text">{{ $GItem['Description_' . app()->getlocale()] }}</span>
                                <br>
                                <span class="line" style="background:rgba(var(--brand-primary-rgb), 0.2)"></span>
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach ($GItem['images'] as $g_img)
                        <div class="col-sm-3 col-12">
                            <div class="brk-gallery-card brk-gallery-card_shadow" data-brk-library="component__gallery">
                                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ $g_img }}" alt="alt" class="brk-gallery-card__img lazyload">
                                <a href="{{ $g_img }}" data-fancybox="gallery" class="fancybox brk-gallery-card__overlay-full brk-bg-gradient-40deg-85-28 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-plus font__size-36 brk-white-font-color"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endisset
@endforeach


{{-- =========================================== --}}

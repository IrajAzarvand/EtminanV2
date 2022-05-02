<section class="bg-white pb-90">
    <br>
    <br>
    <div class="container">
        <div class="brk-shop-grid-filter" data-brk-library="component__shop_grid_filter">

            {{-- ptype titles --}}
            {{-- if user select ptype from menu --}}
            @isset($SelectedPtype)
                <ul class="brk-shop-grid-filter__button brk-shop-grid-filter__button_style-3 text-uppercase brk-white-font-color d-flex justify-content-center align-items-center">
                    @foreach ($Ptypes as $Ptype)
                        <li class="@if ($SelectedPtype == $Ptype['id']) checked @endif " data-filter=".{{ $Ptype['id'] }}" style="background-image: url({{ $Ptype['image'] }}); background-size: cover">
                            <span class="text">{{ $Ptype['Text'] }}</span>
                            <span class="before brk-base-bg-gradient-13"></span>
                        </li>
                    @endforeach
                </ul>
            @else
                {{-- for ptypes in index page --}}
                <ul class="brk-shop-grid-filter__button brk-shop-grid-filter__button_style-3 text-uppercase brk-white-font-color d-flex justify-content-center align-items-center">
                    @foreach ($Ptypes as $Ptype)
                        <li class="@if ($loop->first) checked @endif " data-filter=".{{ $Ptype['id'] }}" style="background-image: url({{ $Ptype['image'] }}); background-size: cover">
                            <span class="text">{{ $Ptype['Text'] }}</span>
                            <span class="before brk-base-bg-gradient-13"></span>
                        </li>
                    @endforeach
                </ul>

            @endisset

            {{-- products of ptype --}}
            <div class="brk-shop-grid-filter__items row">
                @if (last(request()->segments()) == 'index')
                    {{-- this part is for showing just 12 last added product in index page --}}
                    @foreach ($IndexProducts as $ptype => $products)
                        @foreach ($products as $key => $product)
                            <div class="mb-20 col-xl-3 col-lg-4 col-sm-6 brk-shop-grid-filter__item {{ $product['Ptype_id'] }}">
                                <div class="bg-white brk-shop-grid-filter-special">
                                    <img class="brk-shop-grid-filter-special__thumb" src="{{ $product['image'] }}" alt="alt">
                                    <div class="brk-shop-grid-filter-special__overlay"></div>

                                    <div class="brk-shop-grid-filter-special__container">
                                        <div class="text-center brk-shop-grid-filter-special__content">
                                            <div class="brk-shop-grid-filter-special__title mb-30">
                                                <h4 class="font__family-montserrat font__weight-light font__size-20 line__height-24 brk-white-font-color text-uppercase">{{ $product['ShortText' . app()->getlocale()] }}</h4>
                                            </div>

                                            <a href="{{ route('ViewProduct', [$product['id']]) }}" class="brk-shop-grid-filter-special__buy brk-base-bg-gradient-13 brk-base-box-shadow-primary">
                                                <span class="text brk-white-font-color text-uppercase font__family-montserrat font__weight-light font__size-14 line__height-44">{{ Dictionary()['ViewProduct'][app()->getLocale()] }}</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                @else
                    {{-- this part is for showing all products when selecting from menu or click more button in category section in index page --}}
                    @foreach ($Products as $key => $product)
                        <div class="mb-20 col-xl-3 col-lg-4 col-sm-6 brk-shop-grid-filter__item {{ $product['Ptype_id'] }}">
                            <div class="bg-white brk-shop-grid-filter-special">
                                <img class="brk-shop-grid-filter-special__thumb" src="{{ $product['image'] }}" alt="alt">
                                <div class="brk-shop-grid-filter-special__overlay"></div>

                                <div class="brk-shop-grid-filter-special__container">
                                    <div class="text-center brk-shop-grid-filter-special__content">
                                        <div class="brk-shop-grid-filter-special__title mb-30">
                                            <h4 class="font__family-montserrat font__weight-light font__size-20 line__height-24 brk-white-font-color text-uppercase">{{ $product['ShortText' . app()->getlocale()] }}</h4>
                                        </div>

                                        <a href="{{ route('ViewProduct', [$product['id']]) }}" class="brk-shop-grid-filter-special__buy brk-base-bg-gradient-13 brk-base-box-shadow-primary">
                                            <span class="text brk-white-font-color text-uppercase font__family-montserrat font__weight-light font__size-14 line__height-44">{{ Dictionary()['ViewProduct'][app()->getLocale()] }}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>


    </div>
</section>

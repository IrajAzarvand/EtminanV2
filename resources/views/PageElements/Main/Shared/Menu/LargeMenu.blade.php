{{-- Pc View Menu --}}
<div class="col-lg-auto align-self-lg-stretch d-none d-lg-block">
    <div class="brk-open-top-bar brk-header__item">
        <div class="brk-open-top-bar__circle"></div>
        <div class="brk-open-top-bar__circle"></div>
        <div class="brk-open-top-bar__circle"></div>
    </div>
</div>
<div class="col-lg align-self-lg-stretch">
    <nav class="brk-nav brk-header__item">
        {{-- loaded from helper file --}}
        @foreach (MainNav() as $Menu => $values)
            @if (!array_key_exists('sub', $values))
                <ul class="brk-nav__menu">
                    <li class="brk-nav__children brk-nav__drop-down-effect">
                        <a href="{{ route($values['route']) }}">
                            <span>{{ $values[app()->getlocale()] }}</span>
                        </a>
                    </li>
                </ul>
            @else
                <ul class="brk-nav__menu">
                    <li class="brk-nav__children brk-nav__drop-down-effect">
                        <a href="#">
                            <span>{{ $values[app()->getlocale()] }}</span>
                        </a>
                        <ul class="brk-nav__sub-menu brk-nav-drop-down font__family-montserrat">
                            @foreach ($values['sub'] as $subMenu => $subValue)
                                <li class="dd-effect">
                                    <a href="{{ route($subValue['route']) }}">{{ $subValue[app()->getlocale()] }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            @endif
        @endforeach

        {{-- Menu Products loaded from Helper --}}
        <ul class="brk-nav__menu">
            <li class="brk-nav__children brk-nav__drop-down-effect">
                <a href="#">
                    <span>{{ Dictionary()['Products'][app()->getLocale()] }}</span>
                </a>
                <ul class="brk-nav__sub-menu brk-nav-drop-down font__family-montserrat">

                    @foreach (Ptypes() as $Ptype)
                        <li class="dd-effect">
                            <a href="{{ route('ViewCategories', [$Ptype['id']]) }}">{{ $Ptype['Text'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
        </ul>
        {{-- End Menu Products --}}


    </nav>
</div>


{{-- Pc Menu View Logo --}}
<div class="col-lg-2 align-self-lg-center d-none d-lg-block">
    <div class="text-center">
        <a href="/" class="brk-header__logo brk-header__item @@modifier">
            <img class="brk-header__logo-1 lazyload" @if (SiteLang()[app()->getLocale()]['rtl']) src="{{ asset('storage/images/logo/LogoTextWhiteRtl.png') }}"
        @else src="{{ asset('storage/images/logo/LogoTextWhiteLtr.png') }}" @endif alt="alt">
            <img class="brk-header__logo-2 lazyload" @if (SiteLang()[app()->getLocale()]['rtl']) src="{{ asset('storage/images/logo/LogoTextBlueRtl.png') }}"
        @else src="{{ asset('storage/images/logo/LogoTextBlueLtr.png') }}" @endif alt="alt">
        </a>
    </div>
</div>


<div class="col-lg-5 align-self-lg-stretch text-lg-right">

    {{-- call information --}}
    <div class="brk-header__title font__family-montserrat font__weight-bold">{{ Dictionary()['ContactUs'][app()->getLocale()] }}</div>
    <div class="brk-call-us brk-header__item">
        <a href="tel:00984134328221" class="brk-call-us__number"><i class="fa fa-phone" aria-hidden="true"></i> 04134328221-4</a>
        <a href="tel:00984134328221" class="brk-call-us__link"><i class="fa fa-phone" aria-hidden="true"></i></a>
    </div>


    {{-- language section --}}
    <div class="brk-lang brk-header__item">
        <span class="brk-lang__selected">{{ app()->getLocale() }} <i class="fa fa-caret-down" aria-hidden="true"></i></span>
        <span class="brk-lang__open"><i class="fa fa-language"></i> {{ Dictionary()['language'][app()->getLocale()] }} <span class="brk-lang__active-lang text-white brk-bg-primary"> {{ app()->getLocale() }} </span></span>
        <ul class="brk-lang__option">
            @foreach (SiteLang() as $locale => $rtl)
                <li><a href="{{ route('SetLocale', [$locale]) }}">{{ $locale }}</a></li>
            @endforeach
        </ul>
    </div>
</div>

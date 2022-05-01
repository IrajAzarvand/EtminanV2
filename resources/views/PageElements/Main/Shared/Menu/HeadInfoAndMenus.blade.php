{{-- contains Top info bar, mobile menu bg, --}}
{{-- used in master layout --}}


{{-- Mobile Menu And Logo --}}
<div class="brk-header-mobile">
    <div class="brk-header-mobile__open brk-header-mobile__open_white">
        <span></span>
    </div>
    <div class="brk-header-mobile__logo">
        <a href="#">
            {{-- logo shown on top of page in mobile view --}}
            <img class="brk-header-mobile__logo-1 lazyload" @if (SiteLang()[app()->getLocale()]['rtl']) src="{{ asset('storage/images/logo/LogoTextWhiteRtl.png') }}"  @else src="{{ asset('storage/images/logo/LogoTextWhiteLtr.png') }}" @endif alt="alt">
            <img class="brk-header-mobile__logo-2 lazyload" @if (SiteLang()[app()->getLocale()]['rtl']) src="{{ asset('storage/images/logo/LogoTextBlueRtl.png') }}" @else src="{{ asset('storage/images/logo/LogoTextBlueLtr.png') }}" @endif alt="alt">
        </a>
    </div>
</div>




{{-- mobile menu box logo and backgroung image --}}
<header class="brk-header brk-header_style-1 brk-header_color-white brk-header_skin-1 d-lg-flex flex-column" style="display: none;" @if (SiteLang()[app()->getLocale()]['rtl']) data-logo-src="{{ asset('storage/images/logo/LogoTextBlueRtl.png') }}" @else data-logo-src="{{ asset('storage/images/logo/LogoTextBlueLtr.png') }}" @endif data-bg-mobile="{{ asset('storage/images/background/bg.jpg') }}" data-sticky-hide="0" data-brk-library="component__header">

    {{-- top info bar --}}
    @include('PageElements.Main.Shared.Menu.TopInfoBar')


    <div class="brk-header__main-bar brk-header_border-bottom order-lg-2 order-1" style="height: 72px;">
        <div class="container-fluid">
            <div class="row no-gutters align-items-center">

                {{-- pc menu bar --}}
                @include('PageElements.Main.Shared.Menu.LargeMenu')

            </div>
        </div>
    </div>
</header>

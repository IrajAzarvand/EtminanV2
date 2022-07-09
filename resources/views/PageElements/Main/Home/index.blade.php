@extends('MasterLayout')

@section('contents')
    @include('PageElements.Main.Home.PageElements.SliderAndElements')
    @include('PageElements.Main.Home.AboutUsSection')
    @include('PageElements.Main.Home.MoreVideos')
    @include('PageElements.Main.Home.NewProducts')
    @include('PageElements.Main.Home.ProductsCategory')

    {{-- more button for product categoreies section, show just in index page --}}
    <div class="text-center">
        <a href="{{ route('ViewCategories', [1]) }}" class="btn btn-inside-out btn-lg btn-icon-abs border-radius-25 font__family-open-sans font__weight-bold btn-min-width-200" data-brk-library="component__button">
            <span class="before">{{ Dictionary()['More'][app()->getLocale()] }}</span><span class="text">{{ Dictionary()['More'][app()->getLocale()] }}</span><span class="after">{{ Dictionary()['More'][app()->getLocale()] }}</span>
        </a>
    </div>


    @include('PageElements.Main.Home.CatalogSection')
    @include('PageElements.Main.Home.GallerySection')
    @include('PageElements.Main.Home.CertificateSection')
    @include('PageElements.Main.Home.EventsSection')
    @include('PageElements.Main.Home.ContactUsSection')
@endsection

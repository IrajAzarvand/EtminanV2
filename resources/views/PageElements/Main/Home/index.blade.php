@extends('MasterLayout')

@section('contents')
    @include('PageElements.Main.Home.PageElements.SliderAndElements')
    @include('PageElements.Main.Home.AboutUsSection')
    @include('PageElements.Main.Home.MoreVideos')
    @include('PageElements.Main.Home.NewProducts')
    @include('PageElements.Main.Home.ProductsCategory')
    {{-- @include('PageElements.Main.Home.CatalogSection') --}}
    @include('PageElements.Main.Home.GallerySection')
    @include('PageElements.Main.Home.CertificateSection')
    @include('PageElements.Main.Home.EventsSection')
    @include('PageElements.Main.Home.ContactUsSection')
@endsection

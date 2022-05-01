@extends('MasterLayout')
@include('PageElements.Main.Shared.SubPage.SubPagesHeader')
@section('contents')
    @if (isset($SelectedPtype))
        {{-- when user click one of ptypes in menu --}}
        @include('PageElements.Main.Home.ProductsCategory')
    @elseif (isset($SalesOffices))
        @include('PageElements.Main.SalesOffices.IranMap')
    @elseif(isset($Product) && isset($RelatedProducts))
        {{-- when user click on product to see its details --}}
        @include('PageElements.Main.Products.ProductSpecs')
        @include('PageElements.Main.Products.RelatedProducts')
    @elseif (isset($GItems))
        @include('PageElements.Main.Gallery.Gallery')
    @endif
@endsection

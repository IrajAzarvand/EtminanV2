<div class="position-absolute">
    @if ($AboutUsItem['image'] || $AboutUsItem['video'])
        @include('PageElements.Main.Home.PageElements.AboutUsElements')
    @endif
</div>




<section class="pt-40 pb-70 pb-lg-100">
    <div class="mb-40 mb-lg-70 text-center">
        <h2 class="title__heading-06 title__heading-main font__family-montserrat font__size-40 font__weight-ultralight" data-brk-library="component__title">
            <span class="font__weight-light">{{ Dictionary()['AboutUs'][app()->getLocale()] }}</span>
        </h2>
    </div>
    <div class="container">
        @if ($AboutUsItem['image'] || $AboutUsItem['video'])
            <div class="brk-hosted-video  border-radius-25 overflow-hid mb-40 mb-lg-80" data-brk-library="component__media_embeds,fancybox">
                <div class="brk-abs-bg-overlay brk-hosted-video__before ">
                </div>

                @if ($AboutUsItem['image'])
                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ $AboutUsItem['image'] }}" alt="alt" class="brk-hosted-video__img lazyload">
                @elseif($AboutUsItem['video'])
                    <div class="brk-hosted-video_inner">

                        <video class="" controls id="id" style="height: 100%; width: 100%;">
                            <source src="{{ $AboutUsItem['video'] }}" type="video/mp4">
                        </video>
                    </div>
                @endif
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <h3 style="white-space: pre-line; text-align: justify !important" class="font__family-montserrat font__size-24 font__weight-light line__height-34 mb-25 text-justify text-md-left">
                    @if ($AboutUsText)
                        {{ $AboutUsText['content_' . app()->getLocale()] }}
                    @endif
                </h3>
            </div>
        </div>
    </div>
</section>

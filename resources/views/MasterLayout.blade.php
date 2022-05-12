<!DOCTYPE html>
<html lang="en" data-brk-skin="brk-blue.css" @if (SiteLang()[app()->getLocale()]['rtl']) dir="rtl" @else dir="ltr" @endif>

<head>
    <title>{{ config('app.name') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1,maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="apple-touch-icon-precomposed" href="favicon.ico">
    <meta name="theme-color" content="#2775FF">
    <meta name="keywords" content="بستنی، اطمینان، بستنی اطمینان، پشمک، حاج عبدالله، پشمک حاج عبدالله">
    <meta name="description" content="بستنی، اطمینان، بستنی اطمینان، پشمک، حاج عبدالله، پشمک حاج عبدالله">

    @include('Css')


    {{-- mtcaptcha --}}
    <script>
        var mtcaptchaConfig = {
            "sitekey": "MTPublic-WgOjDYDxk"
        };
        (function() {
            var mt_service = document.createElement('script');
            mt_service.async = true;
            mt_service.src = 'https://service.mtcaptcha.com/mtcv1/client/mtcaptcha.min.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(mt_service);
            var mt_service2 = document.createElement('script');
            mt_service2.async = true;
            mt_service2.src = 'https://service2.mtcaptcha.com/mtcv1/client/mtcaptcha2.min.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(mt_service2);
        })();
    </script>




</head>

<body>

    <div class="brk-loader">
        <div class="brk-loader__loader"></div>
    </div>

    @include('InlineStyleAndJs')


    @include('PageElements.Main.Shared.Menu.HeadInfoAndMenus')
    <div id="top"></div>
    <div class="main-page">
        @yield('contents')

    </div>

    @include('PageElements.Main.Shared.FooterSection')

    <a href="#top" id="toTop"></a>
    <script defer="defer" src="{{ asset('js/scripts.min.js') }}"></script>
    <script defer="defer" src="{{ asset('vendor/revslider/js/jquery.themepunch.tools.min.js') }}"></script>
    <script defer="defer" src="{{ asset('vendor/revslider/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script defer="defer" src="{{ asset('vendor/revslider/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script defer="defer" src="{{ asset('vendor/revslider/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script defer="defer" src="{{ asset('vendor/revslider/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script defer="defer" src="{{ asset('vendor/revslider/js/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script defer="defer" src="{{ asset('vendor/revslider/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script>
        var revapi24,
            tpj;
        (function() {
            if (!/loaded|interactive|complete/.test(document.readyState)) document.addEventListener("DOMContentLoaded", onLoad);
            else onLoad();

            function onLoad() {
                if (tpj === undefined) {
                    tpj = jQuery;
                    if ("on" == "on") tpj.noConflict();
                }
                if (tpj("#rev_slider_24_1").revolution == undefined) {
                    revslider_showDoubleJqueryError("#rev_slider_24_1");
                } else {
                    revapi24 = tpj("#rev_slider_24_1").show().revolution({
                        sliderType: "hero",
                        jsFileLocation: "vendor/revslider/js/",
                        sliderLayout: "fullwidth",
                        dottedOverlay: "none",
                        delay: 5000,
                        navigation: {},
                        responsiveLevels: [1240, 1024, 778, 480],
                        visibilityLevels: [1240, 1024, 778, 480],
                        gridwidth: [1200, 992, 768, 576],
                        gridheight: [1200, 768, 960, 720],
                        lazyType: "none",
                        parallax: {
                            type: "mouse",
                            origo: "slidercenter",
                            speed: 800,
                            speedbg: 0,
                            speedls: 0,
                            levels: [4, 6, 8, 10, 12, 30, 35, 40, 45, 46, 47, 48, 49, 50, 51, 55],
                            disable_onmobile: "on"
                        },
                        shadow: 0,
                        spinner: "spinner2",
                        autoHeight: "off",
                        disableProgressBar: "on",
                        hideThumbsOnMobile: "off",
                        hideSliderAtLimit: 0,
                        hideCaptionAtLimit: 0,
                        hideAllCaptionAtLilmit: 0,
                        debugMode: false,
                        fallbacks: {
                            simplifyAll: "off",
                            disableFocusListener: false,
                        }
                    });
                }; /* END OF revapi call */
            }; /* END OF ON LOAD FUNCTION */
        }()); /* END OF WRAPPING FUNCTION */
    </script>




    {{-- snow effect --}}
    {{-- <script src='{{ asset('js/snowEffect/snowfall.min.js') }}'></script>
    <script type='text/javascript'>
        //default options
        snowFall.snow(document.body, {
            image: "{{ asset('js/snowEffect/flake.png') }}",
            minSize: 10,
            maxSize: 20
        });
    </script> --}}



    {{-- recaptcha --}}
    {{-- <script>
        function onSubmit(token) {
            document.getElementById("demo-form").submit();
        }
    </script> --}}

</body>

</html>

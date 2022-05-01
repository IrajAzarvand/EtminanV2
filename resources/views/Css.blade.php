<link rel="stylesheet" id="brk-direction-bootstrap" @if (SiteLang()[app()->getLocale()]['rtl']) href="{{ asset('css/assets/bootstrap-rtl.css') }}"
@else href="{{ asset('css/assets/bootstrap.css') }}" @endif>

<link rel="stylesheet" id="brk-direction-offsets" @if (SiteLang()[app()->getLocale()]['rtl']) href="{{ asset('css/assets/offsets-rtl.css') }}"
@else href="{{ asset('css/assets/offsets.css') }}" @endif>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" id="brk-skin-color" href="{{ asset('css/skins/brk-blue.css') }}">
<link id="brk-base-color" rel="stylesheet" href="{{ asset('css/skins/brk-base-color.css') }}">

<link id="brk-css-min" rel="stylesheet" @if (SiteLang()[app()->getLocale()]['rtl']) href="{{ asset('css/assets/styles-rtl.min.css') }}"
@else href="{{ asset('css/assets/styles.min.css') }}" @endif>
<link rel="stylesheet" href="{{ asset('vendor/revslider/css/settings.css') }}">

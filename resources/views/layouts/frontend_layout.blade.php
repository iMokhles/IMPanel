{{--/**--}}
{{--* Created by PhpStorm.--}}
{{--* User: imokhles--}}
{{--* Date: 21/01/2018--}}
{{--* Time: 15:43--}}
{{--*/--}}

<!DOCTYPE html>
<html lang="{{App::getLocale()}}">
<head>
    @include('layouts.inc.frontend_head')
</head>
<body class="p-front">
@include('layouts.inc.loader')
@include('layouts.inc.frontend_navbar')

<div class="p-front__content">
    @yield('content')
</div>

@include('layouts.inc.frontend_footer')
@include('layouts.inc.frontend_scripts')
<div class="sidebar-mobile-overlay"></div>
</body>
</html>

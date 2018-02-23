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
<div class="page-wrap">
    @yield('content')
</div>

@include('layouts.inc.frontend_footer')
@include('layouts.inc.frontend_scripts')
</body>
</html>

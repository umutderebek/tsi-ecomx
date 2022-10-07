<!DOCTYPE html>
<html>
<head>

@include('layouts.partials.seo')

<!-- Favicon -->
    <link rel="shortcut icon" href="/frontend/img/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="/frontend/img/apple-touch-icon.png">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

    <!-- Web Fonts  -->
    @include('layouts.partials.head')



</head>
<body>

<div class="body">

    @foreach($temaayar as $ayar)

    @include('layouts.partials.header')
    <div role="main" class="main">

        @yield('content')

        @include('layouts.partials.footer')

    </div>
    @endforeach


</div>

<!-- Vendor -->
@include('layouts.partials.js')

</body>
</html>

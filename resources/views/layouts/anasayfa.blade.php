<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    @include('layouts.partials.seo')


    <link rel="icon" type="image/png" href="/frontend/images/icons/favicon.png">

    @include('layouts.partials.head')
    @yield('css')

</head>

<body class="home">
<div class="page-wrapper">
    <h1 class="d-none">Wolmart - Responsive Marketplace HTML Template</h1>
    <!-- Start of Header -->
    @include('layouts.partials.header')
    <!-- End of Header -->

    <!-- Start of Main-->
    <main class="main">

       @yield('content')
        <!--End of Catainer -->
    </main>
    <!-- End of Main -->

    <!-- Start of Footer -->
   @include('layouts.partials.footer')
    <!-- End of Footer -->
</div>
<!-- End of Page-wrapper-->

@include('layouts.partials.stickyproductfooter')

<!-- Start of Scroll Top -->
<a id="scroll-top" class="scroll-top" href="#top" title="Top" role="button"> <i class="w-icon-angle-up"></i> <svg
        version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 70">
        <circle id="progress-indicator" fill="transparent" stroke="#000000" stroke-miterlimit="10" cx="35" cy="35"
                r="34" style="stroke-dasharray: 16.4198, 400;"></circle>
    </svg> </a>
<!-- End of Scroll Top -->

<!-- Start of Mobile Menu -->
@include('layouts.partials.mobileheader')
<!-- End of Mobile Menu -->





<!-- Plugin JS File -->
@include('layouts.partials.js')

@yield('js')
</body>

</html>

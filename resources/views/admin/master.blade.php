<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/') }}admin/assets/images/favicon.png">
    <title>Trishir - @yield('title')</title>
    <!-- This page CSS -->
    <!-- chartist CSS -->
    @include('admin.includes.style')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="skin-blue fixed-layout">

    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Elite admin</p>
        </div>
    </div>

    <div id="main-wrapper">

        @include('admin.includes.header')

        @include('admin.includes.sidebar')

        <div class="page-wrapper">
            <div class="container-fluid">

                @yield('body')

            </div>
        </div>

        <footer class="footer">
            © {{ date('Y - m - d') }} Design & Developed by
            <a href="https://www.thetrishir.com/">Trishir</a>
        </footer>

    </div>

    @include('admin.includes.script')
</body>

</html>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/favicon/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon" />
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon/favicon-16x16.png" />
    <link rel="manifest" href="./assets/favicon/site.webmanifest" />
    <link rel="mask-icon" href="./assets/favicon/safari-pinned-tab.svg" color="#5bbad5" />
    <meta name="msapplication-TileColor" content="#da532c" />
    <meta name="theme-color" content="#ffffff" />

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('static/assets/fonts/stylesheet.css') }}" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />

    <!-- Css -->
    <link rel="stylesheet" href="{{ asset('static/assets/css/main.css') }}">

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- fontawesomes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />



    <!-- animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <title>Watch</title>
</head>

<body>
    <div class="content">
        <!-- <nav id="navigation"></nav> -->
        @include('templates.navigation.logOutNavigation')
        <div class="container">
            @include('templates.header.loggOutHeader')

            <!-- Main-Content -->
            @include('layouts.main')

            @include('templates.footer.footer')


        </div>
    </div>
    <!-- javascript -->
    <script src="{{ asset('static/assets/js/header.js') }}"></script>
</body>

</html>
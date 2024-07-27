<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/mainstyle.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/logo.png">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome-pro.css') }}">
    <meta name="description" content>
    <title>SIG Institute</title>
    @livewireStyles
</head>

<body>
    @include('components.navbarMobile')
    <div class="containerNav">
        @include('components.sidebar')
        <div class="navbarNav">
            @include('components.navbar', ['title' => $title ?? 'Dashboard'])
            <div class="content m-4">
                @yield('contents')
            </div>
        </div>
    </div>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('assets/js/addons.js') }}"></script>
</body>

</html>

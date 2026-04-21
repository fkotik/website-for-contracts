<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="{{asset('assets/img/logo.ico')}}">

    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <script src="{{asset('assets/js/bootstrap.bundle.js')}}"></script>

    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/mask@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Scripts -->
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('vat_rates') }}">Ставки НДС</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('stages_of_execution') }}">Стадии исполнения</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('types_of_contracts') }}">Типы контрактов</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('types_of_payments') }}">Типы оплат</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('organizations') }}">Организации</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contracts') }}">Договора</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('payment') }}">Оплата</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">

                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>

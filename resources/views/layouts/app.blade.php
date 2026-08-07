<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'FinBank — Simple, Secure Digital Banking')</title>
    <meta name="description" content="@yield('description', 'Explore FinBank accounts, payments, transfers and digital banking services.')">
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/logo/finbank-mark.svg') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <a class="skip-link" href="#main-content">Skip to content</a>
    @include('nav')
    <main id="main-content">@yield('content')</main>
    @include('partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>

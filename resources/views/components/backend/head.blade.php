<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- SEO Tags --}}
    <meta name="author" content="@yield('author')">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ URL::current() }}">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:image" content="<FAVICON OR FEATURED IMAGE>">
    <link rel="icon" href="{{ url('storage/' . Qs::getSiteOption('fevicon')) }}">
    <link rel="apple-touch-icon" href="{{ url('storage/' . Qs::getSiteOption('fevicon')) }}">

    {{-- <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    <link rel="canonical" href="<CANONICAL LINK>" /> --}}

    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @stack('styles')

</head>

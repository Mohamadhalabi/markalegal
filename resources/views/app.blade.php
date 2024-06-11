<!DOCTYPE html>
<html lang="tr">
<head>
    @if (Str::startsWith($current = url()->current(), 'https://www'))
    <link rel="canonical" href="{{ str_replace('https://www.', 'https://', $current) }}">
    @elseif(Str::startsWith($current = url()->current(), 'http://www'))
    <link rel="canonical" href="{{ str_replace('http://www', 'https://', $current) }}">
    @elseif(Str::startsWith($current = url()->current(), 'http://'))
    <link rel="canonical" href="{{ str_replace('http://', 'https://', $current) }}">
    @else
    <link rel="canonical" href="{{ $current }}">
    @endif
    <meta name="robots" content="all"/>
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <title>{{ $title ?? '' }} - Patent Sorgulama</title>
        <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "LegalService",
      "name": "Marka Legal",
      "description": "Marka tescil, takip ve yenileme hizmetleri sunan online platform.",
      "url": "https://marka.legal/",
      "telephone": "+90-212-7061467",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "İstiklal Cd. No:189,K:2 D:3, Beyoğlu",
        "addressLocality": "İstanbul",
        "postalCode": "34433",
        "addressCountry": "TR"
      }
    }
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ $description ?? '' }}">
    <meta name="keywords" content="marka legal,patent, patent hizmetleri, patent sorgulama, patent tescili">
    <meta name="author" content="Marka Legal">
    <meta name="abstract" content="Marka Patent Hizmetleri">
    <meta name="copyright" content="Tüm Hakları Saklıdır. 2022 marka.legal">
    <meta name="publisher" content="marka.legal">

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $title ?? '' }}" />
    <meta name="twitter:description" content="{{ $description ?? '' }}" />
    <meta name="twitter:url" content="{{ Request::url() }}" />
    <meta name="twitter:image" content="https://marka.legal/images/logo-preview.png" />

    <meta property="og:title" content="{{ $title ?? '' }}">
    <meta property="og:description" content="{{ $description ?? '' }}">
    <meta property="og:url" content="{{ Request::url() }}">
    <meta property="og:image" content="https://marka.legal/images/logo-preview.png"/>
    <meta property="og:type" content="article">
    <meta property="og:site_name" content="marka.legal">
    <link rel="stylesheet" href="{{ asset('css') }}/vue-material.min.css">
    <link rel="stylesheet" href="{{ asset('css') }}/material-kit.css">
    <link rel="shortcut icon" href="{{ asset('images') }}/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cabin&display=swap">
    <link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{ asset('css') }}/style.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-0GY7P17FFQ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-0GY7P17FFQ');
    </script>
</head>
<body>
@inertia
<script src="{{ asset('js') }}/manifest.js" defer type="text/javascript"></script>
<script src="{{ asset('js') }}/vendor.js" defer type="text/javascript"></script>
<script src="{{ asset('js') }}/app.js" defer type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.0.0-alpha.1/axios.min.js" defer integrity="sha512-xIPqqrfvUAc/Cspuj7Bq0UtHNo/5qkdyngx6Vwt+tmbvTLDszzXM0G6c91LXmGrRx8KEPulT+AfOOez+TeVylg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>

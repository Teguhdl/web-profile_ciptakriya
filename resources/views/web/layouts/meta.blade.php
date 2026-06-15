@php
    $siteName     = $settings['system_name']        ?? 'PT. Cipta Kriya Engineering';
    $defaultTitle = $siteName . (isset($settings['system_slogan']) ? ' - ' . $settings['system_slogan'] : ' - We Solve Your Problem');
    $title        = $meta['title']       ?? $defaultTitle;
    $description  = $meta['description'] ?? ($settings['seo_description'] ?? 'PT. Cipta Kriya Engineering adalah perusahaan engineering multi-disiplin untuk konstruksi mekanikal, elektrikal, fabrikasi, dan batching plant di Indonesia.');
    $keywords     = $meta['keywords']    ?? ($settings['seo_keywords']    ?? 'cipta kriya engineering, konstruksi mekanikal subang, konstruksi elektrikal, fabrikasi baja, batching plant, kontraktor industri jawa barat');
    $canonical    = $meta['canonical']   ?? url()->current();
    $ogImage      = $meta['og_image']    ?? asset($settings['system_logo'] ?? 'assets/web/logo/cke-logomark.png');
    $ogType       = $meta['og_type']     ?? 'website';
    $robots       = $meta['robots']      ?? 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1';
    $favicon      = asset($settings['system_favicon'] ?? 'favicon.ico');
@endphp

<title>{{ $title }}</title>
<meta name="description" content="{{ $description }}">
<meta name="keywords" content="{{ $keywords }}">
<meta name="author" content="{{ $siteName }}">
<meta name="robots" content="{{ $robots }}">
<meta name="googlebot" content="{{ $robots }}">

{{-- Geo (Local SEO) --}}
<meta name="geo.region" content="ID-JB">
<meta name="geo.placename" content="Subang, Jawa Barat">
<meta name="geo.position" content="-6.5717;107.7596">
<meta name="ICBM" content="-6.5717, 107.7596">

{{-- Theme & PWA --}}
<meta name="theme-color" content="{{ $settings['theme_color'] ?? '#122b3f' }}">
<meta name="application-name" content="{{ $siteName }}">
<meta name="apple-mobile-web-app-title" content="{{ $siteName }}">
<meta name="format-detection" content="telephone=yes">

{{-- Canonical --}}
<link rel="canonical" href="{{ $canonical }}">

{{-- Open Graph --}}
<meta property="og:locale" content="id_ID">
<meta property="og:site_name" content="{{ $siteName }}">
<meta property="og:type" content="{{ $ogType }}">
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:url" content="{{ $canonical }}">
<meta property="og:image" content="{{ $ogImage }}">
<meta property="og:image:secure_url" content="{{ $ogImage }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="{{ $siteName }}">

{{-- Twitter --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ $description }}">
<meta name="twitter:image" content="{{ $ogImage }}">
<meta name="twitter:image:alt" content="{{ $siteName }}">
@if(!empty($settings['social_twitter_handle']))
<meta name="twitter:site" content="{{ $settings['social_twitter_handle'] }}">
@endif

{{-- Favicon Set Lengkap --}}
<link rel="icon" type="image/x-icon" href="{{ $favicon }}">
<link rel="shortcut icon" type="image/x-icon" href="{{ $favicon }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset($settings['favicon_32'] ?? ($settings['system_favicon'] ?? 'favicon.ico')) }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset($settings['favicon_16'] ?? ($settings['system_favicon'] ?? 'favicon.ico')) }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset($settings['favicon_apple'] ?? ($settings['system_logo'] ?? 'assets/web/logo/cke-logomark.png')) }}">

{{-- Verification (akan dipakai setelah submit ke Search Console) --}}
@if(!empty($settings['google_site_verification']))
<meta name="google-site-verification" content="{{ $settings['google_site_verification'] }}">
@endif
@if(!empty($settings['bing_site_verification']))
<meta name="msvalidate.01" content="{{ $settings['bing_site_verification'] }}">
@endif

{{-- DNS Prefetch & Preconnect (performance) --}}
<link rel="dns-prefetch" href="//fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
@if(!empty($settings['google_analytics_id']))
<link rel="preconnect" href="https://www.googletagmanager.com" crossorigin>
@endif

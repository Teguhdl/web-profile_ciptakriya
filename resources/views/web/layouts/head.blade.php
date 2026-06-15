 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @php
        $isStaging = str_contains(request()->getHost(), 'teguhdl.com') || config('app.env') !== 'production';
        if ($isStaging) {
            // Override meta robots untuk halaman ini
            $meta = array_merge($meta ?? [], ['robots' => 'noindex, nofollow']);
        }
    @endphp
    @if(!empty($settings['google_analytics_id']))
    <!-- Google Analytics (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $settings['google_analytics_id'] }}"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '{{ $settings['google_analytics_id'] }}');
    </script>
    @endif
    <!-- Preload Hero Image -->
    <link rel="preload" as="image" href="{{ asset('assets/web/dashboard/dashboard.webp') }}">
    @include('web.layouts.meta',['meta' => $meta ?? []])
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    

    @php
        // Cache-bust berbasis filemtime: browser & CDN bisa cache penuh,
        // URL berubah hanya saat file di-edit.
        $cssVersion = function($path) {
            $full = public_path($path);
            return file_exists($full) ? filemtime($full) : config('app.version', '1.0');
        };
    @endphp
    <!-- CKE Design System Tokens -->
    <link rel="stylesheet" href="{{ asset('css/tokens/fonts.css') }}?v={{ $cssVersion('css/tokens/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tokens/colors.css') }}?v={{ $cssVersion('css/tokens/colors.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tokens/spacing.css') }}?v={{ $cssVersion('css/tokens/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tokens/typography.css') }}?v={{ $cssVersion('css/tokens/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tokens/base.css') }}?v={{ $cssVersion('css/tokens/base.css') }}">
    <!-- CKE UI Kit & Components -->
    <link rel="stylesheet" href="{{ asset('css/cke-kit.css') }}?v={{ $cssVersion('css/cke-kit.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cke-components.css') }}?v={{ $cssVersion('css/cke-components.css') }}">

    @php
        $orgName       = $settings['system_name']        ?? 'PT. Cipta Kriya Engineering';
        $orgLogo       = asset($settings['system_logo']  ?? 'assets/web/logo.png');
        $orgDesc       = $settings['system_description'] ?? 'PT. Cipta Kriya Engineering — mitra engineering multi-disiplin untuk konstruksi mekanikal, elektrikal, fabrikasi, dan batching plant.';
        $orgPhone      = $settings['contact_phone']      ?? '';
        $orgPhone2     = $settings['contact_phone_2']    ?? '';
        $orgEmail      = $settings['contact_email']      ?? '';
        $orgEmail2     = $settings['contact_email_2']    ?? '';
        $orgAddress    = $settings['contact_address']    ?? 'Kabupaten Subang, Jawa Barat';
        $orgFounded    = $settings['company_founding']   ?? '2021';
        $orgPriceRange = $settings['company_price_range']?? '$$';
        $orgLocality   = $settings['company_locality']   ?? 'Subang';
        $orgRegion     = $settings['company_region']     ?? 'Jawa Barat';
        $orgCountry    = $settings['company_country']    ?? 'ID';
        $orgLatitude   = $settings['company_latitude']   ?? '-6.5717';
        $orgLongitude  = $settings['company_longitude']  ?? '107.7596';
        $orgHoursMonFri= $settings['company_hours_weekday'] ?? '08:00-17:00';
        $orgHoursSat   = $settings['company_hours_saturday']?? '08:00-14:00';
        [$openMonFri, $closeMonFri] = array_pad(explode('-', $orgHoursMonFri), 2, '');
        [$openSat,    $closeSat]    = array_pad(explode('-', $orgHoursSat),    2, '');

        $sameAs = array_values(array_filter([
            $settings['social_facebook']  ?? null,
            $settings['social_instagram'] ?? null,
            $settings['social_twitter']   ?? null,
            $settings['social_linkedin']  ?? null,
            $settings['social_youtube']   ?? null,
            $settings['social_tiktok']    ?? null,
        ]));

        $organizationSchema = [
            '@context'      => 'https://schema.org',
            '@type'         => 'Organization',
            '@id'           => url('/') . '#organization',
            'name'          => $orgName,
            'alternateName' => 'Cipta Kriya Engineering',
            'url'           => url('/'),
            'logo'          => $orgLogo,
            'image'         => $orgLogo,
            'foundingDate'  => $orgFounded,
            'description'   => $orgDesc,
            'contactPoint'  => [
                '@type'             => 'ContactPoint',
                'telephone'         => $orgPhone,
                'email'             => $orgEmail,
                'contactType'       => 'customer service',
                'areaServed'        => 'ID',
                'availableLanguage' => ['Indonesian','English'],
            ],
        ];
        if (!empty($sameAs)) $organizationSchema['sameAs'] = $sameAs;

        $localBusinessSchema = [
            '@context'    => 'https://schema.org',
            '@type'       => 'LocalBusiness',
            '@id'         => url('/') . '#localbusiness',
            'name'        => $orgName,
            'image'       => $orgLogo,
            'logo'        => $orgLogo,
            'url'         => url('/'),
            'telephone'   => $orgPhone,
            'email'       => $orgEmail,
            'priceRange'  => $orgPriceRange,
            'address'     => [
                '@type'           => 'PostalAddress',
                'streetAddress'   => $orgAddress,
                'addressLocality' => $orgLocality,
                'addressRegion'   => $orgRegion,
                'addressCountry'  => $orgCountry,
            ],
            'geo'         => [
                '@type'    => 'GeoCoordinates',
                'latitude' => $orgLatitude,
                'longitude'=> $orgLongitude,
            ],
            'openingHoursSpecification' => [
                [
                    '@type'     => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Monday','Tuesday','Wednesday','Thursday','Friday'],
                    'opens'     => $openMonFri,
                    'closes'    => $closeMonFri,
                ],
                [
                    '@type'     => 'OpeningHoursSpecification',
                    'dayOfWeek' => 'Saturday',
                    'opens'     => $openSat,
                    'closes'    => $closeSat,
                ],
            ],
        ];
        if (!empty($sameAs)) $localBusinessSchema['sameAs'] = $sameAs;

        $websiteSchema = [
            '@context'        => 'https://schema.org',
            '@type'           => 'WebSite',
            '@id'             => url('/') . '#website',
            'url'             => url('/'),
            'name'            => $orgName,
            'description'     => $orgDesc,
            'inLanguage'      => 'id-ID',
            'publisher'       => ['@id' => url('/') . '#organization'],
            'potentialAction' => [
                '@type'       => 'SearchAction',
                'target'      => url('/portofolio') . '?search={search_term_string}',
                'query-input' => 'required name=search_term_string',
            ],
        ];

        $jsonFlags = JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE;
    @endphp

    <!-- Schema: Organization -->
    <script type="application/ld+json">{!! json_encode($organizationSchema, $jsonFlags) !!}</script>

    <!-- Schema: LocalBusiness (Local SEO + Google Maps) -->
    <script type="application/ld+json">{!! json_encode($localBusinessSchema, $jsonFlags) !!}</script>

    <!-- Schema: WebSite (Sitelinks Searchbox) -->
    <script type="application/ld+json">{!! json_encode($websiteSchema, $jsonFlags) !!}</script>
    @if(!empty($breadcrumbs))
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "BreadcrumbList",
      "itemListElement": [
        @foreach($breadcrumbs as $index => $crumb)
        {
          "@type": "ListItem",
          "position": {{ $index + 1 }},
          "name": "{{ $crumb['name'] }}",
          "item": "{{ $crumb['url'] }}"
        }{{ !$loop->last ? ',' : '' }}
        @endforeach
      ]
    }
    </script>
    @endif
    @stack('schema')
 <style>
     .hero-bg {
         background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
         url('{{ asset("assets/web/dashboard/dashboard.webp") }}');
         background-size: cover;
         background-position: center;
     }

     .about-bg {
         background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)),
         url('{{ asset("assets/web/dashboard/background-1.jpg") }}');
         background-size: cover;
         background-position: center;
     }

     @keyframes scroll-left {
         0% {
             transform: translateX(0);
         }

         100% {
             transform: translateX(-50%);
         }
     }

     @keyframes scroll-right {
         0% {
             transform: translateX(-50%);
         }

         100% {
             transform: translateX(0);
         }
     }

     .track-left {
         animation: scroll-left 22s linear infinite;
     }

     .track-right {
         animation: scroll-right 22s linear infinite;
     }

     /* ====== MOBILE FIX FOR TRUSTED LOGOS ====== */
     @media (max-width: 640px) {

         /* Ukuran logo diperkecil */
         #trusted-by img {
             height: 40px !important;
             filter: none !important;
             /* Hilangkan grayscale */
             opacity: 1 !important;
             /* Pastikan terang */
         }

         /* Jarak antar logo di mobile */
         .track-left,
         .track-right {
             gap: 2.5rem !important;
             /* default 16 → jadi 10 */
         }

         /* Scroll lebih cepat di mobile (22s → 12s) */
         @keyframes scroll-left-mobile {
             0% {
                 transform: translateX(0);
             }

             100% {
                 transform: translateX(-50%);
             }
         }

         @keyframes scroll-right-mobile {
             0% {
                 transform: translateX(-50%);
             }

             100% {
                 transform: translateX(0);
             }
         }

         .track-left {
             animation: scroll-left-mobile 6s linear infinite !important;
         }

         .track-right {
             animation: scroll-right-mobile 6s linear infinite !important;
         }
     }
 </style>
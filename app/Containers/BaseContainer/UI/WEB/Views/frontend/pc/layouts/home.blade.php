@php($def = isset($def) ? $def : FunctionLib::tplShareGlobal('web', $settings ?? []))
@php($seoDefault = FunctionLib::getSeo('web', $def))
@php($versionMedia = $settings['other']['version'] ?? 0)
<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="UTF-8" />
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <link rel="pingback" href="https://luci.vn/xmlrpc.php" />
    <meta http-equiv="content-language" content="vi" />
    <link rel="alternate" href="index.html" hreflang="vi" />
    <title>{{ @$settings['website']['site_name'] }}</title>
    <link rel="stylesheet" href="{{ asset('template/wp-content/cache/min/1/d920948c02523764f44b02b41385455c.css') }}"
        data-minify="1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <link rel="canonical" href="index.html" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:locale:alternate" content="en_GB" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ @$settings['seo']['meta_title'] }}" />
    <meta property="og:description"
        content="{{ @$settings['seo']['meta_description'] }}" />
    <meta property="og:site_name" content="{{ @$settings['website']['site_name'] }}" />
    <meta property="og:image" content="{{ ImageURL::getImageUrl(@$settings['website']['seo_image'], 'setting', 'original') }}" />
    <meta property="og:image:width" content="386" />
    <meta property="og:image:height" content="284" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description"
        content="{{ @$settings['seo']['meta_description'] }}" />
    <meta name="twitter:title" content="{{ @$settings['seo']['meta_title'] }}" />
    <meta name="twitter:image" content="{{ ImageURL::getImageUrl(@$data['website']['seo_image'], 'setting', 'original') }}" />
    <style type="text/css">
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 0.07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>
    <style id="kk-star-ratings-inline-css" type="text/css">
        .kk-star-ratings .kksr-stars .kksr-star {
            margin-right: 4px;
        }

        [dir="rtl"] .kk-star-ratings .kksr-stars .kksr-star {
            margin-left: 4px;
            margin-right: 0;
        }
    </style>
    <style id="dashicons-inline-css" type="text/css">
        [data-font="Dashicons"]:before {
            font-family: "Dashicons" !important;
            content: attr(data-icon) !important;
            speak: none !important;
            font-weight: normal !important;
            font-variant: normal !important;
            text-transform: none !important;
            line-height: 1 !important;
            font-style: normal !important;
            -webkit-font-smoothing: antialiased !important;
            -moz-osx-font-smoothing: grayscale !important;
        }
    </style>
    <style id="woocommerce-inline-inline-css" type="text/css">
        .woocommerce form .form-row .required {
            visibility: visible;
        }
    </style>
    <style id="ez-toc-inline-css" type="text/css">
        div#ez-toc-container p.ez-toc-title {
            font-size: 120%;
        }

        div#ez-toc-container p.ez-toc-title {
            font-weight: 500;
        }

        div#ez-toc-container ul li {
            font-size: 95%;
        }
    </style>
    <style id="frontend-hotline-inline-css" type="text/css">
        .hotline__link {
            background-color: #009b71;
        }

        .hotline__icon {
            background-color: #f15a29;
        }

        .hotline__text {
            color: #fff;
        }
    </style>
    <link rel="stylesheet" id="flatsome-googlefonts-css"
        href="http://fonts.googleapis.com/css?family=Montserrat%3Aregular%2C700%2Cregular%2C700%7CDancing+Script%3Aregular%2C400&amp;display=swap&amp;ver=3.9"
        type="text/css" media="all" />
    <style id="rocket-lazyload-inline-css" type="text/css">
        .rll-youtube-player {
            position: relative;
            padding-bottom: 56.23%;
            height: 0;
            overflow: hidden;
            max-width: 100%;
        }

        .rll-youtube-player iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 100;
            background: 0 0;
        }

        .rll-youtube-player img {
            bottom: 0;
            display: block;
            left: 0;
            margin: auto;
            max-width: 100%;
            width: 100%;
            position: absolute;
            right: 0;
            top: 0;
            border: none;
            height: auto;
            cursor: pointer;
            -webkit-transition: 0.4s all;
            -moz-transition: 0.4s all;
            transition: 0.4s all;
        }

        .rll-youtube-player img:hover {
            -webkit-filter: brightness(75%);
        }

        .rll-youtube-player .play {
            height: 72px;
            width: 72px;
            left: 50%;
            top: 50%;
            margin-left: -36px;
            margin-top: -36px;
            position: absolute;
            background: url(../../wp-content/plugins/wp-rocket/assets/img/youtube.png) no-repeat;
            cursor: pointer;
        }
    </style>
    <script type="text/javascript" src="{{ asset('template/wp-includes/js/jquery/jquery.min9d52.js?ver=3.5.1') }}"
        id="jquery-core-js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-170799243-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());

        gtag("config", "UA-170799243-1");
    </script>
    <script type="text/javascript">
        (function(m, e, t, r, i, k, a) {
            m[i] =
                m[i] ||
                function() {
                    (m[i].a = m[i].a || []).push(arguments);
                };
            m[i].l = 1 * new Date();
            (k = e.createElement(t)), (a = e.getElementsByTagName(t)[0]), (k.async = 1), (k.src = r), a.parentNode
                .insertBefore(k, a);
        })(window, document, "script", "../../../mc.yandex.ru/metrika/tag.js", "ym");

        ym(69065527, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true,
            ecommerce: "dataLayer",
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/69065527" style="position: absolute; left: -9999px;"
                alt="" /></div>
    </noscript>
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-604199103"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());

        gtag("config", "AW-604199103");
    </script>
    <meta name="p:domain_verify" content="faaa21a6850d62c5f6b71baf45d4dda1" />
    <link rel="alternate" href="index.html" hreflang="vi" />
    <link rel="alternate" href="https://luci.vn/en/product/luci-building-en/" hreflang="en" />
    <style>
        .bg {
            opacity: 0;
            transition: opacity 1s;
            -webkit-transition: opacity 1s;
        }

        .bg-loaded {
            opacity: 1;
        }
    </style>
    <script>
        !(function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments);
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = "2.0";
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s);
        })(window, document, "script", "../../../connect.facebook.net/en_US/fbevents.js");
        fbq("init", "2181255115516857");
        fbq("track", "PageView");
    </script>
    <noscript><img height="1" width="1" style="display: none;"
            src="https://www.facebook.com/tr?id=2181255115516857&amp;ev=PageView&amp;noscript=1" /></noscript>
    <noscript>
        <style>
            .woocommerce-product-gallery {
                opacity: 1 !important;
            }
        </style>
    </noscript>
    <link rel="icon" href="../../wp-content/uploads/2019/11/logoluci-100x100.png" sizes="32x32" />
    <link rel="icon" href="../../wp-content/uploads/2019/11/logoluci.png" sizes="192x192" />
    <link rel="apple-touch-icon" href="../../wp-content/uploads/2019/11/logoluci.png" />
    <meta name="msapplication-TileImage" content="https://luci.vn/wp-content/uploads/2019/11/logoluci.png" />
</head>

<body class="home">
    {!! $settings['other']['script_body'] !!}
    <div id="wrapper">
        @include('frontend::pc.home.includes.header')
        <main id="main">
            @yield('content')
        </main>
        @include('frontend::pc.home.includes.footer')
    </div>
    <x-footer-component :menus="$menus"></x-footer-component>
</body>
@stack('js_bot_all')

</html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>@yield('title') | Rochman Properties</title>
   <meta name="description" content="@yield('description')">
   <meta name="keywords" content="@yield('keywords')">

   <!-- Twitter Meta -->
   <meta name="twitter:site" content="@Rochmanproperties">
   <meta name="twitter:creator" content="@Rochmanproperties">
   <meta name="twitter:card" content="article">
   <meta name="twitter:title" content="@yield('title')">
   <meta name="twitter:description" content="@yield('description')">
   <meta name="twitter:image" content="@yield('image')">

   <!-- Facebook Meta -->
   <meta property="og:site_name" content="Rochmanproperties" />
   <meta property="og:url" content="@yield('url')"/>
   <meta property="og:title" content="@yield('title')">
   <meta property="og:description" content="@yield('description')">
   <meta property="og:type" content="article">
   <meta property="og:image" content="@yield('image')">
   <meta property="og:image:secure_url" content="@yield('image')">
   <meta property="og:image:type" content="image/jpg">
   <meta property="og:image:width" content="1200">
   <meta property="og:image:height" content="630">
   <meta property="og:updated_time" content="@yield('updated_time')" />
   <meta property="og:image:alt" content="@yield('title')" />

   <!-- article -->
   @yield('article')

   <meta property="og:image:secure_url" content="{!! asset('assets/favicon/apple-icon-120x120.png') !!}">
   <meta property="og:image:type" content="image/jpg">
   <meta property="og:image:width" content="500">
   <meta property="og:image:height" content="250">
   <link rel="apple-touch-icon" sizes="57x57" href="{!! asset('assets/favicon/apple-icon-57x57.png') !!}">
   <link rel="apple-touch-icon" sizes="60x60" href="{!! asset('assets/favicon/apple-icon-60x60.png') !!}">
   <link rel="apple-touch-icon" sizes="72x72" href="{!! asset('assets/favicon/apple-icon-72x72.png') !!}">
   <link rel="apple-touch-icon" sizes="76x76" href="{!! asset('assets/favicon/apple-icon-76x76.png') !!}">
   <link rel="apple-touch-icon" sizes="114x114" href="{!! asset('assets/favicon/apple-icon-114x114.png') !!}">
   <link rel="apple-touch-icon" sizes="120x120" href="{!! asset('assets/favicon/apple-icon-120x120.png') !!}">
   <link rel="apple-touch-icon" sizes="144x144" href="{!! asset('assets/favicon/apple-icon-144x144.png') !!}">
   <link rel="apple-touch-icon" sizes="152x152" href="{!! asset('assets/favicon/apple-icon-152x152.png') !!}">
   <link rel="apple-touch-icon" sizes="180x180" href="{!! asset('assets/favicon/apple-icon-180x180.png') !!}">
   <link rel="icon" type="image/png" sizes="192x192"  href="{!! asset('assets/favicon/android-icon-192x192.png') !!}">
   <link rel="icon" type="image/png" sizes="32x32" href="{!! asset('assets/favicon/favicon-32x32.png') !!}">
   <link rel="icon" type="image/png" sizes="96x96" href="{!! asset('assets/favicon/favicon-96x96.png') !!}">
   <link rel="icon" type="image/png" sizes="16x16" href="{!! asset('assets/favicon/favicon-16x16.png') !!}">
   <link rel="icon" type="image/png" sizes="512x512" href="{!! asset('assets/favicon/512.png') !!}">
   <link rel="manifest" href="{!! url('/') !!}/public/manifest.json">
   <link href="{!! asset('assets/favicon/favicon.ico') !!}" rel="shortcut icon">
   <meta name="msapplication-TileColor" content="#ffffff">
   <meta name="msapplication-TileImage" content="{!! asset('assets/favicon/ms-icon-144x144.png') !!}">
   <meta name="theme-color" content="#ffffff">

   <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900" rel="stylesheet">
   <link rel="stylesheet" href="{!! asset('assets/css/bootstrap.min.css') !!}">
   <link rel="stylesheet" href="{!! asset('assets/css/font-awesome.min.css') !!}">
   <link rel="stylesheet" href="{!! asset('assets/css/owl.carousel.min.css') !!}">
   <link rel="stylesheet" href="{!! asset('assets/css/owl.theme.default.min.css') !!}">
   <link rel="stylesheet" href="{!! asset('assets/css/style.css') !!}">

   <!-- Google Font Start Here -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">

   <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
   <link href="{!! asset('assets/css/fancybox.min.css') !!}" rel="stylesheet" />
   @livewireStyles
   <style>
      .bg-grey {
         background-color: #f8f8f8;
      }

      .backto-top > div {
         position: fixed;
         bottom: 50px;
         right: 30px;
         cursor: pointer;
         z-index: 999;
         width: 50px;
         height: 50px;
         line-height: 46px;
         border-radius: 50%;
         background-color: #212428;
         text-align: center;
         z-index: 999 !important;
         box-shadow: var(--shadow-1);
      }
   </style>
   @yield('stylesheet')
</head>


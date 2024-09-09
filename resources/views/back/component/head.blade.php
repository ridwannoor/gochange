<head>
    <meta charset="utf-8" />
    
    <title>  {{ $generals->title . " | " . $judul }}</title>
    <meta name="description" content="Jqvmap examples"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <!--begin::Web font -->
    <script src="http://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
      WebFont.load({
        google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
        active: function() {
            sessionStorage.fonts = true;
        }
      });
    </script>
    <!--end::Web font -->

    <link href="{{ asset('back/assets/vendors/base/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('back/assets/demo/default/base/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('back/assets/vendors/custom/jqvmap/jqvmap.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{ asset('back/assets/demo/default/media/img/logo/favicon.ico') }}" />
    @yield('script-head')
</head>
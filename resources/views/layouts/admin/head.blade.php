<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Mar'a BPJS Journals</title>
    {{-- <link rel="shortcut icon" href="{{ asset('html/assets/favicon.ico') }}" type="image/x-icon"> --}}

    <!-- CSS files -->
    <link href="{{ asset('admin-theme/css/tabler.min.css') }}?1684106062" rel="stylesheet" />
    <link href="{{ asset('admin-theme/css/tabler-flags.min.css') }}?1684106062" rel="stylesheet" />
    <link href="{{ asset('admin-theme/css/tabler-payments.min.css') }}?1684106062" rel="stylesheet" />
    <link href="{{ asset('admin-theme/css/tabler-vendors.min.css') }}?1684106062" rel="stylesheet" />
    <link href="{{ asset('admin-theme/css/demo.min.css') }}?1684106062" rel="stylesheet" />
    <link href="{{ asset('admin-theme/css/select2.min.css') }}" rel="stylesheet">

    {{-- <link href="{{ asset('template/css/font-awesome.min.css') }}" rel="stylesheet" > --}}
    <link href="{{ asset('template/css/sweetalert2.css') }}" rel="stylesheet">
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }

        .dots {
            width: 9.6px;
            height: 9.6px;
            background: #0054a6;
            color: #0054a6;
            border-radius: 50%;
            box-shadow: 16px 0, -16px 0;
            animation: dots-u8fzftsm 1.2s infinite linear alternate;
        }

        @keyframes dots-u8fzftsm {
            0% {
                box-shadow: 16px 0, -16px 0;
                background: ;
            }

            33% {
                box-shadow: 16px 0, -16px 0 rgba(0, 84, 166, 0.13);
                background: rgba(0, 84, 166, 0.13);
            }

            66% {
                box-shadow: 16px 0 rgba(0, 84, 166, 0.13), -16px 0;
                background: rgba(0, 84, 166, 0.13);
            }
        }

        .mce-notification {
            display: none;
        }

        .alert {
            z-index: 99;
        }
    </style>

    <style>
        /* resources/css/app.css */

        :root {
            --primary-color: #d90429;
            /* Merah Tua */
            --secondary-color: #ffcc00;
            /* Kuning Cerah */
            --success-color: #2ec4b6;
            /* Hijau muda untuk success */
            --white: #ffffff;
            --gray-bg: #f8f9fa;
            --text-dark: #333;
            --text-light: #fff;
        }
        /* .page-wrapper{
            background-color: var(--primary-color)
        } */

        .navbar-vertical.navbar-expand-lg{
            background-color: var(--primary-color)
        }

        .nav-link-title, .nav-link-icon{
            color: var(--white)
        }
        .navbar-expand-lg .nav-item.active {
            background-color: brown
        }
    </style>

    @yield('styles')
</head>
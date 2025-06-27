<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <meta name="description" content="Gojie Indonesia Menghadirkan produk akrilik berkualitas tinggi untuk memberi sentuhan mewah pada ruang Anda. Inovasi dan kreativitas bertemu dalam produk akrilik kami, memberikan solusi tampilan yang elegan
    dan fungsional untuk berbagai kebutuhan desain Anda."> --}}

    <title>PandaFood</title>

    <link rel="canonical" href="{{ url()->full() }}" />
    <link rel="shortcut icon" href="{{ asset('html/assets/favicon.ico') }}" type="image/x-icon">
    <link href="{{ asset('template/css/sweetalert2.css') }}" rel="stylesheet">

    <!-- Bootstrap Core -->
    <link rel="stylesheet" href="{{asset('html/css/owlcarousel/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('html/css/bootstrap/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('html/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('html/css/responsive.css')}}">
    @yield('styles')
</head>

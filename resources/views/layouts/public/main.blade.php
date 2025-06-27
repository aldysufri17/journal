<!DOCTYPE html>
<html lang="en">

@include('layouts.public.head')

<body>
    @include('layouts.public.nav')

    @yield('content')

    @include('layouts.public.footer')

    @include('layouts.public.script')
</body>

</html>

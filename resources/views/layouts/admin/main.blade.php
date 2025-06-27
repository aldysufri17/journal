<!doctype html>
<html lang="en">

@include('layouts.admin.head')

<body>
    <div class="page">
        <!-- Navbar -->
        @include('layouts.admin.sidebar')
        @include('layouts.admin.navbar')
        <div class="page-wrapper position-relative">
            {{-- alert success --}}
            <div class="alert alert-success alert-dismissible position-fixed end-0" style="display: none;" id="alert-success" role="alert">
                <div class="d-flex">
                    <div>
                    <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l5 5l10 -10"></path></svg>
                    </div>
                    <div id="success-message">
                        Wow! Everything worked!
                    </div>
                </div>
                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
            {{-- alert error --}}
            <div class="alert alert-danger alert-dismissible position-fixed end-0" style="display: none;" id="alert-error" role="alert">
                <div class="d-flex">
                    <div>
                        <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path><path d="M12 8v4"></path><path d="M12 16h.01"></path></svg>
                    </div>
                    <div id="error-message">
                        I'm so sorry…
                    </div>
                </div>
                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
            @yield('content')
            @include('layouts.admin.footer')
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    @include('layouts.admin.script')
</body>

</html>

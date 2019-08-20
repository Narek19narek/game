<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('includes.head')
    <body>
        @include('includes.header')
        @include('includes.sidebar')
        @include('includes.navbar')
        <main>
            @yield('content')
        </main>
        @include('includes.footer')

        @stack('footer-pre-scripts')
        <!--   Core JS Files   -->
        <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>

        <!-- Chart JS -->
{{--        <script src="../assets/js/plugins/chartjs.min.js"></script>--}}
        <!--  Notifications Plugin    -->
        <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
        <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="{{ asset('assets/js/now-ui-dashboard.min.js?v=1.3.0') }}" type="text/javascript"></script>

        @stack('footer-post-scripts')
    </body>
</html>

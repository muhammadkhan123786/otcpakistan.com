@include('dashboard.layouts.header')

@yield('main-content')
@stack('page-name')

</div>

</body>
@include('dashboard.layouts.footer')
@stack('scripts')
</html>

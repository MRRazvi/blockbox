@include('includes.auth.header')
    <div class="card">
        <div class="card-body login-card-body">
            @yield('content')
        </div>
    </div>
@include('includes.auth.footer')

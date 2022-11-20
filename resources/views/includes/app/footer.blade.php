        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            Copyright &copy; {{ date('Y') }} <a href="{{ route('home') }}">BlockBox</a>. All rights reserved.
        </footer>
    </div>

    <script src="{{ @asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ @asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ @asset('js/adminlte.min.js') }}"></script>
</body>
</html>

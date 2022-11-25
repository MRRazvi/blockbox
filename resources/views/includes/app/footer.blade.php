        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            Copyright &copy; {{ date('Y') }} <a href="{{ route('home') }}">BlockBox</a>. All rights reserved.
        </footer>
    </div>

    <script src="{{ @asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ @asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ @asset('js/adminlte.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.datatable').DataTable();
            $('.select2').select2();
        });
    </script>
</body>
</html>

@if(session("message"))
    <script>
        $(document).ready(function(){
            swal("Berhasil","{{ session('message') }}",'success');
        });
    </script>
@endif
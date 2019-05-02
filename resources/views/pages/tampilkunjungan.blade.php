@extends('layouts.template')

@section('content')
<div class="col-md-12">
	<div class="card">
		<div class="card-header"><h5>Daftar Tamu Kunjungan</h5></div>
		<div class="card-body">
			<table class="table table-stripped table-bordered table-hover" id="sampleTable">
				<thead align="center">
					<th>No</th>
					<th>Nama</th>
					<th>Status</th>
					<th>Kontak</th>
					<th>Keperluan</th>
					<th>Foto</th>
					<th>Tanggal Berkunjung</th>
					<th>Hapus</th>
				</thead>
				<tbody align="center">
					@foreach($pengunjung as $pengunjungs)
					<tr>
						<td>{{ $loop->index+1 }}</td>
						<td>{{ $pengunjungs->nama }}</td>
						<td>{{ $pengunjungs->status }}</td>
						<td>{{ $pengunjungs->kontak }}</td>
						<td>{{ $pengunjungs->keperluan }}</td>
						<td><img src="{{ asset('images/foto/'.$pengunjungs->foto) }}" alt="{{ $pengunjungs->foto }}" width="200px"></td>
						<td>{{ $pengunjungs->created_at->format('d F Y') }}</td>
						<td align="center">
							<a href="{{ url('hapustamu/'.$pengunjungs->id) }}" class="btn btn-danger btnHapus">Hapus</a>
						</td>
					</tr>
					<script>
                        $('.btnHapus').click(function(e){
                            e.preventDefault();
                            swal({
                            title: "Konfirmasi",
                            text: "Yakin Hapus?",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonText: "Yes",
                            cancelButtonText: "Cancel",
                            closeOnConfirm: false,
                            closeOnCancel: true
                        	}, function(isConfirm) {
                            if (isConfirm) {
                                window.location.href="{{ url('hapustamu/'.$pengunjungs->id) }}";
                            }
                        	});
                        });
                    </script>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
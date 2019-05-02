@extends('layouts.template')

@section('content')
<div class="col-md-12">
	<div class="card">
		<div class="card-header"><h5>Daftar Tamu Orang Tua</h5></div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-12">
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
							@foreach($ortu as $ortus)
							<tr>
								<td>{{ $loop->index+1 }}</td>
								<td>{{ $ortus->nama }}</td>
								<td>{{ $ortus->status }}</td>
								<td>{{ $ortus->kontak }}</td>
								<td>{{ $ortus->keperluan }}</td>
								<td><img src="{{ asset('images/foto/'.$ortus->foto) }}" alt="{{ $ortus->foto }}" width="200px"></td>
								<td>{{ $ortus->created_at->format('d F Y') }}</td>
								<td align="center">
									<a href="{{ url('hapustamu/'.$ortus->id) }}" class="btn btn-danger btnHapus">Hapus</a>
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
                                window.location.href="{{ url('hapustamu/'.$ortus->id) }}";
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
	</div>
</div>
@endsection
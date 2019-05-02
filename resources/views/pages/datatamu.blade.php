@extends('layouts.template')

@section('content')
<div class="col-md-12">
	<div class="card">
		<div class="card-header"><h5>Daftar Tamu Hari Ini</h5></div>
		<div class="card-body">
			<table class="table table-stripped table-bordered table-hover" id="sampleTable">
				<thead align="center">
					<th>No</th>
					<th>Nama</th>
					<th>Status</th>
					<th>Kontak</th>
					<th>Keperluan</th>
					<th>Foto</th>
					<th>Jam Masuk</th>
					<th>Keterangan</th>
				</thead>
				<tbody align="center">
					@foreach($datatamu as $todays)
					<tr>
						<td>{{ $loop->index+1 }}</td>
						<td>{{ $todays->nama }}</td>
						<td>{{ $todays->status }}</td>
						<td>{{ $todays->kontak }}</td>
						<td>{{ $todays->keperluan }}</td>
						<td><img src="{{ asset('images/foto/'.$todays->foto) }}" alt="{{ $todays->foto }}" width="200px"></td>
						<td>{{ $todays->created_at->format('H:i:s') }}</td>
						<td align="center">
							<div class="btn-group">
								<a href="{{ url('tamukeluar/'.$todays->id) }}" class="btn btn-info btnPulang">Keluar</a>
								<a href="{{ url('hapustamu/'.$todays->id) }}" class="btn btn-danger btnHapus">Hapus</a>	
							</div>
						</td>
					</tr>
					<script>
                                $('.btnPulang').click(function(e){
                                        e.preventDefault();
                                        swal({
                                        title: "Konfirmasi",
                                        text: "Yakin?",
                                        type: "warning",
                                        showCancelButton: true,
                                        confirmButtonText: "Yes",
                                        cancelButtonText: "Cancel",
                                            closeOnConfirm: false,
                                            closeOnCancel: true
                                        }, function(isConfirm) {
                                        if (isConfirm) {
                                            window.location.href="{{ url('tamukeluar/'.$todays->id) }}";
                                        }
                                        });
                                    });

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
                                            window.location.href="{{ url('hapustamu/'.$todays->id) }}";
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
@extends('layouts.template')

@section('content')
<div class="col-md-12">
	<div class="card">
		<div class="card-header"><h5>Daftar Tamu Pertanggal</h5></div>
		<div class="card-body">
			<form action="{{ url('filter_pertanggal') }}" method="post">
					{{ csrf_field() }}
				<div class="form-inline">
					<input type="date" name="start" value="{{ $tgl_masuk }}" placeholder="" class="form-control">
					<b style="margin-left:1%">Sampai</b>
					<input type="date" name="end" value="{{ $tgl_out }}" placeholder="" class="form-control" style="margin-left:1%">
					<button type="submit" class="btn btn-primary" style="margin-left:1%"><span class="fa fa-search"></span></button>
				</div>
			</form>
		</div>
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
					@if (count($data) <= 0)
					<tr>
						<td class="text-center" colspan="8">Data Kosong</td>
					</tr>
					@else
					@foreach($data as $datas)
					<tr>
						<td>{{ $loop->index+1 }}</td>
						<td>{{ $datas->nama }}</td>
						<td>{{ $datas->status }}</td>
						<td>{{ $datas->kontak }}</td>
						<td>{{ $datas->keperluan }}</td>
						<td><img src="{{ asset('images/foto/'.$datas->foto) }}" alt="{{ $datas->foto }}" width="200px"></td>
						<td>{{ $datas->created_at }}</td>
						<td align="center">
							<a href="{{ url('hapustamu/'.$datas->id) }}" class="btn btn-danger btnHapus">Hapus</a>
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
                                window.location.href="{{ url('hapustamu/'.$datas->id) }}";
                            }
                        	});
                        });
                    </script>
					@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
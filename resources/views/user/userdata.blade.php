@extends('layouts.user')

@section('content')
<div class="col-md-12">
	<div class="card">
		<div class="card-header"><h5>Daftar Tamu Hari Ini</h5></div>
		<div class="card-body">
			<table class="table table-stripped table-bordered table-hover display" id="sampleTable">
				<thead align="center">
					<th>No</th>
					<th>Nama</th>
					<th>Status</th>
					<th>Kontak</th>
					<th>Keperluan</th>
					<th>Foto</th>
					<th>Jam Masuk</th>
					<th>Jam Keluar</th>
				</thead>
				<tbody align="center">
					@foreach($userdata as $todays)
					<tr>
						<td>{{ $loop->index+1 }}</td>
						<td>{{ $todays->nama }}</td>
						<td>{{ $todays->status }}</td>
						<td>{{ $todays->kontak }}</td>
						<td>{{ $todays->keperluan }}</td>
						<td><img src="{{ asset('images/foto/'.$todays->foto) }}" alt="{{ $todays->foto }}" width="200px"></td>
						<td>{{ $todays->created_at->format('H:i:s') }}</td>
						<td>{{ $todays->exit_at}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
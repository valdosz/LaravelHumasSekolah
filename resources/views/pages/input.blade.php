@extends('layouts.template')
@section('content')

	<div class="col-md-12">
		<div class="card">
			<form action="{{ url('simpan') }}" method="post">
				{{ csrf_field() }}
				<div class="card-header">
					<h3 align="center">Input Tamu</h3>
				</div>
				<div class="card-body">
					<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Nama Pengunjung</label>
							<input type="text" name="nama" class="form-control" autocomplete="off" required placeholder="Example : Muhamad Rivaldi ">
						</div>
						<div class="form-group">
							<label>Status</label>
							<select class="form-control" required name="status">
								<option value="" disabled selected>Pilih Status</option>
								<option value="Alumni">Alumni</option>
								<option value="Orangtua">Orangtua</option>
								<option value="Kunjungan">Kunjungan</option>
							</select>
						</div>
						<div class="form-group">
							<label>No Hp</label>
							<input type="number" maxlength="13" name="kontak" class="form-control{{ $errors->has('kontak') ? ' is-invalid' : '' }}" autocomplete="off" required placeholder="Example : 0895804176117">
							@if ($errors->has('kontak'))
								<span class="has-invalid feedback" style="color: red">
									{{ $errors->first('kontak') }}
								</span>
							@endif
						</div>
						<div class="form-group">
							<label>Tujuan</label>
							<textarea placeholder="Example : Mengembalikan Buku " name="keperluan" autocomplete="off" class="form-control" required></textarea>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
									<input type="hidden" name="foto" id="foto">
									<video autoplay id="video" style="width: 100%;background-color: #fff; border: thin solid #ddd; padding: 10px; margin: 0;">
									</video>
									<img src="" id="hasilCameraImg" style="width: 100%; border: thin solid #ddd; padding: 10px; margin: 0; display: none;">
									<canvas width="640" height="480" id="hasilCameraCanvas" style="display: none;"></canvas>
									<button type="button" class="btn btn-primary" onclick="snapshot()">Ambil Gambar</button>
									<button type="button" class="btn btn-danger"  onclick="ulang()">Reset Foto</button>
								</div>
								<script>
									var video            = document.querySelector('#video');
									var canvas           = document.querySelector('#hasilCameraCanvas');
									var ctx              = canvas.getContext('2d');
									var localMediaStream = null;

									function snapshot() {
										if (localMediaStream) {
											ctx.drawImage(video, 0, 0);
											document.querySelector('#hasilCameraImg').src           = canvas.toDataURL('images/foto/png');
											document.getElementById('foto').value                   = canvas.toDataURL('images/foto/png');
											document.getElementById('video').style.display          = 'none';
											document.getElementById('hasilCameraImg').style.display = 'block';
										}
									}
									function ulang(){
										document.getElementById('video').style.display = 'block';
										document.getElementById('hasilCameraImg').style.display = 'none';
										document.getElementById('foto').value = '';
									}
									var errorEuy = function(e) {
										console.log('Reeeejected!', e);
									};
									navigator.getUserMedia({video: true}, function(stream) {
										video.src        = window.URL.createObjectURL(stream);
										localMediaStream = stream;
									}, errorEuy);
								</script>
				</div>
				
				</div>
				<div class="card-footer">
					<div class="col-md-12">
						<button type="submit" class="btn btn-primary btnSimpan" name="simpan"><i class="fa fa-save"></i>Simpan</button>	
					</div>
				</div>
			</form>	
		</div>
	</div>
	<div class="col-sm-12">
        @if($errors->any())
				@foreach($errors->all() as $error)
						<div class="alert alert-danger">
							{{ $error }}
						</div>
				@endforeach
				@endif
				@if(session('warning'))
					<div class="alert alert-warning">
						{{ session ('warning') }}
					</div>
				@endif
				@if(session('pesan'))
					<div class="alert alert-success">
						{{ session ('pesan') }}
					</div>
				@endif
    </div>

@endsection
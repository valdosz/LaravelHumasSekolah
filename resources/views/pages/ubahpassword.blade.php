@extends('layouts.template')
@section('content')
	<div class="col-md-8">
		<div class="card">
			<form action="{{ url('update_pass') }}/{{ Auth::user()->id }}" method="post">
						@csrf @method('patch')
			<div class="card-header">
				Ubah Password
			</div>
			<div class="card-body">
				<div class="form-group">
					<label>Password Baru</label>
					<input type="text" class="form-control" name="password" required>
				</div>
				<div class="form-group">
					<button class="btn btn-primary" name="update">Update</button>
				</div>
			</div>
		</form>
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
	</div>
@endsection
@extends('layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row">
			<div class="col-md-12">
			<div class="jumbotron">
		<div class="panel panel-primary">
			<div class="panel-heading">Data Hak Akses - Edit
			<div class="panel-title pull-right">
			<a href="{{ URL::previous() }}">Kembali</a></div></div>
			<div class="panel-body">
				<form action="{{route('hakakses.update', $hakakses->id)}}" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_token" value="{{csrf_token()}}">

					<div class="form-group">
						<label class="control-lable">Nama Pegakses</label>
						<input type="text" name="name" class="form-control" value="{{$hakakses->name}}">
					</div>
					<div class="form-group">
						<label class="control-lable">Email</label>
						<input type="text"  name="email" class="form-control" value="{{$hakakses->email}}"></input>
					</div>
					<div class="form-group">
						<label class="control-lable">Password</label>
						<input type="text"  name="password" class="form-control" value="{{$hakakses->password}}"></input>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success">Simpan</button>
						
					</div>
				</form>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
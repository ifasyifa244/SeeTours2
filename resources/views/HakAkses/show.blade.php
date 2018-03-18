@extends('layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row">
			<div class="col-md-12">
			<div class="jumbotron">
		<div class="panel panel-primary">
			<div class="panel-heading">Data Hak Akses - Detail
			<div class="panel-title pull-right">
			<a href="{{ URL::previous() }}">Kembali</a></div></div>
			<div class="panel-body">
				<form action="{{route('hakakses.show', $hakakses->id)}}" method="POST">
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_token" value="{{csrf_token()}}">

					<div class="form-group">
						<label class="control-lable">Nama Pegakses</label>
						<input type="text" name="name" class="form-control" value="{{$hakakses->name}}" readonly="">
					</div>
					<div class="form-group">
						<label class="control-lable">Email</label>
						<input type="text"  name="email" class="form-control" value="{{$hakakses->email}}" readonly=""></input>
					</div>
					<div class="form-group">
						<label class="control-lable">Password</label>
						<input type="text"  name="password" class="form-control" value="{{$hakakses->password}}" readonly=""></input>
					</div>
				</form>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
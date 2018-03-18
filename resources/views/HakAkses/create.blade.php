@extends('layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row">
	<div class="col-md-12">
	<div class="jumbotron">
		<div class="panel panel-primary">
			<div class="panel-heading">Data Hak Akses - Tambah Data Pengakses
			<div class="panel-title pull-right">
			<a href="{{ URL::previous() }}">Kembali</a></div></div>
			<div class="panel-body">
				<form action="{{route('hakakses.store')}}" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group">
						<label class="control-lable">Nama Pegakses</label>
						<input type="text" name="name" class="form-control" placeholder="Nama Pengakses">
					</div>
					<div class="form-group">
						<label class="control-lable">Email</label>
						<input type="text"  name="email" class="form-control" required="" placeholder="Email"></input>
					</div>
					<div class="form-group">
						<label class="control-lable">Password</label>
						<input type="text"  name="password" class="form-control" required="" placeholder="Password"></input>
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
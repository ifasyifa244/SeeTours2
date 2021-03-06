@extends('layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row">
	<div class="col-md-12">
	<div class="jumbotron">
		<div class="panel panel-primary">
			<div class="panel-heading">Data Kategori - Tambah Kategori
			<div class="panel-title pull-right">
			<a href="{{ URL::previous() }}">Kembali</a></div></div>
			<div class="panel-body">
				<form action="{{route('kategori.store')}}" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group">
						<label class="control-lable">Nama Kategori</label>
						<input type="text" name="name" class="form-control" placeholder="Nama Kategori">
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
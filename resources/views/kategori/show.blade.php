@extends('layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row">
			<div class="col-md-12">
			<div class="jumbotron">
		<div class="panel panel-primary">
			<div class="panel-heading">Data Kategori - Detail
			<div class="panel-title pull-right">
			<a href="{{ URL::previous() }}">Kembali</a></div></div>
			<div class="panel-body">
				<form action="{{route('kategori.show', $kategori->id)}}" method="POST">
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_token" value="{{csrf_token()}}">

					<div class="form-group">
						<label class="control-lable">Nama Kategori</label>
						<input type="text" name="name" class="form-control" value="{{$kategori->nama_kategori}}" readonly="">
					</div>
				</form>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
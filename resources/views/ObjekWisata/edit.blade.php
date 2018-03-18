@extends('layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row">
			<div class="col-md-12">
			<div class="jumbotron">
		<div class="panel panel-primary">
			<div class="panel-heading">Data Objek Wisata - Edit
			<div class="panel-title pull-right">
			<a href="{{ URL::previous() }}">Kembali</a></div></div>
			<div class="panel-body">
				<form action="{{route('objekwisata.update', $objekwisata->id)}}" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_token" value="{{csrf_token()}}">

					<div class="form-group">
						<label class="control-lable">Nama Objek Wisata</label>
						<input type="text" name="name" class="form-control" required="" value="{{$objekwisata->name}}">
					</div>
					<div class="form-group">
						<label class="control-lable">Lokasi</label>
						<input type="text" name="lokasi" class="form-control" required="" value="{{$objekwisata->lokasi}}">
					</div>
					<div class="form-group">
						<label class="control-lable">Jadwal</label>
						<input type="text" name="jadwal" class="form-control" required="" value="{{$objekwisata->jadwal}}">
					</div>
					<div class="form-group">
						<label class="control-lable">Artikel</label>
						<textarea name="artikel" class="ckeditor" id="ckedtor" required="">{{$objekwisata->artikel}}</textarea>
					</div>
					<div class="form-group">
						<label class="control-lable">Pict objekwisata</label> <br>
						<img src="{{ asset('/img/'.$objekwisata->gambar) }}" width="100" height="100" >
						<input type="file" name="gambar" class="form-control" required="">
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
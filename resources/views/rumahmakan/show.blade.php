@extends('layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row">
	<div class="col-md-12">
	<div class="jumbotron">
		<div class="panel panel-primary">
			<div class="panel-heading">Data Rumah Makan - Detail
			<div class="panel-title pull-right">
			<a href="{{ URL::previous() }}">Kembali</a></div></div>
			<div class="panel-body">
				<form action="{{route('rumahmakan.show', $rumahmakan->id)}}" method="POST">
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_method" value="{{csrf_token()}}">

					<div class="form-group">
						<label class="control-lable">Nama Rumah Makan</label>
						<input type="text" name="name" class="form-control" required="" value="{{$rumahmakan->name}}" readonly="">
					</div>
					<div class="form-group">
						<label class="control-lable">Lokasi</label>
						<input type="text" name="lokasi" class="form-control" required="" value="{{$rumahmakan->lokasi}}" readonly="">
					</div>
					<div class="form-group">
						<label class="control-lable">Alamat</label>
						<textarea name="alamat" class="form-control" required="">{{$rumahmakan->alamat}}</textarea>
					</div>
					<div class="form-group">
						<label class="control-lable">Jadwal</label>
						<input type="text" name="jadwal" class="form-control" required="" value="{{$rumahmakan->jadwal}}" readonly="">
					</div>
					<div class="form-group">
						<label class="control-lable">No.Telpon</label>
						<input type="text" name="no_telp" class="form-control" required="" value="{{$rumahmakan->typenumber}}{{$rumahmakan->no_telp}}">
					</div>
					<div class="form-group">
						<label class="control-lable">Artikel</label>
						<div name="artikel" class="col-md-12" required="">{{$rumahmakan->artikel}}</div>
					
					<div class="form-group">
						<label class="control-lable">Pict Rumah Makan</label><br>
						<img src="{{ asset('/img/'.$rumahmakan->gambar) }}" width="100" height="100">
						<input type="text" name="image" class="form-control" required="" value="{{$rumahmakan->gambar}}" 	readonly="">
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>
@endsection
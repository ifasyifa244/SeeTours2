@extends('layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row">
	<div class="col-md-12">
	<div class="jumbotron">
		<div class="panel panel-primary">
			<div class="panel-heading">Data Objek Wisata - Detail
			<div class="panel-title pull-right">
			<a href="{{ URL::previous() }}">Kembali</a></div></div>
			<div class="panel-body">
				<form action="{{route('objekwisata.show', $objekwisata->id)}}" method="POST">
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_method" value="{{csrf_token()}}">

					<div class="form-group">
						<label class="control-lable">Nama Objek Wisata</label>
						<input type="text" name="name" class="form-control" required="" value="{{$objekwisata->name}}" readonly="">
					</div>
					<div class="form-group">
						<label class="control-lable">Lokasi</label>
						<input type="text" name="lokasi" class="form-control" required="" value="{{$objekwisata->lokasi}}" readonly="">
					<div class="form-group">
						<label class="control-lable">Jadwal</label>
						<input type="text" name="jadwal" class="form-control" required="" value="{{$objekwisata->jadwal}}">
					</div>
					</div>
					<div class="form-group">
						<label class="control-lable">Artikel</label>
						<div name="artikel" class="col-md-12" required="">{!! $objekwisata->artikel !!}</div>
					</div>
					<div class="form-group">
						<label class="control-lable">Pict objekwisata</label><br>
						<img src="{{ asset('/img/'.$objekwisata->gambar) }}" width="100" height="100">
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>
@endsection
@extends('layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row">
	<div class="col-md-12">
	<div class="jumbotron">
		<div class="panel panel-primary">
			<div class="panel-heading">Data Hotel - Detail
			<div class="panel-title pull-right">
			<a href="{{ URL::previous() }}">Kembali</a></div></div>
			<div class="panel-body">
				<form action="{{route('hotel.show', $hotel->id)}}" method="POST">
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_method" value="{{csrf_token()}}">

					<div class="form-group">
						<label class="control-lable">Nama Hotel</label>
						<input type="text" name="name" class="form-control" required="" value="{{$hotel->name}}" readonly="">
					</div>
					<div class="form-group">
						<label class="control-lable">Alamat</label>
						<textarea name="alamat" class="form-control" required="">{{$hotel->alamat}}</textarea>
					</div>
					<div class="form-group">
						<label class="control-lable">No.Telpon</label>
						<input type="text" name="no_telp" class="form-control" required="" value="{{$hotel->typenumber}}{{$hotel->no_telp}}">
					</div>
					<div class="form-group">
						<label class="control-lable">Lokasi</label>
						<input type="text" name="lokasi" class="form-control" required="" value="{{$hotel->lokasi}}" readonly="">
					</div>
					<div class="form-group">
						<label class="control-lable">Artikel</label>
						<div name="artikel" class="col-md-12" required="">{!! $hotel->artikel !!}</div>
					</div>
					<div class="form-group">
						<label class="control-lable">Pict Hotel</label><br>
						<img src="{{ asset('/img/'.$hotel->gambar) }}" width="100" height="100">
					</div>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>
@endsection
@extends('layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row">
			<div class="col-md-12">
			<div class="jumbotron">
		<div class="panel panel-primary">
			<div class="panel-heading">Data Hotel - Edit
			<div class="panel-title pull-right">
			<a href="{{ URL::previous() }}">Kembali</a></div></div>
			<div class="panel-body">
				<form action="{{route('hotel.update', $hotel->id)}}" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_token" value="{{csrf_token()}}">

					<div class="form-group">
						<label class="control-lable">Nama Hotel</label>
						<input type="text" name="name" class="form-control" required="" value="{{$hotel->name}}">
					</div>
					<div class="form-group">
						@php
						$lokasi = App\ObjekWisata::all();
						@endphp
						<label class="control-lable">Objek Wisata</label>
						<select name="lokasi" class="form-control">
							@foreach($lokasi as $data)
							<option value="{{$data->id}}">{{$data->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label class="control-lable">Alamat</label>
						<textarea name="alamat" class="form-control" required="">{{$hotel->alamat}}</textarea>
					</div>
					<div class="form-group">
						<div class="col-md-1"><label class="control-lable">No.Telpon</label></div>
						<div class="col-md-2">
						<select name="typenumber" class="form-control">
							<option value="{{$hotel->typenumber}}">+62</option>
							<option value="{{$hotel->typenumber}}">(022)</option>
						</select>
						</div>
					   <div class="col-md-4">
						<input type="number" name="no_telp" class="form-control" placeholder="No.Telpon" value="{{$hotel->no_telp}}"></div>
					</div>
					<br><br>
					<div class="form-group">
						<label class="control-lable">Artikel</label>
						<textarea name="artikel" class="ckeditor" id="ckedtor" required="">{{$hotel->artikel}}</textarea>
					</div>
					<div class="form-group">
						<label class="control-lable">Pict Hotel</label> <br>
						<img src="{{ asset('/img/'.$hotel->image) }}" width="100" height="100" >
						<input type="file" name="image" class="form-control" required="">
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
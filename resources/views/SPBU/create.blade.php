@extends('layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row">
	<div class="col-md-12">
	<div class="jumbotron">
		<div class="panel panel-primary">
			<div class="panel-heading">Data SPBU
			<div class="panel-title pull-right">
			<a href="{{ URL::previous() }}">Kembali</a></div></div>
			<div class="panel-body">
				<form action="{{route('spbu.store')}}" method="post" enctype="multipart/form-data">
					{{csrf_field()}}

					<div class="form-group">
						<label class="control-lable">Nama SPBU</label>
						<input type="text" name="name" class="form-control" placeholder="Nama SPBU">
					</div>
					<div class="form-group">
						<label class="control-lable">Kode SPBU</label>
						<input type="text" name="kode" class="form-control" placeholder="Kode SPBU">
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
						<input type="text" name="alamat" class="form-control" placeholder="Alamat">
					</div>
					<div class="form-group">
						<label class="control-lable">Jadwal</label>
						<input type="text" name="jadwal" class="form-control" placeholder="Jadwal">
					</div>
					<div class="form-group">
						<label class="control-lable">Gambar SPBU</label>
						<input type="file" name="image" class="form-control" required="" >
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
</div>
@endsection
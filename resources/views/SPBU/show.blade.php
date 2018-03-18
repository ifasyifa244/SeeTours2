@extends('layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row">
	<div class="col-md-12">
	<div class="jumbotron">
		<div class="panel panel-primary">
			<div class="panel-heading">Data SPBU - Detail
			<div class="panel-title pull-right">
			<a href="{{ URL::previous() }}">Kembali</a></div></div>
			<div class="panel-body">
				<form action="{{route('spbu.show', $spbu->id)}}" method="POST">
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_method" value="{{csrf_token()}}">

					<div class="form-group">
						<label class="control-lable">Nama SPBU</label>
						<input type="text" name="name" class="form-control" required="" value="{{$spbu->name}}" readonly="">
					</div>
					<div class="form-group">
						<label class="control-lable">Kode SPBU</label>
						<input type="text" name="kode" class="form-control" required="" value="{{$spbu->kode_spbu}}" readonly="">
					</div>
					<div class="form-group">
						<label class="control-lable">Lokasi</label>
						<input type="text" name="lokasi" class="form-control" required="" value="{{$spbu->lokasi}}" readonly="">
					</div>
					<div class="form-group">
						<label class="control-lable">Alamat</label>
						<input type="text" name="alamat" class="form-control" required="" value="{{$spbu->alamat}}" readonly="">
					</div>
					<div class="form-group">
						<label class="control-lable">Jadwal</label>
						<input type="text" name="jadwal" class="form-control" required="" value="{{$spbu->jadwal}}" readonly="">
					</div>
					<div class="form-group">
						<label class="control-lable">Gambar SPBU</label><br>
						<img src="{{ asset('/img/'.$spbu->gambar) }}" width="100" height="100">
						<input type="text" name="image" class="form-control" required="" value="{{$spbu->gambar}}" 	readonly="">
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>
@endsection
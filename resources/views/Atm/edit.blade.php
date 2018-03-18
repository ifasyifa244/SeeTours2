@extends('layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row">
			<div class="col-md-12">
			<div class="jumbotron">
		<div class="panel panel-primary">
			<div class="panel-heading">Data ATM - Edit
			<div class="panel-title pull-right">
			<a href="{{ URL::previous() }}">Kembali</a></div></div>
			<div class="panel-body">
				<form action="{{route('atm.update', $atm->id)}}" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_token" value="{{csrf_token()}}">

					<div class="form-group">
						<label class="control-lable">Nama ATM</label>
						<input type="text" name="name" class="form-control" required="" value="{{$atm->name}}">
					</div>
					<div class="form-group">
						<label class="control-lable">Kode ATM</label>
						<input type="text" name="kode" class="form-control" required="" value="{{$atm->kode_bank}}">
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
						<input type="text" name="alamat" class="form-control" required="" value="{{$atm->alamat}}">
					</div>
					<div class="form-group">
						<label class="control-lable">Jadwal</label>
						<input type="text" name="jadwal" class="form-control" required="" value="{{$atm->jadwal}}">
					</div>

					<div class="form-group">
						<label class="control-lable">Gambar atm</label> <br>
						<img src="{{ asset('/img/'.$atm->gambar) }}" width="100" height="100" >
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
@extends('layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row">
	<div class="col-md-12">
	<div class="jumbotron">
		<div class="panel panel-primary">
			<div class="panel-heading">Data ATM - Detail
			<div class="panel-title pull-right">
			<a href="{{ URL::previous() }}">Kembali</a></div></div>
			<div class="panel-body">
				<form action="{{route('atm.show', $atm->id)}}" method="POST">
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_method" value="{{csrf_token()}}">

					<div class="form-group">
						<label class="control-lable">Nama ATM</label>
						<input type="text" name="name" class="form-control" required="" value="{{$atm->name}}" readonly="">
					</div>
					<div class="form-group">
						<label class="control-lable">Kode BANK</label>
						<input type="text" name="kode" class="form-control" required="" value="{{$atm->kode_bank}}" readonly="">
					</div>
					<div class="form-group">
						<label class="control-lable">Lokasi</label>
						<input type="text" name="lokasi" class="form-control" required="" value="{{$atm->lokasi}}" readonly="">
					</div>
					<div class="form-group">
						<label class="control-lable">Alamat</label>
						<input type="text" name="alamat" class="form-control" required="" value="{{$atm->alamat}}" readonly="">
					</div>
					<div class="form-group">
						<label class="control-lable">Jadwal</label>
						<input type="text" name="jadwal" class="form-control" required="" value="{{$atm->jadwal}}" readonly="">
					</div>
					<div class="form-group">
						<label class="control-lable">Gambar atm</label><br>
						<img src="{{ asset('/img/'.$atm->gambar) }}" width="100" height="100">
						<input type="text" name="image" class="form-control" required="" value="{{$atm->gambar}}" 	readonly="">
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>
@endsection
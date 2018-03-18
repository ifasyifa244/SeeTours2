@extends('layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row">
	<div class="col-md-12">
	<div class="jumbotron">
		<div class="panel panel-primary">
			<div class="panel-heading">Data Pesan - Detail
			<div class="panel-title pull-right">
			<a href="{{ URL::previous() }}">Kembali</a></div></div>	
			<div class="panel-body">
				<form action="{{route('kontaks.show', $kontak->id)}}" method="POST">
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_method" value="{{csrf_token()}}">
				<div class="form-group">
						<label class="control-lable">Nama Pengirim  </label>
						<input type="text" name="nama" class="form-control" required="" value="{{$kontak->name}}" readonly="">
					</div>
					<div class="form-group">
						<label class="control-lable">Email </label>
						<input type="text" name="email" class="form-control" required="" value="{{$kontak->email}}" readonly="">
					<div class="form-group">
						<label class="control-lable">No.Telpon</label>
						<input type="text" name="no_telp" class="form-control" required="" value="{{$kontak->no_telp}}">
					</div>
					</div>
					<div class="form-group">
						<label class="control-lable">Pesan </label>
						<textarea name="pesan" class="form-control" required="">{{$kontak->pesan}}</textarea>
					</div>
			</div>
			</div>
		</div>
		</div>
	</div>
</div>
@endsection
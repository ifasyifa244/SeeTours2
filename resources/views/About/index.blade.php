@extends('layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row">
<<<<<<< HEAD:resources/views/About/index.blade.php
	<div class="col-md-12">
	<div class="jumbotron">
=======
	<div class="col-md-3">
		<!--nav-->
				@include('layouts.nav')
			<!--end nav-->
	</div>
	<div class="col-md-9">

>>>>>>> 51d53574806a4f0a4873213ff106f23d91444836:resources/views/Jasa/index.blade.php
		<div class="panel panel-primary">
			<div class="panel-heading">Data Profil
			<div class="panel-title pull-right"><a href="/admin/about/create">+Tambah Data</a></div></div>
			<div class="panel-body">
				<table class="table">
					<thead>
						<tr>
<<<<<<< HEAD:resources/views/About/index.blade.php
							<th>See Tours</th>
							<th colspan="3"><center>Aksi</center></th>
=======
							<th>Jenis Jasa</th>
							<th>Harga</th>
							<th colspan="2"><center>Aksi</center></th>
>>>>>>> 51d53574806a4f0a4873213ff106f23d91444836:resources/views/Jasa/index.blade.php
						</tr>
					</thead>
					<tbody>
						@foreach($about as $data)
						<tr>
<<<<<<< HEAD:resources/views/About/index.blade.php
							<td>{!!str_limit($data->konten,300)!!}</td>
							<td>
								<a class="btn btn-success" href="/admin/about/{{$data->id}}/edit"><i class="fa fa-btn fa-edit"></i> Edit</a>
							</td>
							<td>
								<a class="btn btn-primary" href="/admin/about/{{$data->id}}"><i class="fa fa-btn fa-info-circle"></i> Show</a>
=======
							<td>{{$data->nama}}</td>
							<td>Rp.{{$data->harga}}</td>
							<td><center>
								<a class="btn btn-success" href="/jasa/{{$data->id}}/edit"><i class="fa fa-btn fa-edit"></i>Edit</a></center>
>>>>>>> 51d53574806a4f0a4873213ff106f23d91444836:resources/views/Jasa/index.blade.php
							</td>
							<td>
								<form action="{{route('about.destroy', $data->id)}}" method="POST">
									<input type="hidden" name="_method" value="DELETE">
									<input type="hidden" name="_token">
									<center><input type="submit" class="btn btn-danger" value="Delete"></center>
									{{csrf_field()}}
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			</div>
		</div>
		</div>
	</div>
</div>
@endsection
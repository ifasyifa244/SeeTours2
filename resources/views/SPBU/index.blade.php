@extends('layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row">
	<div class="col-md-12">
	<div class="jumbotron">
		@php
		$lokasi = App\ObjekWisata::all();
		@endphp
		<form method="post" action="{{url('/admin/spbus')}}">
			{{csrf_field()}}
		<div class="col-md-5">
		<select name="lokasi" class="form-control">
			@foreach($lokasi as $data)
			<option value="{{$data->id}}">{{$data->name}}</option>
			@endforeach
		</select>
		</div>
		<div class="col-md-2">
			<input type="submit" class="btn btn-primary" value="Cari">
		</div>
		</form>
		<br><br><br><br>
		<div class="panel panel-success">
			<div class="panel-heading">Data SPBU
			<div class="panel-title pull-right"><a href="/admin/spbu/create">+Tambah Data</a></div></div>
			<div class="panel-body">
				<table class="table">
					<thead>
						<tr>
							<th>Nama</th>
							<th>Kode SPBU</th>
							<th>Objek Wisata</th>
							<th>Alamat</th>
							<th>Jadwal</th>
							<th>Gambar</th>
							<th colspan="3"><center>Aksi</center></th>
						</tr>
					</thead>
					<tbody>
						@foreach($spbu as $data)
						<tr>
							<td>{{$data->name}}</td>
							<td>{{$data->kode_spbu}}</td>
							<td>{{$data->nama}}</td>
							<td>{{$data->alamat}}</td>
							<td>{{$data->jadwal}}</td>
							<td><center><img src="{{ asset('/img/'.$data->gambar) }}" style="height: 30px; width: 30px"></center></td>
							<td>
								<a class="btn btn-success" href="/admin/spbu/{{$data->id}}/edit"><i class="fa fa-btn fa-edit"></i> Edit</a>
							</td>
							<td>
								<a class="btn btn-primary" href="/admin/spbu/{{$data->id}}"><i class="fa fa-btn fa-info-circle"></i> Show</a>
							</td>
							<td>
								<form action="{{route('spbu.destroy', $data->id)}}" method="POST">
									<input type="hidden" name="_method" value="DELETE">
									<input type="hidden" name="_token">
									<input type="submit" class="btn btn-danger" value="Delete">
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
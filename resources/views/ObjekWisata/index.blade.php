@extends('layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row">
	<div class="col-md-12">
	<div class="jumbotron">
		<a href="{{url('admin/objekwisatas',1)}}" class="btn btn-success">Kota</a>
		<a href="{{url('admin/objekwisatas',2)}}" class="btn btn-success">Kabupaten</a>
		<br><br>
		<div class="panel panel-success">
			<div class="panel-heading">Data Objek Wisata
			<div class="panel-title pull-right"><a href="/admin/objekwisata/create">+Tambah Data</a></div></div>
			<div class="panel-body">
				<table class="table">
					<thead>
						<tr>
							<th>Nama Objek Wisata</th>
							<th>Lokasi</th>
							<th>Jadwal</th>
							<th>Kategori</th>
							<th>Gambar</th>
							<th colspan="3"><center>Aksi</center></th>
						</tr>
					</thead>
					<tbody>
						@foreach($objekwisata as $data)
						<tr>
							<td>{{$data->name}}</td>
							<td>{{$data->lokasi}}</td>
							<td>{{$data->jadwal}}</td>
							<td>{{$data->nama_kategori}}</td>
							<td><center><img src="{{ asset('/img/'.$data->gambar) }}" style="height: 30px; width: 30px"></center></td>
							<td>
								<a class="btn btn-success" href="/admin/objekwisata/{{$data->id}}/edit"><i class="fa fa-btn fa-edit"></i> Edit</a>
							</td>
							<td>
								<a class="btn btn-primary" href="/admin/objekwisata/{{$data->id}}"><i class="fa fa-btn fa-info-circle"></i> Show</a>
							</td>
							<td>
								<form action="{{route('objekwisata.destroy', $data->id)}}" method="POST">
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
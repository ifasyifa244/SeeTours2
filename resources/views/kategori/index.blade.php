@extends('layouts.master')
@section('content')
<div class="container-fluid">
	<div class="col-md-12">
		<div class="panel panel-success">
			<div class="panel-heading">Data Kategori
			<div class="panel-title pull-right"><a href="/admin/kategori/create">+Tambah Data</a></div></div>
			<div class="panel-body">
				<table class="table">
					<thead>
						<tr>
							<th>Nama Kategori</th>
							<th colspan="3"><center>Aksi</center></th>
						</tr>
					</thead>
					<tbody>
						@foreach($kategori as $data)
						<tr>
							<td>{{$data->nama_kategori}}</td>
							<td>
								<a class="btn btn-success" href="/admin/kategori/{{$data->id}}/edit"><i class="fa fa-btn fa-edit"></i> Edit</a>
							</td>
							<td>
								<a class="btn btn-primary" href="/admin/kategori/{{$data->id}}"><i class="fa fa-btn fa-info-circle"></i> Show</a>
							</td>
							<td>
								<form action="{{route('kategori.destroy', $data->id)}}" method="POST">
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
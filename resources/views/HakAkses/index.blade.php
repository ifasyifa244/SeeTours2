@extends('layouts.master')
@section('content')
<div class="container-fluid">
	<div class="col-md-12">
		<div class="panel panel-success">
			<div class="panel-heading">Data Hak Akses
			<div class="panel-title pull-right"><a href="/admin/hakakses/create">+Tambah Data</a></div></div>
			<div class="panel-body">
				<table class="table">
					<thead>
						<tr>
							<th>Nama Pengakses</th>
							<th>Email</th>
							<th>Password</th>
							<th colspan="3"><center>Aksi</center></th>
						</tr>
					</thead>
					<tbody>
						@foreach($hakakses as $data)
						<tr>
							<td>{{$data->name}}</td>
							<td>{{$data->email}}</td>
							<td>{{$data->password}}</td>
							<td>
								<a class="btn btn-success" href="/admin/hakakses/{{$data->id}}/edit"><i class="fa fa-btn fa-edit"></i> Edit</a>
							</td>
							<td>
								<a class="btn btn-primary" href="/admin/hakakses/{{$data->id}}"><i class="fa fa-btn fa-info-circle"></i> Show</a>
							</td>
							<td>
								<form action="{{route('hakakses.destroy', $data->id)}}" method="POST">
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
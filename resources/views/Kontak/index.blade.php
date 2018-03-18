@extends('layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row">
	<div class="col-md-12">
	<div class="jumbotron">
		<div class="panel panel-primary">
			<div class="panel-heading">Data Pesan</div>	
			<div class="panel-body">
				<table class="table">
					<thead>
						<tr>
							<th>Nama Pengirim </th>
							<th>Email</th>
							<th>No.Telp</th>
							<th>Pesan</th>
							<th colspan="3"><center>Aksi</center></th>
						</tr>
					</thead>
					<tbody>
						@foreach($kontak as $data)
						<tr>
							<td>{{$data->name}}</td>
							<td>{{$data->email}}</td>
							<td>{{$data->no_telp}}</td>
							<td>{!!str_limit($data->pesan,300)!!}</td>
							
							<td>
								<a class="btn btn-primary" href="{{route('kontaks.show',$data->id)}}"><i class="fa fa-btn fa-info-circle"></i> Show</a>
							</td>
							<td>
								<form action="{{route('kontaks.destroy', $data->id)}}" method="POST">
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
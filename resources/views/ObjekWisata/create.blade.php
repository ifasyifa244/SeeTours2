@extends('layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row">
	<div class="col-md-12">
	<div class="jumbotron">
		<div class="panel panel-primary">
			<div class="panel-heading">Data Rumah Makan
			<div class="panel-title pull-right">
			<a href="{{ URL::previous() }}">Kembali</a></div></div>
			<div class="panel-body">
				<form action="{{route('objekwisata.store')}}" method="post" enctype="multipart/form-data">
					{{csrf_field()}}

					<div class="form-group">
						<label class="control-lable">Kategori</label>
						<select name="kategori" class="form-control">
							<option value="1"> Kota</option>
							<option value="2"> Kabupaten</option>
						</select>
					</div>

					<div class="form-group">
						<label class="control-lable">Nama Objek Wisata</label>
						<input type="text" name="name" class="form-control" placeholder="Nama Objek Wisata">
					</div>
					<div class="form-group">
						<label class="control-lable">Lokasi </label>
						<input type="text" name="lokasi" class="form-control" placeholder="Lokasi" required="">
					</div>
					<div class="form-group">
						<label class="control-lable">Jadwal </label>
						<input type="text" name="jadwal" class="form-control" placeholder="Jadwal" required="">
					</div>
					<div class="form-group">
						<label class="control-lable">Artikel</label>
						<textarea name="artikel" class="ckeditor" id="ckedtor" required="" placeholder="Artikel"></textarea>
					</div>
					<div class="form-group">
						<label class="control-lable">Image Objek Wisata</label>
						<input type="file" name="gambar" class="form-control" required="" >
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

	
@extends('layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row">
	<div class="col-md-12">
	<div class="jumbotron">
		<div class="panel panel-primary">
			<div class="panel-heading">Data About - Detail
			<div class="panel-title pull-right">
			<a href="{{ URL::previous() }}">Kembali</a></div></div>
			<div class="panel-body">
				<form action="{{route('about.show', $about->id)}}" method="POST">
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_method" value="{{csrf_token()}}">

					<div class="form-group">
						<label class="control-lable">About See Tours</label>
						<div name="konten" class="col-md-12" required="">{!! $about->konten !!}</div>
					</div>
						
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>
@endsection
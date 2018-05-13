@extends('layouts.master')
@section('content')

<div class="row">
	<div class="col-xs-12">
	<center><h1>Jenis Barang</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Jenis Barang
		<div class="panel-title pull-right"><a href="jenis/create">Tambah Data</a></div></div>
		<div class="panel-body">
			<table class="table">
				<thead>
					<tr>
						<th>Nama Jenis</th>
						<th colspan="3">Action</th>
					</tr>
				</thead>
				<tbody>
				@foreach($jenis as $data)
					<tr>
						<td>{{$data->jenis}}</td>
						<td><a class="btn btn-warning" href="jenis/{{$data->id}}/edit">Edit</a></td>
							<td><form action="{{route('jenis.destroy',$data->id)}}" method="post">
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
@endsection
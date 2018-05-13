@extends('layouts.master')
@section('content')

<div class="row">
	<div class="col-xs-12">
	<center><h1>Supplier</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Supplier
		<div class="panel-title pull-right"><a href="supplier/create">Tambah Data</a></div></div>
		<div class="panel-body">
			<table class="table">
				<thead>
					<tr>
						<th>Nama Supplier</th>
						<th>Alamat</th>
						<th>No Telepon</th>
						<th colspan="3">Action</th>
					</tr>
				</thead>
				<tbody>
				@foreach($supplier as $data)
					<tr>
						<td>{{$data->nama}}</td>
						<td>{{$data->alamat}}</td>
						<td>{{$data->no}}</td>
						<td><a class="btn btn-warning" href="supplier/{{$data->id}}/edit">Edit</a></td>
							<td><form action="{{route('supplier.destroy',$data->id)}}" method="post">
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
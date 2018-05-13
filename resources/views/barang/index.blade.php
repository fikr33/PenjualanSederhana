@extends('layouts.master')
@section('content')

<div class="row">
	<div class="col-xs-12">
	<center><h1>Data Barang</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Data Barang
		<div class="panel-title pull-right"><a href="barang/create">Tambah Data</a></div></div>
		<div class="panel-body">
			{{csrf_field()}}
			<table class="table">
				<thead>
					<tr>
						<th>Gambar</th>
						<th>Merk</th>
						<th>Stok</th>
						<th>Harga Beli</th>
						<th>Harga Jual</th>
						<th>Warna</th>
						<th>Jenis Barang</th>
						<th colspan="3">Action</th>
					</tr>
				</thead>
				<tbody>
				@foreach($barang as $data)
					<tr>
						<td><img src="{{ url('uploadgambar') }}/{{ $data->gambar }}" class="img-responsive"></td>
						<td>{{$data->merk}}</td>
						<td>{{$data->stok}}</td>
						<td>Rp.{{number_format($data->harga_beli)}},-</td>
						<td>Rp.{{number_format($data->harga_jual)}},-</td>
						<td>{{$data->warna}}</td>
						<td>{{$data->jenis}}</td>
						<td><a class="btn btn-warning" href="barang/{{$data->id}}/edit">Edit</a></td>
							<td><form action="{{route('barang.destroy',$data->id)}}" method="post">
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
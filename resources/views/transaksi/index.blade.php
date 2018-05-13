@extends('layouts.master')
@section('content')

<div class="row">
	<div class="col-xs-12">
	<center><h1>Transaksi Penjualan</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Transaksi Penjualan
		<div class="panel-title pull-right"><a href="transaksi/create">Tambah Data</a></div></div>
		<div class="panel-body">
			<table class="table">
				<thead>
					<tr>
						<th>Kode Transaksi</th>
						<th>Merk</th>
						<th>Tanggal Transaksi</th>
						<th>Jumlah</th>
						<th>Total Harga</th>
						<th colspan="2">Action</th>
					</tr>
				</thead>
				<tbody>
				@foreach($transaksi as $data)
					<tr>
						<td>{{$data->kode_transaksi}}</td>
						<td>{{$data->merk}}</td>
						<td>{{$data->tanggal}}</td>
						<td>{{$data->jumlah}}</td>
						<td>Rp.{{number_format($data->total_harga)}},-</td>
						<!-- <td><a class="btn btn-warning" href="transaksi/{{$data->id}}/edit">Edit</a></td> -->
							<td><form action="{{route('transaksi.destroy',$data->id)}}" method="post">
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
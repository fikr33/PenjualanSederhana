@extends('layouts.master')
@section('content')

<div class="row">
	<div class="col-xs-12">
	<center><h1>Laporan</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Laporan
		<div class="panel-title pull-right"></div></div>
		<div class="panel-body">
			{{csrf_field()}}
			<table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Tanggal Awal</th>
						<th>Tanggal Akhir</th>
						<th>Uang Masuk</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$no = 1;
				?>
					@foreach($penjualan as $data)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$a}}</td>
						<td>{{$b}}</td>
						<td>Rp.{{number_format($data->total_harga)}},-</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			Total Uang Masuk Dari Tanggal {{$a}} Sampai {{$b}}: Rp.{{number_format($sum)}},-
		</div>
	</div>
</div>
</div>
@endsection
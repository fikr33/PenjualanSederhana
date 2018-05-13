<!DOCTYPE html>
<html>
<head>
	<title>User list - PDF</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<center><h1>Laporan Uang Masuk</h1></center>
<div class="container">
	<table class="table table-bordered" border="1">
		<thead>
			<tr>
			<th>Tanggal</th>
			<th>Uang Masuk</th>
			</tr>
		</thead>
		<tbody>
			@foreach($user as $data)
			<tr>
				<td>{{ $data->tanggal }}</td>
				<td>Rp.{{ number_format($data->total_harga) }},-</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	Total Uang Masuk Dari Tanggal {{$a}} Sampai {{$b}}: Rp.{{number_format($sum)}},-
</div>
</body>
</html>
@extends('layouts.master')
@section('content')

<div class="row">
	<div class="col-xs-12">
	<center><h1>Laporan</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Laporan
		<div class="panel-title pull-right"></div></div>
		<div class="panel-body">
			<table class="table">
				<form action="{{url('admin/laporan/detail')}}" method="post">
				{{csrf_field()}}
				<div class="form-group">
					<label class="control-lable">Tanggal Awal</label>
					<input type="date" name="a" required="">

					<label class="control-lable">Tanggal Akhir</label>
					<input type="date" name="b" required="">
				</div>
					<input type="submit" name="submit" value="Cetak">
				</form>
			</table>	
		</div>
	</div>
</div> 
</div>
@endsection
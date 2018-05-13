@extends('layouts.master')
@section('content')
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<div class="row">
	<div class="col-xs-12">
	<center><h1>Transaksi</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Transaksi
		<div class="panel-title pull-right"><a href="{{URL::previous()}}">Kembali</a></div></div>

		<div class="panel-body">
			@include('layouts._flash')
			
			@if($errors->any())
			<div class="flash alert-danger">
				@foreach($errors->all() as $err)
					<li><span>{{ $err }}</span></li>
				@endforeach
			</div>
			@endif
			<form action="{{route('transaksi.store')}}" method = "post">
				{{csrf_field()}}

				<div class="table-responsive">
					<table id="item_table" class="table table-bordered">
						<tr id="last">
							<th>Kode Transaksi</th>
							<th>Merk</th>
							<th>Tanggal</th>
							<th>Jumlah</th>
							<th><button type="button" name="add" class="btn btn-succes btn-sm add" onclick="addrow()">Tambah</button></th>
						</tr>
					</table>
					<br>
					<div align="center">
						<input type="submit" name="submit" class="btn btn-info" value="Simpan">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
@endsection

<script>
	function addrow(){
		var no = $('#item_table tr').length;
		var html= '';
		html +='<tr id="row_'+no+'">';
		html +='<td><input type="text" name="kode_transaksi[]" class="form-control kode_transaksi"/></td>'
		html +='<td><select name="id_barang[]" class="form-control">@foreach($barang as $data)<option value="{{$data->id}}">{{$data->merk}}</option>@endforeach</select></td>';
		html +='<td><input type="date" name="tanggal[]" class="form-control tanggal"/></td>'
		html +='<td><input type="text" name="jumlah[]" class="form-control jumlah"/></td>'
		html +='<td><button type="button" class="btn btn-danger btn-sm" onclick="remove('+ no +')"> Hapus</button></td></tr>';
		$('#last').after(html);
	}
	function remove(no){
		$('#row_'+no).remove();
	}
</script>
<!-- <div class="form-group">
					<label class="control-lable">Kode Transaksi</label>
					<input type="text" name="a" class="form-control" required="">
				</div>

				<div class="form-group">
					<label class="control-lable">Merk</label>
					<select class="form-control" name="barang">
					@foreach($barang as $b)
					<option value="{{$b->id}}">{{$b->merk}}</option>
					@endforeach
					</select>
				</div>

				<div class="form-group">
					<label class="control-lable">Tanggal</label>
					<input type="date" name="c" class="form-control" required="">
				</div>

				<div class="form-group">
					<label class="control-lable">Jumlah</label>
					<input type="text" name="e" class="form-control" required="">
				</div> -->
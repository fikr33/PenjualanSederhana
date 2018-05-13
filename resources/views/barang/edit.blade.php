@extends('layouts.master')
@section('content')

<div class="row">
	<div class="col-xs-12">
	<center><h1>Data Sepatu</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Data Sepatu
		<div class="panel-title pull-right"><a href="{{URL::previous()}}">Kembali</a></div></div>

		<div class="panel-body">
			<form action="{{route('barang.update',$barang->id)}}" method = "post">
				<input type="hidden" name="_method" value="PUT">
				<input type="hidden" name="_token" value="{{csrf_token()}}">

				<div>
					<label class="control-lable">Gambar</label>
					<input type="file" name="gambar" class="form-control" value="{{$barang->gambar}}" required="">
				</div>
				<div class="form-group">
					<label class="control-lable">Merk</label>
					<input type="text" name="a" class="form-control" value="{{$barang->merk}}" required="">
				</div>

				<div class="form-group">
					<label class="control-lable">Stok</label>
					<input type="text" name="b" class="form-control" value="{{$barang->stok}}" required="">
				</div>

				<div class="form-group">
					<label class="control-lable">Harga Beli</label>
					<input type="text" name="c" class="form-control" value="{{$barang->harga_beli}}" required="">
				</div>

				<div class="form-group">
					<label class="control-lable">Harga Jual</label>
					<input type="text" name="f" class="form-control" value="{{$barang->harga_jual}}" required="">
				</div>

				<div class="form-group">
					<label class="control-lable">Warna</label>
					<input type="text" name="d" class="form-control" value="{{$barang->warna}}" required="">
				</div>

				<div class="form-group">
					<label class="control-lable">Jenis Barang</label>
					<select class="form-control" name="jenis">
					@foreach($jenis as $b)
					<option value="{{$b->id}}">{{$b->jenis}}</option>
					@endforeach
					</select>
				</div>	
				<div class="form-group">
					<button type="submit" class="btn btn-succes">Simpan</button>
					<button type="reset" class="btn btn-danger">Reset</button>
				</div>
			</form>	
		</div>
	</div>
</div>
</div>
</div>
@endsection
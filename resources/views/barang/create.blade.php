@extends('layouts.master')
@section('content')

<div class="row">
	<div class="col-xs-12">
	<center><h1>Data Barang</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Data Barang
		<div class="panel-title pull-right"><a href="{{URL::previous()}}">Kembali</a></div></div>

		<div class="panel-body">
			<form action="{{route('barang.store')}}" method = "post" files="true" enctype="multipart/form-data">
				{{csrf_field()}}
			 	<div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" id="gambar" name="gambar">
                </div>

				<div class="form-group">
					<label class="control-lable">Merk</label>
					<input type="text" name="a" class="form-control" required="">
				</div>

				<div class="form-group">
					<label class="control-lable">Stok</label>
					<input type="text" name="b" class="form-control" required="">
				</div>

				<div class="form-group">
					<label class="control-lable">Harga Beli</label>
					<input type="text" name="c" class="form-control" required="">
				</div>

				<div class="form-group">
					<label class="control-lable">Harga Jual</label>
					<input type="text" name="f" class="form-control" required="">
				</div>

				<div class="form-group">
					<label class="control-lable">Warna</label>
					<select name="d" class="form-control"><option value="Hitam">Hitam</option>
														<option value="Merah">Merah</option>
														<option value="Biru">Biru</option>
														<option value="Putih">Putih</option>
														<option value="Hijau">Hijau</option></select>
					<!-- <label class="control-lable">Warna</label>
					<input type="text" name="d" class="form-control" required=""> -->
				</div>

				<div class="form-group">
					<label class="control-lable">Jenis</label>
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
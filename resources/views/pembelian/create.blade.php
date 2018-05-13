@extends('layouts.master')
@section('content')

<div class="row">
	<div class="col-xs-12">
	<center><h1>Transaksi Pembelian</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Transaksi Pembelian
		<div class="panel-title pull-right"><a href="{{URL::previous()}}">Kembali</a></div></div>

		<div class="panel-body">
			<form action="{{route('pembelian.store')}}" method = "post">
				{{csrf_field()}}

				<div class="form-group">
					<label class="control-lable">Nama Supplier</label>
					<select class="form-control" name="a">
					@foreach($supplier as $a)
					<option value="{{$a->id}}">{{$a->nama}}</option>
					@endforeach
					</select>
				</div>

				<div class="form-group">
					<label class="control-lable">Merk</label>
					<select class="form-control" name="b">
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
					<label class="control-lable">Harga</label>
					<select class="form-control" name="d">
					@foreach($barang as $d)
					<option value="{{$d->harga_beli}}">{{$d->harga_beli}}</option>
					@endforeach
					</select>
				</div>				

				<div class="form-group">
					<label class="control-lable">Jumlah</label>
					<input type="text" name="e" class="form-control" required="">
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
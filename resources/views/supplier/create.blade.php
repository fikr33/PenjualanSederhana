@extends('layouts.master')
@section('content')

<div class="row">
	<div class="col-xs-12">
	<center><h1>Supplier</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Supplier
		<div class="panel-title pull-right"><a href="{{URL::previous()}}">Kembali</a></div></div>
		<div class="panel-body">

			@if($errors->any())
			<div class="flash alert-danger">
				@foreach($errors->all() as $err)
					<li><span>{{ $err }}</span></li>
				@endforeach
			</div>
			@endif
			<form action="{{route('supplier.store')}}" method = "post">
				{{csrf_field()}}
				<div class="form-group">
					<label class="control-lable">Nama Supplier</label>
					<input type="text" name="a" class="form-control" required="">
				</div>
				<div class="form-group">
					<label class="control-lable">Alamat</label>
					<textarea name="b" class="form-control" required=""></textarea>
				</div>
				<div class="form-group">
					<label class="control-lable">No Telepon</label>
					<input type="text" name="c" class="form-control" required="">
					{!! $errors->first('no','<p class="help-block">:message</p>') !!}
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
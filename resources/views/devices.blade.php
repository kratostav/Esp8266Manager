@extends('layouts.app')

@section('content')
	<div class="container" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Dashboard</div>

					<div class="panel-body">
						@foreach($devices as $d)
							{{$d->MAC}}</br>
							@foreach($d->values as $v)
								{{$v->temperature}} &nbsp {{$v->humidity}} </br>
							@endforeach
						@endforeach

					</div>
				</div>
			</div>
		</div>
@endsection
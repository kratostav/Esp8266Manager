{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('temperature', 'Temperature:') !!}
			{!! Form::text('temperature') !!}
		</li>
		<li>
			{!! Form::label('humidity', 'Humidity:') !!}
			{!! Form::text('humidity') !!}
		</li>
		<li>
			{!! Form::label('did', 'Did:') !!}
			{!! Form::text('did') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}
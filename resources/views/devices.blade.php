{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('MAC', 'MAC:') !!}
			{!! Form::text('MAC') !!}
		</li>
		<li>
			{!! Form::label('Name', 'Name:') !!}
			{!! Form::text('Name') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}
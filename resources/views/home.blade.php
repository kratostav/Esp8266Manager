@extends('layouts.app')

@section('content')
<div class="container" xmlns="http://www.w3.org/1999/html">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Hello {{ Auth::user()->name }}!</br>
                    You are logged in!</br>
                    Your devices:</br></br>
                    Display table here
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @foreach($devices as $d)
                            <div class="row">
                            <div class="col-lg-6 col-md-12 text-center">

                                <h1><a href="/device/{!! $d->id !!}">{!! $d->Name !!}</a></h1>
                                <div id="{!! $d->MAC !!}" style="height: 200px;"></div>
                            </div>
                            <script type="text/javascript">
                                $(function () {
                                    var data = {!! $d->values()->orderby("id","desc")->take(10)->get() !!};

                                    new Morris.Line({

                                        element: '{!! $d->MAC !!}',

                                        data: data,

                                        xkey: 'created_at',
                                        ykeys: ['temperature', 'humidity'],
                                        labels: ['Temperature', 'Humidity'],
                                        resize: true,
                                        lineColors: ['red', 'green'],
                                        fillOpacity: 0.6,
                                        hideHover: 'auto',
                                        behaveLikeLine: true,
                                        pointFillColors:['#ffffff'],
                                        pointStrokeColors: ['black']
                                    });

                                });
                            </script>
                        @endforeach


                    </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
@endsection
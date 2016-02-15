@extends('layouts.app')

@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">

                            <div class="row">


                                <h1 class="text-center">{!! $device->Name !!}</h1>
                                <div id="{!! $device->MAC !!}" style="height: 200px;"></div>
                                <h1 class="text-center">Kummuliert</h1>
                                <h2 class="text-center">Temperatur</h2>
                                <div id="{!! $device->MAC.'AccTem' !!}" style="height: 200px;"></div>
                                <h2 class="text-center">Luftfeuchtigkeit</h2>
                                <div id="{!! $device->MAC.'AccHum' !!}" style="height: 200px;"></div>
                            </div>
                            <script type="text/javascript">
                                $(function () {
                                    var data = {!! $device->values !!};

                                    new Morris.Line({

                                        element: '{!! $device->MAC !!}',

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
                                    data = {!! $device->valuesAcc !!};

                                    new Morris.Line({

                                        element: '{!! $device->MAC.'AccTem' !!}',

                                        data: data,

                                        xkey: 'date',
                                        ykeys: ['minTemp','maxTemp','avgTemp'],
                                        labels: ['MIN Temperature','MAX Temperature','AVG Temperature'],
                                        resize: true,
                                        lineColors: ['blue','red','green'],
                                        fillOpacity: 0.6,
                                        hideHover: 'auto',
                                        behaveLikeLine: true,
                                        pointFillColors:['#ffffff'],
                                        pointStrokeColors: ['black']
                                    });
                                    new Morris.Line({

                                        element: '{!! $device->MAC.'AccHum' !!}',

                                        data: data,

                                        xkey: 'date',
                                        ykeys: ['minHum','maxHum','avgHum'],
                                        labels: ['MIN Luftfeuchte','MAX Luftfeuchte','AVG Luftfeuchte'],
                                        resize: true,
                                        lineColors: ['blue','red','green'],
                                        fillOpacity: 0.6,
                                        hideHover: 'auto',
                                        behaveLikeLine: true,
                                        pointFillColors:['#ffffff'],
                                        pointStrokeColors: ['black']
                                    });
                                });


                            </script>
                        <div>
                            {{ Form::open(['route' => ['device.destroy', $device->id], 'method' => 'delete',"class" => "form-inline"]) }}
                            {{ Form::submit('Delete',["class" => "btn btn-danger"]) }}
                            <a href="{{ route('device.edit',$device->id) }}" class="btn btn-primary">Edit</a>
                            {{ Form::close() }}
                        </div>



                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
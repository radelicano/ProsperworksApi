
@extends('master')
<!DOCTYPE html>
<html>
<title>Home</title>

<body>
{{--@include('layouts.navbar')--}}
@include('layouts.sidebar')

{{--@foreach ($json as $log)--}}
    {{--{{$log->emp_id}}--}}

{{--@endforeach--}}
@foreach($logs as $log)
    {{ $log->hours }}
    {{ $log->employees->name }}
@endforeach
{{--<div class="container">--}}


    {{--<div class="row">--}}
        {{--<div class="col-md-6 col-md-offset-3">--}}



            {{--<table class="table table-striped">--}}
                {{--@foreach($AllNotes as $notes)--}}
                    {{--<tr>--}}
                    {{--<td>{{$notes->details}}</td>--}}
                    {{--<td>{{$notes->id}}</td>--}}
                    {{--</tr>--}}
                {{--@endforeach--}}



            {{--</table>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

</body>

</html>
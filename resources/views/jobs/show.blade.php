@extends('layouts.app')

@section('content')

<h1>{{$job->title}}</h1>

<div>
    {{$job->body}}
</div>
<hr>
<small>Job added on {{$job->created_at}}</small>
<hr>
<div class="page-footer font-small blue pt-4">
    <a href="/jobs" class="btn btn-default  	glyphicon glyphicon-circle-arrow-left ">  Back</a>

<td><a href="/jobs/{{$job->id}}/edit" class="btn btn-secondary glyphicon glyphicon-pencil"></a></td>
<td class="">{!!Form::open(['action'=>['JobsController@destroy', $job->id], 'method'=>'POST', 'class'=>'btn pr-0'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class'=> 'btn btn-danger'])}}
    {!!Form::close()!!}</td>


</div>


@endsection


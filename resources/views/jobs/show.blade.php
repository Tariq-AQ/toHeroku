@extends('layouts.app')

@section('content')

<h1>{{$job->title}}</h1>

<div>
    {{$job->body}}
</div>
<hr>
<small>Job added on {{$job->created_at}}</small>
<hr>
<a href="/jobs/{{$job->id}}/edit" class="btn btn-primary">Edit</a>
<div class="page-footer font-small blue pt-4">
<a href="/jobs" class="btn btn-primary">Go back</a>
</div>
{!!Form::open(['action'=>['JobsController@destroy', $job->id], 'method'=>'POST', 'class'=>'pull-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class'=> 'btn btn-danger'])}}
{!!Form::close()!!}
@endsection


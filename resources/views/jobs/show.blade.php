@extends('layouts.app')

@section('content')

<h1>{{$job->title}}</h1>

<div>
    {{$job->body}}
</div>

<hr>
<small>Added {{$job->created_at->diffForHumans()}}</small>
<hr>
<p><strong>Job Type: </strong> {{$job->job_type}}</p>


<div class="page-footer font-small blue pt-4">
    <a href="/jobs" class="btn btn-default  	glyphicon glyphicon-circle-arrow-left ">  Back</a>
@if(Auth::user()==$job->user) {{-- If the user owns the post then show delete and edit buttons --}}
<td><a href="/jobs/{{$job->id}}/edit" class="btn btn-default glyphicon glyphicon-pencil"></a></td>
<td class="">{!!Form::open(['action'=>['JobsController@destroy', $job->id], 'method'=>'POST', 'class'=>'btn pr-0'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class'=> 'btn btn-danger'])}}
    {!!Form::close()!!}</td>


@endif



</div>


@endsection


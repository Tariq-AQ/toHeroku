@extends('layouts.app')

@section('content')
<h1>Edit Job</h1>
<!--Using Laravel collectives for the forms -->
{!! Form::open(['action'=>['JobsController@update', $job->id], 'method'=>'POST']) !!}
<div class="form-group">
    {{Form::label('title', 'Title')}}
    {{Form::text('title', $job->title, ['class'=>'form-control', 'placeholder'=>'Title'])}}
</div>
<!-- creating the edit form-->
<div class="form-group">
        {{Form::label('body', 'Body')}}
        {{Form::textarea('body',$job->body, ['class'=>'form-control', 'placeholder'=>'Body Text'])}}
    </div>

    <!-- Using POST as the method for 'update' and the following code, we can tell laravel to spoof our put request-->
    {{form::hidden('_method', 'PUT')}}


    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}

@endsection

@extends('layouts.app')

@section('content')
<h1>Edit Job</h1>
{{-- Check if user is logged in before editing --}}

@guest
        @if (Route::has('register'))
        <p class=" text-center "> <a href="/login">Login</a>  or <a href="/register"> Register</a> to add or remove jobs!</p>

        @endif
    @else
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

    <!-- Using POST as the method for 'update' and the following code, we can tell laravel to spoof our put request. Ref - https://www.youtube.com/watch?v=EU7PRmCpx-0&list=PLillGF-RfqbYhQsN5WMXy6VsDMKGadrJ- -->
    {{form::hidden('_method', 'PUT')}}


    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
<br>
{{-- Back takes user back to view template instead of jobs --}}
<a href="{{ URL::previous() }}"> <button class="btn btn-default  	glyphicon glyphicon-circle-arrow-left "> Back</button>
</a>


              </div>
    @endguest




@endsection

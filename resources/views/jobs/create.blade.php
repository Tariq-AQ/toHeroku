@extends('layouts.app')

@section('content')
{{-- Check if user has logged in --}}
@guest

@if (Route::has('register'))
{{-- If the user is not logged in then show them this message --}}
                <p class=" text-center "> Please <a href="/login"><strong>login</strong> </a>  or <a href="/register"><strong>Register</strong> </a>  to add or remove jobs!</p>
  @endif



@else
{{-- If user isw logged in then let them create post --}}
    <h1>Add new job</h1>
    <!--Using Laravel collectives for the forms. Laravel automatically implements CSRF when using laravel forms -->
    {!! Form::open(['action'=>'JobsController@store', 'method'=>'POST']) !!}
    <div class="form-group">
        {{Form::label('title', 'Title')}}<!--The label-->
        {{Form::text('title', '', ['class'=>'form-control', 'placeholder'=>'Title'])}}<!-- the actuall title input area-->
    </div>
    <div class="form-group">
        {{Form::label('jobType', 'Job Type: ')}}
        {{Form::select('jobType',  $jobType, '')}}
    </div>

    <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', '', ['class'=>'form-control', 'placeholder'=>'Body Text'])}}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
    <br>
    <a href="/jobs"> <button class="btn btn-default  	glyphicon glyphicon-circle-arrow-left ">Back</button>
    </a>

@endguest

@endsection



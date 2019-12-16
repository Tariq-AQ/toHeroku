
@extends('layouts.app')
@section('header')

@endsection
@section('content')
    <h1>Jobs</h1>


<link rel="icon" href="{{asset('images/favicon.svg')}}" type="image/svg" sizes="16x16">
    @if(count($job) >0 )

        @include('include.jobLoop')
        <br><br>

<div class="d-flex justify-content-center">
        {{$job->links()}}</span>
</div>
    @else
        <p>No Jobs found</p>
    @endif
@endsection

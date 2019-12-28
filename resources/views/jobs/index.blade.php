
@extends('layouts.app')
@section('header')
<link rel="icon" href="{{asset('images/favicon.svg')}}" type="image/svg" sizes="16x16">
@endsection
@section('content')

    @if(count($jobs) >0 )
    <br><br><br>

    <a href="/jobs/create" class="float-right"><button class="btn btn-primary">Add New Job</button> </a>
    <h1>Jobs</h1>
        @include('include.filters')
        @include('include.jobLoop')
        <br><br>

<div class="d-flex justify-content-center">
        {{$jobs->links()}}</span>
</div>
    @else
        <p>No Jobs found</p>
    @endif
@endsection

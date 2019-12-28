@extends('layouts.app')

@section('content')
@include('include.filters')
<h1>Search Results</h1>

{{-- Counting the matching results and displaying it --}}
    <p>{{$jobs->count()}} Job(s) found for '{{request()->input('query')}}'</p>

{{-- Including the available jobs partial --}}
@include('include.jobLoop')
<a href="/jobs"  class="btn btn-default  	glyphicon glyphicon-circle-arrow-left ">  Back</a>
{{$jobs->links()}}</span>


@endsection

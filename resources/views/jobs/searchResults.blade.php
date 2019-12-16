@extends('layouts.app')

@section('content')
    <h1>Search Results</h1>

{{-- Counting the matching results and displaying it --}}
    <p>{{$job->count()}} Job(s) found for '{{request()->input('query')}}'</p>

{{-- Including the available jobs partial --}}
@include('include.jobLoop')
<a href="/jobs"  class="btn btn-default  	glyphicon glyphicon-circle-arrow-left ">  Back</a>
{{$job->links()}}</span>


@endsection

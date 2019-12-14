@extends('layouts.app')

@section('content')
    <h1>Jobs</h1>



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

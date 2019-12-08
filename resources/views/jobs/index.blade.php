@extends('layouts.app')

@section('content')
    <h1>Jobs</h1>
    @if(count($job) >0 )
        @foreach ($job as $eachJob)
             <div class="card p-3 mt-3 mb-3">
             <h3><a href="/jobs/{{$eachJob->id}}">{{$eachJob->title}}</a></h3>
               <small>Written on {{$eachJob->created_at}}</small>
            </div>
        @endforeach
        {{$job->links()}}
    @else
        <p>No Jobs found</p>
    @endif
@endsection

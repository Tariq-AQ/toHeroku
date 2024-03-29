
{{-- This is the dashboard blade --}}
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Your Jobs</h1>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th>Date</th>
                                <th></th>

                            </tr>
                            @foreach($jobs as $eachJob)
                            <tr>
                            <th><a href="/jobs/{{$eachJob->id}}">{{$eachJob->title}}</a></th>

                                    <td><p>Added on {{$eachJob->created_at}}</p></td>
                                <div class="container">
                                    <td>{!!Form::open(['action'=>['JobsController@destroy', $eachJob->id], 'method'=>'POST', 'class'=>'btn pr-0'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class'=> 'btn btn-danger'])}}
                                        {!!Form::close()!!}</td>


                                        <td><a href="/jobs/{{$eachJob->id}}/edit" class="btn btn-default glyphicon glyphicon-pencil"></a></td>


                                        <td><a href="/jobs/{{$eachJob->id}}/" class="btn btn-default glyphicon glyphicon-eye-open"></a></td>
                                        <td>
                                                <a class="button"
                                                    href="/jobs/{{ $eachJob->id }}/like/">
                                                    <button class="btn btn-default glyphicon glyphicon-thumbs-up"></button>
                                                </a>
                                                <a class="button"
                                                    href="/jobs/{{ $eachJob->id }}/dislike/">
                                                    <button class="btn btn-default glyphicon glyphicon-thumbs-down"></button>
                                                </a>

                                                 <span>{{$eachJob->likes}}</span>
                                              </td>
                                </tr>
                            </div>
                            @endforeach
                        </table>
                    </div>
                        <a href="/jobs/create" class="btn btn-primary">Add a new job</a>



                                </div>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection

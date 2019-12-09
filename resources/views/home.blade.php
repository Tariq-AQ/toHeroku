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
                            <th>{{$eachJob->title}}</th>

                                    <td><p>Added on {{$eachJob->created_at}}</p></td>
                                    <td>{!!Form::open(['action'=>['JobsController@destroy', $eachJob->id], 'method'=>'POST', 'class'=>'pull-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class'=> 'btn btn-danger'])}}
                                        {!!Form::close()!!}</td>
                                        <td><a href="/jobs/{{$eachJob->id}}/edit" class="btn btn-default">Edit</a></td>
                                </tr>
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

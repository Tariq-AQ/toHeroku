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
                </div>
                <a href="/jobs/create" class="btn btn-primary">Add a new job</a>
            </div>

        </div>

    </div>

</div>
@endsection

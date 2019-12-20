
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

{{-- The following  is grabbed from getbootstrap.com --}}
<div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit Post</h4>
        </div>
        <div class="modal-body">
          <p>One fine body&hellip;</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <script type="text/javascript">

    $(document).ready(function () {


        $("#editBtn").on("click", function() {
            $('#edit-modal').modal();
        });


    });

        </script>
@endsection

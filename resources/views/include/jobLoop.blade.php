
@foreach ($job as $eachJob)
        <div class="card p-3 mt-3 mb-3">
             <h3><a href="/jobs/{{$eachJob->id}}">{{$eachJob->title}}</a></h3>
        <small> <strong>Added on </strong> {{$eachJob->created_at}} <br> <strong>By: </strong> {{$eachJob->user->name}}</small>

 {{-- I had to do the delete that way as the one on the VLE didn't work for me for some reason.
             Ref - Traversy Media
             Youtube.com
             Published : June 2017
             Retrieved : December 2019
             https://www.youtube.com/watch?v=PAP8IS_ak6w&list=PLillGF-RfqbYhQsN5WMXy6VsDMKGadrJ-&index=9&t=0s
             --}}
        <div>
            @if(Auth::user()== $eachJob->user ) <!--Only show delete button if the user owns the post-->
            <td>{!!Form::open(['action'=>['JobsController@destroy', $eachJob->id], 'method'=>'POST', 'class'=>'btn pr-0'])!!}
                {{Form::hidden('_method', 'DELETE')}}<!--Setting the method-->
                {{Form::submit('Delete', ['class'=> 'btn btn-danger'])}}<!--Setting name and style for the delete button-->
            {!!Form::close()!!}</td>

            @endif

{{-- End of ref --}}



                <td>
                    <a href="/jobs/{{$eachJob->id}}/" class="btn btn-default glyphicon glyphicon-eye-open"></a>
                </td>
                    <a class="button" href="/jobs/{{ $eachJob->id }}/like/">
                        <button class="btn btn-default glyphicon glyphicon-thumbs-up "></button>
                    </a>

                    <a class="button" href="/jobs/{{ $eachJob->id }}/dislike/">
                        <button class="btn btn-default glyphicon glyphicon-thumbs-down "></button>
                    </a>
                        <span>{{$eachJob->likes}}</span>




        </div>

        </div>


        @endforeach

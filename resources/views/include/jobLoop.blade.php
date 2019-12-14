
@foreach ($job as $eachJob)
             <div class="card p-3 mt-3 mb-3">
             <h3><a href="/jobs/{{$eachJob->id}}">{{$eachJob->title}}</a></h3>
               <small>Added on {{$eachJob->created_at}}</small>
               <div>
 {{-- I had to do the delete that way as the one on the VLE didn't work for me for some reason.
             Ref - traversymedia.com --}}
             <td>{!!Form::open(['action'=>['JobsController@destroy', $eachJob->id], 'method'=>'POST', 'class'=>'btn pr-0'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class'=> 'btn btn-danger'])}}
                {!!Form::close()!!}</td>

                <td><a href="/jobs/{{$eachJob->id}}/" class="btn btn-secondary glyphicon glyphicon-eye-open"></a></td>

                <td class="border border-dark">
                        <a class="button"
                            href="/jobs/{{ $eachJob->id }}/like/">
                            <button class="btn btn-secondary glyphicon glyphicon-thumbs-up"></button>
                        </a>


                        <a class="button"
                            href="/jobs/{{ $eachJob->id }}/dislike/">
                            <button class="btn btn-secondary glyphicon glyphicon-thumbs-down"></button>

                        </a><span>{{$eachJob->likes}}</span>

                      </td>


               </div>

            </div>


        @endforeach

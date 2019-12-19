@extends('layouts.app')

@section('content')


{{-- Check if user has logged in --}}
    @guest
@if (Route::has('register'))
{{-- If the user is not logged in then show them this message --}}
                <p class=" text-center ">You're browsing the page as a guest </p>






                @endif
@else


@endguest






@endsection

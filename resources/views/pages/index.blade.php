@extends('layouts.app')




@section('content')
    <div class="jumbotron text-center">


    {{-- <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> --}}
    {{-- <a class="btn btn-success btn-lg" htef="/register" role="button">Register</a> </p> --}}
    <ul class="navbar-nav ml-auto ">
            <!-- Authentication Links -->
            @guest
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li> --}}
                @if (Route::has('register'))
                <p class=" text-center "> Login or Register to add or remove jobs!</p>




                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li> --}}
                @endif
            @else
                 <p class="jumbotron text-center">Welcome {{ Auth::user()->name }}!</p>
                 @include('include.jobSlideShow')

                      </div>
            @endguest
        </ul>
@endsection

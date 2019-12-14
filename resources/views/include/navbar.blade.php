<!--Some of the navbar elements were grabbed from getbootstrap.com -->

      <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'JobShare') }}
                </a>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <ul class="navbar-nav mr-auto">
                            <li class="nav-item ">
                              <a class="nav-link" href="/">Lounge <span class="sr-only">(current)</span></a>
                            </li>

                            <li class="nav-item">
                                    <a class="nav-link" href="/jobs">Jobs</a>
                                  </li>

                            <li class="nav-item">
                              <a class="nav-link" href="/services">Services</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="/about">About</a>
                                  </li>




                            {{-- Search feature --}}
                          </ul>
                          <form action="{{route('search')}}" method="GET" class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search" name="query" id="query" aria-label="Search" value="{{request()->input('query')}}">
                                <span><button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button></span>
                              </form>
                              {{-- End of search --}}





                              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                              </button>


                              <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                              </div>
                              <a href="/jobs/create"><button class="btn btn-primary">Add New Job</button> </a>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                             <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/home">Dashboard</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                </div>
                            </li>

                                  </div>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

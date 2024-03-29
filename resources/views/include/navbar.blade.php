<!--Some of the navbar elements were grabbed from getbootstrap.com -->



                <header>
                    <!-- Fixed navbar -->
                    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                        <a class="navbar-brand" href="{{ url('/jobs') }}">
                            {{ config('app.name', 'JobShare') }}
                        </a>
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item ">
                              <a class="nav-link" href="/">Lounge</a>
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
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav float-right" id="rightNav">

                        <form action="{{route('search')}}" method="GET" class="form-inline mt-2 mt-md-0">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search" name="query" id="query" aria-label="Search" value="{{request()->input('query')}}">
                            <button class="btn btn-outline-success my-2 my-sm-0 glyphicon glyphicon-search" type="submit"></button>
                          </form>


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
                    </nav>
                  </header>



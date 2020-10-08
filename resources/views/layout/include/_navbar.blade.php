<nav class="navbar navbar-default navbar-fixed-top">
<div class="brand">
	<img src="{{asset('admin/assets/img/BSM.jpeg')}}" height="15" width="150"alt=" Logo" class="img-responsive logo">
	</div>
		<div class="container-fluid">
			<div id="navbar-menu">
				<ul class="nav navbar-nav navbar-right">
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
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                    <img src="{{asset('admin/assets/img/index.png')}}" height="22" width="22" class="img-circle" alt="Avatar">
                    {{ Auth::user()->name }} <span class="caret"></span></a>
					<ul class="dropdown-menu">

                    @if(auth()->user()->role != 'admin')
					<li><a href="/profil"><i class="lnr lnr-user"></i> <span>Profil Saya</span></a></li> 
                    				
                  
                    @endif                                 
                    
                    <li><a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i class="lnr lnr-exit" ></i> <span>Logout</span></a></li>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					


                                    @csrf
                                </form>    
                        </ul>
						</li>

                        @endguest
						
						
					</ul>
				</div>
			</div>
		</nav>
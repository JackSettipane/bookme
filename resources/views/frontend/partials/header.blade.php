<!-- Navigation Bar-->
<header id="topnav" class="defaultscroll scroll-active">
	<!-- Tagline STart -->
	<div class="tagline">
		<div class="container">
			<div class="float-left"> </div>
			<div class="float-right">
				<div class="email text-white"> 
				    @guest 
				        <a href="{{route('login')}}">Login</a> / <a href="{{route('register')}}">Register</a> 
				    @endguest 
				    @auth
					<div class="dropdown nav-account-bar">
						<button class="p-0 btn btn-secondary p-0 dropdown-toggle d-inline-block bg-transparent border-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{auth()->user()->full_name}} </button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> <a class="dropdown-item" href="{{route('account.profile')}}">Profile</a> <a class="dropdown-item" href="{{route('chat.index')}}">Chat</a> <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();

                                        document.getElementById('logout-form').submit();">

                           {{ __('Logout') }}

                          </a> </div>
					</div>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form> 
					@endauth 
					</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- Tagline End -->
	<!-- Menu Start -->
	<div class="container">
		<!-- Logo container-->
		<div>
			<a href="{{url('/')}}" class="logo"> <img src="{{url('/assets/theme/images/logo-dark.png')}}" alt="" class="logo-light" height="50" /> <img src="{{url('/assets/theme/images/logo-dark.png')}}" alt="" class="logo-dark" height="50" /> </a>
		</div>
		<!-- End Logo container-->
		<div class="menu-extras">
			<div class="menu-item">
				<!-- Mobile menu toggle-->
				<a class="navbar-toggle">
					<div class="lines"> <span></span> <span></span> <span></span> </div>
				</a>
				<!-- End mobile menu toggle-->
			</div>
		</div>
		<div id="navigation">
			<!-- Navigation Menu-->
			<ul class="navigation-menu">
				<li><a href="{{url('/')}}">Home</a></li>
				<li><a href="#">About Us</a></li>
				<li><a href="{{route('categories.list')}}">Categories</a></li>
				<li><a href="{{route('celebrity.list')}}">Celebrities</a></li>
				<li> <a href="contact.html">contact</a> </li>
				<li class="ml-auto">
					<div class="form-group has-search mt-3"> <span class="fa fa-search form-control-feedback"></span>
						<input type="text" class="form-control" placeholder="Search"> </div>
				</li>
			</ul>
			<!--end navigation menu-->
		</div>
		<!--end navigation-->
	</div>
	<!--end container-->
	<!--end end-->
</header>
<!--end header-->
<!-- Navbar End -->
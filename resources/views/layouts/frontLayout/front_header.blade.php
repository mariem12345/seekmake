<?php use App\Http\Controllers\Controller;
$mainCategories =  Controller::mainCategories();
?>
<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +216 93 470 614</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> seekmake.co@gmail.com</a></li>


							</ul>
						</div>
					</div>
					

					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="https://www.facebook.com/seekmake.co/?modal=admin_todo_tour" target="blank"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://www.instagram.com/SEEKMAKE.CO/" target="blank"><i class="fa fa-instagram"></i></a></li>
								<li><a href="https://www.linkedin.com/company/seekmake-co/" target="blank"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="https://www.youtube.com/watch?v=F6bltj09paM&t=1s" target="blank"><i class="fa fa-youtube"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{ url('./')}}"><img src="{{ asset('images/frontend_images/home/logo.png') }}" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							<div class="btn-group">
								
					<ul>
								
								
								<a href="http://seekmake.com/" target="blank"><img src="{{ asset('images/frontend_images/home/logo1.png') }}" alt="" /></a>

							</ul>
							
							
							</div>
						</div>
					</div>
			
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								
								
								<li><a href="{{ url('/cart') }}"><i class="fa fa-shopping-cart"></i> Panier</a></li>
								@if(empty(Auth::check()))
									<li><a href="{{ url('/login-register') }}"><i class="fa fa-lock"></i> Se Connecter</a></li>
								@else
									<li><a href="{{ url('/account') }}"><i class="fa fa-user"></i> Compte</a></li>
									<li><a href="{{ url('/user-logout') }}"><i class="fa fa-sign-out"></i> se déconnecter </a></li>
								@endif
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{ url('./')}}" class="active">Acceuil</a></li>
								<li class="dropdown"><a href="#">Boutique<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                    	@foreach($mainCategories as $cat)
                                        	<li><a href="{{ asset('products/'.$cat->url) }}">{{ $cat->name }}</a></li>
										@endforeach
                                    </ul>
                                </li> 
								
								
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<form action="{{ url('/search-products') }}" method="post">{{ csrf_field() }} 
								<input type="text" placeholder="Chercher Produit" name="product" />
								<button type="submit" style="border:0px; height:33px; margin-left:-3px">Rechercher</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Découvrir & Réserver
Les meilleurs restaurants au meilleur prix">
    <meta name="author" content="Ansonika">

	<title>TechnoResto - @yield('title')</title>
    <!-- Favicons-->
    <link rel="shortcut icon" href="/front-end/img/logo.png" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="/front-end/img/logo.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="/front-end/img/logo.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="/front-end/img/logo.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="/front-end/img/logo.png">

     <!-- GOOGLE WEB FONT -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="anonymous">
    <link rel="preload" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&amp;display=swap" as="fetch" crossorigin="anonymous">
    <script type="text/javascript">
    !function(e,n,t){"use strict";var o="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&amp;display=swap",r="__3perf_googleFonts_c2536";function c(e){(n.head||n.body).appendChild(e)}function a(){var e=n.createElement("link");e.href=o,e.rel="stylesheet",c(e)}function f(e){if(!n.getElementById(r)){var t=n.createElement("style");t.id=r,c(t)}n.getElementById(r).innerHTML=e}e.FontFace&&e.FontFace.prototype.hasOwnProperty("display")?(t[r]&&f(t[r]),fetch(o).then(function(e){return e.text()}).then(function(e){return e.replace(/@font-face {/g,"@font-face{font-display:swap;")}).then(function(e){return t[r]=e}).then(f).catch(a)):a()}(window,document,localStorage);
    </script>

    <!-- BASE CSS -->
    <link href="/front-end/css/bootstrap.min.css" rel="stylesheet">
    <link href="/front-end/css/style.css" rel="stylesheet">
    <link href="/front-end/css/all.css" rel="stylesheet">
	<link href="/front-end\icon\css\all.css" rel="stylesheet">
    <link href="/front-end/icon/js/all.js" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- SPECIFIC CSS -->
    <link href="/front-end/css/home.css" rel="stylesheet">

    <!-- ALTERNATIVE COLORS CSS -->
	<link href="#" id="colors" rel="stylesheet">

</head>

<body>
				
	<header class="header clearfix element_to_stick">
		<div class="container">
		<div id="logo">
			<a href="/">
<img src="/front-end/img/logo6.png" width="200" height="80" alt="" class="logo_normal">			
	<img src="/front-end/img/logo.png" width="40" height="35" alt="" class="logo_sticky">
<h4  class="logo_sticky" class="brand-text" style="padding-left: 6px; color:rgb(249 0 23 / 85%);">TechnoResto</h4>
			</a>
		</div>
		<ul id="top_menu">
		
			<li><a href="" class="wishlist_bt_top" title="Your wishlist">Your wishlist</a></li>
		</ul>
		<!-- /top_menu -->
		<a href="#0" class="open_close">
			<i class="icon_menu"></i><span>Menu</span>
		</a>
<nav class="main-menu">
			<div id="header_menu">
				<a href="#0" class="open_close">
					<i class="icon_close"></i><span>Menu</span>
				</a>
				<a href="index.html"><img src="/front-end/img/logo.png" width="140" height="35" alt=""></a>
			</div>
			<ul>
				<li class="submenu">
					<a href="#0" class="show-submenu">Acceuil</a>
					
				</li>
				<li class="submenu">
					<a href="/restaurant" class="show-submenu">Restaurant</a>
					
				</li>
				<li class="submenu">
					<a href="#0" class="show-submenu">Espace proffessionel</a>
						
						{{-- Client --}}
						@if ($users == 0)
						<ul>
						<li><a href="/restaurant/demande">Demande Restaurant</a></li>
						<li><a href="/livreur/demande">Demande Livreur</a></li>
						</ul>
						
						{{-- restaurant --}}
						@elseif ($users == 1)
						<ul>
						<li><a href="/restaurant/demande">Demande Restaurant</a></li>
						<li><a href="/restaurant/commande">Commandes</a></li>
						<li><a href="/restaurant/historique">Historique de Commande</a></li>
						<li><a href="/restaurant/liste">Gestion de menu</a></li>
						</ul>

						{{-- livreur --}}
						@elseif ($users == 2)
						<ul>
						<li><a href="/livreur/commande">Commandes</a></li>
						<li><a href="/livreur/commande-acceptées">Commandes acceptées</a></li>

						</ul>
						@endif
						
				
						

						
					
				</li>
				<li><a href="">à Propos</a></li>
						
				<li><a href="/mes-achats">Mes achats</a></li>
				<li><a href="/panier">panier <span style="color:red" class="counter-number">{{@$cartcnt}}</span>
				</a> </li>
				
				@if (!Auth::check())
				<li><a href="/login">S'identifier</a></li>
				<li><a href="/register">S'enregistrer</a></li>	
				@endif

				@if (Auth::check())
				<li>       <form method="POST" action="{{ route('logout') }}">
					@csrf
					<x-jet-responsive-nav-link href="{{ route('logout') }}"
									>
					<button style="border: none; background-color:inherit">	{{ __('Logout') }} </button>
					</x-jet-responsive-nav-link>
					</form> 
				</li>
				@endif	

			
				{{-- <li>
				<a class="action showcart" href="/panier" data-bind="scope: 'minicart_content'">
					<span class="text"> Panier</span>
					<span class="counter qty empty" data-bind="css: { empty: !!getCartParam('summary_count') == false }, blockLoader: isLoading">

						<!-- ko if: getCartParam('summary_count') -->
						<span class="counter-number">
							<!-- ko text: getCartParam('summary_count') -->
							<!-- /ko -->
						</span>
						<!-- /ko -->

						<!-- ko ifnot: getCartParam('summary_count') -->
						<span class="counter-number">{{@$cartcnt}}</span>
						<!-- /ko -->

						<span class="counter-label">
						   
						</span>
					</span>
				</li> --}}


		</nav>
	</div>

	</header>
	<!-- /header -->
	

	@yield('content')
	@yield('script')



		<!-- /footer -->

	<footer>
		@foreach ($parametres as $parametre)

		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h3 data-bs-target="#collapse_1">Quick Links</h3>
					<div class="collapse dont-collapse-sm links" id="collapse_1">
						<ul>
							<li><a href="/restaurant">Commander Maintenant !</a></li>
							<li><a href="/restaurant/demande">ajouter votre restaurant</a></li>
							<li><a href="">Help</a></li>
							<li><a href="/login">s'inscrire</a></li>
							<li><a href="/register">s'enregistrer</a></li>
							<li><a href="">Contacts</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3 data-bs-target="#collapse_2">Categories</h3>
					<div class="collapse dont-collapse-sm links" id="collapse_2">
						<ul>
							<li><a href="/category">Top Categories</a></li>
							<li><a href="grid-listing-filterscol-full-masonry.html">Best Rated</a></li>
							<li><a href="grid-listing-filterscol-full-width.html">Best Price</a></li>
							<li><a href="grid-listing-filterscol-full-masonry.html">Latest Submissions</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
						<h3 data-bs-target="#collapse_3">Contacts</h3>
					<div class="collapse dont-collapse-sm contacts" id="collapse_3">
						<ul>
							<li><i class="icon_house_alt"></i>{{$parametre->adresse}}</li>
							<li><i class="icon_mobile"></i>{{$parametre->num_tel}}</li>
							<li><i class="icon_mail_alt"></i>{{$parametre->email}}</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
						<h3 data-bs-target="#collapse_4">Keep in touch</h3>
					<div class="collapse dont-collapse-sm" id="collapse_4">
						<div id="newsletter">
							<div id="message-newsletter"></div>
								<div class="form-group">
									<input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">
									<button type="submit" id="submit-newsletter"><i class="arrow_carrot-right"></i></button>
								</div>
							</form>
						</div>
						<div class="follow_us">
							<h5>Follow Us</h5>
							<ul>
									
								<li><a href="/{{$parametre->twitter}}"><img  src="/front-end/img/twitter.png" alt="" class="lazy"></a></li>
								<li><a href="{{$parametre->facebook}}"><img  src="/front-end/img/facebook.png" alt="" class="lazy"></a></li>
								<li><a href="{{$parametre->instagram}}"><img  src="/front-end/img/instagram.png" alt="" class="lazy"></a></li>
								<li><a href="/{{$parametre->linkedin}}"><img  src="/front-end/img/linkedin.png" alt="" class="lazy"></a></li>
									</ul>
							@endforeach

						</div>
					</div>
				</div>
			</div>
			<!-- /row-->
			<hr>
			
		</div>
	</footer>
	<!--/footer-->

	<div id="toTop"></div><!-- Back to top button -->
	
	<div class="layer"></div><!-- Opacity Mask Menu Mobile -->
	
	<!-- Sign In Modal -->
	<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">
		<div class="modal_header">
			<h3>Sign In</h3>
		</div>
		<form>
			<div class="sign-in-wrapper">
				<a href="#0" class="social_bt facebook">Login with Facebook</a>
				<a href="#0" class="social_bt google">Login with Google</a>
				<div class="divider"><span>Or</span></div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" name="email" id="email">
					<i class="icon_mail_alt"></i>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password" id="password" value="">
					<i class="icon_lock_alt"></i>
				</div>
				<div class="clearfix add_bottom_15">
					<div class="checkboxes float-start">
						<label class="container_check">Remember me
						  <input type="checkbox">
						  <span class="checkmark"></span>
						</label>
					</div>
					<div class="float-end"><a id="forgot" href="javascript:void(0);">Forgot Password?</a></div>
				</div>
				<div class="text-center">
					<input type="submit" value="Log In" class="btn_1 full-width mb_5">
					Don’t have an account? <a href="account.html">Sign up</a>
				</div>
				<div id="forgot_pw">
					<div class="form-group">
						<label>Please confirm login email below</label>
						<input type="email" class="form-control" name="email_forgot" id="email_forgot">
						<i class="icon_mail_alt"></i>
					</div>
					<p>You will receive an email containing a link allowing you to reset your password to a new preferred one.</p>
					<div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
				</div>
			</div>
		</form>
		<!--form -->
	</div>
	<!-- /Sign In Modal -->
	
	<!-- COMMON SCRIPTS -->
    <script src="/front-end/js/common_scripts.min.js"></script>
    <script src="/front-end/js/common_func.js"></script>
    <script src="/front-end/assets/validate.js"></script>

    

</body>

</html>
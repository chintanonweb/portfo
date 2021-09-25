	<!-- Navbar -->
	<nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
		<div class="container-fluid">
			<a class="navbar-brand" href="/">
				<img src="/assets/img/logo.svg" alt="Stream UI Kit" style="width: 100px;">
			</a>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo"
				aria-controls="navbarTogglerDemo" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarTogglerDemo">
				<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
					<li class="nav-item mr-4 mb-2 mb-lg-0">
						<a class="nav-link <?php if(isset($home)){echo $home;} ?>" href="/">Home</a>
					</li>
					<li class="nav-item mr-4 mb-2 mb-lg-0">
						<a class="nav-link <?php if(isset($about)){echo $about;} ?>" href="/about">About</a>
					</li>
					<li class="nav-item mr-4 mb-2 mb-lg-0">
						<a class="nav-link <?php if(isset($contact)){echo $contact;} ?>" href="/contact">Contact</a>
					</li>
					<li class="nav-item mr-4 mb-2 mb-lg-0">
						<a class="nav-link <?php if(isset($faqs)){echo $faqs;} ?>" href="/faqs">FAQs</a>
					</li>
					<li class="nav-item mr-4 mb-2 mb-lg-0">
						<div class="my-2 my-lg-0">
							<a class="btn btn-primary" href="/auth/login">Login</a>
						</div>
					</li>
					<li class="nav-item mr-4 mb-2 mb-lg-0">
						<div class="my-2 my-lg-0">
							<a class="btn btn-primary" href="/auth/registration">Register</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- End Navbar -->

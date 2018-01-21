<nav class="navbar navbar-default no-margin" id="nav">
	<div class="image">
      
   	</div>
	<!-- <div class="container"> -->
		<div class="navbar-header fixed-brand">
        	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"  id="menu-toggle">
	           <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
	        </button>
        	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	          <span class="sr-only">Toggle navigation</span>
	          <span class="icon-bar"></span>
	          <span class="icon-bar"></span>
	          <span class="icon-bar"></span>
	        </button>
        	<a class="navbar-brand" href="#"><?php echo e(Auth::guard('web_institution')->user()->name); ?></a>
     	</div><!-- navbar-header-->

		<div class="collapse navbar-collapse" id="app-navbar-collapse">
			<!-- Left Side Of Navbar -->
			<ul class="nav navbar-nav">
				<li class="active" >
	         	<button class="navbar-toggle collapse in" data-toggle="collapse" id="menu-toggle-2"> 
	            	<span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
	          	</button>
	        </li>
			</ul>

			<!-- Right Side Of Navbar -->
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						<?php echo e(Auth::guard('web_institution')->user()->name); ?> <span class="caret"></span>
					</a>

					<ul class="dropdown-menu" role="menu">
						<li>
							<a href="<?php echo e(url('/institution/logout')); ?>"
							onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
							Salir
						</a>

							<form id="logout-form" action="<?php echo e(url('/institution/logout')); ?>" method="POST" style="display: none;">
								<?php echo e(csrf_field()); ?>

							</form>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	<!-- </div> -->
</nav>
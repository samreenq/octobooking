<footer class="main-footer">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12">
				<div class="ft-logo">
					<img src="<?php echo base_url(); ?>assets/images/logo-footer.png" alt="">
					<p>Contrary to popular belief, Lorem isn’t simply random text. It has roots in a of classical Latin literature from 45 BC, making it over 2000 years old.</p>
				</div>
			</div>
			
			<div class="col-md-4 col-sm-4 col-xs-12 text-center">
				<div class="ft-list-2">
					<h6>Event Organizers</h6>
					<ul>
						<li><a href="javascript:void(0);">
								How It Works</a></li>
						<li><a href="javascript:void(0);">
								Venue Finder</a></li>
						<li><a href="javascript:void(0);">
								Terms & Conditions</a></li>
						<li><a href="javascript:void(0);">
								Privacy Policy</a></li>
						<li><a href="javascript:void(0);">
							   Blog</a></li>
					</ul>
				</div>
			</div>

			<div class="col-md-4 col-sm-4 col-xs-12 text-center">
				<div class="ft-list-2">
					<h6>Venue Hosts</h6>
					<ul>
						<li><a href="javascript:void(0);">
								How it works</a></li>
						<li><a href="javascript:void(0);">
								Pricing</a></li>
						<li><a href="javascript:void(0);">
								List Your Venue</a></li>
						<li><a href="javascript:void(0);">
								Legal & Privacy</a></li>
						<li><a href="javascript:void(0);">
							   Support</a></li>
					</ul>
				</div>
			</div>

			
			
		</div>
	</div>
	
		<div class="container pad-l">
			<div class="cpy-rit">
			<div class="col-md-12  col-sm-12 col-xs-12 pad-l">
				<p>Copyright © <?php echo date("Y"); ?> All rights reserved</p>
			</div>
			<!-- <div class="col-md-6 col-sm-6 col-xs-12">
				<div class="ft-social st-1">
					<ul>
						<li><a href="javascript:void(0);"><i class="fa fa-facebook" aria-hidden="true"></i> </a></li>
						<li><a href="javascript:void(0);"><i class="fa fa-twitter" aria-hidden="true"></i> </a></li>
						<li><a href="javascript:void(0);"><i class="fa fa-linkedin" aria-hidden="true"></i> </a></li>
						<li><a href="javascript:void(0);"><i class="fa fa-google-plus" aria-hidden="true"></i> </a></li>
					</ul>
				</div>
			</div> -->
		</div>
	</div>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/lib.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/functions.js"></script>
</footer>
<div id="loginModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
		<form action="<?php echo base_url(); ?>loginSubmit" method="POST">
		  <div style="width:49%">
			<center><h3>Login</h3></center>
			  <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
				<input id="email" type="text" class="form-control" name="email" placeholder="Email" required>
			  </div>
			   <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock"></i></span>
				<input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
			  </div>
			  <input type="submit" class="btn btn-primary" value="Login" />
		  </div>
		  <div style="width:49%">
			  </div>
			  </form>
      </div>
    </div>

  </div>
</div>
<div id="registerModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
		<form action="<?php echo base_url(); ?>registerSubmit" method="POST">
		  <div style="width:49%">
			<center><h3>Sign up</h3></center>
			  <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
				<input  type="text" class="form-control" name="fullname" placeholder="Full Name" required>
			  </div>
			  <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
				<input id="email" type="text" class="form-control" name="email" placeholder="Email-ID" required>
			  </div>
			   <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock"></i></span>
				<input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
			  </div>
			   <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock"></i></span>
				<input id="repassword" type="password" class="form-control" name="repassword" placeholder="Confirm Password" required>
			  </div>
			   <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-phone"></i></span>
				<input  type="text" class="form-control" name="phone" placeholder="Phone" required>
			  </div>
			   <div class="input-group">
			   <label for="customer"><input type="radio" name="type" value="1" id="customer" />Customer</label>
			   <label for="vendor"><input type="radio" name="type" value="2" id="vendor" />Vendor</label>
			  </div>
			  <input type="submit" class="btn btn-primary" value="Sign up" />
		  </div>
		  <div style="width:49%">
			  </div>
			  </form>
      </div>
    </div>

  </div>
</div>
</body>

</html>
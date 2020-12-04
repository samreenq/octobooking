<footer class="main-footer <?php echo (isset($active) && $active === "home")?"drk":"drk"; ?>" >
	<?php //if(isset($active) && $active !== "home") inr-ft
			$this->load->view('common/subscribe');	
	?>
	<div class="container">
		<div class="row ml-0 mr-0 ar-row">
			<div class="col-md-4 col-sm-4 col-xs-12">
				<div class="ft-logo">
					<img src="<?php echo base_url(); ?>assets/images/logo-footer.png" alt="">
					<p><?php echo $lang['footer_text'] ?></p>
				</div>
			</div>
			
			<div class="col-md-5 col-sm-4 col-xs-12 text-center second-col">
				<div class="ft-list-2">
					<h6><?php echo $lang['event_organizers'] ?></h6>
					<ul>
						<!--<li><a href="javascript:void(0);">
                                <?php /*echo $lang['how_it_works'] */?></a></li>-->
						<li><a href="<?php echo base_url().'products?search=kuwait&event=&cat=&event_date=' ?>">
                                <?php echo $lang['venue_finder'] ?></a></li>
						<li><a href="<?php echo base_url(). 'cms-page/terms-condition'?>">
                                <?php echo $lang['terms_and_condition'] ?></a></li>
						<li><a href="<?php echo base_url(). 'cms-page/privacy-policy'?>">
                                <?php echo $lang['privacy_policy'] ?></a></li>
						<!--<li><a href="javascript:void(0);">
                                <?php /*echo $lang['blog'] */?></a></li>-->
					</ul>
				</div>
			</div>

			<div class="col-md-3 col-sm-4 col-xs-12 text-center">
				<div class="ft-list-2">
					<h6><?php echo $lang['venue_host'] ?></h6>
					<ul>
						<!--<li><a href="javascript:void(0);">
                                <?php /*echo $lang['how_it_works'] */?></a></li>-->
						<li><a href="<?php echo base_url(); ?>become-vendor#price-plan">
                                <?php echo $lang['pricing'] ?></a></li>
						<li><a href="<?php echo base_url(); ?>become-vendor">
                                <?php echo $lang['list_your_venue'] ?></a></li>
						<li><a href="<?php echo base_url(). 'cms-page/privacy-policy'?>">
                                <?php echo $lang['legal_and_privacy'] ?></a></li>
						<li><a href="<?php echo base_url(). 'contact-us'?>">
                                <?php echo $lang['support'] ?></a></li>
					</ul>
				</div>
			</div>

			
			
		</div>
	</div>
	
		<div class="container pad-l">
			<div class="cpy-rit">
			<div class="col-md-12  col-sm-12 col-xs-12 pad-l">
				<p><?php echo $lang['copyright'] ?>  © <?php echo date("Y"); ?> <?php echo $lang['all_rights_reserved'] ?></p>
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
	<script>var BASE_URL = "<?php echo base_url(); ?>";

        var langArr = <?php echo json_encode($lang); ?>;
       // console.log(langArr.unit_price);
        var site_lang = "<?php echo $site_lang; ?>"

        if(site_lang == 'ar'){
            var slider_position = true;
        }else{
            var slider_position = false;
        }

    </script>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/lib.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/functions.js"></script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/15.0.0/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/15.0.0/js/utils.js"></script> -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
    <!-- <script type="text/javascript" src="<?php //echo base_url(); ?>assets/js/lightbox.min.js"></script> -->
<script>
$(document).ready(function() {
    $('.venues').DataTable();
} );
</script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?v=3.exp&amp;libraries=places&amp;key=AIzaSyAstiE9UTEubIpvmEkzN846MkKDZRttTsk"></script>
    
    <script>
        var default_lat = 24.871641;
        var default_long = 67.059906;

        if ( $( "#address_map_canvas_admin" ).length >0) {

            if($('#latitude').val() != ""){
                default_lat = $('#latitude').val();
            }

            if($('#longitude').val() != ""){
                default_long = $('#longitude').val();
            }

            showPointsOnMap(default_lat,default_long,'address_map_canvas_admin');


        }

        if($('#searchTextField').length > 0){
            google.maps.event.addDomListener(window, 'load', initializeSearch);
        }

        function initializeSearch() {
            var input = document.getElementById('searchTextField');
            var autocomplete = new google.maps.places.Autocomplete(input);
            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                var place = autocomplete.getPlace();
                var lat = place.geometry.location.lat();
                var long = place.geometry.location.lng();

                var lat = document.getElementById('latitude').value = lat;
                var long = document.getElementById('longitude').value = long;
                //showPointsOnMap(lat,long,'address_map_canvas_admin');
            });
        }

        function showPointsOnMap(lat,long,divID)
        {
            console.log(lat); console.log(long,divID);
            var map = new google.maps.Map(document.getElementById(divID), {
                zoom: 12,
                center: new google.maps.LatLng(lat, long),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var myMarker = new google.maps.Marker({
                position: new google.maps.LatLng(lat, long),
                draggable: true
            });

            google.maps.event.addListener(myMarker, 'dragend', function (evt) {
                document.getElementById('current_admin').innerHTML = '<p>Marker dropped: Current Lat: ' + evt.latLng.lat().toFixed(7) + ' Current Lng: ' + evt.latLng.lng().toFixed(7) + '</p>';
                document.getElementById('latitude').value = evt.latLng.lat().toFixed(7);
                document.getElementById('longitude').value = evt.latLng.lng().toFixed(7);
            });

            map.setCenter(myMarker.position);
            myMarker.setMap(map);
        }



        if($('#venue_map').length > 0){
            showPointsOnMap($('#latitude').val(),$('#longitude').val(),'venue_map');
        }
    </script>



</footer>

<style>
    #loginModal label.chck input{
        float:left;
    }
    #loginModal input[type="text"],#loginModal input[type="email"], #loginModal input[type="password"],#registerModal input[type="text"],#registerModal input[type="email"], #registerModal input[type="password"] {

        padding: 20px;

    }
</style>

<div id="msg2Modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body">
        <div class="alert alert-warning"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="forgotModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body" style="height: 595px;">
		  <div class="close-button" data-dismiss="modal"><img src="<?php echo base_url(); ?>assets/images/close.svg" alt="Login"/></div>
		  <div class="signiin-sty"  style="display: inline-block;">
		<form name="forgetForm" id="forgetForm" method="POST">
			<center><h3><?php echo $lang['forgot_pass'] ?></h3></center>
            <div id="error_msg" class="error-text" style="display: none;"></div>
          <div id="success_msg" class="success-text" style="display: none;"></div>
			  <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
				<input id="forgot-email" type="email" class="form-control" name="email" placeholder="<?php echo $lang['email'] ?>" required>
			  </div>
			  <input type="button" class="btn btn-primary forgetPassBtn" value="<?php echo $lang['submit'] ?>" />
			  <p class="passwordError" style="color:#F00;"><?php echo $this->session->flashdata('error'); ?></p>
			  </form>
		  </div>
		  <div class="lgin">
		  <img src="<?php echo base_url(); ?>assets/images/login.jpg" alt="Login" />
			  </div>
      </div>
    </div>

  </div>
</div>
<div id="loginModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body" style="height: 595px;">
		  <div class="close-button" data-dismiss="modal"><img src="<?php echo base_url(); ?>assets/images/close.svg" alt="Login"/></div>
		  <div class="signiin-sty"  style="display: inline-block;">

		<form id="loginForm" name="loginForm"  method="POST">

			<h3><?php echo $lang['login']; ?></h3>
                <p id="error_message" class="error-text" style="display: none;"></p>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input id="login-email" type="email" class="form-control" name="email" placeholder="<?php echo $lang['email']; ?>" required>
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input id="login-password" type="password" class="form-control" name="password" placeholder="<?php echo $lang['password']; ?>" required>
                </div>
			  
			  <label class="chck"><?php echo $lang['remember_me']; ?>
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <a href="javascript:void(0);" class="frgotbtn loginForgot"  data-toggle="modal" data-dismiss="modal" data-target="#forgotModal"><?php echo $lang['forgot_password']?></a>
			  <input type="button" class="btn btn-primary loginBtn" value="<?php echo $lang['login']; ?>" />
			  <p class="passwordError" style="color:#F00;"><?php echo $this->session->flashdata('error'); ?></p>
                            <div class="fr-signp">
							    <p><?php echo $lang['dont_have_account']; ?></p>
								<a href="javascript:void(0);" data-toggle="modal" data-target="#registerModal"  class="frgotbtn loginRegister"><?php echo $lang['signup']; ?></a>
							</div>
			  </form>
		  </div>
		  <div class="lgin">
		  <img src="<?php echo base_url(); ?>assets/images/login.jpg" alt="Login" />
			  </div>
      </div>
    </div>

  </div>
</div>
<div id="registerModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
		  <div class="close-button" data-dismiss="modal"><img src="<?php echo base_url(); ?>assets/images/close.svg" alt="Login"/></div>
		  <div class="signiin-sty">

			<h3 class="text-center"><?php echo $lang['signup']; ?></h3>

                <a href="<?php echo base_url()."user/social_login/facebook" ?>">
                    <button class="social-btn"><?php echo $lang['signup_facebook']; ?></button>
                </a>
                <a href="<?php echo base_url()."user/social_login/google" ?>">
                    <button class="social-btn google-bg-color"><?php echo $lang['signup_google']; ?></button>
                </a>
                <form id="registerForm" name="registerForm" method="POST">
                    <input type="hidden" name="type" value="1" />
                    <input type="hidden" name="package" value="1" id="vendorPkg" />
                <p id="err_message" class="error-text clear" style="display: none;"></p>
                <p id="succ_message" class="success-text clear" style="display: none;"></p>
			  <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
				<input  type="text" class="form-control" name="fullname" id="fullname" placeholder="<?php echo $lang['full_name']; ?>" required>
			  </div>
			  <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
				<input id="signup-email" type="email" class="form-control" name="email" placeholder="<?php echo $lang['email_id']; ?>" required>
			  </div>
			   <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock"></i></span>
				<input id="password" type="password" class="form-control" name="password" placeholder="<?php echo $lang['password']; ?>" required>
			  </div>
			   <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock"></i></span>
				<input id="repassword" type="password" class="form-control" name="repassword" placeholder="<?php echo $lang['confirm_password']; ?>" required>
			  </div>
			   <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-mobile" aria-hidden="true"></i></span>
				<input  type="text" class="form-control" name="phone" id="phone" placeholder="<?php echo $lang['phone']; ?>" required>
			  </div>
			  <!-- <div class="input-group inp-radio">
			   <label for="customer"><input type="radio" name="type" value="1" id="customer" required /> Customer</label>
			   <label for="vendor" class="chk-vendor"><input class="chk-vendor" type="radio" name="type" value="2" id="vendor" required /> Vendor</label>
			  </div>-->
			  <p class="passwordError" style="color:#F00;"><?php echo $this->session->flashdata('error'); ?></p>
			  <input type="button" class="btn btn-primary btnRegister" value="<?php echo $lang['signup']; ?>" />
              </form>
              <p class="have-an-account"><?php echo $lang['have_account']; ?><a href=""><?php echo $lang['login']; ?></a></p>
		  </div>
		    <div class="regitr">
		        <img src="<?php echo base_url(); ?>assets/images/login.jpg" alt="Register" />
			</div>
      </div>
    </div>

  </div>
</div>
<button type="button" class="btn btn-info btn-lg myclass" data-toggle="modal" data-target="#msg2Modal" style="display:none;"></button>
<script>
$(document).ready(function() {
    var isAlert = '<?php echo $this->session->flashdata('serror'); ?>';
    console.log(isAlert);
    if (isAlert != "") {
        $('#msg2Modal').find(".alert-warning").html(isAlert);
        $(".myclass").trigger("click");
        //$('#msgModal').find(".alert-warning").html(isAlert).modal('show');
        //$('#msgModal').addClass("in");
        //$('#msgModal').css("display","block");
    }

    $('.amenities').select2();
    $('.suitable').select2();
    $('.locationItems').select2();
    $('#repassword').on('change', function () {
        $('.passwordError').html('').hide();
        $(".btnRegister").attr("disabled", false);
        if ($('#password').val() == $('#repassword').val()) {
            //$('#regpass').get(0).setCustomValidity('Invalid');
        } else {
            $('.passwordError').html(langArr.password_not_match).show();
            $(".btnRegister").attr("disabled", true);
        }
    });
    var phoneno = /^!*(\d!*){10,}$/;

    $('#consumer-register').on('click', function () {
        console.log($(this).data('id'));
        $('.social-btn').show();
        $('input[name="type"]').val(1);
        $('#registerModal').modal('show');
    });

    $('.signuppkg').on('click', function () {
        console.log($(this).data('id'));
        $('input[name="type"]').val(2);
        $('.social-btn').hide();
        $('#registerModal').modal('show');
    });

    initPackageSlider();

    function initPackageSlider() {
        $('.packages').not('.slick-initialized').slick({
            dots: false,
            arrows: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplay: true,
            adaptiveHeight: true,
            responsive: [
                {
                    breakpoint: 800,
                    settings: {slidesToShow: 2, slidesToScroll: 1}
                },
                {
                    breakpoint: 550,
                    settings: {slidesToShow: 1, slidesToScroll: 1}
                },

            ]
        });

    }

    $('a.popup-detail-addon').on('click', function () {

        var venue_id = $(this).data('id');
        var venue_name = $(this).data('service-name');
        var parent_id = $(this).data('parent-id');
        //  console.log(venue_id);
        $(".modal-backdrop-has").toggleClass("in");
        $(".has-popup-main ").toggleClass("show-pop");
        $('#service-name').text('');
        $('#service-name').text(venue_name);
        //setTimeout(function () {
        $.ajax({
            method: "GET",
            url: "<?php echo base_url(); ?>/get_service_package",
            data: {venue_id: venue_id, venue_name: venue_name, parent_id: parent_id}
        })
            .done(function (responseData) {

                $(".pack-loader").addClass("hide");
                // alert( "Data Saved: " + msg );
                $(".has-details-package").addClass("show-pack");
                $('.has-details-package').html(responseData);

                initPackageSlider();
                //$('#event_date').val(responseData)
            });
        //console.log($(window).scrollTop() + 30);
        $(".has-popup-main").css("top", $(window).scrollTop() + 40);


        // }, 4000);
    });

    $('.loginBtn').on('click', function () {
        $('#error_message').hide();

        if ($('#login-email').val() == '') {
            $('#error_message').show();
            $('#error_message').text(langArr.email_required);
            return false;
        }

        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

        if (emailReg.test($('#login-email').val()) == false) {
            $('#error_message').show();
            $('#error_message').text(langArr.valid_email);
            return false;
        }


        if ($('#login-password').val() == '') {
            $('#error_message').show();
            $('#error_message').text(langArr.password_required);
            return false;
        }

        $.ajax({
            dataType: "json",
            method: "POST",
            url: "<?php echo base_url(); ?>loginSubmit",
            data: $('#loginForm').serialize()
        }).done(function (responseData) {
            console.log(responseData);
            if (responseData.error == 1) {
                $('#error_message').show();
                $('#error_message').text(responseData.message);
            } else {
                window.location.href = "<?php echo base_url(); ?>";
            }
        });

    });

    $('.btnRegister').on('click', function () {

        /*console.log(isValid($('#phone').val()));
        if(isValid($('#phone').val()) == false) {
            $('#err_message').show();
            $('#err_message').text("Please enter valid phone #");
            return false;
        }
*/
        //alert('Hiii');
        $('#err_message').hide();
        var email = $('#signup-email').val();

        if ($('#fullname').val() == '') {
            $('#err_message').show();
            $('#err_message').text(langArr.full_name_required);
            return false;
        }

        if ($('#signup-email').val() == '') {
            $('#err_message').show();
            $('#err_message').text(langArr.email_required);
            return false;
        }

        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        // console.log($('#signup-email').val());
        console.log('chk', emailReg.test($('#signup-email').val()));
        //return false;

        if (emailReg.test($('#signup-email').val()) == false) {
            $('#err_message').show();
            $('#err_message').text(langArr.valid_email);
            return false;
        }


        if ($('#password').val() == '') {
            $('#err_message').show();
            $('#err_message').text(langArr.password_required);
            return false;
        }

        if ($('#phone').val() == '') {
            $('#err_message').show();
            $('#err_message').text(langArr.phone_required);
            return false;
        }

        $.ajax({
            dataType: "json",
            method: "POST",
            url: "<?php echo base_url(); ?>registerSubmit",
            data: $('#registerForm').serialize()
        }).done(function (responseData) {
            console.log(responseData);
            if (responseData.error == 1) {
                $('#err_message').show();
                $('#err_message').text(responseData.message);
            } else {
                $('#succ_message').show();
                $('#succ_message').text(responseData.message);
                window.location.href = "<?php echo base_url(); ?>";
            }
        });

    });

    $('.forgetPassBtn').on('click', function () {
        $('#error_message').hide();

        if ($('#forgot-email').val() == '') {
            $('#error_msg').show();
            $('#error_msg').text(langArr.email_required);
            return false;
        }

        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

        if (emailReg.test($('#forgot-email').val()) == false) {
            $('#error_msg').show();
            $('#error_msg').text(langArr.valid_email);
            return false;
        }

        $.ajax({
            dataType: "json",
            method: "POST",
            url: "<?php echo base_url(); ?>resetSubmit",
            data: $('#forgetForm').serialize()
        }).done(function (responseData) {
            console.log(responseData);
            if (responseData.error == 1) {
                $('#error_msg').show();
                $('#error_msg').text(responseData.message);
            } else {
                $('#success_msg').show();
                $('#success_msg').text(responseData.message);
                setTimeout(function () {
                    window.location.href = "<?php echo base_url(); ?>";
                }, 500);

            }
        });

    });


    $('.close-button-details').on('click', function () {
        $(".modal-backdrop-has").toggleClass("in");
        $(".has-popup-main ").toggleClass("show-pop");
        $(".pack-loader").removeClass("hide");
        $(".has-details-package").removeClass("show-pack");
    });

    $('section.main-tbs.has-main-menu-slide .main-nav .nav ul li').click(function (e) {
        $(this).addClass('active').siblings().removeClass('active');
    });
    $('.dwn-btn').on('click', function () {
        var offset = 20; //Offset of 20px

        $('html, body').animate({
            scrollTop: $(".sec2").offset().top + offset
        }, 1000);
    });
    $('#phone').on('change', function () {
        var v = $('#phone').val();
        //  $(".btnRegister").attr("disabled",false);
        if (v.match(phoneno)) {
            $('.passwordError').html('').hide();
            //$(".btnRegister").attr("disabled",false);
            return true;
        } else {
            $('.passwordError').html(langArr.phone_validate).show();
            // $(".btnRegister").attr("disabled",true);
            return false;

        }

    });

    $('#subscribeBtn').on('click', function () {
        $('#subscribe_message').text('');
        $('#subscribe_message').hide();

        if ($('#subscribe_email').val() == '') {
            $('#subscribe_message').show();
            $('#subscribe_message').text(langArr.email_required);
            return false;
        }

        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

        if (emailReg.test($('#subscribe_email').val()) == false) {
            $('#subscribe_message').show();
            $('#subscribe_message').text(langArr.valid_email);
            return false;
        }

        $.ajax({
            dataType: "json",
            method: "POST",
            url: "<?php echo base_url(); ?>/octo/subscribe",
            data: $('#subscribeForm').serialize()
        }).done(function (responseData) {
            console.log(responseData);
            if (responseData.error == 1) {
                $('#subscribe_message').show();
                $('#subscribe_message').removeClass('success-text');
                $('#subscribe_message').addClass('error-text');
                $('#subscribe_message').text(responseData.message);
            } else {
                $('#subscribe_message').show();
                $('#subscribe_message').removeClass('error-text');
                $('#subscribe_message').addClass('success-text');
                $('#subscribe_message').text(responseData.message);
                //   window.location.href = "<?php echo base_url(); ?>";
            }
        });

    });


    var max_fields = 7; //maximum input boxes allowed
    var wrapper = $(".dayPriceWrap"); //Fields wrapper
    var wrapper_child = $(".input_fields_wrap"); //Fields wrapper
    var add_button = $(".add_field_button"); //Add button ID


    var x = 1; //initlal text box count
    $(document).on("click", '.add_field_button', function (e) {

        // $(add_button).on('click',function(e){ //on add input button click
        e.preventDefault();
        if (x < max_fields) { //max input box allowed
            x++; //text box increment
            var html = wrapper_child.html();
            //console.log(html);
            // $(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
            $('.dayPriceWrap').append('<div class="form-group input_fields_wrap" id="fields_wrap_' + x + '">' + html + '</div>');
        }
    });

    $(document).on("click", ".remove_field", function (e) {
        //$(wrapper_child).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault();
        // console.log($(this).parents('div.input_fields_wrap')); return false;
        var divID = $(this).parents('.input_fields_wrap').remove();
        console.log(divID);
        //$('#'+divID).remove();
        // x--;
    });


    $(document).on('change', '.venue-event-date', function () {

        var event_date = $(this).val();
        var venue_id = $(this).data('id');
        console.log(event_date);

        $.ajax({
            method: "POST",
            url: "<?php echo base_url(); ?>/get_venue_price",
            data: {venue_id: venue_id, event_date: event_date}
        }).done(function (responseData) {

            var data = JSON.parse(responseData);

            console.log(data.price);
            $('#venue_price').val(data.price);
            $('#venue-price').text(data.price);
            $('#price_unit').val(data.price_unit);

            if (data.price_unit == 'perseat') {
                $('.seat-p-has').show();
                $('.date-p-has').addClass('half-width');
                $('.date-p-has').removeClass('full-width');
                $('.unit-price-text').text('');
                $('.unit-price-text').text(langArr.per_seat);

            } else {
                $('.seat-p-has').hide();
                $('.date-p-has').removeClass('half-width');
                $('.date-p-has').addClass('full-width');
                $('.unit-price-text').text('');
                $('.unit-price-text').text(langArr.per_day);
            }
        });
    });

    $(document).on('click', '.submitRating', function () {

        if ($('input[name="rating"]:checked').val() == undefined || $('input[name="rating"]:checked').val() == '') {
            $('#ratingForm .error-text').show();
            $('#ratingForm .error-text').text(langArr.rating_required);
            return false;
        }
        if ($('#ratingForm textarea#desc').val() == undefined || $('#ratingForm textarea#desc').val() == '') {
            $('#ratingForm .error-text').show();
            $('#ratingForm .error-text').text(langArr.review_required);
            return false;
        }

        $.ajax({
            dataType: "json",
            method: "POST",
            url: "<?php echo base_url(); ?>rating-submit",
            data: {
                'venue_id': $('#ratingForm #venue_id').val(),
                'rating': $('input[name="rating"]:checked').val(),
                'review': $('#ratingForm textarea#desc').val()
            }
        }).done(function (responseData) {
            //console.log(responseData);
            if (responseData.error == 1) {
                $('#ratingForm .error-text').show();
                $('#ratingForm .error-text').text(responseData.message);
            } else {
                $('#ratingForm .success-text').show();
                $('#ratingForm .success-text').text(responseData.message);
                setTimeout(function () {
                    window.location.href = "<?php echo base_url(); ?>product/" + $('#ratingForm #venue_id').val();
                }, 1000);
            }
        });
    });

    $(document).on('click', '.walkin-booking', function () {
        $('#eventModal').modal('show');
        $('#eventModal').find('#venue_id').val($(this).data('id'));
    });

    $(document).on('click', '.walkingBooking', function () {
        //console.log($('#event_date').val());

        if($('#event_date').val() == ''){
            $('#eventModal .error-text').show();
            $('#eventModal .error-text').text(langArr.select_your_event_date);
            return false;
        }

        $.ajax({
            dataType: "json",
            method: "POST",
            url: "<?php echo base_url(); ?>vendor/walking-booking-submit",
            data: {
                'venue_id': $('#eventModal #venue_id').val(),
                'event_date': $('#eventModal #event_date').val(),
            }
        }).done(function (responseData) {
            //console.log(responseData);
            if (responseData.error == 1) {
                $('#eventModal .error-text').show();
                $('#eventModal .error-text').text(responseData.message);
                return false;
            } else {
                $('#eventModal .success-text').show();
                $('#eventModal .success-text').text(responseData.message);
                setTimeout(function () {
                    window.location.href = "<?php echo base_url(); ?>vendor/my-venues/";
                }, 1000);
            }
        });

    });



});

function validateEmail(email) {
    var emailReg = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return emailReg.test( email );
}

function isValid(p) {
    var phoneRe = /^[2-9]\d{2}[2-9]\d{2}\d{4}$/;
    var digits = p.replace(/\D/g, "");
    return phoneRe.test(digits);
}

</script>


</body>

</html>
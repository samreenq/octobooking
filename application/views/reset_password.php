    <section class="vrprofle">
      <div class="container">
          <div class="col-md-6 col-md-offset-3">
              <?php if($this->session->flashdata('error')): ?>
                  <div class="error-text" ><?php echo $this->session->flashdata('error'); ?></div>
              <?php endif; ?>
              <?php if($this->session->flashdata('success')): ?>
                  <div class="error-text" ><?php echo $this->session->flashdata('success'); ?></div>
              <?php endif; ?>
        <div class="pro-log" style="margin:10% auto;">
            <div class="im-pro">
              <img src="assets/images/pr-im2.png" alt="">
            </div>

			<form action="<?php echo base_url(); ?>reset-password" method="POST">

                <input type="hidden" name="forget_pass_code" value="<?php echo $code; ?>" />
                <input type="hidden" name="is_post" value="1" />
            <div class="prodtl">
			<div class="form-group">
				<label for="password">New Password:</label>
				<input type="password" class="form-control" id="password" name="password" required>
			  </div>
			<div class="form-group">
				<label for="confirm_password">Confirm Password:</label>
				<input type="password" class="form-control" id="confirm_password" name="cpassword" required>
			  </div>
              
            </div>
            <p class="passwordError" style="color:#F00; text-align:center;"></p>
            <button type="submit" class="btnForgetr">Change password</button>
            
			</form>

        </div>
        </div>
      </div>
    </section>
<script>
var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value &&  confirm_password.value != "") {
    confirm_password.setCustomValidity("Passwords Don't Match");
    $('.passwordError').html("Passwords Don't Match").show();
    $(".btnForget").attr("disabled",true);
  }  else {
    confirm_password.setCustomValidity('');
    $('.passwordError').html('').hide();
    $(".btnForgetr").attr("disabled",false);
  }
}

password.onchange = validatePassword;
//oldpassword.onkeyup = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
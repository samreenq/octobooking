<section class="vrprofle ham-profile edit ham-changePwd">
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <div class="pro-log" style="margin:10% auto;">
                <div class="im-pro">
                    <img src="<?php echo (file_exists('./upload/'.$user['user_img']))?base_url().'upload/'.$user['user_img']:base_url()."assets/images/elipse.jpg"; ?>"
                        style="cursor:pointer;" alt="">
                </div>
                <form action="<?php echo base_url(); ?>SubmitPasswordChange" method="POST">
                    <div class="prodtl">
                        <div class="form-group">
                            <label for="password"><?php echo $lang['old_password'] ?>:</label>
                            <input type="password" class="form-control" id="oldpassword" name="oldpassword" required>
                        </div>
                        <div class="form-group">
                            <label for="password"><?php echo $lang['new_password'] ?>:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password"><?php echo $lang['confirm'] ?> <?php echo $lang['new_password'] ?>:</label>
                            <input type="password" class="form-control" id="confirm_password" name="cpassword" required>
                            <?php if($this->session->flashdata('error')): ?>
                                <p class="error-text" ><?php echo $this->session->flashdata('error'); ?></p>
                            <?php endif; ?>
                            <?php if($this->session->flashdata('success')): ?>
                                <p class="success-text" ><?php echo $this->session->flashdata('success'); ?></p>
                            <?php endif; ?>

                        </div>
                        <button type="submit" class="btn-pass mt-3"><?php echo $lang['change_password'] ?></button>
                    </div>
                    <p class="passwordError" style="color:#F00; text-align:center;"></p>


                </form>

            </div>
        </div>
    </div>
</section>
<script>
var password = document.getElementById("password"),
    oldpassword = document.getElementById("oldpassword"),
    confirm_password = document.getElementById("confirm_password");

function validatePassword() {
    if (password.value != confirm_password.value && password.value == oldpassword.value && confirm_password.value !=
        "") {
        confirm_password.setCustomValidity("Passwords Don't Match");
        $('.passwordError').html("Passwords Don't Match").show();
        $(".btnRegister").attr("disabled", true);
    } else if (password.value == oldpassword.value) {
        confirm_password.setCustomValidity("Old and new password must not be same");
        $('.passwordError').html("Old and new password must not be same").show();
        $(".btnRegister").attr("disabled", true);
    } else {
        confirm_password.setCustomValidity('');
        $('.passwordError').html('').hide();
        $(".btnRegister").attr("disabled", false);
    }
}

password.onchange = validatePassword;
//oldpassword.onkeyup = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
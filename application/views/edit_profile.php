
    <section class="vrprofle ham-profile edit ham-changePwd">
        <div class="container">
            <div class="col-md-6 col-md-offset-3">

                <div class="pro-log" style="margin:10% auto;">
                    <div class="im-pro">
                        <form method="POST" action="<?php echo base_url().'octo/changepic' ?>"
                            enctype="multipart/form-data">
                            <input type="hidden" name="redirect_url" value="edit-profile" />
                            <input type="file" name="picture" style="display:none;" class="changeuserpic" onchange="this.form.submit()" />
                        </form>
                        <img src="<?php echo (file_exists('./upload/'.$user['user_img'])) ?base_url().'upload/'.$user['user_img']:base_url()."assets/images/placeholder_user_img.png"; ?>"
                            style="cursor:pointer;" class="changepic" alt="">
                    </div>
                    <form name="editProfileForm" method="POST">
                        <input type="hidden" name="is_post" value="1" />
                        <div class="prodtl">
                                <?php if($this->session->flashdata('error')): ?>
                                    <p class="error-text"><?php echo $this->session->flashdata('error'); ?></p>
                                <?php endif; ?>
                                <?php if($this->session->flashdata('success')): ?>
                                    <p class="success-text"><?php echo $this->session->flashdata('success'); ?></p>
                                <?php endif; ?>
                            <div class="form-group">
                                <label for="fullname"><?php echo $lang['full_name_label'] ?></label>
                                <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $user['fullname']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email"><?php echo $lang['email_address_label'] ?></label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="phone"><?php echo $lang['phone_label'] ?></label>
                                <input type="phone" class="form-control" id="phone" placeholder="415-555-1212" name="phone" value="<?php echo $user['phone']; ?>" required>
                            </div>
                            <button type="submit" class="btnEditProfile mt-3"><?php echo $lang['submit'] ?></button>
                        </div>
                        <p class="passwordError" style="color:#F00; text-align:center;"></p>
 

                    </form>

                </div>
            </div>
        </div>
    </section>
    <script>

    </script>
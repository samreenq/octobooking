<style> 
.pro-log a {
    margin: 39px auto;
    display: inherit;
    background: #1C76BD 0% 0% no-repeat padding-box;
	color:  #fff;
    border: none;
    text-transform: capitalize;
    padding: 7px 12px;
    border-radius: 3px;
	width: 30%;
	text-align: center;
}
</style> 
 <section class="vrprofle ham-profile">
      <div class="container">
          <div class="col-md-6 col-md-offset-3">
              <?php if($this->session->flashdata('error')): ?>
                  <div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?php echo $this->session->flashdata('error'); ?></div>
              <?php endif; ?>
              <?php if($this->session->flashdata('success')): ?>
                  <div class="alert alert-success">  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?php echo $this->session->flashdata('success'); ?></div>
              <?php endif; ?>

              <div class="pro-log">
            <div class="im-pro">
                <form method="POST" action="<?php echo base_url().'octo/changepic' ?>" enctype="multipart/form-data">
                    <input type="hidden" name="redirect_url" value="profile" />
                    <input type="file" name="picture" style="display:none;" class="changeuserpic" onchange="this.form.submit()" />
                </form>
                <img src="<?php echo (file_exists('./upload/'.$user['user_img']))? base_url().'upload/'.$user['user_img']:base_url()."assets/images/elipse.jpg"; ?>" style="cursor:pointer;" class="changepic" alt="">
                <h5 class="mt-3"><?php  echo $user['fullname']; ?> <span class="profile-email"><?php echo $user['email']; ?></span></h5>
                <a href="<?php echo base_url().'edit-profile' ?>" class="edit-btn"><?php echo $lang['edit'] ?></a>
            </div>

            <div class="prodtl">
              <ul>
                <li><?php echo $lang['email'] ?> <span><?php echo $user['email']; ?></span></li>
                  <li><?php echo $lang['phone'] ?> <span><?php echo $user['phone']; ?></span></li>
                <li><?php echo $lang['platform_type'] ?> <span><?php echo $user['platform_type']; ?></span></li>
              </ul>
            </div>
            <?php if($this->session->userdata('platform_type') == 'custom'): ?>
                 <a href="<?php echo base_url(); ?>change-password"><?php echo $lang['change_password'] ?></a>
            <?php endif; ?>

        </div>
        </div>
      </div>
    </section>

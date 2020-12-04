<style>
    .prlis-rit h5{
        color:#337ab7;
    }
</style>
    <div class="clear"></div>
    <div class="main-bnr inerban">
        <div class="container">
            <div class="mainfrm">
                <h1><?php echo $lang['contact_us'] ?></h1>

                  

            <nav aria-label="breadcrumb ">
  <ol class="breadcrumb styl1">
    <li class="breadcrumb-item" aria-current="page"><?php echo $lang['home'] ?></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $lang['contact_us'] ?></li>
  </ol>
</nav>
            </div>
        </div>
    </div>


               <section class="vrprofle">
                   <div class="container">
                       <div class="col-md-6 col-md-offset-3">
                           <?php if($this->session->flashdata('error')): ?>
                               <p class="error-text" ><?php echo $this->session->flashdata('error'); ?></p>
                           <?php endif; ?>
                           <?php if($this->session->flashdata('success')): ?>
                               <p class="success-text" ><?php echo $this->session->flashdata('success'); ?></p>
                           <?php endif; ?>
                           <div class="pro-log contact-form" style="margin:10% auto;">

                               <form action="<?php echo base_url(); ?>contact-us" method="POST" class="ham-form">

                                   <input type="hidden" name="is_post" value="1" />
                                   <div class="form-box">
                                       <div class="form-group">
                                           <label for="full_name"><?php echo $lang['full_name_label']; ?></label>
                                           <input type="text" class="form-control" id="full_name" name="full_name" required>
                                       </div>
                                       <div class="form-group">
                                           <label for="contact-email"><?php echo $lang['email_address_label']; ?></label>
                                           <input type="email" class="form-control" id="contact-email" name="contact_email" required>
                                       </div>
                                       <div class="form-group">
                                           <label for="subject"><?php echo $lang['subject_label']; ?></label>
                                           <input type="text" class="form-control" id="subject" name="subject" required>
                                       </div>
                                       <div class="form-group">
                                           <label for="subject"><?php echo $lang['message_label']; ?></label>
                                           <textarea class="form-control" id="message" name="message" size="80" required></textarea>
                                       </div>


                                   </div>
                                   <p class="passwordError" style="color:#F00; text-align:center;"></p>
                                    <div class="col-lg-12 text-center pl-0 pr-0">
                                        <button type="submit" class=""><?php echo $lang['submit']; ?></button>
                                    </div>    


                               </form>

                           </div>
                       </div>
                   </div>
               </section>

<script>
/*      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 8
        });
      }*/
    </script>
    <!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXg4q9PEJrsC521k0OVMwkEAv-72qKTYs&callback=initMap"
    async defer>--></script>

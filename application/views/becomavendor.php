    <div class="clear"></div>
    <div class="main-bnr vdr">
        <div class="container">
            <div class="mainfrm vdnr">
                <h1><?php echo displayLangText($static_content,'section1_title'); ?></h1>
                <p><?php echo displayLangText($static_content,'section1_description'); ?></p>
                <img class="img-responsive" src="<?= base_url();?>assets/images/img1.png" alt="">
            </div>
        </div>
        
    </div>

    <section class="sec3 inr-2 vrd">
        <div class="container">
           <div class="main-txt1">
               <h2><?php echo displayLangText($static_content,'section2_title'); ?></h2>
                <p><?php echo displayLangText($static_content,'section2_description'); ?></p>
           </div>
           <div class="row ml-0 mr-0">
               <div class="col-md-3 col-sm-3 col-xs-12">
                   <div class="hotal-v1">
                       <img class="img-responsive" src="<?= base_url();?>assets/images/vrdicon1.jpg">
                       <h5><?php echo displayLangText($static_content,'section2_sub1_title'); ?></h5>
                       <p><?php echo displayLangText($static_content,'section2_sub1_description'); ?></p>
                   </div>
               </div>

               <div class="col-md-3 col-sm-3 col-xs-12">
                   <div class="hotal-v1">
                       <img class="img-responsive" src="<?= base_url();?>assets/images/vrdicon2.jpg">
                       <h5><?php echo displayLangText($static_content,'section2_sub2_title'); ?></h5>
                       <p><?php echo displayLangText($static_content,'section2_sub2_description'); ?></p>
                   </div>
               </div>

               <div class="col-md-3 col-sm-3 col-xs-12">
                   <div class="hotal-v1">
                       <img class="img-responsive" src="<?= base_url();?>assets/images/vrdicon3.jpg">
                       <h5><?php echo displayLangText($static_content,'section2_sub3_title'); ?></h5>
                       <p><?php echo displayLangText($static_content,'section2_sub3_description'); ; ?></p>
                   </div>
               </div>

               <div class="col-md-3 col-sm-3 col-xs-12">
                   <div class="hotal-v1">
                       <img class="img-responsive" src="<?= base_url();?>assets/images/vrdicon4.jpg">
                       <h5><?php echo displayLangText($static_content,'section2_sub4_title'); ?></h5>
                       <p><?php echo displayLangText($static_content,'section2_sub4_description'); ?></p>
                   </div>
               </div>
              
           </div>
           
       </div>
   </section>

   
  <section class="grw-business">
    <div class="container">
      <div class="row ml-0 mr-0 ar-row">
        <div class="col-md-5 col-sm-5 col-xs-12">
          <div class="grw-lft">
            <h5><?php echo displayLangText($static_content,'section3_title'); ?></h5>
          <p><?php echo displayLangText($static_content,'section3_description'); ?></p>
          <a href="<?php echo base_url().'become-vendor#price-plan' ?>" ><?php echo $lang['get_started'];?></a>
          </div>
        </div>
         <div class="col-md-7 col-sm-7 col-xs-12">
          <div class="row grw-rit grw-slider">
            <div class="col-md-4">
                <div class="grw-slid">
                  <img class="img-responsive" src="<?= base_url();?>assets/images/ver-im1.png" alt="">
                  <h5>Wedding</h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="grw-slid">
                  <img class="img-responsive" src="<?= base_url();?>assets/images/ver-im2.png" alt="">
                  <h5>Event Planner</h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="grw-slid">
                  <img class="img-responsive" src="<?= base_url();?>assets/images/ver-im3.png" alt="">
                  <h5>Catering</h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="grw-slid">
                  <img class="img-responsive" src="<?= base_url();?>assets/images/ver-im2.png" alt="">
                  <h5>Event Planner</h5>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="main-launch">
    <div class="container">
      <div class="row ml-0 mr-0 ar-row">
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="imlounch">
            <img class="img-responsive" src="<?= base_url();?>assets/images/banner-image.png" alt="">
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="grw-lft">
            <h5><?php echo displayLangText($static_content,'section4_title'); ?><br> OctoBooking</h5>
          <p><?php echo displayLangText($static_content,'section4_description'); ?></p>
          <a href="<?php echo base_url().'become-vendor#price-plan' ?>" ><?php echo $lang['get_started'];?></a>
          </div>

        </div>
      </div>
    </div>
  </section>

  <section class="main-priceplan" id="price-plan">
    <div class="container">
      <h3><?php echo displayLangText($static_content,'section5_title'); ?></h3>
      <p><?php echo displayLangText($static_content,'section5_description'); ?></p>
      <div class="row ml-0 mr-0">
          <?php
           if(count($packages) > 0){$i = 0; 
               foreach($packages as $pkg){
                   
                    ?>
        <div class="col-md-4">
          <div class="packge hvr-sweep-to-top">
            <h5><?php echo ucwords($pkg['name']); ?></h5>
            <div class="pric-bx">
              <i>sar</i>
              <p><span><?php echo $pkg['price']; ?></span> per month</p>
            </div>
              <ul>
                  <li class="text-center"><?php echo $pkg['total_venue']; ?> <?php echo $lang['venues']; ?></li>
                  <li class="text-center"><?php echo $pkg['total_service']; ?> <?php echo $lang['services']; ?></li>
              </ul>
              <?php //echo $pkg['descr']; ?>
              <a href="javascript:void(0);"  class="signuppkg" data-id="<?php echo $pkg['id']; ?>"> <?php echo $lang['upgrade']; ?></a>
            </div>
          </div> 
 <?php     
               }
           }
           ?>

        </div>
        
    </div>
  </section>

  <section class="main-pasiv">
    <div class="container">
      <h3><?php echo displayLangText($static_content,'section6_title'); ?></h3>
      <p><?php echo displayLangText($static_content,'section6_description'); ?></p>
      <div class="row ml-0 mr-0 ar-row">
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="main-custmedia">
          <div class="custmedia">
            <div class="custmedilft">
              <img src="<?= base_url();?>assets/images/psiv-icon1.jpg" alt="">
            </div>
            <div class="custmedirit">
              <h4><?php echo displayLangText($static_content,'section6_sub1_title'); ?></h4>
              <p><?php echo displayLangText($static_content,'section6_sub1_description'); ?></p>
            </div>
          </div>

          <div class="custmedia">
            <div class="custmedilft">
              <img src="<?= base_url();?>assets/images/psiv-icon2.jpg" alt="">
            </div>
            <div class="custmedirit">
              <h4><?php echo displayLangText($static_content,'section6_sub2_title'); ?></h4>
              <p><?php echo displayLangText($static_content,'section6_sub2_description'); ?></p>
            </div>
          </div>

          <div class="custmedia">
            <div class="custmedilft">
              <img src="<?= base_url();?>assets/images/psiv-icon3.jpg" alt="">
            </div>
            <div class="custmedirit">
              <h4><?php echo displayLangText($static_content,'section6_sub3_title'); ?></h4>
              <p><?php echo displayLangText($static_content,'section6_sub3_description'); ?></p>
            </div>
          </div>
        </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="impasiv-bx">
            <img src="<?= base_url();?>assets/images/ver-im4.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>

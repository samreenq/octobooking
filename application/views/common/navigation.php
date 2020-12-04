    <header class="header">
        <i class="fa fa-bars mob-menu-icon"></i>
        <div class="mob-menu">
            <a href="javascript:void(0)" class="closebtn">×</a>
            <div class="menu-mobile">
                <ul>
                    <li><a href="<?php echo base_url(); ?>"><?php echo $lang['home']; ?></a></li>
					<li><a href="<?php echo base_url(). 'cms-page/about-us'?>"><?php echo $lang['about_us']; ?></a></li>
                    <li><a href="<?php echo base_url(); ?>become-vendor"><?php echo $lang['become_a_vendor']; ?></a></li>
                    <li><a href="<?php echo base_url(); ?>our-services"><?php echo $lang['our_services']; ?></a></li>
					<li><a href="#"><?php echo $lang['contact_us']; ?></a></li>
                </ul>
            </div>
        </div>

        <div class="topbar">
            <div class="container">
                <div class="row ml-0 mr-0 ar-row">
                    <div class="col-md-7 col-sm-6 col-xs-12">
                        <div class="social-main text-left">
                            <div class="chat-icon left-nav-position">
                                <?php  $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; $query = parse_url($url, PHP_URL_QUERY); ?>
                                <ul>
                                    <li>
                                        <a href="tel:+966 123 456786">
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            <span>+966 123 456786</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="mailto:info@octabooking.com">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                            <span>info@octabooking.com</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-6 col-xs-12">
                        <div class="social-main text-right">
                        <div class="chat-icon">
                            <ul>
                                <li class="position-relative">
                                    <a href="<?php echo base_url(); ?>checkout">
                                        <!--<i class="fa fa-shopping-cart" aria-hidden="true"></i>-->
                                        <img src="<?php echo base_url().'assets/images/cart-icon.png' ?>" style="width:20px;height:20px;" />
                                        <span class="quantity"><?php echo count($this->cart->contents()); ?></span>
                                    </a>
                                </li>
                                <li>
								<?php if($this->session->userdata('user_id')!=""){
									?>
									<div class="prof-dp">
                                      <div class="nam">
                                        <?php echo $this->session->userdata('name'); ?>
                                      </div>
                                      <div class="prof-opt"> 
                                        <ul class="dp-and-arrow">
                                          <li><a href="javascript:void(0);"><img src="<?php echo (isset($user['user_img']) && file_exists('./upload/'.$user['user_img'])) ? base_url().'upload/'.$user['user_img'] : base_url()."assets/images/elipse.jpg"; ?>" height="40" alt=""><i class="fa fa-caret-down dp-arrow" aria-hidden="true"></i></a>
                                            <ul class="droplist">
                                                <?php if($this->session->userdata('role')==2){ ?>
                                             <!-- <li><a href="<?php /*echo base_url(); */?>vendor/add-listing">Add Listing</a></li>-->
                                              <li><a href="<?php echo base_url(); ?>vendor/my-venues"><?php echo $lang['my_venues']; ?></a></li>
                                             <!-- <li><a href="<?php /*echo base_url(); */?>vendor/add-service">Add Service</a></li>
                                              <li><a href="<?php /*echo base_url(); */?>vendor/my-services">My Serives</a></li>-->
                                              <li><a href="<?php echo base_url(); ?>vendor/my-bookings"><?php echo $lang['my_bookings']; ?></a></li>
                                              <li><a href="<?php echo base_url(); ?>vendor/walking-customer-booking"><?php echo $lang['walking_booking']; ?></a></li>
                                              <?php } ?>
                                              <?php if($this->session->userdata('role')==1){ ?>
                                              <li><a href="<?php echo base_url()?>my-orders"><?php echo $lang['my_orders']; ?></a></li>
                                              <li><a href="<?php echo base_url()?>my-wishlist"><?php echo $lang['whishlist']; ?></a></li>
                                              <?php } ?>
                                              <li><a href="<?php echo base_url()?>profile"><?php echo $lang['profile']; ?></a></li>
                                              <li><a href="<?php echo base_url()?>logout"><?php echo $lang['logout']; ?></a></li>
                                            </ul>
                                          </li>
                                        </ul>
                                      </div>
                                    </div>
									<?php
								}else{
									?>
                                        <p>
                                            <a href="#" data-toggle="modal"  data-target="#loginModal"><?php echo $lang['sign_in'] ?></a> <?php echo $lang['or'] ?>
                                            <a href="javascript:void(0);" id="consumer-register" data-id="consumer-register"><?php echo $lang['register'] ?></a>
                                        </p>
									<?php 
								} ?>
								
                                </li>
                                <?php if($site_lang == 'ar'): ?>
								<li>
									<a href="<?php echo base_url() . 'lang-switch/en'; ?>">
										<i class="fa fa-flag" aria-hidden="true"></i>
										<span>en</span>
									</a>
								</li>
                                <?php endif; ?>
                                <?php if($site_lang == 'en'): ?>
								<li>
									<a href="<?php echo base_url() . 'lang-switch/ar'; ?>">
										<i class="fa fa-flag" aria-hidden="true"></i>
										<span>ar</span>
									</a>
								</li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row ml-0 mr-0 ar-row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="logo"><a href="<?php echo base_url(); ?>"><img class="img-responsive" src="<?php echo base_url(); ?>assets/images/logo.png"></a></div>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    
                    <div class="main-nav text-right">
                        <div class="nav">
                            <ul>
                                <li><a class="active" href="<?php echo base_url(); ?>"><?php echo $lang['home']; ?></a></li>
								<li><a href="<?php echo base_url().'cms-page/about-us'?>"><?php echo $lang['about_us']; ?></a></li>
                                <li><a href="<?php echo base_url(); ?>become-vendor"><?php echo $lang['become_a_vendor']; ?></a></li>
                                <li><a href="<?php echo base_url(); ?>our-services"><?php echo $lang['our_services']; ?></a></li>
                                <li><a href="<?php echo base_url(); ?>contact-us"><?php echo $lang['contact_us']; ?></a></li>
                                <!--
								<li><a href="<?php echo base_url(); ?>about-us">About Us</a></li>
                                <li><a href="<?php echo base_url(); ?>become-vendor">Become A Vendor</a></li>
                                <li><a href="<?php echo base_url(); ?>our-services">Our Services</a></li>
                                <li><a href="<?php echo base_url(); ?>contact-us">Contact Us</a></li>
                                -->?
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="clear"></div>

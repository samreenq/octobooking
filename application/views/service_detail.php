
<div class="main-bnr inerban">
    <div class="container">
        <div class="mainfrm">
            <h1><?php echo displayLangText($service,'venue_name'); ?></h1>
            <nav aria-label="breadcrumb ">
                <ol class="breadcrumb styl1">
                    <li class="breadcrumb-item" aria-current="page"><?php echo $lang['home']; ?></li>
                    <li class="breadcrumb-item" aria-current="page"><?php echo $lang['service']; ?></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo displayLangText($service,'venue_name'); ?></li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<section class="servc-detail">
    <div class="container">
        <div class="cate-titl">
            <div class="spn"><?php echo $lang['service_category']; ?></div>
            <div class="cat"><?php echo displayLangText($category[0],'cat_name'); ?></div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 ar-float-right has-img-left">
                <img src="<?= base_url().'upload/'.$service['image'];?>" alt="">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="srv-dtail1-bx">
                    <h4><?php echo displayLangText($service,"venue_name"); ?></h4>
                    <p><?php echo displayLangText($service,"description"); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clear"></div>

<section class="main-srv-category" id="main-srv-category">
    <div class="container">
        <div class="main-txt" id="service-pkg">

            <h2><?php echo $lang['book_service_package']; ?></h2>
            <p><?php echo $lang['service_detail_text'] ;?></p>
            <p class="error-text hide venue-error"></p>
            <p class="success-text  hide venue-success"></p>
            <div class="col-lg-12"> 
                <h3 class="sub-heading"><?php echo $lang['provide_event_detail'] ;?></h3>
            </div>

            <div class="row ml-0 mr-0 ham-form align-inputs clear">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="event_date"><?php echo $lang['event_date_colon']; ?></label>
                        <input type="date" class="form-control" name="event_date" id="eventdate">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <!-- Search Google Map-->
                        <label for="event_date"><?php echo $lang['event_location']; ?>:</label>
                        <input class="form-control" id="searchTextField" type="text" size="50"
                            placeholder="<?php echo $lang['search_location_on_map'] ?>" autocomplete="on"
                            runat="server" />
                    </div>
                </div>

                <input type="hidden" name="latitude" value="" id="latitude" />
                <input type="hidden" name="longitude" value="" id="longitude" />

           <!-- <div class="col-lg-12">
                <div class="form-group">
                    <div id="address_map_canvas_admin" style="height: 300px;"></div>
                    <div id="current_admin" style="display: none;"></div>


                </div>
            </div>
-->
        </div>
        <?php
        if(($packages)>0){

           // echo '<pre>'; print_r($packages);
            ?>
            <div class="col-lg-12">
                <h3 class="sub-heading"><?php echo $lang['select_package'] ;?></h3>
            </div>

            <!-- <div class="row ml-0 mr-0">
                <div class="col-lg-4 col-md-4">
                    <div class="service-pkg-slide">
                        <div class="service-pkg-imgDiv">
                            <img src="<?= base_url();?>assets/images/pack2.jpg" class="service-pkg-img img-responsive" alt="">
                        </div>
                        <h4 class="service-pkg-heading">Package 01</h4>
                        <div class="service-pkg-body">
                            <p class="includes-heading">Includes</p>
                            <ul class="service-pkg-ul">
                                <li>
                                    lorem ipsum set dolor amet et dico odio
                                </li>
                            </ul>
                            <div class="bottom-div">
                                <div class="pkg-amount-div">
                                    <p class="">Price</p>
                                    <h6>SAR<span></span></h6>
                                </div>
                                <a href="#" class="select-pkg-btn">SELECT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

        <div class="row packages service-pkg">

            <?php
                foreach($packages as $pkg){

                   $is_booked =  packageBookedOrNot($cart,$pkg['id']);
                   $is_booked_button = ($is_booked) ? $lang['booked'] : $lang['select'];

                 if(empty($pkg['image_name'])){
                    $p_image = base_url()."assets/images/placeholder_product.png";
                    }else{
                        $p_image = base_url().'upload/'.$pkg['image_name'];
                    } ?>
            <div class="col-md-4 col-sm-4 col-xs-12" id="bookWrap-<?php echo $pkg['id']; ?>">
                <input type="hidden" name="booking_type" value="services" id="booking_type" />
                <input type="hidden" name="type" value="service" id="venuetype" />
                <input type="hidden" name="is_parent" id="is_parent" value="0" />
                <input type="hidden" name="venue_id" value="<?php echo $service['id']; ?>" id="venue_id" />
                <input type="hidden" name="vendor_id" value="<?php echo $service['vendor_id']; ?>" id="vendor_id" />
                <input type="hidden" name="package_id" id="package_id" value="<?php echo $pkg['id']; ?>">
                <input type="hidden" name="venue_price" value="<?php echo $pkg['service_price']; ?>" id="venue_price" />
                <input type="hidden" name="venue_name" value="<?php echo $service['venue_name']; ?>" id="venue_name" />
                <input type="hidden" name="package_name" value="<?php echo $pkg['service_name']; ?>" id="package_name" />


                <div class="main-pack">

                    <img class="img-responsive" src="<?= $p_image;?>" alt="">
                    <h4 class="pkgname"><?php echo displayLangText($pkg,'service_name'); ?></h4>
                    <div class="packinr-whit">
                        <h4><?php echo $lang['includes']; ?></h4>
                        <ul>
                            <?php
                                   // $includes =  get_pkg_includes($pkg['service_name']);
                                    foreach($pkg['includes'] as $inc){
                                        ?>
                            <li>
                                <img src="<?= base_url();?>assets/images/dot.jpg" alt="">
                                <?php echo displayLangText($inc,'service_desc'); ?> 
                            </li>

                            <?php
                                    }
                                    ?>
                        </ul>
                        <div class="show-more-div">
                            <a href="#" class="show-more-link">Show More</a>
                        </div>
                        <div class="totalamount">
                            <p class="total-text"><?php echo $lang['total']; ?></p>
                            <h6>SAR <span><?php echo $pkg['service_price']; ?></span></h6>
                        </div>

                        <?php if($this->session->userdata('role') != "2"){ ?>
                        <a href="javascript:void(0);" class="myclass2 addtocartBooking"
                            data-id="bookWrap-<?php echo $pkg['id']?>" data-pkg="<?php echo $pkg['id']; ?>"> <?php echo $is_booked_button; ?></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php

                }
                ?>
        </div>
       <!-- <div class="clear"></div>-->
        <?php
        }
        ?>

    </div>
    </div>
</section>

<!--<div class="clear"></div>-->

<section class="clientad">
    <div class="container">
        <h3><?php echo $lang['service_detail_text_1'] ;?></h3>
        <a href="#main-srv-category" class=""><?php echo $lang['book_now']; ?></a>
    </div>
</section>

<section class="main-gamer">
    <h3 class="wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="0.15"><?php echo $lang['photo_gallery'] ;?></h3>
    <div class="main-slider2">
        <ul class="slider2">
            <?php
            if($gallery>0){
                foreach($gallery as $gal){
                    ?>
            <li class="wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="0.15" style="height:auto;">
                <a data-fancybox="gallery" href="<?= base_url().'upload/'.$gal['image_name'];?>">
                    <img src="<?= base_url().'upload/'.$gal['image_name'];?>" alt="">
                </a>
            </li>
            <?php
                }
            }
            ?>
        </ul>
    </div>
</section>

<!-- <section class="images">
        <div class="row ml-0 mr-0">
            <div class="col-md-4">
                <a data-fancybox="gallery" href="<?= base_url();?>assets/images/im-2.png">
                    <img src="<?= base_url();?>assets/images/im-2.png" class="img-responsive" alt="">  
                </a>  
            </div>
            <div class="col-md-4">
                <a data-fancybox="gallery" href="<?= base_url();?>assets/images/im-3.png">
                    <img src="<?= base_url();?>assets/images/im-3.png" class="img-responsive" alt="">  
                </a>  
            </div>
            <div class="col-md-4">
                <a data-fancybox="gallery" href="<?= base_url();?>assets/images/im-4.png">
                    <img src="<?= base_url();?>assets/images/im-4.png" class="img-responsive" alt="">  
                </a>   
            </div>
        </div>
</section> -->
<!-- <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                </div>
            </div>
        </div>
    </section> -->

<div class="clear"></div>
<!--<input type="hidden" name="type" value="service" id="type" />
<input type="hidden" name="venue_id" value="<?php /*echo $service['id']; */?>" id="venuedetail" />
<input type="hidden" name="venue_price" value="<?php /*//echo 200;//$service['price']; */?>" id="venueprice" />
<input type="hidden" name="pkgname" value="<?php /*//echo 200;//$service['price']; */?>" id="pkgname" />
<input type="hidden" name="pkgprice" value="<?php /*//echo 200;//$service['price']; */?>" id="pkgprice" />
<input type="hidden" name="venue_name" value="<?php /*echo $service['venue_name']; */?>" id="venuename" />-->

<div id="msg3Modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-body">
                <div class="close-button" data-dismiss="modal"><img
                        src="<?php echo base_url(); ?>assets/images/close.svg" alt="Login" /></div>
                <div class="form-group">
                    <label for="event_date"><?php echo $lang['event_date_colon']; ?></label>
                    <input type="date" class="form-control" name="event_date" id="event_date" required>
                </div>
                <div class="form-group">
                    <label for="my-input-searchbox"><?php echo $lang['event_location_colon']; ?></label>
                    <select name="search" id="" class="location locationItems" id="my-input-searchbox" required
                        style="padding:20px">
                        <?php $Lcats = get_stripcats('location');
                        if($Lcats>0){
                            foreach($Lcats as $loc){
                                $selected = "";
                                ?><option value="<?php echo $loc['cat_name']; ?>" <?php echo $selected; ?>>
                            <?php echo  ucfirst($loc['cat_name']); ?></option><?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <p class="cartError" style="color:#f30;"></p>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-default addtocartBooking"
                    data-pkg=""><?php echo $lang['add_to_cart'] ?></a>
                <button type="hidden" class="btn btn-default addtocart" data-pkg="" style="display:none;"></button>
            </div>
        </div>

    </div>
</div>

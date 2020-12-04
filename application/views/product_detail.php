<div class="clear" xmlns="http://www.w3.org/1999/html"></div>
<div class="main-bnr inerban">
    <div class="container">
        <div class="mainfrm">
            <h1><?php echo displayLangText($product,'venue_name'); ?></h1>



            <nav aria-label="breadcrumb ">
                <ol class="breadcrumb styl1">
                    <li class="breadcrumb-item" aria-current="page"><?php echo $lang['home'] ?></li>
                    <li class="breadcrumb-item" aria-current="page"><?php echo $lang['venue'] ?></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo displayLangText($product,'venue_name'); ?></li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<section class="frmon">
    <div class="container">
        <?php $this->load->view('common/form_strip'); ?>

    </div>
</section>

<section class="main-tbs has-main-menu-slide" id="bookWrap-<?php echo $product['id']; ?>">

    <input type="hidden" name="booking_type" value="venue_services" id="booking_type" />
    <input type="hidden" name="type" value="venue" id="venuetype" />
    <input type="hidden" name="is_parent" id="is_parent" value="1" />
    <input type="hidden" name="venue_id" value="<?php echo $product['id']; ?>" id="venue_id" />
    <input type="hidden" name="vendor_id" value="<?php echo $product['vendor_id']; ?>" id="vendor_id" />
    <input type="hidden" name="venue_price" value="<?php echo $product['price']; ?>" id="venue_price" />
    <input type="hidden" name="venue_name" value="<?php echo $product['venue_name']; ?>" id="venue_name" />
    <input type="hidden" name="price_unit" value="<?php echo $product['unit_price']; ?>" id="price_unit" />
    <input type="hidden" name="capacity_from" value="<?php echo $product['capacity_from']; ?>" id="capacity_from" />
    <input type="hidden" name="capacity_to" value="<?php echo $product['capacity_to']; ?>" id="capacity_to" />
    <div class="main-nav">
        <div class="container">
            <div class="nav">
                <ul class="product-detailTab-ul">
                    <li class="active"><a class="active"
                            href="javascript:void(0);"><?php echo $lang['description'] ?></a></li>
                    <li><a href="#suit"><?php echo $lang['suitable_for_events'] ?></a></li>
                    <li><a href="#aminti"><?php echo $lang['amenities'] ?></a></li>
                    <li><a href="#selto"><?php echo $lang['select_add_on_services'] ?></a></li>
                    <li><a href="#simi"><?php echo $lang['location_similar'] ?></a></li>
                    <li><a href="#review">Reviews</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row ml-0 mr-0 ar-row">
            <div class="col-md-8 col-sm-8">
                <div class="slider">

                    <div class="slider slider-thumb">
                        <?php
                        if(count($gallery)>0){

                            foreach($gallery as $gal){
                                ?>
                        <div class="slider-thumbnail-div"><img src="<?= base_url().'upload/'.$gal['image_name'];?>" alt=""></div>

                        <?php
                            }

                        }else{/*
                                ?>
                        <div><img src="<?= base_url()."assets/images/placeholder_product.png";?>" alt=""></div>

                        <?php */
                        }
                        ?>

                    </div>
                    <div class="slider slider-content">
                        <?php
                        if(count($gallery)>0){

                            foreach($gallery as $gal){
                                ?>
                        <div><img src="<?= base_url().'upload/'.$gal['image_name'];?>" alt=""></div>

                        <?php
                            }

                        }else{
                            ?>
                        <div><img src="<?= base_url()."assets/images/placeholder_product.png";?>" alt=""
                                style="width:70%;"></div>

                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 prd-bok-main">
                <p class="error-text hide venue-error"></p>
                <p class="success-text hide venue-success"></p>
                <div class="prd-bok">
                    <ul>
                        <li><i>sar</i>
                            <h4>
                                <font id="venue-price"><?php echo $product['price']; ?></font>
                                <span class="unit-price-text"><?php echo $lang['per']." ".$lang[substr($product['unit_price'],3)]; ?></span>
                            </h4>
                        </li>
                        <li>
                            <h4><?php echo $lang['capacity'] ?>
                                <span><?php echo $product['capacity_from'].' - '.$product['capacity_to']; ?>
                                    <?php echo $lang['persons'] ?></span></h4>
                        </li>
                    </ul>
                    <div
                        class="event-has date-p-has <?php echo ($product['unit_price'] == "perseat") ? "half-width" : "full-width"?>">
                        <label><?php echo $lang['select_your_event_date'] ?> </label>
                        <input type="date" name="event_date" id="event_date" class="form-control venue-event-date"
                            data-id="<?php echo $product['id']; ?>" style="width:60%; margin:0px auto;"
                            placeholder="" />
                    </div>
                    <div class="event-has seat-p-has" <?php if($product['unit_price'] == "perseat"){ ?>style="display: block;"<?php }else{ ?>style="display:none;" <?php } ?>><label><?php echo $lang['no_of_seats'] ?> </label>
                        <input type="number" value="1" min="1" name="seats" id="seat" class="form-control" style="width:60%; margin:0px auto;" placeholder="" />
                    </div>

                    <?php if($this->session->userdata('role') != "2"){
                        if($bookable == 0){
                            ?>
                    <input type="hidden" name="is_bookable" id="is_bookable" value="0 ">
                    <a href="javascript:void(0);" class="addtocartBooking" data-id="bookWrap-<?php echo $product['id']; ?>">
                        <button class="btnbok"><?php echo $lang['book_now'] ?></button>
                    </a>
                    <?php }else{?>
                    <input type="hidden" name="is_bookable" id="is_bookable" value="1">
                    <?php echo $lang['already_in_cart'] ?>
                    <?php
                        }} ?>
                </div>
            </div>
        </div>
        <div class="txt-detail">
            <h3><?php echo showAsLang("name",$product); ?></h3>
            <p><?php echo showAsLang("desc",$product); ?></p>

        </div>
        <?php if(isset($day_prices) && !empty($day_prices)){ ?>
        <div class="txt-detail">

            <h4><?php echo $lang['day_pricing']; ?></h4>
            <div class="col-md-6">
                <table  class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>

                        <th class="custom-header"><?php echo $lang['day']; ?></th>
                        <th class="custom-header"><?php echo $lang['unit_price']; ?></th>
                        <th class="custom-header"><?php echo $lang['price']; ?></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($day_prices as  $day_price){ ?>
                            <tr>
                                <td><?php echo langText($day_price['day'],$lang); ?></td>
                                <td><?php
                                    if($day_price['price_unit'] == 'perseat'){
                                        echo $lang['per_seat'];
                                    }else{
                                        echo $lang['per_day'];
                                    }

                                    //echo $day_price['price_unit'];
                                    ?></td>
                                <td><?php echo $day_price['price']; ?></td></tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
        <?php } ?>
    </div>
</section>

<section class="sec3 inr details-sec-3">
    <div class="container">
        <div class="main-txt1" id="suit">
            <h2><?php echo $lang['suitable_for_events'] ?></h2>
            <p><?php echo $lang['venue_detail_text'] ?></p>
        </div>
        <div class="row ml-0 mr-0 ar-row">
            <?php
            $suitables = explode(",",$product['suitable']);
            foreach($suitables as $suitable){
                $i = getCatInfoByType('suitables',$suitable);

                $count = getVenueCountByCat($i['cat_name']);
               // echo '<pre>'; print_r($count); exit;
                ?>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="hotal-v1 suitable-event-card">
                    <a href="<?= base_url();?>products?search=&category=&event=<?php echo $i['id']; ?>">
                        <img class="img-responsive" src="<?= MEDIAURL.$i['cat_image'];?>">
                        <h5><?php echo displayLangText($i,'cat_name'); ?>
                            <?php if($count>0): ?>
                            <span><?php echo $count; ?> <?php echo $lang['venues'] ?></span>
                            <?php endif; ?>
                        </h5>
                    </a>
                </div>
            </div>
            <?php

            }
            ?>


        </div>

    </div>
</section>

<section class="sec3 inr-2 detail-has-4">
    <div class="container">
        <div class="main-txt1" id="aminti">
            <h2><?php echo $lang['amenities'] ?></h2>
            <p><?php echo $lang['venue_detail_text_1'] ?></p>
        </div>
        <div class="row ml-0 mr-0 ar-row">
            <?php
            $amenities = explode(",",$product['amenities']);
            foreach($amenities as $amenity){
                ?>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="hotal-v1">
                    <?php
                        $icon = getCatInfoByType('amenity',$amenity);
                        ?>
                    <img class="img-responsive" src="<?= MEDIAURL.$icon['cat_image'];?>">
                    <h5><?php echo displayLangText($icon,'cat_name'); ?> </h5>
                </div>
            </div>
            <?php
            }
            ?>
        </div>

    </div>
</section>
<?php if(!empty($product['venue_services'])){       ?>
<section class="sec3 inr2 detail-add-on">
    <div class="container">
        <div class="main-txt1" id="selto">
            <h2><?php echo $lang['select_add_on_services'] ?></h2>
            <p><?php echo $lang['venue_detail_text_2'] ?></p>
        </div>
        <?php if(count($services_cat)>0){  ?>
        <div class="row ml-0 mr-0 ar-row">
            <?php foreach($services_cat as $cat){
            //print_r($cat);
            ?>

            <div class="col-md-3 col-sm-2 col-xs-12">
                <a href="javascript:void(0);" class="popup-detail-addon" data-parent-id="<?php echo $product['id']; ?>"
                    data-id="<?php echo $cat['id']?>"
                    data-service-name="<?php echo displayLangText($cat,'venue_name') ?> ">
                    <div class="hotal-v1">
                        <img class="img-responsive" src="<?php echo MEDIAURL.$cat['cat_image'] ?>">
                        <h5><?php echo displayLangText($cat,'cat_name'); ?></h5>
                    </div>
                </a>
            </div>
            <?php } ?>
        </div>
        <?php } ?>

    </div>
</section>
<?php } ?>
<section class="sec3 inr-2">
    <div class="container">
        <div class="main-txt1" id="simi">
            <h2><?php echo $lang['location'] ?></h2>
            <p><?php echo $lang['venue_detail_text_3'] ?></p>
        </div>
        <input type="hidden" name="latitude" value="<?php echo $product['latitude'] ?>" id="latitude" />
        <input type="hidden" name="longitude" value="<?php echo $product['longitude'] ?>" id="longitude" />
        <div id="venue_map" style="height: 300px; position: relative; overflow: hidden;"></div>
        <div>

            <!--<iframe width="100%"
                    height="400"
                    frameborder="0" style="border:0"
                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDXg4q9PEJrsC521k0OVMwkEAv-72qKTYs
    &q=<?php /*echo $product['location']; */?>" allowfullscreen>
            </iframe>-->
            <?php if($this->session->userdata('role') != "2"){?>

            <!--  <button class="btn2 addtocart">Book Now</button>-->
            <?php } ?>
        </div>

    </div>
</section>

<section class="sec3 has-services has-detail-similar">
    <div class="container">
        <div class="main-txt1">
            <h2><?php echo $lang['similar_venue'] ?></h2>
            <p><?php echo $lang['venue_detail_text_4'] ?></p>
        </div>
        <div class="row similar-venue">

            <?php if($popular>0){
                $mylist = get_my_wishlist($this->session->userdata('user_id'));
                foreach($popular as $pop_product){
                    ?>
            <div class="col-md-3">
                <a href="<?php echo base_url().'product/'.$pop_product['id']; ?>">
                    <div class="sld2">
                        <img src="<?php echo $pop_product['image'];?>" class="most-popular-img">
                        <a href="javascript:void(0);"
                            <?php echo ($this->session->userdata('user_id') == "")?' data-toggle="modal" data-target="#loginModal" ':"id='addtowishlist'" ?>
                            data-id="<?php echo $pop_product['id']; ?>" class="has-wish-btn"><span
                                class="fa <?php echo (in_array($pop_product['id'],$mylist))?"fa-heart":"fa-heart-o"; ?> wishlist"></span></a>
                        <p><?php echo showAsLang("name",$pop_product); ?></p>
                        <ul>
                            <li>SAR <?php echo $pop_product['price']; ?>
                                <span><?php echo $lang['per']." ".$lang[substr($pop_product['unit_price'],3)]; ?></span>
                            </li>
                            <li><?php echo "".$pop_product['capacity_from'].' - '.$pop_product['capacity_to']; ?><span><?php echo $lang['capacity']; ?></span>
                            </li>
                        </ul>
                    </div>
                </a>
            </div>
            <?php
                }
            } ?>

        </div>
    </div>
</section>

<section class="sec2 testi product-detail" id="review">
       <div class="container">

            <div class="main-txt">
                <h2><?php echo $lang['reviews'] ?></h2>
                <p><?php echo $lang['reviews_text']; ?></p>
            </div>

           <div class="testimonials-3">
               <?php
              // $reviews = get_reviews();
               if($rating_reviews>0){
                   foreach($rating_reviews as $rev){

                       ?>

                       <div class="testimoni">
                           <img src="<?php echo (file_exists('./upload/'.$rev['user_img']))? base_url().'upload/'.$rev['user_img']:base_url()."assets/images/elipse.jpg"; ?>">
                           <h5><?php echo $rev['fullname']; ?>
                               <!--<span><?php /*echo $rev['email']; */?></span>-->
                            <div class="col-lg-12 col-md-12 text-center rating-col">
                                <div class="rating rating-large">
                                    <?php
                                        for($s = 1; $s <= 5; $s++){

                                            $style = '';

                                            if($rev['rating'] >= $s){
                                                $style = 'style="color:#feca02"';
                                            }
                                            ?>
                                            <label class="rating-label" for="<?php echo $s; ?>" <?php echo $style; ?>>&#9734</label>
                                    <?php  }
                                    ?>
                                </div>
                            </div>

                           </h5>
                           <p class="review-description"><?php echo $rev['review']; ?></p>
                       </div>
                       <?php 
                   }
               }
               ?>

           </div>
           <?php if($this->session->userdata('role') != "2"){ ?>
            <div class="review-btn-div">
				<a href="#" class="add-review-btn" data-toggle="modal" <?php echo ($this->session->userdata('user_id')== "")? 'data-target="#loginModal" readonly': 'data-target="#ratingModal"' ; ?>><i class="fa fa-plus"></i> <?php echo $lang['add_review']?></a>
			</div>
           <?php } ?>
       </div>
   </section>

<div class="modal fade" id="ratingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content ham-modal ham-form">
      <div class="modal-body">
        <h3 class="modal-title text-center" id="myModalLabel"><?php echo $lang['add_review']?></h3>
          <form class="demoForm" name="ratingForm" id="ratingForm" method="post" >
              <p class="error-text" style="display: none;"></p>
              <p class="success-text" style="display: none;"></p>
              <input type="hidden" id="venue_id" name="venue_id" value="<?php echo $product['id'] ?>" />
            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <label for="review-start" class="d-block"><?php echo $lang['ratings']?>:</label>
                    <div class="rating rating-large">
                        <input type="radio" name="rating" id="5" value="5"/>
                        <label class="rating-label" for="5">&#9734</label>
                        <input type="radio" name="rating" id="4" value="4"/>
                        <label class="rating-label" for="4">&#9734</label>
                        <input type="radio" name="rating" id="3" value="3"/>
                        <label class="rating-label" for="3">&#9734</label>
                        <input type="radio" name="rating" id="2" value="2"/>
                        <label class="rating-label" for="2">&#9734</label>
                        <input type="radio" name="rating" id="1" value="1"/>
                        <label class="rating-label" for="1">&#9734</label>
                    </div>
            </div> 
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="desc"><?php echo $lang['review_message']?>:</label>
                    <textarea class="form-control" placeholder="<?php echo $lang['enter_desc_here'];?>" name="desc" required="" id="desc"></textarea>
                </div>
            </div>
          </form>
        </div>
      <div class="modal-footer" style="clear:both;">
        <button  type="button" class="btn btn-primary submitRating"><?php echo $lang['save']?></button>
      </div>
    </div>
  </div>
</div>
<!--
<section class="sec3 inr4">
        <div class="container">
           <div class="main-txt1">
               <h2>Services</h2>
               <p>Contrary to popular belief, Lorem isn’t simply random text. It has roots in a of classical Latin<br> literature from 45 BC, making it over 2000 years old.</p>
           </div>

           <div class="row testimonials-2">
               <div class="col-md-3"><a href="<?php echo base_url(); ?>product/detail">
                   <div class="sld2">
                       <img src="<?= base_url();?>assets/images/image-57.png">
                       <p>Hire Greenwich Yacht Club The Committee Room</p>
                       <ul>
                           <li>SAR 120.0 <span>From / per day</span></li>
                           <li>50-100 <span>Capacity</span></li>
                       </ul>
                   </div></a>
               </div>
               <div class="col-md-3"><a href="<?php echo base_url(); ?>product/detail">
                   <div class="sld2">
                       <img src="<?= base_url();?>assets/images/image-58.png">
                       <p>Hire Greenwich Yacht Club The Committee Room</p>
                       <ul>
                           <li>SAR 120.0 <span>From / per day</span></li>
                           <li>50-100 <span>Capacity</span></li>
                       </ul>
                   </div></a>
               </div>
               <div class="col-md-3"><a href="<?php echo base_url(); ?>product/detail">
                   <div class="sld2">
                       <img src="<?= base_url();?>assets/images/image-59.png">
                       <p>Hire Greenwich Yacht Club The Committee Room</p>
                       <ul>
                           <li>SAR 120.0 <span>From / per day</span></li>
                           <li>50-100 <span>Capacity</span></li>
                       </ul></a>
                   </div>
               </div>
               <div class="col-md-3"><a href="<?php echo base_url(); ?>product/detail">
                   <div class="sld2">
                       <img src="<?= base_url();?>assets/images/image-60.png">
                       <p>Hire Greenwich Yacht Club The Committee Room</p>
                       <ul>
                           <li>SAR 120.0 <span>From / per day</span></li>
                           <li>50-100 <span>Capacity</span></li>
                       </ul>
                   </div></a>
               </div>
               <div class="col-md-3"><a href="<?php echo base_url(); ?>product/detail">
                   <div class="sld2">
                       <img src="<?= base_url();?>assets/images/image-58.png">
                       <p>Hire Greenwich Yacht Club The Committee Room</p>
                       <ul>
                           <li>SAR 120.0 <span>From / per day</span></li>
                           <li>50-100 <span>Capacity</span></li>
                       </ul>
                   </div></a>
               </div>
           </div>

       </div>
   </section>
-->
<div class="modal-backdrop-has packageModal fade"></div>
<div class="has-popup-main">
    <div class="close-button-details"><img src="<?php echo base_url(); ?>assets/images/close.svg" alt="close" /></div>
    <div class="main-srv-category" id="main-srv-category">
        <div class="container2">
            <div class="main-txt" id="service-pkg">
                <h2 id="service-name">Decoration Packages</h2>
                <p class="error-text venue-error hide "></p>
                <p class="success-text venue-success hide"></p>
            </div>
            <span class="cartError" style="color:#f30;"></span>

            <div class="pack-loader"><img src="<?php echo base_url(); ?>assets/images/loader.gif" alt="Loader" /></div>
            <div class="has-details-package">
            </div>
        </div>
    </div>
</div>
</div>
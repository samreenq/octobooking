 <div class="row packages">
        <!--<div class="col-md-4 col-sm-4 col-xs-12">
            <div class="main-pack">
                <img class="img-responsive" src="http://localhost/octobooking/upload/5e5700fe750a5Package_1.png" alt="">
                <h4 class="pkgname">Package 1</h4>
                <div class="packinr-whit">
                    <h4>Includes</h4>
                    <ul>
                        <li>
                            <img src="http://localhost/octobooking/assets/images/dot.jpg" alt="">
                            pi 1
                        </li>
                        <li>
                            <img src="http://localhost/octobooking/assets/images/dot.jpg" alt="">
                            pi 2
                        </li>
                        <li>
                            <img src="http://localhost/octobooking/assets/images/dot.jpg" alt="">
                            pi 3
                        </li>
                        <li>
                            <img src="http://localhost/octobooking/assets/images/dot.jpg" alt="">
                            abc options
                        </li>
                        <li>
                            <img src="http://localhost/octobooking/assets/images/dot.jpg" alt="">
                            option 3
                        </li>
                        <li>
                            <img src="http://localhost/octobooking/assets/images/dot.jpg" alt="">
                            anc3
                        </li>
                        <li>
                            <img src="http://localhost/octobooking/assets/images/dot.jpg" alt="">
                            anc3
                        </li>
                    </ul>
                    <div class="totalamount">
                        <p>total</p>
                        <h6>SAR <span>200.00</span></h6>
                    </div>
                    <a href="javascript:void(0);" class="myclass2" data-toggle="modal" data-target="#msg3Modal" data-pkg="28" tabindex="0">
                        select</a>
                </div>
            </div>
        </div>-->


    <?php if(count($packages)>0){

       //echo '<pre>'; print_r($packages); exit;
        ?>
        <?php foreach($packages as $package){
            $package_image = !empty($package['image']) ? $package['image'] : "";
            ?>
            <div class="col-md-4 col-sm-4 col-xs-12 bookWrap" id="bookWrap-<?php echo $package['id']; ?>">
                <input type="hidden" name="booking_type" value="venue_services" id="booking_type" />
                <input type="hidden" name="is_parent" id="is_parent" value="2" />
                <input type="hidden" name="type" value="service" id="venuetype" />
                <input type="hidden" name="venue_id" value="<?php echo $package['venue_id']; ?>" id="venue_id" />
                <input type="hidden" name="vendor_id" value="<?php echo $package['vendor_id']; ?>" id="vendor_id" />
                <input type="hidden" name="package_id" id="package_id" value="<?php echo $package['id']; ?>">
                <input type="hidden" name="venue_price" value="<?php echo $package['service_price']; ?>" id="venue_price" />
                <input type="hidden" name="venue_name" value="<?php echo $service_name; ?>" id="venue_name" />
                <input type="hidden" name="package_name" value="<?php echo $package['service_name']; ?>" id="package_name" />
                <input type="hidden" name="eventdate" value="<?php echo $event_date; ?>" id="eventdate" />

                <div class="main-pack">
                    <?php if(empty($package_image)){
                        $p_image = base_url()."assets/images/placeholder_product.png";
                    }else{

                        $p_image = base_url().'upload/'.$package_image;
                    } ?>
                    <img class="img-responsive" src="<?php echo $p_image;  ?>" alt="">
                    <h4 class="pkgname"><?php echo displayLangText($package,'service_name') ?></h4>
                    <div class="packinr-whit">
                        <h4><?php echo $lang['includes'] ?></h4>

                        <?php if(count($package['includes']) > 0) { ?>
                            <ul>
                            <?php foreach ($package['includes'] as $include) { ?>
                                <li><?php echo displayLangText($include, 'service_desc'); ?></li>
                            <?php } ?>
                            </ul>
                                <?php
                        } ?>
                        <div class="totalamount">
                            <p><?php echo $lang['total'] ?></p>
                            <h6>SAR <span><?php echo $package['service_price'] ?></span></h6>
                        </div>
                        <?php if($package['is_bookable']): ?>
                            <a href="javascript:void(0);" class="" data-pkg="" >
                                <?php echo $lang['booked'] ?></a>
                        <?php else: ?>
                         <?php if($this->session->userdata('role') != "2"){?>
                        <a href="javascript:void(0);" class="myclass2 addtocartBooking" data-id="bookWrap-<?php echo $package['id']?>" data-pkg="" >
                            <?php echo $lang['select'] ?></a>
                          <?php } ?>
                        <?php endif; ?>
                        <button type="hidden" class="btn btn-default addtocart" data-pkg="" style="display:none;">
                    </div>
                </div>
            </div>
        <?php }  ?>
    <?php } ?>
</div>
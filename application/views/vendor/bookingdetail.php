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
    .im-pro1 h5 {
        margin: 13px 10px;
        background:
                #d7d1d173;
        padding: 10px;
        text-align: center;
    }
    .im-pro1 h3 {
        color: #2b9ed5;
        text-align: center;
    }
    .small-s{
        text-align:center;
    }
    .totalCost{
        padding: 10px 0px;
        font-weight: bold;
        font-size: 30px;
        text-align: center;
        border-top:#d5d2d2 solid 1px;
        border-bottom:#d5d2d2 solid 1px;
        margin: 60px 15px 10px;
    }
    .totalCost span{
        color:#2b9ed5;
    }
</style>
<section class="vrprofle">
    <div class="container">
        <div class="col-md-6">
            <div class="pro-log" style="margin:10% auto;">
                <div class="im-pro" style="top :10px">
                    <img src="<?php echo (file_exists('./upload/'.$user['user_img']))?base_url().'upload/'.$user['user_img']:base_url()."assets/images/elipse.jpg"; ?>" style="cursor:pointer;" alt="">
                    <h5><?php echo $booking['fullname']; ?> <span><?php echo $booking['email']; ?></span></h5>
                    <p><?php echo $booking['phone']; ?></p>
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <div class="pro-log" style="margin:15% auto;">
                <div class="im-pro1" style="top :10px; padding:3px;">
                    <h5><?php echo $lang['booking_id'] ?>: <?php echo "OCTO-".$booking['id'] ?></h5>
                    <div class="col-md-6" style="border-right: #d5d2d2 solid 1px;"><h3><?php echo $booking['event_name']; ?></h3><div class="small-s"><?php echo date('F j, Y g:i a', strtotime($booking['created_at'])) ?></div></div>
                    <!--<div class="col-md-6"><h3><?php /*echo "Capacity"; */?></h3><div class="small-s"><?php /*echo $booking['total_seats'].' Persons.' */?></div></div>-->
                    <div class="col-md-6"><h3><?php echo $lang['booking_no']; ?></h3><div class="small-s"><?php echo $booking['booking_no'] ?></div></div>
                </div>
                <div class="col-md-12 totalCost">SAR <span><?php echo $booking['total']; ?></span></div>
                <!--            <p style="text-align: left;padding: 15px;"><?php /*echo (is_array($booking['addons']))?implode("<br />",json_decode($booking['addons'])):$booking['addons']; */?></p>
-->
                <p style="text-align: left;padding: 15px;"><?php echo $booking['description']; ?></p>


            </div>

        </div>
        <!-- <div class="col-md-6">
              <div class="pro-log" style="">
                  <div class="col-md-12 totalCost">Booking #:<span>
                         <?php /*echo $booking['booking_no']; */?></span></div>

                  <p style="text-align: left;padding: 8px;">Booking Type: <?php /*echo $booking['type']; */?></p>
                  <p style="text-align: left;padding: 8px;">  Venue Name: <?php /*echo $booking['venue_name']; */?></p>

                  <?php /*if($booking['type'] == 'service'): */?>
                  <p style="text-align: left;padding: 8px;"> Package Name: <?php /*echo $booking['package_name']; */?></p>
                 <?php /*endif; */?>
                  <p style="text-align: left;padding: 8px;"> Event Date: <?php /*echo date('F j, Y, g:i a', strtotime($booking['eventdate'])); */?></p>
                  <p style="text-align: left;padding: 8px;"> Created Date: <?php /*echo date('F j, Y, g:i a', strtotime($booking['created_at'])); */?></p>
                  </p>
              </div>
          </div>
-->
        <div class="col-md-12">
            <table id="venues" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>

                    <th><?php echo $lang['booking_item_no']; ?></th>
                    <th><?php echo $lang['type']; ?></th>
                    <th><?php echo $lang['venue_name']; ?></th>
                    <th><?php echo $lang['event_date']; ?></th>
                    <th><?php echo $lang['total_seats']; ?></th>
                    <th><?php echo $lang['price_per_unit']; ?></th>
                    <th><?php echo $lang['sub_total']; ?></th>
                </tr>
                </thead>
                <tbody>
                <?php
                if($booking_items != false){
                    foreach($booking_items as $item){

                        ///die($this->session->userdata('user_id').$item['vendor_id']);

                        $color = '';
                        if($this->session->userdata('user_id') == $item['vendor_id']){
                            $color = 'style="background-color:green;"';
                        }

                        ?>
                        <tr>
                            <td <?php echo $color; ?>><span ><?php echo $item['id']; ?></span></td>
                            <td><?php echo $lang[$item['type']]; ?></td>
                            <td><?php echo displayLangText($item,'venue_name'); ?>
                                <?php if($item['type'] == 'service'): ?> |
                                    <?php echo displayLangText($item,'package_name'); ?>
                                <?php endif; ?></td>
                            <td><?php echo date('F j, Y g:i a', strtotime($item['eventdate'])); ?></td>
                            <td><?php echo $item['total_seats']; ?></td>
                            <td><?php echo $item['price_per_unit']; ?></td>
                            <td><?php echo $item['subtotal']; ?></td>
                        </tr>
                    <?php  } }  ?>
                </tbody>
            </table>
        </div>


        <div class="col-md-6">
            <!-- <input type="hidden" name="latitude" value="<?php /*echo $booking['latitude'] */?>" id="latitude" />
              <input type="hidden" name="longitude" value="<?php /*echo $booking['longitude'] */?>" id="longitude" />
              <div id="venue_map" style="height: 500px; position: relative; overflow: hidden;"></div>-->
        </div>
    </div>
</section>

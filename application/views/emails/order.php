<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <title>Octobooking Email Template</title>
</head>
<body style="font-family: 'Roboto', sans-serif; color: #6e6e6e;">
<div style="padding: 30px 60px; background: white; margin: 0 auto; width: 75%;">
    <table border="0" cellpadding="15" cellspacing="0" width="100%" align="center" style="background: white; padding: 15px;">
        <tr height="150">
            <td align="center" colspan="2">
                <img src="<?php echo base_url('assets/images/email') ?>/logo-footer.png" alt="">
            </td>
        </tr>
        <tr height="60">
            <td align="center" colspan="2">
                <img src="<?php echo base_url('assets/images/email') ?>/thanks.png" alt="" style="width: 200px;">
            </td>
        </tr>
        <tr height="2">
            <td align="left" colspan="2">Hi <?php echo $order['fullname']; ?>,</td>
        </tr>
        <tr height="2">
            <td align="left" colspan="2" style="padding-bottom:30px;">Your Order number is <span style="color:#8f278f;"><?php echo $order['booking_no']; ?></span> has been placed successfully. You'll find all the details about your booking below.</td>
        </tr>
        <tr>
            <td align="left" style="border-bottom: 1px solid #e8e7e7; width: 50%; color: #8f278f;"><b>Booking Number</b></td>
            <td align="left" style="border-bottom: 1px solid #e8e7e7; width: 50%; color: #8f278f;"><b>Booking Date</b></td>
        </tr>
        <tr>
            <td align="left"><?php echo $order['booking_no']; ?></td>
            <td align="left"><?php echo date('F j, Y, g:i a', strtotime($order['created_at'])) ; ?></td>
        </tr>
        <tr>
            <td align="left" style="border-bottom: 1px solid #e8e7e7; color: #8f278f;"><b>Event Name</b></td>
            <td align="left" style="border-bottom: 1px solid #e8e7e7; color: #8f278f;"><b>Your Phone</b></td>
        </tr>
        <tr>
            <td align="left"><?php echo $order['event_name']; ?></td>
            <td align="left"><?php echo $order['phone']; ?></td>
        </tr>
        <tr>
            <td align="left" colspan="2">Here's what you ordered:</td>
        </tr>
        <tr>
            <td align="left" colspan="2">
                <table border="0" cellpadding="5" cellspacing="0" width="100%">
                    <tr>
                        <td align="left" style="border-bottom: 1px solid #e8e7e7; padding-bottom: 10px; color: #8f278f; width:25%;">
                            <b>ITEM<b>
                        </td>
                        <td align="left" style="border-bottom: 1px solid #e8e7e7; padding-bottom: 10px; color: #8f278f; width:25%;">
                            <b>SERVICE</b>
                        </td>
                        <td align="left" style="border-bottom: 1px solid #e8e7e7; padding-bottom: 10px; color: #8f278f; width:25%;">
                            <b>Event Date</b>
                        </td>
                        <td align="center" style="border-bottom: 1px solid #e8e7e7; padding-bottom: 10px; color: #8f278f; width:25%;">
                            <b>Total Seats</b>
                        </td>
                        <td align="center" style="border-bottom: 1px solid #e8e7e7; padding-bottom: 10px; color: #8f278f; width:25%;">
                            <b>PRICE</b>
                        </td>
                    </tr>

                    <?php
                    if($booking_items != false){
                    foreach($booking_items as $item){
                    ?>
                    <tr>
                        <td align="left" style="border-bottom: 1px solid #e8e7e7;padding: 15px 5px;">
                            <?php echo $item['venue_name']; ?>
                        </td>
                        <td align="left" style="border-bottom: 1px solid #e8e7e7;padding: 15px 5px;">
                            <?php echo $item['package_name']; ?>
                        </td>
                        <td align="center" style="border-bottom: 1px solid #e8e7e7;padding: 15px 5px;">
                            <?php echo date('F j, Y, g:i a', strtotime($item['eventdate'])); ?>
                        </td>
                        <td align="center" style="border-bottom: 1px solid #e8e7e7;padding: 15px 5px;">
                            <?php echo $item['total_seats']; ?>
                        </td>
                        <td align="center" style="border-bottom: 1px solid #e8e7e7;padding: 15px 5px;">
                            SAR <?php echo $item['subtotal']; ?>
                        </td>
                    </tr>
                    <?php  } }  ?>

                    <tr>
                        <td colspan="4" align="right" style="padding-right: 75px;padding-top: 20px;">
                            Subtotal: SAR <?php echo $order['total']; ?>
                        </td>
                    </tr>
                   <!-- <tr>
                        <td colspan="4" align="right" style="padding-right: 75px;">
                            VAT(5%): 32.00
                        </td>
                    </tr>-->
                    <tr>
                        <td colspan="4" align="right" style="padding-right: 75px; padding-bottom: 20px; border-bottom: 2px solid #8f278f;">
                            Discount: 0.00
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" align="right" style="padding-right: 75px; padding-top: 20px; color: #8f278f;">
                            <b>Grand Total: SAR <?php echo $order['total']; ?></b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1" align="left" style="padding-top: 30px; color: #8f278f;">
                            <b>Special Instruction:</b>
                        </td>
                        <td colspan="3" style="padding-top: 30px;">
                            <?php echo $order['description']; ?>
                        </td>
                    </tr>
                   <!-- <tr>
                        <td colspan="1" align="left" style="padding-top: 20px; color: #8f278f;">
                            <b>Coupon:</b>
                        </td>
                        <td colspan="3" style="padding-top: 20px;">
                            asd142141f
                        </td>
                    </tr>-->
                    <tr>
                        <td colspan="4" align="left" style="padding-top: 40px;">
                            Kind Regards,
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" align="left">
                            The Octobooking Team
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
        <tr height="10">
            <td align="left" colspan="2" style="border-bottom: 2px solid #8f278f;">&nbsp;</td>
        </tr>
    </table>
    <p style="text-align:center; color:#8f278f; margin-top: 2%;">Copyright 2020. All rights reserved</p>
    <p style="text-align:center; color:#8f278f;">help@octobooking <img src="<?php echo base_url('assets/images/email') ?>/Oval.png" alt="" style="padding: 0px 8px;">  +9167-904-0309</p>
    <ul style="display:flex;padding:0px;width:250px;margin:20px auto; justify-content: center;">
        <li style="list-style:none;padding-right:20px"><a href="#"><img src="<?php echo base_url('assets/images/email') ?>/fb-icon.png" class=""></a></li>
        <li style="list-style:none;padding-right:20px"><a href="#"><img src="<?php echo base_url('assets/images/email') ?>/ig-icon.png" class=""></a></li>
        <li style="padding-right:0px!important;list-style:none"><a href="#"><img src="<?php echo base_url('assets/images/email') ?>/twitter-icon.png" class=""></a></li>
    </ul>
</div>
</body>
</html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <title>Octobooking Welcome</title>
</head>
<body style="font-family: 'Roboto', sans-serif; color: #6e6e6e;">

<div style="padding: 30px 60px; background: white; margin: 0 auto; width: 75%;">
    <table border="0" cellpadding="15" cellspacing="0" width="100%" align="center" style="background: white; padding: 15px;">
        <tr height="150">
            <td align="center" colspan="2">
                <img src="<?php echo base_url('assets/images/email') ?>/logo-footer.png" alt="">
            </td>
        </tr>
        <tr height="2">
            <td align="left" colspan="2">
                <h2 style="color: #8f278f; margin: 0;">You are almost there....</h2>
            </td>
        </tr>
        <tr height="2">
            <td align="left" colspan="2">Dear <?php echo $data['fullname']; ?>,</td>
        </tr>
        <tr>
            <td align="left" colspan="2">Welcome to Octobooking. Before we can get started, we need to quickly verify your email address. Please click the link below and sign in using your new Octobooking ID: <?php echo $data['email']; ?></td>
        </tr>
        <tr>
            <td align="left" colspan="2"> <a href="<?php echo base_url().'activate-user?code='.$data['activation_code'] ?>" style="background: #8f278f; text-decoration: none; color: white; padding: 10px 20px; margin: 15px 0px; display: inline-block;">verify your email link</a></td>
        </tr>
        <tr>
            <td align="left" colspan="2"> Thank you for signing up, and good luck in your search to find the best business for your warehouse.</td>
        </tr>
        <tr>
            <td colspan="4" align="left" style="padding-top: 20px;">
                Kind Regards,
            </td>
        </tr>
        <tr>
            <td colspan="4" align="left" style="padding-top: 5px;">
                The Octobooking Team
            </td>
        </tr>
        <tr height="10">
            <td align="left" colspan="2" style="border-bottom: 2px solid #8f278f;">&nbsp;</td>
        </tr>
    </table>
    <p style="text-align:center; color:#8f278f; margin-top: 2%;">Copyright <?php echo date('Y'); ?>. All rights reserved</p>
    <p style="text-align:center; color:#8f278f;">help@octobooking <img src="<?php echo base_url('assets/images/email') ?>/Oval.png" alt="" style="padding: 0px 8px;">  +9167-904-0309</p>
    <ul style="display:flex;padding:0px;width:250px;margin:20px auto; justify-content: center;">
        <li style="list-style:none;padding-right:20px"><a href="#"><img src="<?php echo base_url('assets/images/email') ?>/fb-icon.png" class=""></a></li>
        <li style="list-style:none;padding-right:20px"><a href="#"><img src="<?php echo base_url('assets/images/email') ?>/ig-icon.png" class=""></a></li>
        <li style="padding-right:0px!important;list-style:none"><a href="#"><img src="<?php echo base_url('assets/images/email') ?>/twitter-icon.png" class=""></a></li>
    </ul>
</div>
</body>
</html>
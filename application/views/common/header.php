<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png">
    <title>Home | Octo Booking</title>
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Poppins:100,100i,200,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/os-lib.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/lightbox.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">

    <?php if($site_lang == 'ar'): ?>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/arabic-style.css">
    <?php endif; ?>
</head>

<body>
<?php $this->load->view('common/navigation'); ?>
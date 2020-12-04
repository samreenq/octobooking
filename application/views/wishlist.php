<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
<div class="main-bnr inerban bookin-lst">
    <div class="container">
        <div class="mainfrm">
            <h1><?php echo $lang['my_wishlist'] ?></h1>
            <nav aria-label="breadcrumb ">
                <ol class="breadcrumb styl1">
                    <li class="breadcrumb-item" aria-current="page"><?php echo $lang['home'] ?></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $lang['my_wishlist'] ?></li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<
   <section class="main-prolst">
     <div class="container ham-wishlist">
       <div class="row ml-0 mr-0 ar-row">

            <!-------------- product listing start ------------>

          <div class="col-md-8 col-sm-8 col-xs-12">
            
            <?php if($venues>0){
            $mylist = get_my_wishlist($this->session->userdata('user_id'));
                ?>
                <div class="prlis-rit">
                  <h5><?= count($venues).' '.$lang['venue(s)']." ".$lang['found_result'];// str_pad(count($venues),2,STR_PAD_LEFT)." venues"; ?></h5>
                <div class="row">
                <?php 
                foreach($venues as $venue){
                    ?>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                            <a href="<?php echo ($venue['type'] == "venue")?base_url().'product/'.$venue['id']:base_url().'service/'.$venue['id']; ?>">
                           <div class="sld2">
                               <img src="<?= ($venue['image'] != "")?base_url().'upload/'.$venue['image']:base_url()."assets/images/placeholder_product.png"; ?>" alt="" style="height:180px;">
							   <a href="javascript:void(0);" <?php echo ($this->session->userdata('user_id') == "") ? ' data-toggle="modal" data-target="#loginModal" ' : "id='addtowishlist'" ?> data-id="<?php echo $venue['id']; ?>" class="has-wish-btn"><span class="fa <?php echo (in_array($venue['id'], $mylist)) ? "fa-heart" : "fa-heart-o"; ?> wishlist"></span></a>
                               <p><?= showAsLang("name",$venue); ?></p>
                               <ul>
                                   <li>SAR <?= $venue['price']; ?> <span><?php echo "Per ".substr($venue['unit_price'],3); ?></span></li>
                                   <li><?= ($venue['type'] == "venue")?"".$venue['capacity_from'].' - '.$venue['capacity_to'].'<span>Capacity</span>':substr($venue['description'],0,90).'...'; ?> </li>
                               </ul>
                           </div></a>
                      </div>
                    <?php 
                }
                ?>
                    <p class="pagination-p"><?php echo $links; ?></p>
                    <?php
            }else{
               ?>
                <div class="prlis-rit">
                  <h5><?= " No results found against your search criteria"; ?></h5>
                <div class="row">
                <?php  
            }
            ?>
              
            </div>
            </div>
          </div>
          <!-------------- product listing End ------------>
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

<style>
    .prlis-rit h5{
        color:#337ab7;
    }
</style>
    <div class="clear"></div>
    <div class="main-bnr inerban">
        <div class="container">
            <div class="mainfrm">
                <h1><?php echo $lang['venue_listing'] ?></h1>

                  

            <nav aria-label="breadcrumb ">
  <ol class="breadcrumb styl1">
    <li class="breadcrumb-item" aria-current="page"><?php echo $lang['home'] ?></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $lang['venue_listing'] ?></li>
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

   <section class="main-prolst">
     <div class="container">
       <div class="row ml-0 mr-0 ar-row">
        <!-------------- filter Start ------------>

           <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="prolst-lft">
              <div class="clrfitr">
                <form method="GET" action="<?= base_url();?>products">
                  <input type="hidden" name="search" value="<?php echo (isset($_GET['search']))?$_GET['search']:"";  ?>" />
                  <input type="hidden" name="event" value="<?php echo (isset($_GET['event']))?$_GET['event']:"";  ?>" />
                  <input type="hidden" name="category" value="<?php echo (isset($_GET['category']))?$_GET['category']:"";  ?>" />
                    <div class="slct-styl">
                        <input type="date" name="event_date" placeholder="Event Date" class="form-control" value="<?php echo (isset($_GET['event_date']))?$_GET['event_date']:"";  ?>" onchange="this.form.submit()" />
                    </div>
                    <div class="slct-styl">
                        <select name="capacity" onchange="this.form.submit()">
                        <option value=""><?php echo $lang['guest'] ?></option>
                        <option value="100" <?php echo (isset($_GET['capacity']) && $_GET['capacity'] == "100")?"selected":"";  ?>>50 - 100</option>
                        <option value="200" <?php echo (isset($_GET['capacity']) && $_GET['capacity'] == "200")?"selected":"";  ?>>100 - 200</option>
                        <option value="300" <?php echo (isset($_GET['capacity']) && $_GET['capacity'] == "300")?"selected":"";  ?>>200 - 300</option>
                        <option value="400" <?php echo (isset($_GET['capacity']) && $_GET['capacity'] == "400")?"selected":"";  ?>>300 - 400</option>
                        <option value="500" <?php echo (isset($_GET['capacity']) && $_GET['capacity'] == "500")?"selected":"";  ?>>400 - 500</option>
                        <option value="501" <?php echo (isset($_GET['capacity']) && $_GET['capacity'] == "501")?"selected":"";  ?>>500+</option>
                    </select>
                    <i class="fa fa-angle-down" aria-hidden="true"></i>

                    </div>
                    <div class="slct-styl">
                        <select name="budget" onchange="this.form.submit()">
                        <option value=""><?php echo $lang['budget'] ?></option>
                        <option value="100" <?php echo (isset($_GET['budget']) && $_GET['budget'] == "100")?"selected":"";  ?>>Less than 100</option>
                        <option value="200" <?php echo (isset($_GET['budget']) && $_GET['budget'] == "200")?"selected":"";  ?>>Less than 200</option>
                        <option value="300" <?php echo (isset($_GET['budget']) && $_GET['budget'] == "300")?"selected":"";  ?>>Less than 300</option>
                        <option value="400" <?php echo (isset($_GET['budget']) && $_GET['budget'] == "400")?"selected":"";  ?>>Less than 400</option>
                        <option value="401" <?php echo (isset($_GET['budget']) && $_GET['budget'] == "401")?"selected":"";  ?>>More than 400</option>
                    </select>
                    <i class="fa fa-angle-down" aria-hidden="true"></i>

                    </div>
                    <div class="slct-styl">
                        <select name="event" onchange="this.form.submit()">
                        <option value=""><?php echo $lang['select_event_type'] ?></option>
                        <?php 
                            $hcats = get_stripcats('suitables');
                            foreach($hcats as $cat){
                                $selected = "";
                                if(isset($_GET['event']) && $_GET['event'] != "")
                                $selected = ($cat['id'] == $_GET['event'])?"selected='selected'":"";
                                echo '<option value="'.$cat['id'].'" '.$selected.'>'.ucfirst($cat['cat_name']).'</option>';
                            }
            
                        ?>
                    </select>
                    <i class="fa fa-angle-down" aria-hidden="true"></i>

                    </div>
                    <div class="slct-styl">
                        <select name="venuetype" id="venuetype">
                            <option value=""><?php echo $lang['select_venue_type']?></option>
                            <option value="event" <?php echo (isset($_GET['venuetype']) && $_GET['venuetype'] == "event")?"selected":"";  ?>><?php echo $lang["event"]; ?></option>
                            <option value="hotels" <?php echo (isset($_GET['venuetype']) && $_GET['venuetype'] == "hotels")?"selected":"";  ?>><?php echo $lang["hotels"]; ?></option>
                            <option value="conference_centres" <?php echo (isset($_GET['venuetype']) && $_GET['venuetype'] == "conference_centres")?"selected":"";  ?>><?php echo $lang["conference_centres"]; ?></option>
                            <option value="business_centres" <?php echo (isset($_GET['venuetype']) && $_GET['venuetype'] == "business_centres")?"selected":"";  ?>><?php echo $lang["business_centres"]; ?></option>
                            <option value="community_centres" <?php echo (isset($_GET['venuetype']) && $_GET['venuetype'] == "community_centres")?"selected":"";  ?>><?php echo $lang["community_centres"]; ?></option>
                            <option value="sports_clubs" <?php echo (isset($_GET['venuetype']) && $_GET['venuetype'] == "sports_clubs")?"selected":"";  ?>><?php echo $lang["sports_clubs"]; ?></option>
                            <option value="academic_venues" <?php echo (isset($_GET['venuetype']) && $_GET['venuetype'] == "academic_venues")?"selected":"";  ?>><?php echo $lang["academic_venues"]; ?></option>
                            <option value="stately_homes" <?php echo (isset($_GET['venuetype']) && $_GET['venuetype'] == "stately_homes")?"selected":"";  ?>><?php echo $lang["stately_homes"]; ?></option>
                            <option value="stadiums_arenas" <?php echo (isset($_GET['venuetype']) && $_GET['venuetype'] == "stadiums_arenas")?"selected":"";  ?>><?php echo $lang["stadiums_arenas"]; ?></option>
                        </select>
                    </div>
                    <a href="<?= base_url(); ?>products" class="has-clear-fil"><?php echo $lang['clear_filter']; ?></a>
                 
                </form>
                 </div>
              </div>
              <div class="mapi">
                <div id="map"></div>
                <p><?php echo $lang['venue_list_text']; ?></p>
              </div>


              <!--<div class="blog-main">-->
              <!--  <h3>Popular Search</h3>-->
              <!--  <p>Contrary to popular belief lorem isn’t simply random text It has roots in a of classical Latin literature from 45 BC, making it over 2000 years old.</p>-->
              <!--</div>-->

              <!--<div class="cutommedia-bx">-->
              <!--  <div class="media">-->
              <!--    <div class="media-left">-->
              <!--      <img src="<?= base_url();?>assets/images/im11.png" class="media-object" style="width:60px">-->
              <!--    </div>-->
                 
              <!--  </div>-->
                
              <!--  <div class="media">-->
              <!--    <div class="media-body">-->
              <!--      <p>Corporate Event Place Contrary to popular belief lorem isn’t simply...</p>-->
              <!--      <a href="javascript:void(0);">Read more</a>-->
              <!--    </div>-->
                  
              <!--  </div>-->
              <!--</div>-->

              <!--<div class="cutommedia-bx">-->
              <!--  <div class="media">-->
              <!--    <div class="media-left">-->
              <!--      <img src="<?= base_url();?>assets/images/im11.png" class="media-object" style="width:60px">-->
              <!--    </div>-->
                 
              <!--  </div>-->
                
              <!--  <div class="media">-->
              <!--    <div class="media-body">-->
              <!--      <p>Corporate Event Place Contrary to popular belief lorem isn’t simply...</p>-->
              <!--      <a href="javascript:void(0);">Read more</a>-->
              <!--    </div>-->
                  
              <!--  </div>-->
              <!--</div>-->

              <!--<div class="cutommedia-bx">-->
              <!--  <div class="media">-->
              <!--    <div class="media-left">-->
              <!--      <img src="<?= base_url();?>assets/images/im11.png" class="media-object" style="width:60px">-->
              <!--    </div>-->
                 
              <!--  </div>-->
                
              <!--  <div class="media">-->
              <!--    <div class="media-body">-->
              <!--      <p>Corporate Event Place Contrary to popular belief lorem isn’t simply...</p>-->
              <!--      <a href="javascript:void(0);">Read more</a>-->
              <!--    </div>-->
                  
              <!--  </div>-->
              <!--</div>-->


            </div> 
            <!-------------- filter end ------------>
            
            <!-------------- product listing start ------------>

          <div class="col-md-9 col-sm-9 col-xs-12">
            
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
                               <img src="<?= ($venue['image'] != "")?base_url().'upload/'.$venue['image']:base_url()."assets/images/placeholder_product.png"; ?>" alt="">
							   <a href="javascript:void(0);" <?php echo ($this->session->userdata('user_id') == "") ? ' data-toggle="modal" data-target="#loginModal" ' : "id='addtowishlist'" ?> data-id="<?php echo $venue['id']; ?>" class="has-wish-btn"><span class="fa <?php echo (in_array($venue['id'], $mylist)) ? "fa-heart" : "fa-heart-o"; ?> wishlist"></span></a>
                               <p><?= displayLangText($venue,'venue_name'); ?></p>
                               <ul>
                                   <li>SAR <?= $venue['price']; ?> <span><?php echo $lang['per']." ".$lang[substr($venue['unit_price'],3)]; ?></span></li>
                                   <li><?= ($venue['type'] == "venue")?"".$venue['capacity_from'].' - '.$venue['capacity_to'].'<span>'.$lang['capacity'].'</span>':substr($venue['description'],0,90).'...'; ?> </li>
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
                  <h5><?= $lang['no_result_found']; ?></h5>
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

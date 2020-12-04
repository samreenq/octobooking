<style>
.removeCart {
    font-size: 20px;
    color: #F30;
    cursor: pointer;
}
</style>
<div class="container">
  <div class="row ml-0 mr-0 ar-row">
      <div class="col-md-8 col-sm-4 col-xs-12">

          <form method="POST" action="<?php echo base_url();?>submitCheckout">
                <div class="chckout checkout-div">
                  <h3><?php echo $lang['customer_information']; ?></h3>
                      <div class="row ml-0 mr-0 ar-row" style="padding: 10px 20px;">
                          <div class="col-md-6 col-sm-6 col-xs-12 pl-0 pr-0 padding-right-ar">
                              <div class="form-group">
                                  <label for="fname" style="display: none;"><?php echo $lang['full_name_label']; ?></label>
                                  <input type="text" class="form-control" name="fullname" required id="fname"
                                      value="<?php echo isset($user['fullname'])?$user['fullname']:"" ?>"
                                      placeholder="<?php echo $lang['full_name']; ?>">
                              </div>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12 pr-0 pl-0">
                              <div class="form-group">
                                  <label for="title" style="display: none;"><?php echo $lang['event_label']; ?></label>
                                  <input type="text" class="form-control" name="event" required id="title"
                                      placeholder="<?php echo $lang['event_name']; ?>">
                              </div>
                          </div>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="form-group">
                              <label for="email" style="display: none;"><?php echo $lang['email_label']; ?></label>
                              <input type="email" class="form-control" name="email" required id="email"
                                  value="<?php echo isset($user['email'])?$user['email']:"" ?>"
                                  placeholder="<?php echo $lang['email']; ?>">
                          </div>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="form-group">
                              <label for="phone" style="display: none;"><?php echo $lang['phone_label']; ?></label>
                              <input type="text" class="form-control" name="phone" required id="phone"
                                  value="<?php echo isset($user['phone'])?$user['phone']:"" ?>"
                                  placeholder="<?php echo $lang['phone']; ?>">
                          </div>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12 hide">
                          <div class="form-group">
                              <label for="date" style="display: none;"><?php echo $lang['date_label']; ?></label>
                              <input type="date" class="form-control" name="date" id="date">
                          </div>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="form-group">
                              <label for="desc" style="display: none;"><?php echo $lang['description_label']; ?></label>
                              <textarea class="form-control" name="desc" required id="desc"
                                  placeholder="<?php echo $lang['description']; ?>"></textarea>
                          </div>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <input
                              <?php echo ($this->session->userdata('user_id')== "")?'data-toggle="modal" data-target="#loginModal" readonly':'type="submit"'; ?>
                              <?php echo (count($this->cart->contents())<1)?"style='display:none;'":""; ?>
                              value="<?php echo $lang['checkout'] ?>" class="btn btn-primary " />
                      </div>
                </div>
                
              </div>
    
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="main-cart">
                    <h3><?php echo $lang['shopping_cart'] ?></h3>
                    <div class="vanue-bxcart">
                        <?php if(sizeof($this->cart->contents()) > 0){
                        foreach ($this->cart->contents() as $items):
                        echo "<input type='hidden' name='venue_id' value='".$items['id']."' />";
                        echo "<input type='hidden' name='addons' value='".implode(",",$items['options'])."' />";

                              $image_name = base_url().'assets/images/cart1.png';
                              if(isset($items['image']) && $items['image'] != ''){
                                  $image_name = base_url().'upload/'.$items['image'];
                              }

                        ?>
                        <div class="cutommedia-bx">
                            <!-- Left-aligned -->
                            <div class="media">
                                <div class="media-left">
                                    <img src="<?php echo $image_name; ?>" alt="">
                                </div>

                            </div>

                            <!-- Right-aligned -->
                            <div class="media">
                                <div class="media-body">
                                    <h5><?php echo displayLangText($items,'venue_name'); ?></h5>
                                    <?php if(isset($items['package_name']) && !empty($items['package_name'])):  ?>
                                    <h6><?php echo displayLangText($items,'package_name'); ?></h6>
                                    <?php endif; ?>

                                    <p>Sar <?php echo number_format($items['price_per_unit'],2); ?> <span></span>
                                        <span
                                            style="color: #0b90de; font-size: 8px;"><?php echo  $lang[$items['type']]; ?></span><br /><?php
              
                        if($items['options']>0){
                            $ops = ($items['options']);
                            if($ops[0]!=""){
                                echo "Package: ".$ops[0]."<br />";
                            }
                            if($ops[1]!=""){
                                if($items['price_unit'] == 'perseat') {
                                    echo $lang['no_of_seats'] . ": " . $ops[1] . "<br />";
                                }
                            }
                            if($ops[2]!=""){
                                echo $lang['event_on'].": ".$ops[2]."<br />";
                            }
                        } ?></p>

                                          </div>

                                      </div>
                                      <span class="removeCart" data-id="<?php echo $items['rowid']; ?>">X</span>
                                  </div>
                                  <?php 
                      endforeach;
                        }else{echo "<p>".$lang['no_items_in_cart']."</p>";}
                      ?>
                    </div>
                    <!--    <h4>Facilities</h4>

              <div class="cart-lst">
                <ul>
                  <li><p>lighting <span>Sar 100</span></p></li>
                  <li><p>Music <span>Sar 50</span></p></li>
                </ul>
              </div>-->
                      <div class="totalamount">
                          <p><?php echo $lang['total']; ?></p>
                          <h6>SAR <span><?php echo number_format($this->cart->total(),2); ?></span></h6>
                      </div>

                      <?php /* <div class="adonser">
                <h5>Add-on Services</h5>
                <div class="imbx-adon">
                  <img src="assets/images/image60.png" alt="">
                  <p>
                  if(sizeof($this->cart->contents()) > 0){$items = $this->cart->contents(); 
                  echo $items[0]['option'][0];} 
                  </p>
                </div>
              </div>
                */ ?>
                  </div>
            </div>
  </div>
</div>
    </form>


</div>
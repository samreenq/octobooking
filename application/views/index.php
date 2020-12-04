    <div class="main-bnr">
        <div class="container">
            <div class="mainfrm">
                <h1><?php echo displayLangText($home_content,'banner_title'); ?></h1>
                <div class="main-btn">
                    <button class="active venue"><i class="loc"></i><?php echo $lang['venue'];  ?></button>
                    <button class="service"><i class="seric-icon"></i><?php echo $lang['services']; ?></button>
                </div>
                <?php $this->load->view('common/form_strip'); ?>
            </div>
        </div>
	<a class="dwn-btn" href="javascript:void(0);"><img src="<?= base_url();?>assets/images/arrow-down.svg"></a>

    </div>
   
   <section class="sec2">
       <div class="container">
           <div class="main-txt">
               <h2><?php echo displayLangText($home_content,'section1_title'); ?></h2>
               <p><?php echo displayLangText($home_content,'section1_description'); ?></p>
           </div> 
           <div class="row venues-home-has">
           <?php
           if(count($locations) > 0){$i = 0;
           	$x = 1;
               foreach($locations as $locHome){
                   
                    ?>
                    <div class="<?php echo ($x === 3 || $x === 4 || $x === 9 || $x === 10) ? 'col-md-6' : 'col-md-3' ?> col-xs-12 has-venue-<?php echo $x;?>">
                       <a href="<?= base_url().'products?search='.$locHome['cat_name'];?>"><div class="hotal-v">
                           <img class="img-responsive" src="<?= MEDIAURL.$locHome['cat_image'];?>">
                           <h5><?php echo displayLangText($locHome,'cat_name',true); ?> <span><?php echo get_counts('location',$locHome['cat_name']).' '.$lang['venues']; ?></span></h5>
                       </div></a>
                       </div>
                   
                    <?php  $x++;
               }
           }
           ?>
           </div>   

 
       </div>
   </section>

   <section class="sec3">
       <div class="container">
           <div class="main-txt1">
               <h2><?php echo displayLangText($home_content,'section2_title'); ?></h2>
               <p><?php echo displayLangText($home_content,'section2_description'); ?></p>
           </div>
           <div class="row testimonials-1">
           
<?php
           if(count($suitables) > 0){$i = 0; 
               foreach($suitables as $suit){
                   
                    ?>
               <div class="col-md-4 col-xs-12">
                <a href="<?= base_url().'products?search=&category=&event='.$suit['id'];?>"><div class="sld">
                <img class="img-responsive" src="<?= MEDIAURL.$suit['cat_image'];?>">
                <h4><?php echo displayLangText($suit,'cat_name',true); ?> <span><?php echo get_counts('suitable',$suit['cat_name']).' '.$lang['venues']; ?></span></h4>
                </div></a>
               </div>
                    <?php     
               }
           }
           ?>              
           </div>
       </div>
   </section>
   <section class="sec2 bg-grey">
       <div class="container">
           <div class="main-txt">
               <h2><?php echo displayLangText($home_content,'section3_title'); ?></h2>
               <p><?php echo displayLangText($home_content,'section3_description'); ?></p>
           </div> 
           <div class="row testimonials-2">
			<?php if($popular>0){
			    $mylist = get_my_wishlist($this->session->userdata('user_id'));
				foreach($popular as $product){
					?>
				   <div class="col-md-3"><a href="<?php echo base_url().'product/'.$product['id']; ?>">
					   <div class="sld2">
					       <img src="<?php echo $product['image'];?>" class="most-popular-img">
						   <a href="javascript:void(0);" <?php echo ($this->session->userdata('user_id') == "")?' data-toggle="modal" data-target="#loginModal" ':"id='addtowishlist'" ?>  data-id="<?php echo $product['id']; ?>" class="has-wish-btn"><span class="fa <?php echo (in_array($product['id'],$mylist))?"fa-heart":"fa-heart-o"; ?> wishlist" ></span></a>
						   <p><?php echo displayLangText($product,'venue_name'); ?></p>
						   <ul>
							   <li>SAR <?php echo $product['price']; ?> <span><?php echo $lang['per']." ".$lang[substr($product['unit_price'],3)]; ?></span></li>
							   <li><?php echo "".$product['capacity_from'].' - '.$product['capacity_to']; ?><span><?php echo $lang['capacity']; ?></span></li>
						   </ul>
					   </div></a>
				   </div>
					<?php 
				}
			} ?>

           </div>
       </div>
   </section>

   <section class="sec3 has-services">
        <div class="container">
           <div class="main-txt1">
               <h2><?php echo displayLangText($home_content,'section4_title'); ?></h2>
               <p><?php echo displayLangText($home_content,'section4_description'); ?></p>
           </div>
           <?php
           if(count($categories) > 0){$i = 0; echo '<div class="row">';
               foreach($categories as $categ){
                   if($i == 4){
                       echo '</div<div class="row">';
                   }
                    ?>
                   <div class="col-md-3 col-sm-2 col-xs-12">
                       <a href="<?= base_url();?>products?search=&event=&category=<?php echo $categ['id']; ?>"><div class="hotal-v1">
                           <img class="img-responsive" src="<?= MEDIAURL.$categ['cat_image'];?>">
                           <h5><?php echo displayLangText($categ,'cat_name'); ?></h5>
                       </div></a>
                   </div>
                    <?php     
               }
           }
           ?>
       </div>
   </section>

    <section class="sec2 testi">
       <div class="container">
           <div class="main-txt">
               <h2><?php echo displayLangText($home_content,'section5_title'); ?></h2>
               <p><?php echo displayLangText($home_content,'section5_description'); ?></p> </div>
           <div class="testimonials-3">
               <?php 
               $reviews = get_reviews();
               if($reviews>0){
                   foreach($reviews as $rev){
                       ?>
                       <div class="testimoni">
                           <img src="<?= MEDIAURL.$rev['image'];?>">
                           <h5><?php echo $rev['name']; ?> <span><?php echo $rev['title']; ?></span></h5>
                           <p><?php echo $rev['review']; ?></p>
                       </div>
                       <?php 
                   }
               }
               ?>

           </div>
       </div>
   </section>
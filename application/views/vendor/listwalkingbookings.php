<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
<div class="main-bnr inerban bookin-lst">
	<div class="container">
		<div class="mainfrm">
		<h1><?php echo $lang['walking_booking'] ?></h1>
		<nav aria-label="breadcrumb ">
		  <ol class="breadcrumb styl1">
			<li class="breadcrumb-item" aria-current="page"><?php echo $lang['home'] ?></li>
			<li class="breadcrumb-item active" aria-current="page"><?php echo $lang['walking_booking'] ?> <?php echo $lang['list'] ?></li>
		  </ol>
		</nav>
		</div>
	</div>
</div>
<div class="container booking-pd">

    <table id="venues" class="table table-striped has-venue-table table-bordered venues booking-list-table">
	            <thead>
                   <tr>
                       <!--<th>Type</th>-->
                       <th><?php echo $lang['booking_no']?></th>
                       <th><?php echo $lang['venue_name']?></th>
                     <!-- <th>Venue</th>-->
                       <th><?php echo $lang['event_date']?></th>
                       <!--<th>Event Date</th>-->
                       <th><?php echo $lang['registered_at']?></th>
					  <th></th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php 
					if($bookings != false){
						foreach($bookings as $booking){
							?>
							<tr>

                                <td><?php echo $booking['id']; ?></td>
                                <td><?php echo displayLangText($booking,'venue_name'); ?></td>
								<!--<td><?php /*echo $booking['venue_name']; */?></td>-->
								<!--<td><?php /*echo $booking['eventdate']; */?></td>-->
								<td><?php echo $booking['event_date']; ?></td>
								<td><?php echo $booking['created_at']; ?></td>
							</tr>
							<?php 
						}
					}
				  ?>
                  </tbody>
	</table>
</div>

<?php /*



    <div class="main-bnr inerban bookin-lst">
        <div class="container">
            <div class="mainfrm">
                <h1>Booking List</h1>

                  

            <nav aria-label="breadcrumb ">
  <ol class="breadcrumb styl1">
    <li class="breadcrumb-item" aria-current="page">Home</li>
    <li class="breadcrumb-item active" aria-current="page">Booking List</li>
  </ol>
</nav>
            </div>
        </div>
    </div>

    <section class="main-lst-servic bkl">
        <div class="container">
            <div class="row">
                
                
                <div class="clear"></div>
                
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="main-sid-br">
                                <h4>Refine Your Search</h4>
                                <div class="rys-inp">
                                    <label for="">venue type</label>
                                    <input type="text" placeholder="Select Venue">
                                </div>
                                <div class="rys-inp">
                                    <label for="">Capacity</label>
                                    <input type="text" placeholder="Select Capacity">
                                </div>

                                <div class="main-pricrange">
                                    <h4>PRICE RANGE:</h4>
                                    <p>
                                      
                                      <input type="text" id="amount" readonly style="border:0; color:#1C76BD; font-weight:normal;">
                                    </p>
                                     
                                    <div id="slider-range"></div>
                                </div>

                                <div class="ratingd">
                                    <h4>select rating</h4>
                                    <label class="chck">
                                <input type="checkbox"><i class="fa fa-star" aria-hidden="true"></i> 
                            </label>
                            <label class="chck">
                                <input type="checkbox">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
       
                            </label>
                            <label class="chck">
                                <input type="checkbox">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>

       
                            </label>
                            <label class="chck">
                                <input type="checkbox">
                                 <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
       
                            </label>
                            <label class="chck">
                                <input type="checkbox">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
       
                            </label>
                            
                                </div>

                                <div class="ratingd">
                                    <h4>AMENITIES</h4>
                                    <label class="chck">
                                        <input type="checkbox">Wifi
                                    </label>
                                <label class="chck">
                                    <input type="checkbox">Parking
                                </label>
                                <label class="chck">
                                    <input type="checkbox">Catering
                                    </label>
                                <label class="chck">
                                    <input type="checkbox">Public Transport
                                 </label>
                            
                                </div>

                                <button class="filtr">Search</button>

                            </div>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        <div class="row">
                            <?php if($bookings >0){
			foreach($bookings as $book){
				?>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="serv-provid bkl">
                        <img class="img-responsive" src="<?= base_url();?>assets/images/imbkl-1.png" alt="">
                        <h5><?php echo $book['event_name']; ?></h5>
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i>
                            <?php echo $book['location']; ?>
                        </p>

                        <!--<ul>
                            <li>
                                 <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                   <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                     <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                     <p>(22)</p>
                            </li>
                        </ul>-->
                        
                        <h6><?php echo "SAR ".$book['price']; ?></h6>
                    </div>
                </div>

				<?php 
			}
		}?>
           
               
               
               <!-- <div class="main-pagi">
                        <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li>
                              <a href="#" aria-label="Previous">
                                <span aria-hidden="true">Previous</span>
                              </a>
                            </li>
                            <li class="active"><a href="#">01</a></li>
                            <li><a href="#">02</a></li>
                            <li><a href="#">03</a></li>
                                <li>
                              <a href="#" aria-label="Next">
                                <span aria-hidden="true">Next</span>
                              </a>
                            </li>
                        </ul>
                    </nav>
                    </div>-->
                        </div>

                    </div>
                    </div>
                </div>
				  </div>
        </div>
    </section>
   
<div class="clear"></div> */ ?>
<style>
    #venues_length{
        display:none;
    }
</style>
<style>
.serviceModal {
    padding: 20px 60px;
}

.addtolist {
    padding: 15px 40px;
}

.removeXgallery {
    color: #000;
    display: block;
    cursor: pointer;
    position: absolute;
    top: 10px;
    right: 10px;
    background: #fff;
    padding: 1px 8px;
    text-align: center;
    border-radius: 2px;

}

.main-slider2 ul li img {
    width: 100%;
    height: 178px;
}
</style>
<div class="main-bnr inerban bookin-lst">
	<div class="container">
		<div class="mainfrm">
		<h1><?php echo $lang['add'] ?> <?php echo $lang['venue'] ?></h1>
		<nav aria-label="breadcrumb ">
		  <ol class="breadcrumb styl1">
			<li class="breadcrumb-item" aria-current="page"><?php echo $lang['home'] ?> </li>
			<li class="breadcrumb-item active" aria-current="page"><?php echo $lang['add'] ?> <?php echo $lang['venue'] ?></li>
		  </ol>
		</nav>
		</div>
	</div>
</div>
<div class="container ham-top-margin">

    <form class="ham-form" method="POST" class="ham-form" action="<?php echo base_url();?>addVenueSubmit"
        enctype="multipart/form-data">
        <input type="hidden" name="serviceid" value="<?php echo isset($venue['id'])?$venue['id']:""; ?>" />
        <div class="row ml-0 mr-0 ar-row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <label for="venuetype"><?php echo $lang['location_type'] ?> </label>
                <div class="form-group position-relative">
                    <select name="venuetype" id="venuetype" class="form-control">
                        <option value="event"><?php echo $lang["event"]; ?></option>
                        <option value="hotels"><?php echo $lang["hotels"]; ?></option>
                        <option value="conference_centres"><?php echo $lang["conference_centres"]; ?></option>
                        <option value="business_centres"><?php echo $lang["business_centres"]; ?></option>
                        <option value="community_centres"><?php echo $lang["community_centres"]; ?></option>
                        <option value="sports_clubs"><?php echo $lang["sports_clubs"]; ?></option>
                        <option value="academic_venues"><?php echo $lang["academic_venues"]; ?></option>
                        <option value="stately_homes"><?php echo $lang["stately_homes"]; ?></option>
                        <option value="stadiums_arenas"><?php echo $lang["stadiums_arenas"]; ?></option>
                    </select>
                    <i class="fa fa-angle-down dropdown-arrow white-text" aria-hidden="true"></i>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="title"><?php echo $lang["title"]; ?>:</label>
                    <input type="text" class="form-control" name="title" required id="title" value="<?php echo isset($venue['venue_name'])?$venue['venue_name']:""; ?>">
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="title"><?php echo $lang["title"]; ?> (ar):</label>
                    <input type="text" class="form-control" name="title_ar" required id="title" value="<?php echo isset($venue['venue_name_ar'])?$venue['venue_name_ar']:""; ?>">
                </div>
            </div>
        </div>
        <div class="row ml-0 mr-0 ar-row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="desc"><?php echo $lang["description"]; ?>:</label>
                    <textarea  class="form-control" placeholder="<?php echo $lang['enter_brief_desc'] ?>" name="desc" required id="desc"><?php echo isset($venue['description'])?$venue['description']:""; ?></textarea>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="desc"><?php echo $lang["description"]; ?> (ar):</label>
                    <textarea  class="form-control" name="desc_ar" required id="desc"><?php echo isset($venue['description_ar'])?$venue['description_ar']:""; ?></textarea>
                </div>
            </div>
        </div>
        <div class="row ml-0 mr-0 ar-row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="amenities"><?php echo $lang["amenities"]; ?></label>
                    <select name="amenities[]" id="amenities" class="form-control amenities"  multiple="multiple">
                        <?php 
                        if($amenities>0){
                            $amarrary = isset($venue['amenities'])?explode(",",$venue['amenities']):array();
                            foreach($amenities as $amenity){
                                $selected = "";
                                if(in_array($amenity['cat_name'],$amarrary)){
                                    $selected = "selected='selected'";
                                }
                                ?><option value="<?php echo str_replace(" ","_",strtolower($amenity['cat_name'])); ?>"
                            <?= $selected; ?>><?php echo  ucfirst($amenity['cat_name']); ?></option><?php 
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="suitable"><?php echo $lang['suitable_for_events']; ?></label>
                    <select name="suitable[]" id="suitable" class="form-control suitable" multiple="multiple">
                        <?php 
                        if($suitables>0){
                            $asarrary = isset($venue['suitable'])?explode(",",$venue['suitable']):array();
                            foreach($suitables as $suitable){
                                $selected = "";
                                if(in_array($suitable['cat_name'],$asarrary)){
                                    $selected = "selected='selected'";
                                }
                                ?><option value="<?php echo str_replace(" ","_",strtolower($suitable['cat_name'])); ?>"
                            <?= $selected; ?>><?php echo  ucfirst($suitable['cat_name']); ?></option><?php 
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
            <div class="clear"></div>
        <div class="row ml-0 mr-0 ar-row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <label for="pricefrom"><?php echo $lang["capacity"]; ?>:</label>
                <div class="form-group dash-input position-relative">
                    <input type="text" class="form-control" name="from" placeholder="<?php echo $lang["from"]; ?>" required id="pricefrom"
                        value="<?php echo isset($venue['capacity_from']) ? $venue['capacity_from']:""; ?>">
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="priceto">&nbsp;</label>
                    <input type="text" class="form-control" name="to" placeholder="<?php echo $lang["to"]; ?>" required id="priceto"
                        value="<?php echo isset($venue['capacity_to'])?$venue['capacity_to']:""; ?>">
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="price"><?php echo $lang["price"]; ?>:</label>
                    <input type="text" class="form-control" name="price" required id="price" value="<?php echo isset($venue['price'])?$venue['price']:""; ?>">
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <label for="unitprice"><?php echo $lang["unit_price"]; ?>:</label>
                <div class="form-group position-relative">
                    <select name="unitprice" id="unitprice" class="form-control">
                        <option value="perseat"
                            <?php echo (isset($venue['unit_price']) && $venue['unit_price'] == "perseat")?"selected":""; ?>>
                            <?php echo $lang['per_seat']; ?></option>
                        <option value="perday"
                            <?php echo (isset($venue['unit_price']) && $venue['unit_price'] == "perday")?"selected":""; ?>>
                            <?php echo $lang['unit_price']; ?></option>
                    </select>
                    <i class="fa fa-angle-down dropdown-arrow" aria-hidden="true"></i>
                </div>
            </div>
        </div>
            <div class="col-md-12 col-sm-12 col-xs-12 border-btn-row">
				<a href="javascript:;" class="btn btn-primary pull-right serviceModal big-btn position-relative" data-toggle="modal" data-target="#serviceModal"><?php echo $lang['add'] ?> <?php echo $lang['services'] ?> <img src="/octobooking/assets/images/plus-icon.svg" class="plus-icon" alt="plus"></a>
            </div>

            <!--<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<input type="file" class="form-control" name="files[]" multiple <?php /*echo isset($venue['id'])?"":"required"; */?> style="padding:12px 10px 34px 10px;" />
				</div>
            </div>-->


            <div class="row ml-0 mr-0 dayPriceWrap">
                <label class="price-label" for="price"><?php echo $lang['price_for_days']; ?>:</label>

                <?php if(count($day_prices)>0){
                    $x = 1;
                    ?>
                    <?php foreach($day_prices as $day_key => $day_price){
                        ?>

                        <div class="form-group input_fields_wrap" id="input_fields_wrap_<?php echo $x;?>">
                            <div class="row ml-0 mr-0 ar-row">
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <label for="day"><?php echo langText('day',$lang); ?>:</label>
                                    <span class="day-plus-minus">
                                        <a href="javascript:void(0)" class="add_field_button"><i class="fa fa-plus"></i></a>
                                        <a href="javascript:void(0)" class="remove_field"><i class="fa fa-remove"></i></a>
                                    </span>
                                    <div class="form-group position-relative">
                                        <select name="day[]" class="form-control" required>
                                            <?php foreach($days as $key =>  $day):

                                                $selected = '';
                                                if($day_price['day'] == $key){
                                                    $selected = 'selected';
                                                }
                                                ?>
                                                <option value="<?php echo $key; ?>" <?php echo $selected; ?> ><?php echo $day; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <i class="fa fa-angle-down dropdown-arrow" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label><?php echo $lang['unit_price']; ?>:</label>
                                        <select name="price_unit[]" class="form-control" required>
                                            <option value="perseat" <?php if($day_price['price_unit'] == 'perseat'){ echo 'selected'; }?>><?php echo $lang['per_seat']; ?></option>
                                            <option value="perday" <?php if($day_price['price_unit'] == 'perday'){ echo 'selected'; }?>><?php echo $lang['per_day']; ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="form-group position-relative">
                                        <label><?php echo $lang['price']; ?>:</label>
                                        <input type="text" class="form-control" name="day_price[]" required value="<?php echo $day_price['price']; ?>"/>
                                    </div>
                                </div>
                            </div>

                        </div>


                    <?php $x++; } ?>
                <?php }else{ ?>
                <div class="form-group input_fields_wrap">
                    <div class="row ml-0 mr-0 ar-row">
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <label for="price"><?php echo langText('day',$lang); ?>:</label>
                            <span class="day-plus-minus">
                                <a href="javascript:void(0)" class="add_field_button"><i class="fa fa-plus"></i></a>
                                <a href="javascript:void(0)" class="remove_field"><i class="fa fa-remove"></i></a>
                            </span>
                            <div class="form-group position-relative">
                                <select name="day[]" class="form-control">
                                    <?php foreach($days as $key =>  $day): ?>
                                    <option value="<?php echo $key; ?>"><?php echo $day; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <i class="fa fa-angle-down dropdown-arrow" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label><?php echo $lang['unit_price']; ?>:</label>
                                <select name="price_unit[]" class="form-control">
                                    <option value="perseat"><?php echo $lang['per_seat']; ?></option>
                                    <option value="perday"><?php echo $lang['per_day']; ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label><?php echo langText('price',$lang); ?>:</label>
                                <input type="text" class="form-control" name="day_price[]" value=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <?php } ?>

            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="file-upload-div">
                    <h3 class="text-center poppins-font mb-4"><?php echo $lang['file_upload'] ?></h3>
                    <div class="box__input position-relative">
                        <img src="/octobooking/assets/images/file.png" class="file-upload img-responsive" alt="">
                        <input class="box__file" type="file" name="files[]" id="file" data-multiple-caption="{count} files selected" multiple />
                        <label class="upload-label" for="file">Drag and drop or <span class="browse-link">browse</span> your files</label>
                        <div id="file-upload-filename" style="display:none">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row ml-0 mr-0 ar-row" style="clear:both;">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group mt-4">
                        <label for="mt-4"><?php echo $lang['enter_location'] ?>:</label>
                        <input class="form-control" id="searchTextField" type="text" size="50" placeholder="<?php echo $lang['search_location_on_map'] ?>" autocomplete="on" runat="server"/>
                    </div>
                </div>
                
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group mt-4">
                    <label for=""><?php echo $lang['select_city'] ?>:</label>
                        <select name="location" id="" class="form-control location locationItems" id="my-input-searchbox" required>
                            <?php 
                            if($locations>0){
                                foreach($locations as $loc){
                                    $selected = "";
                                    if($loc['cat_name'] == strtolower($venue['location'])){
                                        $selected = "selected='selected'";
                                    }
                                    ?><option value="<?php echo $loc['cat_name']; ?>" <?= $selected; ?>>
                                <?php echo  ucfirst($loc['cat_name']); ?></option><?php 
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div id="address_map_canvas_admin" style="height: 300px;"></div>
                <div id="current_admin" style="display: none;"></div>
                <input type="hidden" name="latitude" value="<?php echo isset($venue['latitude']) ? $venue['latitude'] : ""; ?>" id="latitude" />
                <input type="hidden" name="longitude" value="<?php echo isset($venue['longitude']) ? $venue['longitude'] : ""; ?>" id="longitude" />
            </div>


            <?php // if($add_limit_package == 1): ?>
            <!-- <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                <input type="submit" value="Add to list" class="btn btn-primary addtolist big-btn mt-3 mb-4" />
            </div> -->
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                 <!--<input type="submit" value="Add to list" data-toggle="modal" data-target="#confirmModal" class="btn btn-primary addtolist big-btn mt-3 mb-4" /> -->
				  <input type="submit" value="<?php echo $lang['add_to_list'] ?>" class="btn btn-primary addtolist big-btn mt-3 mb-4" />
            </div>
            <?php // endif; ?>
        </div>


<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <!-- Modal content-->
        <div class="modal-content ham-modal">
            <div class="modal-body">
                <h3 class="text-center mb-4"><?php echo $lang['success'] ?></h3>
                <p>Your venue has been added!</p>
                <div class="row ml-0 mr-0">
                    <div class="col-lg-6 col-md-6 col-sm-6 pl-0 pr-0 text-center">
                        <a href="#" class="btn btn-primary small-btn">Checkout</a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 pl-0 pr-0 text-center">
                        <a href="#" class="btn btn-primary small-btn purple">Continue Booking</a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<div id="serviceModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content ham-modal ham-form">
            <div class="modal-body">
                <h3 class="text-center mb-4"><?php echo $lang['add'] ?> <?php echo $lang['service'] ?></h3>
                
                <div class="form-group text-center">
                    <select name="services[]" id="services" class="form-control suitable" multiple="multiple" style="margin-top:40px !important;">
                        <?php 
                        if($services>0){
                            $avarrary = isset($venue['venue_services'])?explode(",",$venue['venue_services']):array();
                            foreach($services as $serv){
                                $selected = "";
                                if(in_array($serv['id'],$avarrary)){
                                    $selected = "selected='selected'";
                                }
                                ?><option value="<?php echo $serv['id']; ?>" <?= $selected; ?>>
                            <?php echo  ucfirst($serv['venue_name']); ?></option><?php 
                            }
                        }
                        ?>
                    </select>
                </div>
                <!--<div class="form-group">
                        <label for="desc">Description:</label>
                        <textarea  class="form-control" placeholder="<?php /*echo $lang['enter_brief_desc']; */?>" name="desc" required id="desc"><?php /*echo isset($venue['description'])?$venue['description']:""; */?></textarea>
                    </div>-->
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-right" data-dismiss="modal"><?php echo $lang['submit'] ?></button>
                </div>
        </div>
    </div>
</div>

    </form>
</div>




                <?php if(isset($venue['id'])){ ?>
            <h3 style="margin:10px;" class="text-center"><?php echo $lang['photo_gallery'] ?></h3>
            
            <?php
            if($gallery>0){
                ?>
<div class="main-slider2 photo-gallery">
    <ul class="slider2">
        <?php 
                        foreach($gallery as $gal){
                            ?>

        <li class="wow fadeInUp photo-gallery-li" data-wow-delay="0.2s" data-wow-duration="0.15"><img
                src="<?= base_url().'upload/'.$gal['image_name'];?>" alt="">
            <span class="removeXgallery" data-id="<?= $gal['id']; ?>">x</span>
        </li>
        <?php 
                        }
                        ?>
    </ul>
</div>


<?php 
            }
                }
            ?>

</div>

<script>

// var input = document.getElementById('file');
// var infoArea = document.getElementById('file-upload-filename');

// input.addEventListener('change', showFileName);


// function showFileName(event) {

//     // the change event gives us the input it occurred in
//     var input = event.srcElement;

//     // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
//     var fileName = input.files[0].name;

//     // use fileName however fits your app best, i.e. add it into a div
//     $('#file-upload-filename').show();
//     infoArea.textContent = fileName;
// }
</script>
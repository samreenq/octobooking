<style>
.serviceModal{
	padding:20px 60px;
}
.addtolist{
	padding:15px 40px;
}
.custommargin{
    margin:5px 0px;
}
.removeXclass{
    vertical-align: middle;
    color:    #f30;
    font-size: 27px;
    cursor: pointer;    
}

.removeXgallery {
    color: #000;
    display: block;
    cursor:pointer;
    position: relative;
    top: -165px;
    right: -257px;
    background: #fff;
    width: 25px;
    text-align: center;
    border-radius: 2px;
    height: 22px;
}
.main-slider2 ul li img {
    width: 100%;
    height: 178px;
}
</style>
<div class="main-bnr inerban bookin-lst">
	<div class="container">
		<div class="mainfrm">
		<h1><?php echo $lang["add"]; ?> <?php echo $lang["service"]; ?></h1>
		<nav aria-label="breadcrumb ">
		  <ol class="breadcrumb styl1">
			<li class="breadcrumb-item" aria-current="page"><?php echo $lang["home"]; ?></li>
			<li class="breadcrumb-item active" aria-current="page"><?php echo $lang["add"]; ?> <?php echo $lang["service"]; ?></li>
		  </ol>
		</nav>
		</div>
	</div>
</div>
<div class="container ham-top-margin">

    <form method="POST" class="ham-form" action="<?php echo base_url();?>addServiceSubmit" enctype="multipart/form-data">
        <input type="hidden" name="serviceid" value="<?php echo isset($service['id'])?$service['id']:""; ?>" />
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <label for="category"><?php echo $lang["category"]; ?></label>
                <div class="form-group position-relative">
                    <select name="category" id="category" class="form-control" required>
                        <option value=""><?php echo $lang["select_category"]; ?></option>
                        <?php 
                        if($categories>0){
                            foreach($categories as $category){
                                $selected = "";
                                $selected = ($category['id'] == $service['cat_id'])?"selected='selected'":"";
                                ?><option value="<?php echo $category['id']; ?>" <?php echo $selected; ?>><?php echo  ucfirst($category['cat_name']); ?></option><?php 
                            }
                        }
                        ?>
                    </select>
                    <i class="fa fa-angle-down dropdown-arrow" aria-hidden="true"></i>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="title"><?php echo $lang["title"]; ?> :</label>
                    <input type="text" class="form-control" name="title" required id="title" value="<?php echo isset($service['venue_name'])?$service['venue_name']:""; ?>">
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="title"><?php echo $lang["title"]; ?> (ar):</label>
                    <input type="text" class="form-control" name="title_ar" required id="title_ar" value="<?php echo isset($service['venue_name_ar'])?$service['venue_name_ar']:""; ?>">
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="desc"><?php echo $lang["description"]; ?>:</label>
                    <textarea  class="form-control" name="desc" required id="desc"><?php echo isset($service['description'])?$service['description']:""; ?></textarea>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="desc"><?php echo $lang["description"]; ?> (ar):</label>
                    <textarea  class="form-control" name="desc_ar" required id="desc_ar"><?php echo isset($service['description_ar'])?$service['description_ar']:""; ?></textarea>
                </div>
            </div>
            <?php if(isset($service['id'])){ ?>
            <h3 class="service-pkg-heading text-center clear mb-3"><?php echo $lang["service"]; ?> <?php echo $lang["packages"]; ?></h3>
            <?php 
            if(($packages)>0){

                //echo '<pre>'; print_r($packages); exit;
                ?>
                    <div class="row packages add-service-pkg">
                    <?php 
                        foreach($packages as $pkg){
                            
                            ?>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="main-pack">
                                    <img class="img-responsive" src="<?= base_url().'upload/'.$pkg['image_name'];?>" alt="">
                                    <h4><?php echo $pkg['service_name']; ?></h4>
                                    <div class="packinr-whit">
                                        <h4><?php echo $lang["includes"]; ?></h4>
                                        <ul>
                                            <?php 
                                          // $includes =  get_pkg_includes($pkg['service_name']);
                                           foreach($pkg['includes'] as $inc){
                                               ?>
                                            <li><img src="<?= base_url();?>assets/images/dot.jpg" alt=""> <?php echo $inc['service_desc']; ?> </li>
                                               <?php 
                                           }
                                            ?>
                                        </ul>
            
                                        <div class="totalamount">
                                          <p>total</p>
                                          <h6>SAR <span><?php echo $pkg['service_price']; ?></span></h6>
                                        </div>
                                    
                                        <!--<a href="javascript:void(0);" data-id="<?php echo $pkg['id']; ?>" class="btnEditPackage">Edit</a>-->
                                    </div>
                                </div>
                            </div>

                            <?php 
                             
                        }
                    ?>

                    
                    </div>
            <div class="clear"></div>
                <?php 
            }
            ?>
            <div class="col-md-12 col-sm-12 col-xs-12 text-center" style="margin-bottom:3%">
				<a href="javascript:;" class="btn btn-primary serviceModal big-btn position-relative" data-toggle="modal" data-target="#serviceModal">Add Packages <img src="/octobooking/assets/images/plus-icon.svg" class="plus-icon" alt="plus"></a>
            </div>
            <?php } ?>
            <?php if(isset($service['id'])){ ?>
            <h3 class="text-center clear mb-3"><?php echo $lang["photo_gallery"]; ?></h3>
            
            <?php
            if($gallery>0){
                ?>
                <div class="main-slider2 photo-gallery">
                    <ul class="slider2">
                        <?php 
                        foreach($gallery as $gal){
                            ?>
                            
                            <li class="wow fadeInUp photo-gallery-li" data-wow-delay="0.2s" data-wow-duration="0.15"><img src="<?= base_url().'upload/'.$gal['image_name'];?>" alt="">
                                <span class="removeXgallery" data-id="<?= $gal['id']; ?>">x</span>
                            </li>
                            <?php 
                        }
                        ?>
                    </ul>
                </div>
                
                
                <?php 
            }
            ?>
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
				<a href="javascript:;" class="btn btn-primary serviceModal big-btn position-relative" data-toggle="modal" data-target="#galleryModal">Add Images <img src="/octobooking/assets/images/plus-icon.svg" class="plus-icon" alt="plus"></a>
            </div>
            <?php } ?>

            <?php // if($add_limit_package == 1): ?>

            <div class="col-md-12 col-sm-12 col-xs-12 mb-for-btn mt-3">
				<input type="submit" value="<?php echo $lang["add_to_list"]; ?>" class="btn btn-primary pull-right addtolist big-btn" />
            </div>
            <?php // endif; ?>
        </div>

    </form>
</div>
<div id="galleryModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <form action="<?php echo base_url(); ?>submit-gallery" class="ham-form" enctype="multipart/form-data" method="POST">
            <input type="hidden" name="serviceid" value="<?php echo isset($service['id'])?$service['id']:""; ?>" />
            <div class="modal-content">
                <div class="modal-body add-pkg">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <img src="http://localhost/octobooking/assets/images/close.svg" class="modal-close-icon" alt="Close">
                        </button>
                        <h1 class="modal-title mb-4"><?php echo $lang["add"]; ?> <?php echo $lang["images"]; ?> </h1>
                    </div>
                    <div class="file-upload-div">
                        <label class="poppins-font mb-4"><?php echo $lang["file_upload"]; ?></label>
                        <div class="box__input position-relative">
                            <img src="/octobooking/assets/images/file.png" class="file-upload img-responsive" alt="">
                            <input class="box__file" type="file" name="files[]" id="file" data-multiple-caption="{count} files selected" multiple />
                            <label class="upload-label" for="file">Drag and drop or <span class="browse-link">browse</span> your files</label>
                            <div id="file-upload-filename" style="display:none">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer add-pkg">
                    <button type="submit" class="btn btn-primary pull-right small-btn"><?php echo $lang["submit"]; ?></button>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="serviceModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <form action="<?php echo base_url(); ?>submit-packages" enctype="multipart/form-data" method="POST">
            <input type="hidden" name="serviceid" value="<?php echo isset($service['id'])?$service['id']:""; ?>" />
        <div class="modal-content ham-modal">
            <div class="modal-body">
                <center>
                    <h3><?php echo $lang["add"]; ?> <?php echo $lang["package"]; ?></h3></center>
                <div class="form-group">
                    <label for="pkgname"><?php echo $lang["package"]; ?> <?php echo $lang["name"]; ?>:</label>
                    <input type="text" class="form-control" name="pkgname" required id="pkgname">
                </div>
                <div class="form-group">
                    <label for="pkgname"><?php echo $lang["package"]; ?> <?php echo $lang["name"]; ?> (ar):</label>
                    <input type="text" class="form-control" name="pkgname_ar" required id="pkgname_ar">
                </div>
                <div class="form-group">
                    <label for="pkgincludes"><?php echo $lang["includes"]; ?>:</label>
                    <div class="row">
                        <div class="col-md-10 ar-float-right">
                            <input type="text" class="form-control custommargin" name="pkgincludes[]" required >    
                        </div>
                        <div class="col-md-2"><span class="removeXclass hide">X</span></div>
                    </div>
                    <a href="javascript:void(0);" class="btnAddMore"><?php echo $lang["add_more"]; ?></a>
                </div>
                <div class="form-group">
                    <label for="pkgincludes_ar"><?php echo $lang["includes"]; ?> (ar):</label>
                    <div class="row">
                        <div class="col-md-10 ar-float-right">
                            <input type="text" class="form-control custommargin" name="pkgincludes_ar[]" required >    
                        </div>
                        <div class="col-md-2"><span class="removeXclass hide">X</span></div>
                    </div>
                    <a href="javascript:void(0);" class="btnAddMoreAr"><?php echo $lang["add_more"]; ?></a>
                </div>
                <div class="form-group">
                    <label for="pkgprice"><?php echo $lang["price"]; ?>:</label>
                    <input type="text" class="form-control" name="pkgprice" required id="pkgprice">
                </div>
				<div class="form-group">
                    <label for="pkgupload"><?php echo $lang["file_upload"]; ?>:</label>
					<input type="file" class="form-control" name="pkgfiles"  required />
				</div>
            </div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary pull-right" ><?php echo $lang["submit"]; ?></button>
			</div>
        </div>
        </form>
    </div>
</div>
    </form>
</div>

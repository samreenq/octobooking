<style>
.xtraHeight {
    height: 58px;
}
</style>
<div class="main-bnr inerban">
    <div class="container">
        <div class="mainfrm">
            <h1><?php echo $lang['our_services'] ?></h1>



            <nav aria-label="breadcrumb ">
                <ol class="breadcrumb styl1">
                    <li class="breadcrumb-item" aria-current="page"><?php echo $lang['home'] ?></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $lang['list_of_services'] ?></li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<section class="main-lst-servic">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="src-servc">
                    <select name="category" class="form-control xtraHeight" id="xtraHeight" onchange="searchThis();">
                        <option value=""><?php echo $lang['select_service_category'] ?></option>
                        <?php 
                        if($categories>0){
                            foreach($categories as $cat){
                                echo '<option value="'.$cat['id'].'">'.displayLangText($cat,'cat_name').'</option>';
                            }
                        }
                        ?>
                    </select>
                    <i class="fa fa-angle-down dropdown-arrow" aria-hidden="true"></i>
                </div>
            </div>
            <form method="GET">
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="src-servc">
                        <input type="text" placeholder="<?php echo $lang['find_a_service'] ?>" name="name"
                            value="<?php echo (isset($_GET['name']) && $_GET['name'] != "")?$_GET['name']:""; ?>">
                        <a href="javascript:void(0);" onclick=""><i class="fa fa-search" aria-hidden="true"></i></a>
                    </div>
                </div>
            </form>
            <div class="clear"></div>
            <div class="service-navi">
                <div class="bdr"></div>
                <ul>
                    <?php 
                        if($topcategories>0){
                            foreach($topcategories as $cate){
                                ?>
                    <li>
                        <a href="<?php echo base_url().'our-services?cat='.$cate['id']; ?>"
                            class="<?php echo (isset($_GET['cat']) && $_GET['cat'] == $cate['id'])?"active":""; ?>">
                            <center><i class="ic1"></i>
                                <span><?php echo displayLangText($cate,'cat_name'); ?></span></center>
                        </a>

                    </li>
                    <?php 
                            }
                        }
                        ?>
                </ul>
            </div>   
                <?php 
                    if($services>0){
                        foreach($services as $serv){
                ?>
                
                    <div class="col-md-4 col-sm-4 col-xs-12 ar-float-right">
                        <a href="<?= base_url().'service/'.$serv['id'];?>">
                            <div class="serv-provid">
                                <?php 
                                        $filename = "";
                                        if($serv['image']!=""){
                                            if(file_exists('./upload/'.$serv['image'])){
                                                    $filename = base_url().'upload/'.$serv['image'];
                                            }else{
                                                    $filename = base_url().'assets/images/placeholder_product.png';
                                            }
                                        }else{
                                            $filename = base_url().'assets/images/placeholder_product.png';
                                        }
                                        
                                        ?>
                                <span class="fa fa-heart-o wishlist-icon"></span>
                                <img class="img-responsive"
                                    src="<?= ($serv['image']!="")?base_url().'upload/'.$serv['image']:base_url().'assets/images/placeholder_product.png';?>"
                                    alt="">
                                <h5><?php echo displayLangText($serv,'venue_name'); ?></h5>
                                <ul>
                                    <li>
                                        <p><span>From sar <i><?php echo $serv['service_price']; ?></i></span></p>
                                    </li>
                                </ul>
                                <p><?php echo substr(showAsLang("desc",$serv),0,90).'...'; ?></p>
                            </div>
                        </a>
                    </div>
                <?php 
                    }
                ?>
           
            <p class="pagination-p"><?php echo $links; ?></p>
            <?php
                        }
                        ?>


        </div>
    </div>
</section>

<!-- <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                </div>
            </div>
        </div>
    </section> -->

<div class="clear"></div>
<script>
function searchThis() {
    var e = document.getElementById("xtraHeight");
    var strUser = e.options[e.selectedIndex].value;
    window.location = '<?php echo base_url(); ?>our-services?cat=' + strUser;
}
</script>
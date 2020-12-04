<style>
.instyl select.locationItems {
    background: 
#FFFFFF 0% 0% no-repeat padding-box;
box-shadow: 0px 0px 15px
#00000029;
border: 1px solid
    #D0D0D0;
    width: 299px;
    padding: 20px 5px 20px 26px;
    margin: 0 10px 0 15px;
}    
</style>
<div class="banner-frm">
    <form method="GET" action="<?= base_url();?>products">
        <div class="slct-styl">

            <select name="search" id="" class="location locationItems"  id="my-input-searchbox" required style="padding:20px">
                <?php $Lcats = get_stripcats('location');
                if($Lcats>0){
                    foreach($Lcats as $loc){
                    $selected = "";
                    if(isset($_GET['search']))
                    $selected = ($loc['cat_name'] == $_GET['search'])?"selected='selected'":"";
                        ?><option value="<?php echo $loc['cat_name']; ?>" <?php echo $selected; ?> ><?php echo  ucfirst($loc['cat_name']); ?></option><?php 
                    }
                }
                ?>
            </select>
            
        </div>

        <div class="slct-styl stripTypes">
        <select name="event" >
            <option value=""><?php echo $lang['select_event_type']?></option>
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
        </div>
        <div class="slct-styl stripCat" style="display:none;">
        <select name="cat" >
            <option value=""><?php echo $lang['select_category']?></option>
            <?php 
                $hcats = get_stripcats('category');
                foreach($hcats as $cat){
                    $selected = "";
                    if(isset($_GET['cat']) && $_GET['cat'] != "")
                    $selected = ($cat['id'] == $_GET['cat'])?"selected='selected'":"";
                    echo '<option value="'.$cat['id'].'" '.$selected.'>'.ucfirst($cat['cat_name']).'</option>';
                }

            ?>
        </select>
        </div>
        <div class="slct-styl">
            <select name="venuetype" id="venuetype">
                <option value=""><?php echo $lang['select_venue_type']?></option>
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
        </div>
        <div class="slct-styl">
            <input  type="date" class="form-control" name="event_date" id="event_date" placeholder="Event Date" / >
        </div>

        <button type="submit" class="btn1"><?php echo $lang['search'] ?> <i class="fa fa-search" aria-hidden="true"></i></button>
    </form>
</div>
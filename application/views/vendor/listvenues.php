<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
<div class="main-bnr inerban bookin-lst">
	<div class="container">
		<div class="mainfrm">
		<h1><?php echo $lang["venue"]; ?> <?php echo $lang["list"]; ?></h1>
		<nav aria-label="breadcrumb ">
		  <ol class="breadcrumb styl1">
			<li class="breadcrumb-item" aria-current="page"><?php echo $lang["home"]; ?></li>
			<li class="breadcrumb-item active" aria-current="page"><?php echo $lang["venue"]; ?> <?php echo $lang["list"]; ?></li>
		  </ol>
		</nav>
		</div>
	</div>
</div>
<div class="container" style="margin-top:4%;">
	<div class="venue-top-bar-has">
		<div class="row ml-0 mr-0 has-flex">
			<div class="col-md-6 px-0">
				<!--<div class="showing-reult">Showing 08 out of 570 Total</div>-->
			</div>
			<!--<div class="col-md-6 px-0">
				<div class="sort-reult"><form>
						<select class="sort-has-type">
							<option selected>Sort by: Event Hall</option>
							<option value="Option 1">Option 1</option>
							<option value="Option 2">Option 2</option>
						</select>
					</form></div>
			</div>-->
		</div>
	</div>



	<div class="row ml-0 mr-0 ar-row">
		<div class="col-md-4 col-sm-12">
			<div class="panel with-nav-tabs custom-tabs mb-0">
                <div class="panel-heading">
                    <ul class="nav nav-tabs custom-nav-tabs">
                        <li class="active">
							<a class="custom-tab-link" href="#venuetab" data-toggle="tab"><?php echo $lang['venue'] ?> </a>
						</li>
                        <li>
							<a class="custom-tab-link" href="#servicetab" data-toggle="tab"><?php echo $lang['service'] ?> </a>
						</li>
                    </ul>
                </div>
            </div>
		</div>
		<div class="col-md-8 col-sm-12 px-0">
			<div class="panel with-nav-tabs panel-default border-0">
				<div class="panel-body p-0">
					<div class="tab-content">
						<div class="tab-pane fade in active" id="venuetab">
							<div class="add-venue-buttons col-md-12 px-0">
                                <?php
                                if(isset($add_venue_message)):
                                    ?>
                                    <div class="alert alert-info"><?php echo $lang["venue_limit"]; ?></div>
                                <?php endif; ?>
                                <?php  if($add_venue_limit == 1): ?>
								<div class="has-table-button">
									<div class="button-has add-more">
										<a href="<?php echo base_url().'vendor/add-listing'?>" class="has-button-tabl"><i class="fa fa-plus mr-2"></i> <?php echo $lang['add'].' '.$lang['venue'] ?></a>
									</div>
								</div>
                                <?php endif; ?>
							</div>
							<table id="venues" class="table table-striped table-bordered venues has-venue-table" style="width:100%">
								<thead>
									<tr>
										<th class="custom-header"><?php echo $lang['venue_name'] ?></th>
										<th class="custom-header"><?php echo $lang['venue'] ?> <?php echo $lang['type'] ?></th>
										<th class="custom-header"><?php echo $lang['actions'] ?></th>
									</tr>
								</thead>
								<tbody class="table-body">
                                <?php if($venues >0){
                                    foreach($venues as $venue){
                                        if(in_array($venue['venue_status'], array(2,3))){
                                            $status = 1;
                                            $color = 'red';
                                        }
                                        else{
                                            $status = 3;
                                            $color = 'green';
                                        }

                                        ?>
                                        <tr>
                                            <td><?php echo $venue['venue_name'];  ?></td>
                                            <td><?php echo modifyText($venue['venue_type']);  ?></td>
                                            <td>
                                                <a href="<?php echo base_url().'product/'.$venue['id']; ?>" target="_blank"><i class="fa fa-eye"></i></a>
                                                <a href="<?php echo base_url().'vendor/add-listing?venue='.$venue['id']; ?>" target="_blank"><i class="fa fa-pencil"></i></a>
                                                <a href="<?php echo base_url().'vendor/update-status?venue='.$venue['id'].'&status='.$status; ?>"><i class="fa fa-refresh"  style="color:<?php echo $color?>"></i></a>
                                                <a href="javascript:void(0);"  data-id="<?php echo $venue['id']; ?>" class="walkin-booking"><i class="fa fa-plus"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }?>
                                </tbody>
							</table>
						</div>
						<div class="tab-pane fade" id="servicetab">
							<div class="add-venue-buttons col-md-12 px-0">
                                <?php
                                if(isset($add_limit_message)):
                                    ?>
                                    <div class="alert alert-info"><?php echo $lang["service_limit"]; ?></div>
                                <?php endif; ?>
                                <?php  if($add_limit_package == 1): ?>
								<div class="has-table-button">
									<div class="button-has add-more">
										<a href="<?php echo base_url().'vendor/add-service'?>" class="has-button-tabl"><i class="fa fa-plus mr-2"></i> <?php echo $lang['add'].' '.$lang['service'] ?></a>
									</div>
								</div>
                                <?php endif; ?>
							</div>
							<table id="venues" class="table table-striped table-bordered venues has-venue-table" style="width:100%">
                                <thead>
                                <tr>
                                    <th class="custom-header"><?php echo $lang['service'] ?> <?php echo $lang['type'] ?></th>
                                    <th class="custom-header"><?php echo $lang['no_of_packages'] ?> </th>
                                    <th class="custom-header"><?php echo $lang['actions'] ?></th>
                                </tr>
                                </thead>
								<tbody class="table-body">
                                <?php if($services >0){
                                    foreach($services as $service){
                                        ?>
                                        <tr>
                                            <td><?php echo $service['venue_name'];  ?></td>
                                            <td><?php echo $service['total_package'];  ?></td>
                                            <td>
                                                <a href="<?php echo base_url().'service/'.$service['id']; ?>" target="_blank"><i class="fa fa-eye"></i></a>
                                                <a href="<?php echo base_url().'vendor/add-service?service='.$service['id']; ?>" target="_blank"><i class="fa fa-pencil"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }?>
                                </tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content ham-modal ham-form">
            <div class="modal-body">
                <form class="demoForm" name="eventForm" id="eventForm" method="post" >
                <h3 class="modal-title text-center" id="myModalLabel"><?php echo $lang['walking_booking']?></h3>
                    <p class="error-text" style="display: none;"></p>
                    <p class="success-text" style="display: none;"></p>
                    <input type="hidden" id="venue_id" name="venue_id" value="" />

                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="desc"><?php echo $lang['event_date_colon']?></label>
                                <input  type="date" class="form-control" name="event_date" id="event_date" placeholder="Event Date" / >
                        </div>
                    </div>
            </div>
            <div class="modal-footer" style="clear:both;">
                <button  type="button" class="btn btn-primary walkingBooking"><?php echo $lang['save']?></button>
            </div>
        </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
<style>
    .btnclass{
     padding:15px 130px;
     margin:40px 0 10px;
    }
    .btnclass2{
    margin: 0px;
    padding-right: 123px;
    }
</style>
<div class="main-bnr inerban bookin-lst">
	<div class="container">
		<div class="mainfrm">
		<h1>Services List</h1>
		<nav aria-label="breadcrumb ">
		  <ol class="breadcrumb styl1">
			<li class="breadcrumb-item" aria-current="page">Home</li>
			<li class="breadcrumb-item active" aria-current="page">Services List</li>
		  </ol>
		</nav>
		</div>
	</div>
</div>
<div class="container" style="margin-top:25px;">
<div class="col-md-4">
    <a href="<?php echo base_url(); ?>vendor/my-venues" class="btn btn-default btnclass">Venue</a>
    <a href="<?php echo base_url(); ?>vendor/my-services" class="btn btn-primary btnclass btnclass2">Service</a>
</div>
<div class="col-md-8">
	<table id="venues" class="table table-striped table-bordered venues" style="width:100%">
        <thead>
            <tr>
                <th>Service Type</th>
                <th>Number of Packages</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
		<?php if($venues >0){
			foreach($venues as $venue){
				?>
				<tr>
					<td><?php echo $venue['venue_name'];  ?></td>
					<td><?php echo $venue['venue_type'];  ?></td>
					<td>
					    <a href="<?php echo base_url().'service/'.$venue['id']; ?>" target="_blank"><i class="fa fa-eye"></i></a>
					    <a href="<?php echo base_url().'vendor/add-service?service='.$venue['id']; ?>" target="_blank"><i class="fa fa-pencil"></i></a>
					</td>
				</tr>
				<?php 
			}
		}?>
        </tbody>
	</table>
	</div>
</div>

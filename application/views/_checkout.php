<div class="container">
<div class="col-md-8 col-sm-4 col-xs-12">
	
    <h3>Customer Information</h3>
    <form method="POST" action="<?php echo base_url();?>submitCheckout" >
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="fname">Full Name:</label>
                    <input type="text" class="form-control" name="fullname" required id="fname">
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="title">Event:</label>
                    <input type="text" class="form-control" name="event" required id="title">
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" required id="email">
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" class="form-control" name="phone" required id="phone">
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="date">&nbsp;</label>
                    <input type="text" class="form-control" name="date"  required id="date">
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="desc">Description:</label>
                    <textarea  class="form-control" name="desc" required id="desc"></textarea>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
				<input type="submit" value="Checkout" class="btn btn-primary " />
            </div>
        </div>
			<br />
    </form>

</div>
	<div class="col-md-4 col-sm-4 col-xs-12">
		<h3>Shopping Cart</h3>
	</div>

</div>
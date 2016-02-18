<?php
include("header.php");
?>
<div class="ch-container">
    <div class="row">
        
<?php
include("sidebar.php");
?>


        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="#" style="color:#000;">Home / Cook Payment</a>
        </li>
       
    </ul>
</div>

       
    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="fa fa-cutlery"></i> All Cook Payments</h2>

        <div class="box-icon">
            <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
        </div>
    </div>
    <div class="box-content">
 
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>Id</th>
		<th>Photo</th>
        <th>Name</th>
		<th>Email</th>
        <th>Dishes $</th>
		<th>Booking</th>
		<th>Total </th>
		<th>Balance $</th>
		<th>Actions</th>
    </tr>
    </thead>
    <tbody>
	 		
	<?php 
	include_once'connect.php';
    $qq=mysql_query("SELECT * FROM `c_cook_sign_up` ");
    while($row=mysql_fetch_assoc($qq)){

    ?>  
			
    <tr>
	
        <td><?php $fgh = $row['id']; echo $row['id']; ?></td>
		<td class="center"><img src="http://www.whutzcookin.com/pro_pic/<?php echo $row['pro_pic']; ?>" style="width:90px;"></td>
        <td class="center"><?php echo $row['full_name']; ?></td>
		<td class="center"><?php echo $row['email']; 
		$gb = $row['balance'];
		?></td> 
        
		
	<?php 
	$so = mysql_query("select * from `c_checkout` WHERE `cook_id`='$fgh' and status='1' ");
	$total = 0;
	$qt = 0;
    while($row=mysql_fetch_array($so))
	{
	$tt = $row['total'];
	$total += $tt; 
	
	$qt = $row['qnt'];
	$qntu += $qt;
	}

		?>
		
		<td class="center"><?php echo $total; ?> $</td>
		<?php
		$bookpaid = mysql_query("SELECT * FROM `c_booking` where cook_id='$fgh' and payement='1'");  
		$rate = 0;
		while($row=mysql_fetch_array($bookpaid))
		{
		$rr = $row['rate'];
		$rate += $rr; 
	
		}
		
		?>
		
		<td class="center"><?php echo $rate; ?> $</td>
		<?php
		$grand = $total+$rate;
		
		?>
		<td class="center"style="color:#000;"><?php echo $grand; ?> $</td>
			<td class="center" <?php if($gb > '100') { ?>style="color:#B5191F;" <?php } else { ?>style="color:#000;" <?php } ?>><?php echo $gb; ?> $</td>
	
		 
	
       <td class="center">
	   <?php if($gb > '100') { ?>
	   <button type="button" class="btn btn-info" data-toggle="modal" data-target="#pay_now<?php echo $fgh; ?>">Pay Now </button>

	   <?php }
	   else{
		   ?>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#">View </button>
	   <?php } ?>
            <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete it?')" href="">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
	</tr>
		
		
		
		
		<!-- Modal -->
<div id="pay_now<?php echo $fgh; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Cook Payment</h4>
      </div>
      <div class="modal-body">
	  <form action="phpcode.php" method="POST">
        <div class="row">
			<div class="col-md-12">
			<div class="form-group">
			<label for="text">Enter Amount:</label>
			<input class="form-control" type="text" name="paid_amount" value="<?php echo $row['total']; ?>" required>
			<input type="hidden" name="cook_id" value="<?php echo $fgh; ?>">
			</div>
			</div>
			</div>
			<div class="row">
			<div class="col-md-12">
			<div class="form-group">
			<label for="text">Select Payement Mode:</label>
			<select class="form-control" name="payment_mode" required>
			<option>Via Transfer</option>
			<option>Via Transfer</option>
			<option>Via Transfer</option>
			<option>Other</option>
			</select>
			</div>
			</div>
		
		</div>
		
		 <div class="row">
			<div class="col-md-12">
			<div class="form-group">
			<label for="text">Remarks:</label>
			 <textarea name="remarks" class="form-control" rows="2" id="remarks"> </textarea>
			</div>
			</div>
			</div>
			<div class="row">
			<div class="col-md-8">
			</div>
			<div class="col-md-4">
			
			<button type="submit" name="pay_now" class="btn btn-info" style="width:50px;">Pay</button>
			
			</div>
		
		</div>
		</form>
      </div>
     
    </div>

  </div>
</div>
		
		
		
		
			<div id="edit_cook<?php echo $row['id']; ?>" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Edit Cook Details</h4>
						<center>
						<img src="http://www.whutzcookin.com/pro_pic/<?php echo $row['pro_pic']; ?>" style="max-width:60px;">
						</center>
					</div>
					<div class="modal-body">
					
						 <form action="update_code.php" method="POST" enctype="multipart/form-data">
								<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									<label for="text">Id:</label>
									<input type="text" name="id" value="<?php echo $row['id']; ?>" class="form-control" placeholder="Company Name" readonly>
									</div>
								</div>
							<input type="hidden" name="id" value="<?php  echo $row['id']; ?>">
							
						   <div class="col-md-6">
							<div class="form-group">
							   <label for="text">Photo:</label>
								<input type="file" name="new_photo">
								<input type="hidden" name="old_photo" value="<?php echo $row['pro_pic']; ?>">
							</div></div>
							</div>
							
							<div class="row">
							<div class="col-md-6">
							<div class="form-group">
							<label for="text">Name:</label>
								<input type="text" name="full_name"  value="<?php echo $row['full_name']; ?>" class="form-control">
								<input type="hidden" name="id" value="<?php  echo $row['id']; ?>">
							
							</div>
							</div>
							<div class="col-md-6">
						
							<div class="form-group">
							<label for="text">Business Name:</label>
								<input type="text" name="business_name"  value="<?php echo $row['business_name']; ?>" class="form-control">
							</div>
							</div>
							
							</div>
							
							<div class="row">
							<div class="col-md-6">
							<div class="form-group">
							<label for="text">Phone:</label>
								<input type="text" name="phone"  value="<?php echo $row['phone']; ?>" class="form-control">
							</div>
							</div>
							<div class="col-md-6">
							<div class="form-group">
							<label for="text">Email:</label>
								<input type="email" name="email"  value="<?php echo $row['email']; ?>" class="form-control" placeholder="Location">
							</div>
							</div>
							</div>
							<div class="row">
							<div class="col-md-6">
							<div class="form-group">
							<label for="text">Zip:</label>
								<input type="text" name="zip"  value="<?php echo $row['zip']; ?>" class="form-control">
							</div>
							</div>
							<div class="col-md-6">
							<div class="form-group">
							<label for="text">Verified:</label>
								 <select name="verification" value="<?php echo $row['verification']; ?>" class="form-control">
									  <option value="YES">Yes</option>
									  <option value="NO">No</option>
								</select> 		
							</div>
							</div>
							</div>	
						<div class="modal-footer">
						<button type="submit"  name="update_cook" class="btn btn-primary">Update</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
					</form>
				</div>
			</div>
			</div>
		</div>
	
		
		
   	<?php
	}
	?>
    </tbody>
    </table>
	
    </div>
    </div>
    </div>
    <!--/span-->

    </div><!--/row-->
</div>
        </div>
    </div>
<!-- external javascript -->

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="js/jquery.cookie.js"></script>
<!-- calender plugin -->
<script src='bower_components/moment/min/moment.min.js'></script>
<script src='bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
<!-- data table plugin -->
<script src='js/jquery.dataTables.min.js'></script>

<!-- select or dropdown enhancer -->
<script src="bower_components/chosen/chosen.jquery.min.js"></script>
<!-- plugin for gallery image view -->
<script src="bower_components/colorbox/jquery.colorbox-min.js"></script>
<!-- notification plugin -->
<script src="js/jquery.noty.js"></script>
<!-- library for making tables responsive -->
<script src="bower_components/responsive-tables/responsive-tables.js"></script>
<!-- tour plugin -->
<script src="bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
<!-- star rating plugin -->
<script src="js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="js/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="js/charisma.js"></script>


</body>
</html>

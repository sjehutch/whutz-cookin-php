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
            <a href="#" style="color:#000;">Sales</a>
        </li>
       
    </ul>
</div>

       
    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="fa fa-shopping-bag"></i> Sales </h2>

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
        <th>Dish Name</th>
		<th>Cook </th>
        <th>Order By</th>
		<th>Delivery Time</th>
		<th>Quantity</th>
		<th>Total Amount</th>
		<th>Actions</th>
    </tr>
    </thead>
    <tbody>
	 		
	<?php 
	include_once'connect.php';
    $qq=mysql_query("SELECT * FROM `c_checkout` where status='1'");
    while($row=mysql_fetch_assoc($qq)){

    ?>  
			
    <tr>
	
        <td><?php echo $row['id']; ?></td>
		<?php
		$dish_id = $row['product_id'];
		
		$dish=mysql_fetch_array(mysql_query("SELECT dish_name FROM `c_add_dish` where id='$dish_id'"));    
		
		?>
        <td class="center"><?php
		
		echo $dish['dish_name'];
		?></td>
		<?php
		$cook_id = $row['cook_id'];
		
		$cook=mysql_fetch_array(mysql_query("SELECT full_name FROM `c_cook_sign_up` where id='$cook_id'"));    
		
		?>
		
		<td class="center">
		<?php echo $cook['full_name']; ?>
		</td>
		<?php
		$user = $row['orderby'];
		
		$user_name=mysql_fetch_array(mysql_query("SELECT full_name FROM `c_user_sign_up` where user_id='$user'"));    
		
		?>
		
        <td class="center">
		<?php echo $user_name['full_name']; ?>
		</td>
		<td class="center"><?php echo $row['del_time']; ?></td> 
		<td class="center"><?php echo $row['qnt']; ?></td>
		<td class="center"><?php echo $row['total']; ?></td>
        <td class="center">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#details_sale<?php echo $row['id']; ?>">View More Details</button>
        </td>
    </tr>
   
	
			<div id="details_sale<?php echo $row['id']; ?>" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Details of Delivery</h4>
					</div>
					<div class="modal-body">
					
						 <form>
								<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									<label for="text">Delivery User:</label>
									<input type="text" name="cmpny_name" value="<?php echo $row['delivery_user']; ?>" class="form-control" placeholder="Company Name" readonly>
									</div>
								</div>
							<input type="hidden" name="id" value="<?php  echo $row['id']; ?>">
							
						   <div class="col-md-6">
							<div class="form-group">
							   <label for="text">Rating:</label>
								<input type="text" name="r_name"  value="<?php echo $row['rating']; ?>" class="form-control" placeholder="Recruiter Name" readonly>
							</div></div>
							</div>
							
							<div class="row">
							<div class="col-md-6">
							<div class="form-group">
							<label for="text">Time Ago:</label>
								<input type="text" name="contact"  value="<?php echo $row['time_ago']; ?>" class="form-control" placeholder="Contact No" readonly>
							</div>
							</div>
							<div class="col-md-6">
						
							<div class="form-group">
							<label for="text">Status:</label>
								<input type="email" name="email"  value="<?php echo $row['running_status']; ?>" class="form-control" placeholder="Email" readonly>
							</div>
							</div>
							
							</div>
							
							<div class="row">
							<div class="col-md-6">
							<div class="form-group">
							<label for="text">Location:</label>
								<input type="text" name="location"  value="<?php echo $row['address']; ?>" class="form-control" placeholder="Location" readonly>
							</div>
							</div>
							
							</div>
						
					</form>
						 
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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

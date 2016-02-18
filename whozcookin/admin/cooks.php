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
            <a href="#" style="color:#000;">Cooks</a>
        </li>
       
    </ul>
</div>

       
    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="fa fa-cutlery"></i> All Cooks</h2>

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
		<th>Business</th>
        <th>Phone</th>
        <th>Email</th>
		<th>Zip</th>
		<th>Verified</th>
		
		<th>Actions</th>
    </tr>
    </thead>
    <tbody>
	 		
	<?php 
	include_once'connect.php';
    $qq=mysql_query("SELECT * FROM `c_cook_sign_up`");
    while($row=mysql_fetch_assoc($qq)){

    ?>  
			
    <tr>
	
        <td><?php echo $row['id']; ?></td>
		<td class="center"><img src="http://www.whutzcookin.com/pro_pic/<?php echo $row['pro_pic']; ?>" style="width:90px;"></td>
        <td class="center"><?php echo $row['full_name']; ?></td>
		<td class="center"><?php echo $row['business_name']; ?></td>
        <td class="center"><?php echo $row['phone']; ?></td>
		<td class="center"><?php echo $row['email']; ?></td> 
		<td class="center"><?php echo $row['zip']; ?></td>
		<td class="center"><?php echo $row['verification']; ?></td>
		
       <td class="center">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit_cook<?php echo $row['id']; ?>">Edit</button>
            <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete it?')" href="delete_cook.php?id=<?php echo $row['id']; ?>">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
	</tr>
		
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

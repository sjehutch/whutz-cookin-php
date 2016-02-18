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
            <a href="#" style="color:#000;">Dishes</a>
        </li>
       
    </ul>
</div>

       
    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="fa fa-glass"></i> All Dishes</h2>

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
        <th>Cook</th>
		<th>Photo</th>
		<th>Dish Name</th>
        <th>Plates Left</th>
        <th>Delivery</th>
		<th>Zip</th>
		<th>Price</th>
		
		<th>Actions</th>
    </tr>
    </thead>
    <tbody>
	 		
	<?php 
	include_once'connect.php';
    $qq=mysql_query("SELECT * FROM `c_add_dish`");
    while($row=mysql_fetch_assoc($qq)){

    ?>  
			
    <tr>
	
        <td><?php echo $row['id']; ?></td>
		<?php
		$coook_id = $row['cook_id'];
		
		$cook_name=mysql_fetch_array(mysql_query("SELECT full_name FROM `c_cook_sign_up` where id='$coook_id'"));    
		
		?>
		
        <td class="center"><?php echo $cook_name['full_name']; ?></td>
		<td class="center"><img src="http://www.whutzcookin.com/img/<?php echo $row['userfile_img']; ?>" style="width:90px;"></td>
		<td class="center"><?php echo $row['dish_name']; ?></td>
        <td class="center"><?php echo $row['plates_left']; ?></td>
		<td class="center"><?php echo $row['delivery']; ?></td> 
		<td class="center"><?php echo $row['zip']; ?></td>
		<td class="center"><?php echo $row['price']; ?></td>
        <td class="center">
           <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit_dish<?php echo $row['id']; ?>">Edit</button>
            <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete it?')" href="delete_dish.php?id=<?php echo $row['id']; ?>">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
	
	<div id="edit_dish<?php echo $row['id']; ?>" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Edit Dish Details</h4>
						<center>
						<img src="http://www.whutzcookin.com/img/<?php echo $row['userfile_img']; ?>" style="width:60px;"></td>
						</center>
					</div>
					<div class="modal-body">
					
						 <form action="update_code.php" method="POST" enctype="multipart/form-data">
							<div class="row">
							<div class="col-md-6">
							<div class="form-group">
							   <label for="text">Photo:</label>
								<input type="file" name="new_photo">
								<input type="hidden" name="old_photo" value="<?php echo $row['userfile_img']; ?>">
							</div></div>
							<input type="hidden" name="id" value="<?php  echo $row['id']; ?>">
							
						   <div class="col-md-6">
							</div>
							</div>
							<div class="row">
							<div class="col-md-6">
									<div class="form-group">
									<label for="text">Description:</label>
									<textarea name="id" class="form-control" rows="2" cols="4">
									<?php echo $row['description']; ?>
									</textarea>
									</div>
							</div>
							<div class="col-md-6">
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
    </div>
    </div>
    <!--/span-->

    </div><!--/row-->
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

<?php
include_once 'connect.php';
include("header.php");
?>
<div class="ch-container">
    <div class="row">
        
<?php
include("sidebar.php");

?>

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
     
<div class=" row">
    <div class="col-md-2 col-sm-2 col-xs-6">
        <a data-toggle="tooltip" title="6 new members." class="well top-block" href="#">
            <i class="glyphicon glyphicon-user blue"></i>

            <div style="color:#000;">Total Users</div>
				<?php	
				
					$query = mysql_query("SELECT * FROM `c_user_sign_up`");
					$check = mysql_num_rows($query);
				
				?>
            <div style="color:#000;">
				<?php	
						echo $check;
				?>
			
			
			</div>
            
        </a>
    </div>

    <div class="col-md-2 col-sm-2 col-xs-6">
        <a data-toggle="tooltip" title="4 new pro members." class="well top-block" href="#">
            <i class="fa fa-cutlery " style="color:#95D757;"></i>

            <div style="color:#000;">Total Cooks</div>
			<?php		
					$qry = mysql_query("SELECT * FROM `c_cook_sign_up`");
					$cooks = mysql_num_rows($qry);
			?>
            <div style="color:#000;">
			<?php echo $cooks; ?>
			</div>
		
          
        </a>
    </div>

    <div class="col-md-2 col-sm-2 col-xs-6">
        <a data-toggle="tooltip" title="$34 new sales." class="well top-block" href="#">
            <i class="glyphicon glyphicon-shopping-cart yellow"></i>

            <div style="color:#000;">Delivery Persons</div>
			<?php		
					$qry1= mysql_query("SELECT * FROM `c_delivery`");
					$delivery = mysql_num_rows($qry1);
			?>
            <div style="color:#000;">
			<?php echo $delivery; ?>
			</div>
        
        </a>
    </div>

    <div class="col-md-2 col-sm-2 col-xs-6">
        <a data-toggle="tooltip" title="12 new messages." class="well top-block" href="#">
            <i class="fa fa-check-square-o " style="color:#95D757;"></i>

            <div style="color:#000;">Dishes Sold</div>
			<?php		
				$qry2= mysql_query("SELECT * FROM `c_checkout` where delivered='1'");
				$sold = mysql_num_rows($qry2);
			?>
            <div style="color:#000;">
			<?php echo $sold; ?>
			</div>
            
        </a>
    </div>
	
	<div class="col-md-2 col-sm-2 col-xs-6">
        <a data-toggle="tooltip" title="$34 new sales." class="well top-block" href="#">
           <i class="fa fa-glass" style="color:#95D757;"></i>
            <div style="color:#000;">Available Dishes</div>
			<?php		
					$qrr= mysql_query("SELECT * FROM `c_add_dish`");
					$dishes = mysql_num_rows($qrr);
			?>
            <div style="color:#000;">
			<?php echo $dishes; ?>
			</div>
        
        </a>
    </div>

    <div class="col-md-2 col-sm-2 col-xs-6">
        <a data-toggle="tooltip" title="12 new messages." class="well top-block" href="#">
         <i class="fa fa-money" style="color:#95D757;"></i>


            <div style="color:#000;">Payments Done</div>
			<?php		
				$qq= mysql_query("SELECT * FROM `c_cook_payments`");
				$paid = mysql_num_rows($qq);
			?>
            <div style="color:#000;">
			<?php echo $paid; ?>
			</div>
            
        </a>
    </div>
</div>



	
			<div class="row-fluid sortable">
				<div class="box span4">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-list-alt"></i> Pie</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
							<div id="piechart" style="height:300px"></div>
					</div>
				</div>
			</div>

<?php 
include_once("connect.php"); 
?>

<select class="form-group" name="del-id" >
<?php
$q = intval($_GET['q']);
$qq=mysql_query("SELECT * FROM `c_delivery` where a_type='$q' and current_avail ='0' ORDER BY `id` DESC");

while($roww=mysql_fetch_assoc($qq)){
?>

<option value="<?php echo $roww['id']; ?>"><?php echo $roww['name']; ?></option>

<?php } ?>
</select> 

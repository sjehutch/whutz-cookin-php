<?php
include_once 'connect.php';
	if(isset($_POST['update_user']))
	{
		$temp_file_extn = strtolower(end(explode('.',$_FILES["new_photo"]["name"])));
		$img_file = mt_rand(0,9999).'new_photo'.time().'.'.$temp_file_extn;
		move_uploaded_file($_FILES["new_photo"]["tmp_name"],'../pro_pic/'.$img_file);
		
		
		$id = $_POST['id'];
		$name = $_POST['name'];
		$image = $_POST['old_photo'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$zip = $_POST['zip'];
		$verification = $_POST['verification'];
		
		if($_FILES["new_photo"] ["name"] == "")
		{
			//echo ("UPDATE `c_user_sign_up` SET `full_name`= '$name', `image`= '$image', `phone`= '$phone', `email`= '$email',`zip`= '$zip',`verification`= '$verification' where `user_id`='$id'");
			mysql_query("UPDATE `c_user_sign_up` SET `full_name`= '$name', `pro_pic`= '$image', `phone`= '$phone', `email`= '$email',`zip`= '$zip',`verification`= '$verification' where `user_id`='$id'");
			header('location:users.php?status=updated');
		}
		else
		{
			//echo ("UPDATE `c_user_sign_up` SET `full_name`= '$name',`image`= '$img_file', `phone`= '$phone',`email`= '$email',`zip`= '$zip',`verification`= '$verification' where `user_id`='$id'");
			mysql_query("UPDATE `c_user_sign_up` SET `full_name`= '$name',`pro_pic`= '$img_file', `phone`= '$phone',`email`= '$email',`zip`= '$zip',`verification`= '$verification' where `user_id`='$id'");
			header('location:users.php?status=updated');
		}
		
		exit();
	}
	
	
	
	if(isset($_POST['update_cook']))
	{
		$temp_file_extn = strtolower(end(explode('.',$_FILES["new_photo"]["name"])));
		$img_file = mt_rand(0,9999).'new_photo'.time().'.'.$temp_file_extn;
		move_uploaded_file($_FILES["new_photo"]["tmp_name"],'../pro_pic/'.$img_file);
		
		
		$id = $_POST['id'];
		$name = $_POST['full_name'];
		$business_name = $_POST['business_name'];
		$image = $_POST['old_photo'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$zip = $_POST['zip'];
		$verification = $_POST['verification'];
		
		if($_FILES["new_photo"] ["name"] == "")
		{
			//echo ("UPDATE `c_cook_sign_up` SET `full_name`= '$name', `business_name`= '$business_name',`pro_pic`= '$image', `phone`= '$phone', `email`= '$email',`zip`= '$zip',`verification`= '$verification' where `id`='$id'");
			mysql_query("UPDATE `c_cook_sign_up` SET `full_name`= '$name', `business_name`= '$business_name',`pro_pic`= '$image', `phone`= '$phone', `email`= '$email',`zip`= '$zip',`verification`= '$verification' where `id`='$id'");
			header('location:cooks.php?status=updated');
		}
		else
		{
			//echo ("UPDATE `c_cook_sign_up` SET `full_name`= '$name',`business_name`= '$business_name',`pro_pic`= '$img_file', `phone`= '$phone',`email`= '$email',`zip`= '$zip',`verification`= '$verification' where `id`='$id'");
			mysql_query("UPDATE `c_cook_sign_up` SET `full_name`= '$name',`business_name`= '$business_name',`pro_pic`= '$img_file', `phone`= '$phone',`email`= '$email',`zip`= '$zip',`verification`= '$verification' where `id`='$id'");
			header('location:cooks.php?status=updated');
		}
		
		exit();
	}

	
?>
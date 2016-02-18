

<?php
	
	$f_name = $_POST['contact-first-name'];
	$l_name = $_POST['contact-last-name'];
	$email = $_POST['contact-email'];
	$telephone = $_POST['contact-telephone'];
	$msg = $_POST['contact-message'];

		$to='rupinder.netinnovatus@gmail.com'; 
        $from='From: <noreply@admin.com>';
        $subject='Contact mail';
        $message= '<head><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /></head><body>
		
       <div class="mail">
        <center>
        <img src="http://betaonetesting.com/cookin/images/logo2.png" style="width:200px">
		</center><br/>
		<center>
        <table border="0px" style="padding:10px"><tr>
		
		<tr>
		<td><h3><b>First Name:</b></h3></td><td>'.$f_name.'</td>
		</tr>
		<tr><td><h3><b>Last Name:</b></h3></td><td>'.$l_name.'</td>
		</tr>
		<tr><td><h3><b>Email Address:</b></h3></td><td>'.$email.'</td>
		</tr>
		<tr><td><h3><b>Telephone:</b></h3></td><td>'.$telephone.'</td>
		</tr>
		<tr><td><h3><b>Message:</b></h3></td><td>'.$msg.'</td>
		</tr>
		</center>
		</table>
       </div>
		
      
        </body>
        </html>';
        $headers  = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
        $headers .= 'From: <noreply@admin.com>' . "\r\n";
        mail($to,$subject,$message,$headers);
        header('location:http://whutzcookin.com?status=emailsent');
		?>
		
<?php

include("db_connect.php");

if(isset($_POST['customer_email'])){
	$email = strtolower($_POST['customer_email']);
    
    $sql_sel = "SELECT * FROM `venue_booking` WHERE email = '$email'";
    $select_users = $conn->query($sql_sel);
    
    if($select_users->num_rows > 0){
    	while($row = $select_users->fetch_assoc()) {
    		
   	    	require_once("./PHPMailer/PHPMailer.php");
    		require_once("./PHPMailer/SMTP.php");
    		
    		$mail = new PHPMailer(true);

    		try {
    			// Server settings
       			$mail->SMTPDebug = 0; // for detailed debug output
       			$mail->isSMTP();
       			$mail->Host = 'smtp.gmail.com';
       			$mail->SMTPAuth = true;
       			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
       			$mail->Port = 587;
       			// Your gmail 
       			$mail->Username = 'kaushikmandapservices@gmail.com';
       			// YOUR gmail password
       			$mail->Password = 'ypxfdnhhonzgvgdr';
       			// Sender and recipient settings           
       			$mail->setFrom('kaushikmandapservices@gmail.com', 'kaushik mandap services');           
       			$mail->addAddress($email);
       			$mail->addReplyTo('kaushikmandapservices@gmail.com', 'kaushik mandap services'); // to set the reply to
        		// Setting the email content
        		$mail->IsHTML(true);
        		$mail->Subject = "kaushik mandap services";
        		$mail->Body = 'Your Event are Confirmed';
        		$mail->AltBody = 'Your are sucessfully Failed';
        		$mail->send();
        		// echo "Email message sent.";
    		} catch (Exception $e) {
        		echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
    		}
		}
   }
   else{
      echo "<script>alert('try again');</script>";
   }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<link rel="icon" type="image" href="./assets/img/logo.png"/>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>KAUSHIK MANDAP SERVICES</title>
	
	<link rel='stylesheet' type='text/css' href='css/style.css' />
	<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
	<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='js/example.js'></script>

</head>

<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

	<div id="page-wrap">

		<textarea id="header">CONFIRMATION RECIPT</textarea>
		
		<div id="identity">
		
            <p id="address">KAUSHIK MANDAP SERVICES
							Dwarka - 361335, Gujarat<br>
							Phone: +91 9426944680</p>

		<div style="text-align: right;">
		<img src ="./assets/img/kmslogo.png"></div>
		
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">

            

            <table id="meta">
                <tr>
                    <td class="meta-head">Invoice No.</td>
                    <td><?php echo $_POST['id']; ?></textarea></td>
                </tr>
                <tr>

                    <td class="meta-head">Date & Time</td>
                    <td><?php echo date("d,M-Y  h:i:s") ?></td>
                    
                </tr>

            </table>
		
		</div>
		
		<table id="items">
		
		  <tr>
		      <th>Booking Information</th>
		      <th>Customer Information</th>
		      
		  </tr>
		  
		  <tr>
		     
		      <td class="description">
		      	<b>Venue</b> : <?php echo $_POST['vanue']; ?> <br>
		      	<b>Booking Schedule</b> : <?php echo $_POST['datetime']; ?> <br>
		      	<b>Duration</b> : <?php echo $_POST['duration']; ?>
		      </td>
		      <td class="description">
		      	<b>Booked By</b> : <?php echo $_POST['customer_name']; ?> <br>
		      	<b>Email</b> : <?php echo $_POST['customer_email']; ?> <br>
		      	<b>Contact</b> : <?php echo $_POST['customer_contact']; ?> <br>
		      	<b>Address</b> : <?php echo $_POST['customer_address']; ?>
		      </td>
		  </tr>
		  
		 
		
		</table>
		
		<br><br><br>

		 <div id="terms">
		  <h5>THANK YOU FOR BOOKING</h5>
		  <h5>Thank you for your exceptional work and for making this event a success beyond our wildest dreams.</h5>
		</div> 
	
	</div><br><br>
		<div style="text-align: center;">
		  <button class="btn btn-sm btn-outline-danger delete_book" type="button" data-id="" onclick="window.print();return false;" >PRINT RECIPT</button>
		  
		</div>
		  <br><br>

</body>

</html>
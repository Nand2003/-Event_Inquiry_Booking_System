<?php

include("db_connect.php");
if(isset($_POST['submit'])){
   $email = trim($_POST['email']);
   
      $select_users = mysqli_query($conn, "SELECT * FROM `venue_booking` WHERE email = '$email'");
      if($select_users > 0){
         require_once("./PHPMailer/PHPMailer.php");
         require_once("./PHPMailer/SMTP.php");
         
         $mail = new PHPMailer(true);

         try {
           
            $mail->SMTPDebug = 0; 
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->Username = 'kaushikmandapservices@gmail.com'; 
            $mail->Password = 'ypxfdnhhonzgvgdr'; 

            
            $mail->setFrom('<?php echo  ucwords($row['.$email.']) ?>', 'kaushik mandap services');
            $mail->addAddress($email);
            $mail->addReplyTo('<?php echo  ucwords($row['.$email.']) ?>', 'kaushik mandap services'); 
            $mail->IsHTML(true);
            $mail->Subject = "kaushik mandap services";
            $mail->Body = 'Your Event are Confirmed';
            $mail->AltBody = 'Your are sucessfully Failed';

            $mail->send();
            echo "Email message sent.";
         } catch (Exception $e) {
            echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
         }
      }
   else{
      echo "<script>alert('try again');</script>";
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>forgot password</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

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

<section class="form-container">

   <form action="" method="post">
      <h3>forgot password</h3>
      <input type="email" name="email" class="box" placeholder="Enter your Email" required>
      <input type="password" name="pass" class="box" placeholder="Enter your Password" required>
      <input type="password" name="cpass" class="box" placeholder="Confirm your Password" required>
      <input type="submit" class="btn" name="submit" value="send reset code">
      <p><a href="login.php">Back to login</a></p>
   </form>

</section>

</body>
</html>
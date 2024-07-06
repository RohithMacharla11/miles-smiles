<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=1">
<title>Form Submit to Send Email</title>
<style>
  *,*:after,*:before{
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	-ms-box-sizing: border-box;
	box-sizing: border-box;
}
body{
	font-family: arial;
	font-size: 16px;
	margin: 0;
	background: #fff;
	color: #000;

	display: flex;
	align-items:center;
	justify-content: space-around;
	min-height: 100vh;
}

.form-container{
	width: 100%;
	max-width: 600px;
	margin:0 auto;
  background: #09aad0;
  padding: 20px;
  border-radius: 10px;
  color: #fff;
}
.input-row{
  margin-bottom: 10px;
}
.input-row label{
	display: block;
	margin-bottom: 3px;
}
.input-row input,
.input-row textarea{
	width: 100%;
	padding: 10px;
	border:0;
	border-radius: 3px;
	outline: 0;
	margin-bottom: 3px;
	font-size: 18px;
	font-family: arial;
}
.input-row textarea{
	height: 100px;
}
.input-row input[type="submit"] {
  width: 100px;
  margin:0 auto;
  display: block;
  text-align: center; 
  background: #002f3a;
  color: #ffffff;
  cursor: pointer;
}
.success {
  background-color: #9fd2a1;
  padding: 5px 10px;
  color: #326b07;
  text-align: center;
  border-radius: 3px;
  font-size: 14px;
  margin-top: 10px;
}




</style>
</head>
<body>

<?php
if(!empty($_POST["send"])) {
	$userName = $_POST["userName"];
  $userEmail = $_POST["userEmail"];
	$userPhone = $_POST["userPhone"];
	$userMessage = $_POST["userMessage"];
	$toEmail = "websolution90@gmail.com";
  
	$mailHeaders = "Name: " . $userName .
	"\r\n Email: ". $userEmail  . 
	"\r\n Phone: ". $userPhone  . 
	"\r\n Message: " . $userMessage . "\r\n";

	if(mail($toEmail, $userName, $mailHeaders)) {
	    $message = "Your contact information is received successfully.";
	}
}
?>

<div class="form-container">
  <form name="contactFormEmail" method="post">
    <div class="input-row">
      <label>Name <em>*</em></label> 
      <input type="text" name="userName" required id="userName"> 
    </div>
    <div class="input-row">
      <label>Email <em>*</em></label> 
      <input type="email" name="userEmail" required id="userEmail"> 
    </div>
    <div class="input-row">
      <label>Phone <em>*</em></label> 
      <input type="text" name="userPhone" required id="userPhone">
    </div>
    <div class="input-row">
      <label>Message <em>*</em></label> 
     <!-- <textarea name="userMessage" required id="userMessage"> -->
    </div>
    <div class="input-row">
      <input type="submit" name="send" value="Submit">
      <?php if (! empty($message)) {?>
      <div class='success'>
        <strong><?php echo $message; ?>	</strong>
      </div>
      <?php } ?>
    </div>
  </form>
</div>

</body>
</html>


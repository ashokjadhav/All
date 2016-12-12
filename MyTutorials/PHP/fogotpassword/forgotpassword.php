<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

<link rel="stylesheet" href="styles.css" >

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<form class="form-signin" method="POST">
  <h2 class="form-signin-heading">Forgot Password</h2>
  <div class="input-group">
	  <span class="input-group-addon" id="basic-addon1">@</span>
	  <input type="text" name="username" class="form-control" placeholder="Username" required>
	</div>
	<br />
  <button class="btn btn-lg btn-primary btn-block" type="submit">Forgot Password</button>
  <a class="btn btn-lg btn-primary btn-block" href="login.php">Login</a>
</form>

<?php session_start();
include "connect.php"; //connects to the database
if (isset($_POST['username'])){
	$username = $_POST['username'];
	$query="SELECT * FROM `user` WHERE username='$username'";
	$result   = mysqli_query($connection, $query) or die(mysqli_error($connection));
	$count=mysqli_num_rows($result);
	// If the count is equal to one, we will send message other wise display an error message.
	if($count==1)
	{
		$rows=mysqli_fetch_array($result);
		$pass  =  $rows['password'];//FETCHING PASS
		//echo "your pass is ::".($pass)."";
		$to = $rows['email'];
		//echo "your email is ::".$email;
		//Details for sending E-mail
		$from = "Coding Cyber";
		$url = "http://www.codingcyber.com/";
		$body  =  "Coding Cyber password recovery Script
		-----------------------------------------------
		Url : $url;
		email Details is : $to;
		Here is your password  : $pass;
		Sincerely,
		Coding Cyber";
		$from = "Your-email-address@domaindotcom";
		$subject = "CodingCyber Password recovered";
		$headers1 = "From: $from\n";
		$headers1 .= "Content-type: text/html;charset=iso-8859-1\r\n";
		$headers1 .= "X-Priority: 1\r\n";
		$headers1 .= "X-MSMail-Priority: High\r\n";
		$headers1 .= "X-Mailer: Just My Server\r\n";
		$sentmail = mail ( $to, $subject, $body, $headers1 );
	} else {
	if ($_POST ['email'] != "") {
	    $fmsg = "Not found your email in our database";
		}
		}
	//If the message is sent successfully, display sucess message otherwise display an error message.
	if($sentmail==1)
	{
		$smsg = "Your Password Has Been Sent To Your Email Address.";
	}
		else
		{
		if($_POST['email']!="")
		$nmsg = "Cannot send password to your e-mail address.Problem with sending mail...";
	}
}
?>
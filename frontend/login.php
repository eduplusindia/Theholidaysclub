<?php 
include("includes/config.php");
if($_POST){
$email = $_POST['email'];
$password = $_POST['password'];
	$sql = mysqli_query($con, "select count(*) as num, id, email from tbl_webusers where email='".$email."' and password='".md5($password)."' and status='1'");
	
	list($num, $id, $email) = mysqli_fetch_array($sql);
	if($num>0){
	$_SESSION['userID'] = $id;
	$_SESSION['userEmail'] = $email;
	header("location: index.php");
	die; 
	}
}
?>
<form name="frm" method="post">
<table>
<tr><td>Email: </td><td><input type="text" name="email"></td></tr>
<tr><td>Password:</td><td> <input type="password" name="password"></td></tr>
<tr><td><input type="submit" name="submit" value="Submit"></td></tr>
</table>

</form>
<a href="registration.php">Sing Up</a>
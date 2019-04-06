# Login
<!DOCTYPE HTML> 
<html>
<head>
<link rel="Stylesheet" type="text/css" href="mystyle.css">
</head>
<div>
<body> 
<h1>Orange</h1>
<h2>Login with your Credentials</h2>
</div>
<?php 
$login=$pwd="";
?>
<form method="get" action="check.php">
 username: <input type="text" name="username">
   <br><br>
   email address: <input type="text" name="email">
   <br><br>
   password: <input type="text" name="password">
   <br><br>
    <input type="submit" name="Login" value="Login"> 
	<br><br>
	</form>
<input name="newThread" type="button" value="Forget Password" onclick="window.open('forget.php')"/>

</body>
</html>
-----------------------------------------------------------------------------------------------------------------------------
# Validation
<!DOCTYPE HTML> 
<html>
<head>
<link rel="Stylesheet" type="text/css" href="mystyle.css">
</head>
<body>

<?php
$conn1 = new mysqli("localhost:3307","root","","orange");
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
$login=test_input1($_GET["username"]);
$pwd=test_input1($_GET["password"]);
$lgemail=test_input1($_GET["email"]);
}
function test_input1($data) 
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

if ((empty($lgemail)) and (empty($login))) {
	echo "please enter the credentials";
}
else if (empty($lgemail))
{
$ssql="select username,password from useraccounts where username='$login' 
union all select username,password from useraccounts where username='$login' and password='$pwd'";
$result=mysqli_query($conn1,$ssql);
$rowcount=mysqli_num_rows($result);
if($rowcount==2)
{echo "<b>" . "<a href=\"books.php\" target=\"_blank\">" . "Yay!!! We are ready to explore Orange on a click" . "</a></b>\n";}
else if($rowcount==1)
{echo "You have keyed in an incorrect password";}
else if($rowcount==0)
{echo "Please Register before Logging in at http://localhost/Lab5/orange.php";} }

else if (empty($username)) {
$sqlmail ="select username,password from useraccounts where email_address='$lgemail' 
union all select username,password from useraccounts where email_address='$lgemail' and password='$pwd'";
$resultemail=mysqli_query($conn1,$sqlmail);
$rowcountemail=mysqli_num_rows($resultemail);
if($rowcountemail==2)
{echo "<b>" . "<a href=\"books.php\" target=\"_blank\">" . "Yay!!! We are ready to explore Orange on a click" . "</a></b>\n";}
else if($rowcountemail==1)
{echo "You have keyed in an incorrect password";}
else if($rowcountemail==0)
{echo "Please Register before Logging in at http://localhost/Lab5/orange.php";} }
	else { 
	$sqlall ="select username,password from useraccounts where username='$login' 
union all select username,password from useraccounts where username='$login' and password='$pwd'";
$resultall=mysqli_query($conn1,$sqlall);
$rowcountall=mysqli_num_rows($resultall);
if($rowcountall==2)
{ echo "<b>" . "<a href=\"books.php\" target=\"_blank\">" . "Yay!!! We are ready to explore Orange on a click" . "</a></b>\n";}
else if($rowcountall==1)
	{echo "You have keyed in an incorrect password";} }
	

?>

</body>
</html>
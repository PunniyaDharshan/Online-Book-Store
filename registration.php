#Registration
<!DOCTYPE HTML> 
<html>
<head>
<link rel="Stylesheet" type="text/css" href="mystyle.css">
</head>
<body> 
<div>
<h1>Orange</h1>
<h2>Click on Register for First time user</h2>
<h4>'*' Fields are mandatory</h4>
</div>
<?php 
$username=$password=$firstname=$lastname=$email_address=$address1=$address2=$state=$zip=$country="";
?>
<form method="get" action="insert.php"> 
   *username: <input type="text" name="username">
   <br><br>
   *password: <input type="text" name="password">
   <br><br>
   *firstname: <input type="text" name="firstname">
   <br><br>
   *lastname: <input type="text" name="lastname">
   <br><br>
   *email_address: <input type="text" name="email_address">
   <br><br>
    *address1: <input type="text" name="address1">
   <br><br>
    address2: <input type="text" name="address2">
   <br><br>
    state: <input type="text" name="state">
   <br><br>
    zip: <input type="text" name="zip">
   <br><br>
    country: <input type="text" name="country">
   <br><br>
    <input type="submit" name="Register" value="Register"> 
</form>
<input type="button" value="Already a user?" class="homebutton" id="btnHome" 
onClick="document.location.href='login.php'" />
<input type="button" value="Search books" class="homebutton" id="btnHome2" 
onClick="document.location.href='books.php'" />
</body>
</html>

--------------------------------------------------------------------------------------------------------------------------------
#Validation
<!DOCTYPE HTML> 
<html>
<head>
<link rel="Stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
<?php
$a=$result=$rowcount=$b=$result_email=$rowcount_email="";
$conn = new mysqli("localhost:3307","root","","orange");
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
$username=test_input($_GET["username"]);
$password=test_input($_GET["password"]);
$firstname=test_input($_GET["firstname"]);
$lastname=test_input($_GET["lastname"]);
$email_address=test_input($_GET["email_address"]);
$address1=test_input($_GET["address1"]);
$address2=test_input($_GET["address2"]);
$state=test_input($_GET["state"]);
$zip=test_input($_GET["zip"]);
$country=test_input($_GET["country"]);
}
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
$a="select username from useraccounts where username='$username' ";
$b="select username from useraccounts where  email_address='$email_address'";
$result=mysqli_query($conn,$a);
$result_email=mysqli_query($conn,$b);
$rowcount=mysqli_num_rows($result);
$rowcount_email=mysqli_num_rows($result_email);
$sql="insert into useraccounts (username,password,firstname,lastname,email_address,address1,address2,state,zip,country) 
values ('$username','$password','$firstname','$lastname','$email_address','$address1','$address2','$state','$zip','$country')";
if(empty($firstname) || empty($lastname) || empty($username) || empty($password)|| empty($email_address) )  {
    echo "You did not fill out the required fields.";
}
else if($rowcount==1){
	echo "'$username' already belongs to the Orange Family,Please register with a different username at http://localhost/Orange/orange.php";
}
else if($rowcount_email==1)
	{
	echo "'$email_address' already belongs to the Orange Family,Please register with a different email_id at http://localhost/Orange/orange.php";
}
else{
if ($conn->query($sql) == TRUE) {
    echo "<b>" . "<a href=\"login.php\" target=\"_blank\">" . "Login here" . "</a></b>\n";
} else {
    echo "Connection error";
}}
?>
</body>
</html>
<!DOCTYPE HTML> 
<html>
<head>
<link rel="Stylesheet" type="text/css" href="mystyle.css">
</head>
<body>

<div class="t">
<?php
$conn1 = new mysqli("localhost:3307","root","","orange");
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
$title=test_input1($_GET['search']);
$BookId=test_input1($_GET['ISBN']);

}
function test_input1($data) 
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

if (empty($title) and empty($BookId)) { echo "Please enter the details"; }

else if (empty($BookId)) {

$ssql="select title,book_id from books where lower(title) like '%".$title."%'";
$result = $conn1->query($ssql);
$rowcount=mysqli_num_rows($result);
if ($rowcount> 0)
{
while($row=$result->fetch_assoc())
{
	
	 echo "<b>" . "<a href=\"wip.php\" target=\"_blank\">" .$row["title"] . "</a></b>\n"; 
	 echo "\n"; 
}}
else
{echo "No results";
}
}

else if (empty($title))  {
	$ssqlbk="select title,book_id from books where lower(book_id) like '%".$BookId."%'";
$resultbk = $conn1->query($ssqlbk);
$rowcountbk=mysqli_num_rows($resultbk);
if ($rowcountbk> 0)
{
while($rowbk=$resultbk->fetch_assoc())
{
	
	 echo "<b>" . "<a  href=\"wip.php\" target=\"_blank\">" .$rowbk["title"] . "</a></b>\n"; 
	 echo "\n"; 
}}
else
{echo "No results";
}
}
else  {
	
	$ssqlall="select title,book_id from books where lower(title) like '%".$title."%' or book_id like '%".$BookId."%' ";
$resultall = $conn1->query($ssqlall);
$rowcountall=mysqli_num_rows($resultall);
if ($rowcountall> 0)
{
while($rowall=$resultall->fetch_assoc())
{
	
	 echo "<b>" . "<a href=\"wip.php\"  target=\"_blank\">" .$rowall["title"] . "</a></b>\n"; 
	 echo "\n"; 
}}
else
{echo "No results";
}}

?>
</div>
</body>
</html>
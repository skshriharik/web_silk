
<?php
ob_start();
$connect = mysqli_connect("localhost","root","root","sericulture1");

session_start();
$ph_number=$_SESSION['name'];
echo $ph_number;

$perm_user_check_query = "SELECT * FROM perm_producer WHERE mobile='$ph_number'";
$perm_result = mysqli_query($connect, $perm_user_check_query);
$perm_row = mysqli_fetch_assoc($perm_result);


echo '
<html>
<body>
<form action="" method="post">
<p>
NAME : '.$perm_row["fname"].'<br>
MOBILE : '.$perm_row["mobile"].'<br>
ACK NO : '.$perm_row["ack_number"].'<br>
</p>

<button name="renew">CLICK HERE TO RENEW</button>
<button name="exit">EXIT</button>
</form>
</body>
</html>
';

if(isset($_POST['renew']))
{
    $query = "INSERT INTO renew_producer(mobile)VALUES('$ph_number')";
    $result = mysqli_query($connect, $query);
    header('Refresh:0.5 ; url=renew_page1.php');
}
if(isset($_POST['exit']))
{
      header('Refresh:0.5 ; url=otp.html');
}
 ?>

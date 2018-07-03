<?php
$connect = mysqli_connect("localhost","root","root","sericulture1");

session_start();
$ph_number=$_SESSION['name'];
echo $ph_number;

$temp_user_check_query = "SELECT * FROM producer WHERE mobile='$ph_number'";
$temp_result = mysqli_query($connect, $temp_user_check_query);

$perm_user_check_query = "SELECT * FROM perm_producer WHERE mobile='$ph_number'";
$perm_result = mysqli_query($connect, $perm_user_check_query);

$perm_row = mysqli_fetch_assoc($perm_result);
//echo $perm_row['exp_date'];

if(mysqli_num_rows($temp_result) > 0 && mysqli_num_rows($perm_result)==0)
{
    echo "current gone";
  header("Refresh: 3 ; url= edit_page1.php");
}
else if(mysqli_num_rows($temp_result)==0 && mysqli_num_rows($perm_result)>0)
{
    echo "RENEWAL";

  if(strtotime($perm_row['exp_date']) >= strtotime('now'))
  {
      echo 'RENEWAL DATE : '.$perm_row['exp_date'];
      header("Refresh: 3 ; url= otp.html");

  }
  else
  {
    echo "YOU CAN RENEW NOW";
    header("Refresh: 3 ; url= renew.php");
  }
}
else if(mysqli_num_rows($temp_result)==0 && mysqli_num_rows($perm_result)==0)
{
  echo "New";
  header("Refresh: 0.5; url= page1.html");
}

 ?>

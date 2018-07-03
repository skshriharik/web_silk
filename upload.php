<?php

if(!$connect = mysqli_connect("localhost","root","root","sericulture1"))
    echo 'connection error';
else {
  echo 'succes';
}

session_start();
$ph_number = $_SESSION['name'];
echo "  Session Started  ";
echo $ph_number;

if(isset($_POST['fin']))
{
/*  $user_check_query = "SELECT * FROM producer WHERE mobile='$ph_number'";
  $result = mysqli_query($connect, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  $perm_fname=$user['fname'];
  echo "  ".$user['fname'];*/

  $perm_query = "INSERT INTO perm_producer SELECT * FROM producer WHERE mobile='$ph_number'";

  if(mysqli_query($connect,$perm_query))
     echo "   perm updated  ";
  else {
    echo "    perm failure   ";
  }

    echo '  insidded ';
    $file1=addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $file2=addslashes(file_get_contents($_FILES["sign"]["tmp_name"]));
    $query = "UPDATE perm_producer SET produce_photo = '$file1' ,sign_photo ='$file2',pdf_gen='1', exp_date=ADDDATE(CURDATE(),90) WHERE mobile= '$ph_number'";
    if(mysqli_query($connect,$query))
       echo 'inserted';
    else {
      echo 'insrtion error';
    }


      $del_query="DELETE FROM producer WHERE mobile='$ph_number'";
      if(mysqli_query($connect,$del_query))
         echo "   deletion updated  ";
      else {
        echo "    deletion failure   ";
      }

      header('location: pdf_generate.php');
}

if(isset($_POST['clear_up']))
{
    header('location:upload.html');
    exit();
}

 ?>

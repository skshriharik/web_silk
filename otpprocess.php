

 <?php
session_start();
/*$url='127.0.0.1:3306';
$username = "root";
$password = "";
}*/
//$rno=$_SESSION['otp1'];
$rno=$_SESSION['var'];
$ph_number=$_SESSION['name'];
//echo $ph_number;
//echo " otp in processs is " .$rno;
//echo "OTP is " .$rno;
$urno=$_POST['otpvalue'];
//echo " otp actual is " .$urno;
if(!strcmp($rno,$urno))
{
/*$name=$_SESSION['name'];
$email=$_SESSION['email'];
$phone=$_SESSION['phone'];
// Create connection
$sql = "INSERT INTO quote (name, email, phone)
VALUES ('$name', '$email', '$phone')";
if (mysqli_query($conn, $sql))*/
        // Account details
        $apiKey = urlencode('J02LbV43NlU-gQgc9zzabzjXmKXDJkVoyJ3z3mugKR');

        // Message details
        if(isset($_POST['Phone']))
        $numbers = $_POST["Phone"];
        else echo "Hath";

        $sender = urlencode('TXTLCL');
        $message = rawurlencode('You Have been registered successfully');

        //$numbers = implode(',', $numbers);

        // Prepare data for POST request
        $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

        // Send the POST request with cURL
      /*  $ch = curl_init('https://api.textlocal.in/send/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);*/
        header( "Refresh: 2 url= test.php" ); exit();
/*else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);*/
return true;
}
else
{
   echo "<script type='text/javascript'> alert('Incorrect OTP  Please Reenter OTP') </script>";
   //echo "otp1.html" ;
header("Refresh: 2 url= otp1.html");

//echo 'Incorrect OTP <br> Re-enter OTP <br> Redirecting...';
//session_destroy();
}
?>

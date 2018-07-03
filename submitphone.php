
      <?php

      function process($no) {
        $data=null ; $apikey=null; $numbers=null; $sender=null; $rndno=null; $ch=null; $response=null; $message=null;
        $apiKey = urlencode('LJEI9HL4128-5TUVdxP27RftG2Z0TJCEOv7XqSiIvx');
        $numbers = $no;

        $sender = urlencode('TXTLCL');
        $rndno=rand(1000, 9999);
      //  echo $rndno;
        $_SESSION['var']=$rndno;
        $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

        // Send the POST request with cURL
      /*  $ch = curl_init('https://api.textlocal.in/send/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);*/
        echo $rndno;


    }
    $ph_number="";
    if(isset($_POST['submit1']))
    {
     session_start();
     //include 'process1.php' ;
     if(isset($_POST['Phone']))
       $ph_number=$_POST["Phone"];

     echo $ph_number;
     $_SESSION['name']=$ph_number;


    // check($ph_number);
     process($ph_number);
 //    echo ;
     header("Refresh: 2; url= otp1.html");
     //header("Refresh: 1; url= otp1.html");
   }
   else if (isset($_POST['resend']))
   {
     session_start();
      $ph_number=$_SESSION['name'];
      process($ph_number);
      header("Refresh: 2; url= otp1.html");
   }

   ?>

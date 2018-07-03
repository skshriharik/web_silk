<?php
ob_start();
class firstPage
{
private $first_name = "";
private $land_line = " ";
//private $last_name = " ";
//private $addr_doorno=" ";
//private $addr_taluk=" ";
private $middle_name = "";
private $district = "" ;
private $state = "";
private $ph_number = "";
private $addr_area= " ";
//private $sector = "";
private $db ;
//private $taluk;
private $var = 0;

    function connectDatabase()
    {
      $this->db = mysqli_connect('localhost', 'root', 'root', 'sericulture1') or die("Cannot Connect To Database");
     echo "Connected";
    }

  function getValues()
  {
      if (isset($_POST['Next']))
      {
        if($this->db)
        {
           $this->first_name = mysqli_real_escape_string($this->db, $_POST['first_name']);
          // $this->last_name = mysqli_real_escape_string($this->db, $_POST['last_name']);
           $this->middle_name = mysqli_real_escape_string($this->db, $_POST['middle_name']);
           //$this->ph_number = mysqli_real_escape_string($this->db, $_POST['pno']);
           $this->land_line = mysqli_real_escape_string($this->db, $_POST['land_line']);
           //$this->addr_doorno = mysqli_real_escape_string($this->db, $_POST['addr_doorno']);
           $this->addr_area = mysqli_real_escape_string($this->db, $_POST['address']);
           //$this->addr_taluk = mysqli_real_escape_string($this->db, $_POST['addr_taluk']);
           $this->state =mysqli_real_escape_string($this->db, $_POST['state_value']);
           echo $this->state;
           $this->district = mysqli_real_escape_string($this->db, $_POST['district_value']);
           echo $this->district;
           $this->checkValues();
           //$obj->checkAndUpdate();
           $this->updateDB();


      }
      else{
          echo "Failed :(";
            }
      }
      if(isset($_POST['clear']))
      {
          header('location:renew_page1.php');
          exit();
      }
   }

  function check($ph_number)
  {

        $db = mysqli_connect('localhost', 'root', 'root', 'sericulture1') or die("Cannot Connect To Database");
        $user_check_query = "SELECT * FROM perm_producer WHERE mobile='$ph_number'";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        echo '
        <html lang="en">
        <head>
        	<title>Silk Board</title>
        	<meta charset="UTF-8">
        	<meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->
        	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <!--===============================================================================================-->
        	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
        <!--===============================================================================================-->
        	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
        <!--===============================================================================================-->
        	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
        <!--===============================================================================================-->
        	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
        <!--===============================================================================================-->
        	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">

        <!--===============================================================================================-->
        	<link rel="stylesheet" type="text/css" href="css/util.css">
        	<link rel="stylesheet" type="text/css" href="css/main.css">
        <!--===============================================================================================-->

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
         <script src="jquery.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script src="state.js"></script>
        </head>
        <body>
        	<div class="container-contact100">
        		<div class="contact100-map" id="google_map" data-map-x="40.722047" data-map-y="-73.986422" data-pin="images/icons/map-marker.png" data-scrollwhell="0" data-draggable="1"></div><!MAP>

        		<div class="wrap-contact100">

        			<div class="contact100-form-title" style="background-image: url(images/nb.JPEG);">
        				<span class="contact100-form-title-1">
        				Registration
        				</span>

        				<span class="contact100-form-title-2">
        					 Registration /Renewal As A Silkworm Seed Cocoon Producer
        				</span>
        			</div>
        			<form name="contact-form" action="renew_page1.php" method="post" id="contact-form" class="contact100-form validate-form">
        				<div class="wrap-input100 validate-input" data-validate="Name is required">
        					<span class="label-input100">Full Name:<br>(Ex-First name)</span>
        					<input class="input100" type="text" name="first_name"  value='.$user["fname"].' placeholder="Enter full name">
        					<span class="focus-input100"></span>
        				</div>

        				<div class="wrap-input100">
        					<span class="label-input101">Father/Husband Name:</span><input class="input100" type="text" name="middle_name"  value='.$user["mname"].' placeholder="Enter name ">
        					<span class="focus-input100"></span>
        				</div>

        				<div class="wrap-input100 validate-input" data-validate="Phone is required">
        					<span class="label-input100">Landline:</span>
        					<input class="input100" type="text" name="land_line"  value='.$user["land_line"].' placeholder="Enter Landline number" id="phone" minlength="10" maxlength="10">
        					<span class="focus-input100"></span>
        				</div>

        				<div class="wrap-input100 validate-input" data-validate = "Address is required">
        					<span class="label-input100">Address:</span>
        					<textarea class="input100" name="address"  value='.$user["addr"].' placeholder="Your Address"></textarea>
        					<span class="focus-input100"></span>
        				</div>

        				<div class="wrap-input101" data-validate = "Address is required">
        					<span class="label-input101">Select State:</span><br>

        					<div id="selection">
                    			<select id="listBox"  onclick="selct_district(this.value)" name="state_value" ></select><br><br>

        						<div class="wrap-input101" data-validate = "Address is required">
        						<span class="label-input101">Select District:</span>

                    			<select id="secondlist" name="district_value"></select>
                				</div>
                    		<div id="dumdiv"  style=" font-size: 10px;color: #dadada;">
                        	<a id="dum" style="padding-right:0px; text-decoration:none;color: green;text-align:center;"> </a>
                    		</div>

        					<span class="focus-input100"></span>
        					</div>
        				</div>
        					<div class="container-contact100-form-btn">
        						<div class="n1">
        					<button class="contact100-form-btn" name="clear">
        						<span>
        						<i class="fa fa-sync-alt m-l-7" aria-hidden="true"></i>
        							Clear
        						</span>
        					</button></div>
        					<div class="n2">
        					<button class="contact100-form-btn" id="next_form" name="Next">
        						<span>
        							Next
        							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
        						</span>
        					</button></div>
        				</div>
        			</form>
        		</div>
        	</div>


        				</div>
        			</form>
        		</div>
        	</div>


        	<div id="dropDownSelect1"></div>

        <!--===============================================================================================-->
        	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        	<script src="vendor/animsition/js/animsition.min.js"></script>
        <!--===============================================================================================-->
        	<script src="vendor/bootstrap/js/popper.js"></script>
        	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        	<script src="vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        	<script src="vendor/daterangepicker/moment.min.js"></script>
        	<script src="vendor/daterangepicker/daterangepicker.js"></script>
        <!--===============================================================================================-->
        	<script src="vendor/countdowntime/countdowntime.js"></script>
        <!--===============================================================================================-->
        	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
        	<script src="js/map-custom.js"></script>
        <!--===============================================================================================-->
        	<script src="js/main.js"></script>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
        	<script>
        	  window.dataLayer = window.dataLayer || [];
        	  function gtag(){dataLayer.push(arguments);}
        	  gtag("js", new Date());

        	  gtag("config", "UA-23581568-13");
        	</script>

        </body>
        </html>
';

}

 private function checkValues()
 {
      /*   if (preg_match('/[\'^£$%&*()}1234567890{@#~?>!<>,|=_+¬-]/', $this->first_name )){
            echo "<script type='text/javascript'>alert('Special Character Found in First Name');</script>";
            $var = 1;
          //  header('Refresh:1 url = page1.html');
        }

             if (preg_match('/[\'^£$%&*()}1234567890{@#~?>!<>,|=_+¬-]/', $this->last_name )){
            echo "<script type='text/javascript'>alert('Special char found in Middle name');</script>";$var = 1;
          //  header('Refresh:1 url = page1.html');
        }

             if (preg_match('/[\'^£$%&*()}{1234567890@#~?>!<>,|=_+¬-]/', $this->middle_name )){
            echo "<script type='text/javascript'>alert('Special char found in Last name');</script>";$var = 1;
        //  header('Refresh:1 url = page1.html');
        }

             if (preg_match('/[\'^£$%&*()}{@#~?>!<>,|=_+¬-]/', $this->land_line )){
            echo "<script type='text/javascript'>alert('Special char found in Land Line');</script>";$var = 1;
         //   header('Refresh:1 url = page1.html');
        }
                 if (preg_match('/[\'^£$%&*()}{@#~?>!<>,|=_+¬-]/', $this->addr_taluk )){
            echo "<script type='text/javascript'>alert('Special char found in Taluk');</script>";$var = 1;
         //   header('Refresh:1 url = page1.html');
        }

        /*  if(strlen($this->ph_number) >10){
                 echo "<script type='text/javascript'>alert('Error In Phone Number');</script>";$var = 1;
          //  header('Refresh:1 url = page1.html');
        }*/

  }

  function startSession()
  { //Start Session and SAVE VARIABLE VALUE
             session_start();

             $this->ph_number=$_SESSION['name'];
             echo $this->ph_number;

  }


 function updateDB()
 {
    $query  = "UPDATE renew_producer SET  fname = '$this->first_name' ,mname =  '$this->middle_name', land_line = '$this->land_line', addr = '$this->addr_area', state = '$this->state',district = '$this->district', date=CURDATE() WHERE mobile = '$this->ph_number'";
     if(mysqli_query($this->db, $query))
     {
        echo "Database Updated";
        header('location:renew_page_3.html');
    }
     else
        echo "Failed while database updation";



}

  function startExecution($obj)
  {
          $obj->connectDatabase();
          $obj->getValues();
  }
}

$obj = new firstPage;
$obj->startSession();
$obj->check($_SESSION['name']);
$obj->startExecution($obj);
//header("Refresh: 1 ; url= page_3.html");
//echo("<script>location.href = '/reg_page_4.php';</script>");
?>

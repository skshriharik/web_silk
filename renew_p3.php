<?php

class secondPage {
	private $chkbox;
	private $year_est;
	private $rear_h_own;
	private $dd_no;
	private $gar;
	private $dd_date;
	private $capacity;
	private $other;
	private $New_plant;
	private $chkNew;
	private $db ;
	private $app_type;
	private $ph_number;
	private $race;
	private $house_sep;

	private function connectDatabase(){
   		$this->db = mysqli_connect('localhost', 'root', 'root', 'sericulture1') or die("Cannot Connect To Database");
			echo "			Database connedted    ";
	}

	 private function getValue(){
		if (isset($_POST['Next_2']))
		{


		 $chkbox = $_POST['sector'];

 		$chkNew = "";

 		foreach($chkbox as $chkNew1)
 		{
 			$this->chkNew .= $chkNew1 . ",";
 		}

      echo $this->chkNew;
			$this->app_type = $_POST['govt'];
			echo "  Application type ==:".$this->app_type ;
			$this->rear_h_own = $_POST['own'];
			echo "  Rearing house ==".$this->rear_h_own;
			$this->gar = $_POST['ow'];
			echo "  garden :==".$this->gar;
			$this->capacity = $_POST['capacity'];
			echo "  Capasity ==:".$this->capacity;

		$plant = $_POST['acr'];

 		$New_plant = "";

 		foreach($plant as $chkNew1_plant)
 		{
 		$this->New_plant .= $chkNew1_plant . ",";
 		}
 		echo "NEW PLANT : ". $this->New_plant;


		   $this->year_est = mysqli_real_escape_string($this->db, $_POST['yr']);
		   $this->dd_no = mysqli_real_escape_string($this->db, $_POST['dd']);
			 $this->dd_date = mysqli_real_escape_string($this->db, $_POST['dt']);
			 echo $this->dd_date;
			 $this->other = mysqli_real_escape_string($this->db, $_POST['text1']);
			 $this->race = mysqli_real_escape_string($this->db, $_POST['race']);
			 echo "		RCE :". $this->race;
			 $this->house_sep = mysqli_real_escape_string($this->db, $_POST['house_sep']);
			 echo "	SEPARE HOUSING :".$this->house_sep;

	}

	if(isset($_POST['clear_2']))
	{
			header('location:renew_page_3.html');
			exit();
	}

}

		private function startSession(){
			session_start();
 			$this->ph_number = $_SESSION['name'];
 			echo "  Session Stared  ";
 			echo $this->ph_number;

	}


		private function updateDatabase(){

  		$query = "UPDATE renew_producer SET sector = '$this->chkNew',app_type = '$this->app_type' ,
		 house_owner = '$this->rear_h_own', other_details ='$this->other', dd_number = '$this->dd_no', dd_date = '$this->dd_date',year_estab = '$this->year_est',
		  host_plant_1 = '$this->gar', capacity = '$this->capacity' ,
		  host_plant_2 = '$this->New_plant', pure_silk_proposed='$this->race',rearing_done_sep='$this->house_sep' WHERE mobile = '$this->ph_number '";
 		if(mysqli_query($this->db,$query))
 		echo "DataBase Updated :)";
		else echo "Failed while updating :(";


	header('location: renew_upload.html');
			}

		 function startExecution($obj2)
		 {

				$obj2->startSession();
				$obj2->connectDatabase();
				$obj2->getValue();
	 			$obj2->updateDatabase();


			}
}


$obj2 = new secondPage;
echo "page3.php";
$obj2->startExecution($obj2);

?>

<?php 


if(isset($_GET['in1']) and isset($_GET['in2']) and isset($_GET['in3']) and isset($_GET['ct1']) and isset($_GET['ct2']) and isset($_GET['ct3']))// and isset($_POST['newDeviceactive'])
{
	include 'conn.php';
	$in1 = $_GET['in1'];
	$in2 = $_GET['in2'];
	$in3 = $_GET['in3'];
	$ct1 = $_GET['ct1']*4;
	$ct2 = $_GET['ct2']*4;
	$ct3 = $_GET['ct3']*4;
	$sql = "INSERT INTO history (time, f1, f2, f3, f4, f5, f6) VALUES (now(), $in1, $in2, $in3, $ct1, $ct2, $ct3);";
	echo($sql);	 		
	$result = $conn->query($sql);
		if($result == 1)
		{
			echo("DONE");
		}
	
}
?>
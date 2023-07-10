<?php include("../student-record-data-storage-model/connect.php");
$id= $_POST['id'];
$dtr= date("Y-m-d");

$sqal345b = "Select * from complaint WHERE id='".$id."' AND status!=''";
$resualt345b=mysqli_query($db, $sqal345b);
$rowsub=mysqli_num_rows($resualt345b);
	
if($rowsub > 0){
	echo"Complaint has already been treated..!";
}
else{
if (mysqli_query($db, "INSERT INTO complaint SET status='open',datetreaded='".$dtr."' WHERE id='".$id."'") === TRUE){
	echo"Complaint was treated successfully..!";
}
else{
	echo"Complaint was not treated..!";
}
}
?>
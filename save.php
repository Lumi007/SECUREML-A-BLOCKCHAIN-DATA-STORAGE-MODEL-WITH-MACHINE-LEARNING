<?php
	/* check connection */
	include("../student-record-data-storage-model/connect.php");

    $studname=mysqli_real_escape_string($conn,$_GET["studname"]);
    $regno=mysqli_real_escape_string($conn,$_GET["regno"]);
    $gp=$totalgrade;
    $remark=$re;
    $date = date("jS  F Y");
	$lev192='Nil'; if(isset($_GET['level'])){
		$lev192=$_GET['level'];
	}
	$ssafql = "SELECT regno FROM studresult WHERE regno='".$regno."' AND level='".$lev192."'";
    $querray=mysqli_query($conn,$ssafql);
    $darow=mysqli_num_rows($querray);
	 if($darow < 1){
	if (mysqli_query($conn, "INSERT INTO studresult set studname='".$studname."',regno='".$regno."',gp='".$gp."',fsrv='".$fsrv."',ssrv='".$ssrv."',level='".$lev192."',remark='".$remark."',datereg='".$date."'") === TRUE) {
	    #echo "Result Info was saved Successfully";
	}
}
?>
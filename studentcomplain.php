<?php include("../student-record-data-storage-model/connect.php"); ?>
<!DOCTYPE html>
<html>
	<head>
<?php 
//if the upload button is pressed
if(isset($_POST['submitform'])){
$regno= mysqli_real_escape_string($conn,$_POST['regno']);
$course= mysqli_real_escape_string($conn,$_POST['course']);
$level= mysqli_real_escape_string($conn,$_POST['level']);
$contact= mysqli_real_escape_string($conn,$_POST['contact']);
$complaint= mysqli_real_escape_string($conn,$_POST['complaint']);
$date = mysqli_real_escape_string($conn,date('jS  F Y '));

$sql345 = "Select * from complaint WHERE regno='".$regno."' AND course='".$course."' AND level='".$level."' AND contact='".$contact."' AND complaint='".$complaint."'";
$result345=mysqli_query($conn, $sql345);
$roadsa=mysqli_num_rows($result345);
if($roadsa > 0){
echo"<script> alert('This Complaint has been Submitted Already..!'); </script>";
}
else{
$sql = "INSERT INTO complaint (regno,course,level,contact,complaint,datereg) VALUES('".$regno."','".$course."','".$level."','".$contact."','".$complaint."','".$date."')";
if(mysqli_query($conn,$sql)){

//moving the file the the image folder
	echo"<script> alert('Your Complaint was Submitted Successfully..!'); </script>";
//end						
}
else{
	echo"<script> alert('Your Complaint Submission not Success..!'); </script>";
}
}
}
?>


		<title>Student's Complaint Form</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        	<link href="css/login.css" type="text/css" rel="stylesheet">
	</head>
	<body style="background-image:url('../student-record-data-storage-model/img/house.jpg');width:100%;">
		<header>
			<nav>
				<table style="width:100%;text-align:center;"><tr>
					<td style="padding-top:20px;"><a href="index.html" style="font-size:18px;color:#e5e5e5;text-decoration:none;">Home</a></td>
					<td style="padding-top:20px;"><a href="registermain.php" style="font-size:18px;color:#e5e5e5;text-decoration:none;">School-Portal</a></td>
					<td style="padding-top:20px;"><a href="schoolfees.php" style="font-size:20px;text-atdgn:left;color:#e5e5e5;text-decoration:none;">Pay-School-Fees</a></td>
					<td style="padding-top:20px;"><a href="studentcomplain.php" style="font-size:18px;color:#e5e5e5;text-decoration:none;">Complaint-Form</a></td>
					<td style="padding-top:20px;"><a href="login.html" style="font-size:18px;color:#e5e5e5;text-decoration:none;">Login</a></td><td style="padding-top:20px;"><a href="resultverify.php" style="font-size:18px;color:#e5e5e5;text-decoration:none;">View Result</a></td>
				</tr></table>
			</nav>
		</header>
		<div class="loginbox" style="width:70%;margin-top:10px;height:540px;">
			<h1 style="margin-top:-60px;">Fill Complaint Form</h1>
			<form action="" method="POST">
			<p>Student's Name / Matric No.</p>
			<input type="text" name="regno" placeholder="Enter Student's Name / Matric No." required>
			<p>Course of Study</p>
			<input type="text" name="course" placeholder="Enter Course of Study" required>
			<p>Academic Level</p>
			<input type="text" name="level" placeholder="Institutional Level e.g 100 Level" required>
			<p>Phone Number (E-mail Address)</p>
			<input type="text" name="contact" placeholder="Enter Phone Number (E-mail Address)" required>
			<p>Input Complaint Details</p>
			<textarea type="text" name="complaint" placeholder="Enter Complaint Details" style="width:100%;height:60px;background-color:#000;color:#d3d3d3;border:0px;border-bottom:1px solid #d3d3d3;font-family:calibri;font-size:18px;" required></textarea><br/><br/>
			<input type="submit" name="submitform" placeholder="Login" value="Submit Complaint Form">
			</form>
		</div>
	</body>
</html>
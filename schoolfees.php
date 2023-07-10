<?php session_start(); include("../student-record-data-storage-model/connect.php"); ?>
<html>
	<head>
		<title>Student's Portal</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        	<link href="css/register.css" type="text/css" rel="stylesheet">
	</head>
	<body>
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
		<div class="loginbox" style="height: 100%">
			<img src="../student-record-data-storage-model/img/avatar.jpg" class="avatar" width="150px" height="150px">
			<h1>Pay School Fees Here</h1>
			<?php
			if(isset($_POST['process'])){
			echo'<form action="registersub.php" method="POST">
				<p>Full Name</p>
				<input type="text" name="name" placeholder="Enter Full Name" required>
				<p>Phone Number</p>
				<input type="text" name="email" placeholder="Enter Phone Number" required>
				<p>D.O.B</p>
				<input type="date" name="dob" placeholder="Enter Date of Birth" required>
				<p>Address</p>
				<input type="text" name="address" placeholder="Enter Address" required>

				<p>Department</p>
				<input type="text" name="department" placeholder="Enter Your Department" required>
				<p>Level</p>
				<input type="text" name="level" placeholder="Enter Level" required>
				<p>Session</p>
				<input type="text" name="session" placeholder="Enter Session" required>



                <p>Gender</p>
                <p>Male<input type="radio" name="sex" value="male" required>
				Female<input type="radio" name="sex" value="female" required></p>
				';
				
				
				$rphndfs='';
$videosqlroll121 = "Select * from schoolfees where id = 1";
$videoresultroll121=mysqli_query($conn, $videosqlroll121);
while($videorollphoto=mysqli_fetch_array($videoresultroll121)){
if($_POST['rp'] == "Regular"){
if($_POST['semester'] == "1st Semester" && $_POST['level'] == "ND I"){ $rphndfs=$videorollphoto['rnd1f']; }
if($_POST['semester'] == "2nd Semester" && $_POST['level'] == "ND I"){ $rphndfs=$videorollphoto['rnd1s']; }

if($_POST['semester'] == "1st Semester" && $_POST['level'] == "ND II"){ $rphndfs=$videorollphoto['rnd2f']; }
if($_POST['semester'] == "2nd Semester" && $_POST['level'] == "ND II"){ $rphndfs=$videorollphoto['rnd2s']; }

if($_POST['semester'] == "1st Semester" && $_POST['level'] == "HND I"){ $rphndfs=$videorollphoto['rhnd1f']; }
if($_POST['semester'] == "2nd Semester" && $_POST['level'] == "HND I"){ $rphndfs=$videorollphoto['rhnd1s']; }

if($_POST['semester'] == "1st Semester" && $_POST['level'] == "HND II"){ $rphndfs=$videorollphoto['rhnd2f']; }
if($_POST['semester'] == "2nd Semester" && $_POST['level'] == "HND II"){ $rphndfs=$videorollphoto['rhnd2s']; }
}

if($_POST['rp'] == "Partime"){
if($_POST['semester'] == "1st Semester" && $_POST['level'] == "ND I"){ $rphndfs=$videorollphoto['pnd1f']; }
if($_POST['semester'] == "2nd Semester" && $_POST['level'] == "ND I"){ $rphndfs=$videorollphoto['pnd1s']; }

if($_POST['semester'] == "1st Semester" && $_POST['level'] == "ND II"){ $rphndfs=$videorollphoto['pnd2f']; }
if($_POST['semester'] == "2nd Semester" && $_POST['level'] == "ND II"){ $rphndfs=$videorollphoto['pnd2s']; }

if($_POST['semester'] == "1st Semester" && $_POST['level'] == "HND I"){ $rphndfs=$videorollphoto['phnd1f']; }
if($_POST['semester'] == "2nd Semester" && $_POST['level'] == "HND I"){ $rphndfs=$videorollphoto['phnd1s']; }

if($_POST['semester'] == "1st Semester" && $_POST['level'] == "HND II"){ $rphndfs=$videorollphoto['phnd2f']; }
if($_POST['semester'] == "2nd Semester" && $_POST['level'] == "HND II"){ $rphndfs=$videorollphoto['phnd2s']; }
}
}


				echo'
				<input type="hidden" name="feepaid" value="'.$rphndfs.'">
				<input type="submit" name="payfees" value="Pay School Fees (&#8358;'.$rphndfs.'.00)">
				
			</form>
		';
			
			}else{
				
			echo'
			<form action="" method="POST">
			<div style="text-align:center;">
			<select style="padding:6px;background-color:#fff;" name="level">
			<option value="ND I">B.SC 100 Level</option>
			<option value="ND II">B.SC 200 Level</option>
			<option value="HND I">B.SC 300 Level</option>
			<option value="HND II">B.SC 400 Level</option>
			</select>
			
			<select style="padding:6px;background-color:#fff;" name="semester">
			<option value="1st Semester">1st Semester</option>
			<option value="2nd Semester">2nd Semester</option>
			</select>
			
			<select style="padding:6px;background-color:#fff;" name="rp">
			<option value="Regular">Regular</option>
			<option value="Partime">Partime</option>
			</select>
			<br/>
			<br/>
			<input type="submit" name="process" value="Proceed to Payment">
			</div>
			</form>
			';
			}
			
?>
			
		</div>
	</body>
</html>

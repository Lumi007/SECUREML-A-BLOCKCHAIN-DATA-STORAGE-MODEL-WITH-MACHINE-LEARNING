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
		<div class="loginbox" style="height: 790px;margin-top:180px;">
			
			<h1>Register Here</h1>
			<img src="../student-record-data-storage-model/img/mouau-logo.jpg" class="avatar" width="150px" height="150px">
			<form action="registersub.php" method="POST">
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

				<p>Pet Name (Password)</p>
				<input type="password" name="petname" placeholder="Enter Pet Name (Password)" required>

                <p>Student's Gender</p>
                <p>Male<input type="radio" name="sex" value="male" required>
				Female<input type="radio" name="sex" value="female" required></p>
				<input type="submit" name="register1" placeholder="Register">
				<a href="login.html">Already have an account?</a>				
			</form>

			
		</div>
	</body>
</html>

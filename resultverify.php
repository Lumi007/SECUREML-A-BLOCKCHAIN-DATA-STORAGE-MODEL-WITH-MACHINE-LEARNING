<!--<!DOCTYPE html>
<html>
	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Student's Portal</title>
        <link href="css/index.css" type="text/css" rel="stylesheet">
	</head>
	<body>
		<div class="container">
			<header>
				<nav>
					<ul>
					<li><a href="index.html" style="font-size:18px;">Home</a></li>
					<li><a href="registermain.php" style="font-size:18px;">Portal</a></li>
					<li><a href="schoolfees.php" style="font-size:20px;text-align:left;">Pay-School-Fees</a></li>
					<li><a href="login.html" style="font-size:18px;">Login</a></li>
					</ul>
				</nav>
			</header>

			<h1>Welocme to CVS Student Portal</h1>

			<div class="slideshow-container">
				<div class="mySlides fade">
					<div class="numbertext">1 / 3</div>
					<img src="img/2.jpg" style="width:100%">
					<div class="text">Art & Design</div>
				</div>
				<div class="mySlides fade">
					<div class="numbertext">2 / 3</div>
					<img src="img/3.jpg" style="width:100%">
					<div class="text">Research</div>
				</div>

				<div class="mySlides fade">
					<div class="numbertext">3 / 3</div>
					<img src="img/student.jpg" style="width:100%">
					<div class="text">Tech</div>
				</div>
			</div>
			<br>
			<div style="text-align:center">
				<span class="dot"></span> 
				<span class="dot"></span> 
				<span class="dot"></span> 
			</div>
			<script>
				var slideIndex = 0;
				showSlides();
				
				function showSlides() {
					var i;
					var slides = document.getElementsByClassName("mySlides");
					var dots = document.getElementsByClassName("dot");
					for (i = 0; i < slides.length; i++) {
						slides[i].style.display = "none";  
					}
					slideIndex++;
					if (slideIndex > slides.length) {
						slideIndex = 1
					}    
					for (i = 0; i < dots.length; i++) {
						dots[i].className = dots[i].className.replace(" active", "");
					}
					slides[slideIndex-1].style.display = "block";  
					dots[slideIndex-1].className += " active";
					setTimeout(showSlides, 3000); // Change image every 3 seconds
				}
			</script>
		</div>
	</body>
</html>-->

<html>
	<head>
		<title>Student's Portal</title>
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
		<div class="loginbox" style="height:340px;">
			<img src="../student-record-data-storage-model/img/mouau-logo.jpg" class="avatar" width="150px" height="150px">
			<h1>View/Print Students' Result</h1>
			<form action="result.php" method="POST">
			<p>Reg No.</p>
			<input type="text" name="regno" placeholder="Enter Matric No." required>
			<p>Level</p>
			<select name="level" style="padding:5px;background-color:#000000;border:0px;border-bottom:1px solid #f5f5f5;width:100%;color:#f5f5f5;">
			<option value="100 Level">100 Level</option>
			<option value="200 Level">200 Level</option>
			<option value="300 Level">300 Level</option>
			<option value="400 Level">400 Level</option>
			<option value="500 Level">500 Level</option>
			<option value="600 Level">600 Level</option>
			<option value="700 Level">700 Level</option>
			</select><br/><br/>
			<input type="submit" name="login" placeholder="Login" value="View Result">
			</form>
		</div>
	</body>
</html>
<?php  ob_start(); session_start();    include("../student-record-data-storage-model/connect.php"); 

if(isset($_POST['loginnow'])){
	$PhoneNumber = mysqli_real_escape_string($conn,$_POST['contact']);
    $pass = mysqli_real_escape_string($conn,$_POST['pass']);
      
      $sql = "SELECT contact, password FROM register WHERE contact = '$PhoneNumber' and password = '$pass'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
  
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1 && $row['password'] === $pass) {
		 $_SESSION['user'] = $PhoneNumber;
      echo"<script> alert('Login Successful'); </script> ";
      }else {
      echo" <script> alert('Login not Successful');</script> ";
      }

}
?>

<!DOCTYPE html>
<html lang="en">

<?php
    if (!isset($_SESSION['user'])) {
     header('Location: ../login.html');
}

$mess1 = "";
$mess2 = "";


?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Students Record Data Storage Model</title>
  <!-- Bootstrap core CSS-->
  <link href="../student-record-data-storage-model/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../student-record-data-storage-model/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../student-record-data-storage-model/admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../student-record-data-storage-model/admin/css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">Students Record Data Storage Model Portal Admin</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="../student-record-data-storage-model/admin/index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Students' Complaint">
          <a class="nav-link" href="../student-record-data-storage-model/admin/complaint.php">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">View Complaint</span>
          </a>
        </li>
       
	   <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="../student-record-data-storage-model/admin/schoolfeespanel.php">
            <i class="fa fa-fw fa-credit-card"></i>
            <span class="nav-link-text">Fees Payment</span>
          </a>
        </li>
		
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="View Users">
          <a class="nav-link" href="../student-record-data-storage-model/admin/view_users.php">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">View Users</span>
          </a>
        </li>
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="View Users">
          <a class="nav-link" href="../student-record-data-storage-model/admin/view_users2.php">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">View Approved Students</span>
          </a>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="View Users">
          <a class="nav-link" href="../student-record-data-storage-model/resultindex.php">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Upload Student's Results</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        
       
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>

<?php
$x = "";
$sql = "SELECT * FROM `student` WHERE  `status` = 'Approved';";
    $query=mysqli_query($conn,$sql);
     $numrow=mysqli_num_rows($query);
      if($numrow>0){
      $result=mysqli_fetch_array($query,MYSQLI_ASSOC);
      $id=$result['id'];
      $name=$result['name'];
      $regno=$result['regno'];
      $email=$result['email'];
      $sex=$result['sex'];
      $dob=$result['dob'];
      $department=$result['department'];
      $level=$result['level'];
      $session=$result['session'];
       while ($result=mysqli_fetch_array($query)) {
               $id=$id."||".$result['id'];
               $name=$name."||".$result['name'];
               $regno=$regno."||".$result['regno'];
               $email=$email."||".$result['email'];
               $sex=$sex."||".$result['sex'];
               $dob=$dob."||".$result['dob'];
               $department=$department."||".$result['department'];
               $level=$level."||".$result['level'];
               $session=$session."||".$result['session'];
             }
                      $id2=explode("||", $id);
                      $name2=explode("||", $name);
                      $regno2=explode("||", $regno);
                      $email2=explode("||", $email);
                      $sex2=explode("||", $sex);
                      $dob2=explode("||", $dob);
                      $department2=explode("||", $department);
                      $level2=explode("||", $level);
                      $session2=explode("||", $session);
                      $allow = "yes";
                      $px=count($id2);
                    }

?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">View All Students</li>
      </ol>
      <!-- Example DataTables Card-->
	  
	  
<style type="text/css">.thumb-image{width:120px;position:relative;height:130px;;}</style>
<style>
#read{
	color:black;
	text-decoration:none;
}
#read:hover{
	color:#009788;
}
#read1{
	color:white;
	text-decoration:none;
}
#read1:hover{
	border:2px solid #ffffff;
}
#adtitle{
	padding:4px;
	background-color:#009788;
	color:#ffffff;
}
</style>
<style>
#fname {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit]:hover {
    background-color: #45a049;
}
</style>

<style>
	@media (max-width: 1000px) {
#rbar{		
		display:none;
}
#cbar{
	float:right;
	width:70%
}
}

	@media (max-width: 860px) {
#lbar{		
		display:none;
}
#cbar{
	float:right;
	width:100%
}
	}
#read{
	color:black;
	text-decoration:none;
}
#read:hover{
	color:#009788;
}
#read1{
	color:white;
	text-decoration:none;
}
#read1:hover{
	border:2px solid #ffffff;
}
#adtitle{
	padding:4px;
	background-color:#33cc33;
	color:#ffffff;
}
</style>

	

<style>
.loader {

  border-radius: 50%;
  border-top: 20px solid #00b348;
  border-bottom: 20px solid #009788;
  border-left: 20px solid #f3f3f3;
  border-right: 20px solid skyblue;
  width: 100px;
  height: 100px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear 2;
  float:left;
  margin:0 auto;
  font-size:15px;
  font-weight:bold;
}
/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>

<style>
input{ border:1px solid #d3d3d3; margin-top:10px; }
</style>
	  
    <div style='width:100%;<?php if(empty($_SESSION["user"])){ echo"display:none;"; } ?>' id='cbar'>
    <div style='background-color:#ffffff;width:100%;padding:10px;text-align:left;border:3px solid #d3d3d3;border-radius:10px;'>
	<div style='text-align:center;width:100%;'>
    <h4><b>STUDENTS' &#183; RESULT &#183; &amp; &#183; GRADING &#183; CRITERIA</b></h4>
    <h4 style="font-size:14px;"><b>(A = 4.00, AB = 3.50, B = 3.00, BC = 2.50, C = 2.00, and CD = Carry Over)</b></h4><br/>
	</div>

	
<form action='' method="get">		
<div style='padding-bottom:10pz;<?php if(isset($_GET['f1']) && isset($_GET['s1'])){echo"display:none;";} ?>'>

<table style="width:100%;text-align:center;">	
<tr>
<td style="text-align:left;"><label>STUDENT NAME: <input name="studname" style="width:100%;font-weight:normal;" placeholder="Student Name" required="required"></label><td>
<td style="text-align:right;"><label>REG NO:<br/>
<select name="regno"  style="font-size:14px;padding:5px;background-color:#fff;color:#212421;border:1px solid #d3d3d3;border-radius:0px;" required="required">
<?php
  $ssafql = "SELECT regno FROM student ORDER BY regno ASC";
    $querray=mysqli_query($conn,$ssafql);
     while($darow=mysqli_fetch_array($querray)){
		echo'<option value="'.$darow['regno'].'">'.$darow['regno'].'</option>';
	 }
?>
</select></label>
<td>
</tr>
</table>
</div>
<table style="width:100%;text-align:center;">	
<tr><td>
<div style='<?php if(isset($_GET['f1']) && isset($_GET['s1'])){echo"display:none;";} ?>'>
<label>SCHOOL</label> 
<select name="school" onchange="alertMessage();" required="required" id="select" style="font-size:14px;padding:5px;">
<?php if(isset($_GET['school'])){ echo'<option value="'.$_GET['school'].'">'.$_GET['school'].'</option>'; } else{ echo'<option value=""></option>';} ?>
<option value="SIAS">SIAS</option>
<option value="SBMT">SBMT</option>
<option value="SET">SET</option>
<option value="SEDT">SEDT</option>
<option value="SHSS">SHSS</option>
</select>
</div>
</td><td>
<div style='display:none;' id='sias'>
<label>DEPARTMENT</label> 
<select name="dept" id="dept3" onchange="alertMessage3();" style="font-size:14px;padding:5px;">
<?php if(isset($_GET['dept'])){ echo'<option value="'.$_GET['dept'].'">'.$_GET['dept'].'</option>'; } else{ echo'<option value=""></option>';} ?>
<option value="Microbiology">Microbiology</option>
<option value="Chemistry/Biochemistry">Chemistry/Biochemistry</option>
<option value="Computer Science">Computer Science</option>
<option value="Dispencing Opticianry">Dispencing Opticianry</option>
<option value="Environmental Biology">Environmental Biology</option>
<option value="Fisheries">Fisheries</option>
<option value="Food Technology">Food Technology</option>
<option value="Hospitality Management">Hospitality Management</option>
<option value="Library Science">Library Science</option>
<option value="Mathematics/Statistics">Mathematics/Statistics</option>
<option value="Pharmaceutical Technology">Pharmaceutical Technology</option>
<option value="Physics with Electronics">Physics with Electronics</option>
<option value="Science Laboratory Technology">Science Laboratory Technology</option>
</select>
</div>

<div style='display:none;' id='sbmt'>
<label>DEPARTMENT</label> 
<select name="dept1" id="dept4" onchange="alertMessage4();" style="font-size:14px;padding:5px;">
<?php if(isset($_GET['dept'])){ echo'<option value="'.$_GET['dept'].'">'.$_GET['dept'].'</option>'; } else{ echo'<option value=""></option>';} ?>
<option value="Accountancy">Accountancy</option>
<option value="Banking and Finance">Banking and Finance</option>
<option value="Business Administration and Management">Business Administration and Management</option>
<option value="Co-operative Economics and Management">Co-operative Economics and Management</option>
<option value="Marketing">Marketing</option>
<option value="Office Technology and Management">Office Technology and Management</option>
<option value="Purchasing and Supply">Purchasing and Supply</option>
<option value="Taxation">Taxation</option>
<option value="Public Administration">Public Administration</option>
</select>
</div> 

<div style='display:none;' id='set'>
<label>DEPARTMENT</label> 
<select name="dept2" id="dept5" onchange="alertMessage5();" style="font-size:14px;padding:5px;">
<?php if(isset($_GET['dept'])){ echo'<option value="'.$_GET['dept'].'">'.$_GET['dept'].'</option>'; } else{ echo'<option value=""></option>';} ?>
<option value="Agricultural Engineering">Agricultural Engineering</option>
<option value="Civil Engineering">Civil Engineering</option>
<option value="Chemical Engineering">Chemical Engineering</option>
<option value="Computer Engineering">Computer Engineering</option>
<option value="Electrical/Electronics">Electrical/Electronics</option>
<option value="Mechanical Engineering">Mechanical Engineering</option>
<option value="Mechatronics Technology">Mechatronics Technology</option>
<option value="Petroleum and Mineral Resources">Petroleum and Mineral Resources</option>
<option value="The Dean School of Engineering Technology">The Dean School of Engineering Technology</option>
</select>
</div> 

<div style='display:none;' id='sedt'>
<label>DEPARTMENT</label> 
<select name="dept3" id="dept6" onchange="alertMessage6();" style="font-size:14px;padding:5px;">
<?php if(isset($_GET['dept'])){ echo'<option value="'.$_GET['dept'].'">'.$_GET['dept'].'</option>'; } else{ echo'<option value=""></option>';} ?>
<option value="Architecture">Architecture</option>
<option value="Arts and Design">Arts and Design</option>
<option value="Building Technology">Building Technology</option>
<option value="Estate Management">Estate Management</option>
<option value="Quantity Surveying">Quantity Surveying</option>
<option value="Surveying and Geoinfomatics">Surveying and Geoinfomatics</option>
<option value="Urban and Regional Planning">Urban and Regional Planning</option>
</select>
</div> 

<div style='display:none;' id='shss'>
<label>DEPARTMENT</label> 
<select name="dept4" id="dept7" onchange="alertMessage7();" style="font-size:14px;padding:5px;">
<?php if(isset($_GET['dept'])){ echo'<option value="'.$_GET['dept'].'">'.$_GET['dept'].'</option>'; } else{ echo'<option value=""></option>';} ?>
<option value="Humanities">Humanities</option>
<option value="Mass Communication">Mass Communication</option>
<option value="Social Sciences">Social Sciences</option>
</select>
</div> 

</form>	
</div>


</td>
<td>
<div style='display:none;' id='level'>
<label>LEVEL</label> 
<select name="level" id="level" onchange="alertMessage2();" style="font-size:14px;padding:5px;">
<?php if(isset($_GET['level'])){ echo'<option value="'.$_GET['level'].'">'.$_GET['level'].'</option>'; } else{ echo'<option value=""></option>';} ?>

<option value="100 Level">100 Level</option>
<option value="200 Level">200 Level</option>
<option value="300 Level">300 Level</option>
<option value="400 Level">400 Level</option>
<option value="500 Level">500 Level</option>
<option value="600 Level">600 Level</option>
<option value="700 Level">700 Level</option>
</select>
</div> 
</td></tr>
</table>



<?php
if(empty($_GET['f1']) && empty($_GET['s1'])){
	echo'
<div style="display:none;text-align:center;" id="numset">
<br/>
<table style="width:100%;text-align:center;">	
<tr><td>Number of Course Offered in First Semester<br/><span class="ND1"></span><br/><br/> <select name="f1">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
</select>
</td>
<td></td>

<td>Number of Course Offered in Second Semester<br/><span class="ND2"></span><br/><br/><select name="s1">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
</select>

</td></tr>
</table>

<div style="width:100%;margin-top:20px;">
<button type="submit" name="pd" class="btn btn-success">Process Data</button>
</div>
</div>
';
}
?>
</form>
<br/>






<div style="color:#212421;">
<?php
if(isset($_GET['f1']) && isset($_GET['s1'])){
	$sflev='DEGREE'; if(isset($_GET['level'])){
		$sflev=strtoupper($_GET['level']);
	}
echo'
<form action="../student-record-data-storage-model/result.php?studname='.$_GET['studname'].'&regno='.$_GET['regno'].'&f1='.$_GET['f1'].'&s1='.$_GET['s1'].'&school='.$_GET['school'].'&dept='.$_GET['dept'].'&dept1='.$_GET['dept1'].'&dept2='.$_GET['dept2'].'&dept3='.$_GET['dept3'].'&dept4='.$_GET['dept4'].'&level='.$_GET['level'].'" method="POST">
<h4><b> &nbsp;'.$sflev.' &#183; RESULT &#183; PROCESSING</b></h4>
<table style="width:100%;text-align:center;border:0px;">	
<tr style="border:0px;">
<td style="border:2px solid #d3d3d3;vertical-align:top;">
<label>FIRST SEMESTER</label>
<table class="table" style="width:100%;text-align:center;">	
<tr><td><b>COURSES<b></td><td><b>GRADE<b></td><td><b>CREDIT UNIT<b></td></tr>
';

$i=1;
while($i <= $_GET['f1']){
echo'	
<tr><td><b>COURSE '.$i.'<b></td>
<td>
<select name="g'.$i.'" style="font-size:14px;padding:5px;color:black;">
<option value="4.0">A</option>
<option value="3.5">AB</option>
<option value="3.0">B</option>
<option value="2.5">BC</option>
<option value="2.0">C</option>
<option value="CD">CD</option>
<option value="E">E</option>
<option value="F">F</option>
</select>
</td>
<td>
<select name="c'.$i.'" style="font-size:14px;padding:5px;color:black;">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
</select>
</td>
</tr>
';
$i++;
}

echo'</table>

</td>

<td style="border:2px solid #d3d3d3;vertical-align:top;">

<label>SECOND SEMESTER</label>
<table class="table" style="width:100%;text-align:center;">	
<tr><td><b>COURSES<b></td><td><b>GRADE<b></td><td><b>CREDIT UNIT<b></td></tr>
';

$i=1;
while($i <= $_GET['s1']){
echo'	
<tr><td><b>COURSE '.$i.'<b></td>
<td>
<select name="gg'.$i.'" style="font-size:14px;padding:5px;color:black;">
<option value="4.0">A</option>
<option value="3.5">AB</option>
<option value="3.0">B</option>
<option value="2.5">BC</option>
<option value="2.0">C</option>
<option value="CD">CD</option>
<option value="E">E</option>
<option value="F">F</option>
</select>
</td>
<td>
<select name="cc'.$i.'" style="font-size:14px;padding:5px;color:black;">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
</select>
</td>
</tr>
';
$i++;
}
}
?>
</table>
</td>

</tr>
</table>










<!-- ND2 HND2 -->
</td>

</tr>
</table>
<?php
if(isset($_GET['f1']) && isset($_GET['s1'])){
echo'
<div style="width:100%;margin-top:20px;text-align:center;padding:10px;">
<button type="submit" name="pd" class="btn btn-default"style="padding:10px;">STUDENTS RESULTS AND GRADING CRITERIA</button>
</div> 
';
}
?>
</form>
</div> 




</div> 
</div> 



<?php
if(isset($_SESSION['user']) && $_SESSION['user']!=''){}else{
/* pop alert */
echo"<div id='myModal3ajkk' style='position: fixed;background-image:url(\"../student-record-data-storage-model/images/Unicorn-AFF.jpg\");z-index: 1;left: 0;top: 0;width: 100%;height: 100%;overflow: auto;text-align:center;vertical-align:middle;z-index:9998;'>


<div style='padding:10px;position:fixed;top:45%;left: 50%;transform:translate(-50%, -50%);width:400px;'>
<div style='background-color:#134776;padding:20px;padding-top:10px;border-radius:5px;color:#f5f5f5;'>
<h4 style='font-weight:bold;margin-bottom:20px;text-align:center;'><em>Students Results and Grading</em></h4>";
echo'
 <form role="form" style="text-align:left;" method="post">
  <div class="form-group">
    <label for="email">Student ID:</label>
    <div style="background-color:white;width:100%;" class="form-control" id="email">
	<span class="glyphicon glyphicon-phone"></span> <input type="text"  name="contact" placeholder="Enter Phone Number" style="border:1px solid #ffffff;margin-top:-2px;" required="required">
	</div>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
	<div style="background-color:white;width:100%;" class="form-control" id="email">
	<span class="glyphicon glyphicon-lock"></span> <input type="password" name="pass" placeholder="Enter Password" style="border:1px solid #ffffff;margin-top:-2px;" required="required">
	</div>
  </div>
  <button type="submit" name="loginnow" class="btn btn-danger" style="width:100%;"> Login to Grading System </button>
</form>';
echo"</div></div></div></div>";
/* pop alert end */
}
?>




<script>
function alertMessage2()
{
	var x1= $("#level").find(":selected").text();
	if(x1 != ""){
		document.getElementById('numset').style.display='inline';
		
	if(x1 == '100 Level'){
		$('.ND1').html('100 Level (L1)');		
		$('.ND2').html('100 Level (L1)');
	}
	else if(x1 == '200 Level'){
		$('.ND1').html('200 Level (L2)');		
		$('.ND2').html('200 Level (L2)');
	}
	else if(x1 == '300 Level'){
		$('.ND1').html('300 Level (L3)');		
		$('.ND2').html('300 Level (L3)');
	}
	else if(x1 == '400 Level'){
		$('.ND1').html('400 Level (L4)');		
		$('.ND2').html('400 Level (L4)');
	}
	else if(x1 == '500 Level'){
		$('.ND1').html('500 Level (L5)');		
		$('.ND2').html('500 Level (L5)');
	}
	else if(x1 == '600 Level'){
		$('.ND1').html('600 Level (L6)');		
		$('.ND2').html('600 Level (L6)');
	}
	else if(x1 == '700 Level'){
		$('.ND1').html('700 Level (L7)');		
		$('.ND2').html('700 Level (L7)');
	}
	}
}

//section
function alertMessage3()
{
	var x1=document.getElementById('dept3').value;
	if(x1 != ""){
	document.getElementById('level').style.display='inline';	
	}
}

function alertMessage4()
{
	var x1=document.getElementById('dept4').value;
	if(x1 != ""){
	document.getElementById('level').style.display='inline';	
	}
}

function alertMessage5()
{
	var x1=document.getElementById('dept5').value;
	if(x1 != ""){
	document.getElementById('level').style.display='inline';	
	}
}

function alertMessage6()
{
	var x1=document.getElementById('dept6').value;
	if(x1 != ""){
	document.getElementById('level').style.display='inline';	
	}
}


function alertMessage7()
{
	var x1=document.getElementById('dept7').value;
	if(x1 != ""){
	document.getElementById('level').style.display='inline';	
	}
}


function alertMessage()
{
	var x=document.getElementById('select').value;
	
	if(x ==	"SIAS"){
	document.getElementById('sias').style.display='inline';
	document.getElementById('sbmt').style.display='none';
	document.getElementById('set').style.display='none';
	document.getElementById('sedt').style.display='none';
	document.getElementById('shss').style.display='none';	
	}else if(x == "SBMT"){
	document.getElementById('sias').style.display='none';
	document.getElementById('sbmt').style.display='inline';
	document.getElementById('set').style.display='none';
	document.getElementById('sedt').style.display='none';
	document.getElementById('shss').style.display='none';		
	}else if(x == "SET"){
	document.getElementById('sias').style.display='none';
	document.getElementById('sbmt').style.display='none';
	document.getElementById('set').style.display='inline';
	document.getElementById('sedt').style.display='none';
	document.getElementById('shss').style.display='none';		
	}else if(x == "SEDT"){
	document.getElementById('sias').style.display='none';
	document.getElementById('sbmt').style.display='none';
	document.getElementById('set').style.display='none';
	document.getElementById('sedt').style.display='inline';
	document.getElementById('shss').style.display='none';		
	}else if(x == "SHSS"){
	document.getElementById('sias').style.display='none';
	document.getElementById('sbmt').style.display='none';
	document.getElementById('set').style.display='none';
	document.getElementById('sedt').style.display='none';
	document.getElementById('shss').style.display='inline';		
	}
}
</script>
</div>

              </tbody>
            </table>
            </form>
          </div>
        <div class="card-footer small text-muted">Student Students Record Data Storage Model</div>
        </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright &copy; CVS <?php echo date("Y"); ?></small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="../student-record-data-storage-model/admin/vendor/jquery/jquery.min.js"></script>
    <script src="../student-record-data-storage-model/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../student-record-data-storage-model/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../student-record-data-storage-model/admin/vendor/datatables/jquery.dataTables.js"></script>
    <script src="../student-record-data-storage-model/admin/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../student-record-data-storage-model/admin/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="../student-record-data-storage-model/admin/js/sb-admin-datatables.min.js"></script>
  </div>
</body>

</html>
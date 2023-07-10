<?php   session_start();    include("../student-record-data-storage-model/connect.php"); ?>

<?php
$dept='';
$re=""; $totalgrade="";
$lev2='';
$fsrv=''; $ssrv='';
if(isset($_POST['regno'])){}
else{
if($_GET['dept']){ $dept = $_GET['dept']; }
else if($_GET['dept1']){ $dept = $_GET['dept1']; }
else if($_GET['dept2']){ $dept = $_GET['dept2']; }
else if($_GET['dept3']){ $dept = $_GET['dept3']; }
else if($_GET['dept4']){ $dept = $_GET['dept4']; }
else if($_GET['dept5']){ $dept = $_GET['dept5']; }

$ref1=0.0; $ref2=0.0; $res1=''; $res2=0.0; $totalgrade=0.0;
$ref1c=0.0; $ref2c=0.0; $res1c=''; $res2c=0.0;
if(empty($_SESSION["user"]) || empty($_GET['studname']) || empty($_GET['regno']) || empty($_POST['g1']) || empty($_GET['f1']) || empty($_GET['s1']) || empty($_GET['school']) || (empty($dept) && empty($_GET['dept1']) && empty($_GET['dept2']) && empty($_GET['dept3']) && empty($_GET['dept4']))){ 

header("Location:../student-record-data-storage-model/resultverify.php");

}
else{
$i=1;
while($i <= $_GET['f1']){
$ref1= $ref1 + ($_POST['g'.$i.''] * $_POST['c'.$i.'']);
$ref1c= $ref1c + $_POST['c'.$i.''];
$i++;
}

$i=1;
while($i <= $_GET['s1']){
$res1= $res1 + ($_POST['gg'.$i.''] * $_POST['cc'.$i.'']);
$res1c= $res1c + $_POST['cc'.$i.''];
$i++;
}
}
$fsrv= floatval($ref1) / floatval($ref1c); $ssrv=floatval($res1) / floatval($res1c);
$totalgrade = floatval($fsrv + $ssrv) / 2;
$totalgrade=substr($totalgrade,0,4);
/*$fsrv=floatval($ref1c) / floatval($_GET['f1']); $ssrv=floatval($res1c) / floatval($_GET['s1']);
$totalgrade = floatval($fsrv + $ssrv) / 2;*/

if($totalgrade >= 3.5){$re="DESTINCTION";} else if($totalgrade >= 3.0){$re="UPPER CREDIT";} else if($totalgrade >= 2.5){$re="LOWER CREDIT";} else{$re="FAILED";}

include("../student-record-data-storage-model/save.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head> <!-- <meta http-equiv="refresh" content="60"> -->
    <title>Students Record Data Storage Model</title>
	<meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../student-record-data-storage-model/bootstrap/Material Icons.css">
	<link rel="stylesheet" href="../student-record-data-storage-model/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../student-record-data-storage-model/bootstrap/w3.css">
	<script src="../student-record-data-storage-model/bootstrap/js/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../lib/w3.css">
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
	background-color:#b30086;
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
</head>
<body style="background-color:#f5f5f5;">
<br>
  	  
   <div style='padding:40px;padding-top:0px;width:80%;' class='container-fluid text-center'>
    <div style='padding:40px;padding-top:0px;width:100%;'>
    <div style='background-color:#ffffff;width:100%;padding:10px;text-align:left;color:#000000;font-family:times new roman;'>

<!-- Result -->
<?php
$rha=''; if(isset($_POST['regno'])){ $rha=$_POST['regno']; } else if(isset($_GET['regno'])){ $rha=$_GET['regno']; }
$levisa=''; if(isset($_POST['level'])){ $levisa=" AND level='".$_POST['level']."'"; } else if(isset($_GET['level'])){ $levisa="AND level='".$_GET['level']."'"; }

$sql81911 = "Select * from studresult WHERE regno='".$rha."' ".$levisa." LIMIT 1";
				$result81911=mysqli_query($conn, $sql81911);
				while($row819111=mysqli_fetch_array($result81911)){
		$fsrv=$row819111['fsrv']; $ssrv=$row819111['ssrv'];			
$sql81911t = "Select * from student WHERE regno='".$rha."' LIMIT 1";
				$result81911t=mysqli_query($conn, $sql81911t);
				$row819111t=mysqli_fetch_array($result81911t);
$remark=$row819111['gp'];
if($remark >= 3.5){
	$remark='DESTINCTION';
}
else if($remark >= 3.0){
	$remark='UPPER CREDIT';
}
else if($remark >= 2.5){
	$remark='LOWER CREDIT';
}
else if($remark < 2.5){
	$remark='PASS';
}
else{
	$remark='FAIL';
}
$lev2=$row819111['level']; $lev=$row819111t['level']; if(isset($_GET['level']) && $_GET['level'] == "ND2"){$lev="NATIONAL DIPLOMA";}else{$lev="HIGHER NATIONAL DIPLOMA";}

$lev="DEGREE";


if($dept == ""){ $dept=$row819111t['address']; }
if($re == ""){ $re=$row819111['remark']; }
if($totalgrade == ""){ $totalgrade=$row819111['gp']; }


echo"<div style='border:4px solid #e65c00;background-image:url(\"../student-record-data-storage-model/images/fpogb.jpg\");background-repeat:repeat;'>	
<table class='table' style='width:100%;'>
<tr>
<td style='width:15%;'><img src='../student-record-data-storage-model/images/mouau-logo.png' style='width:100%;'/></td>
<td style='text-align:center;font-size:40px;font-weight:bold;color:#508A62;font-family:calibri;width:85%;'><div style='margin-left:-60px'>MICHAEL OKPARA UNIVERSITY (MOUAU)
<p style='font-size:25px;'>P.M.B. 7267 UMUDIKE, ABIA STATE</p></div></td>
</tr>
</table>
<div style='padding:10px;'>
<div style='padding:10px;'>
<div style='float:right;'>Date: <input readonly='readonly' type='text' style='width:280px;border:0px solid #ffffff;border-bottom:1px solid #000000;opacity:0.8;' value='".$row819111['datereg']."'></div>
<p style='font-weight:bold;'>Name: <input readonly='readonly' type='text' style='width:320px;border:0px solid #ffffff;border-bottom:1px solid #000000;opacity:0.8;' value='".$row819111['studname']."'>
</p>
<p style='font-weight:bold;'>Registration No: <input readonly='readonly' type='text' style='width:250px;border:0px solid #ffffff;border-bottom:1px solid #000000;opacity:0.8;' value='".$row819111['regno']."'><br/></p>
<table style='width:100%;'><tr><td style='vertical-align:top;width:100px;'><p style='font-weight:bold;'>Address:</td><td> 
<input readonly='readonly' type='text' style='width:275px;border:0px solid #ffffff;border-bottom:1px solid #000000;opacity:0.8;' value='".$dept."'><br/>
<input readonly='readonly' type='text' style='width:305px;border:0px solid #ffffff;border-bottom:1px solid #000000;opacity:0.8;' value='MICHAEL OKPARA UNIVERSITY (MOUAU)'><br/>
<input readonly='readonly' type='text' style='width:305px;border:0px solid #ffffff;border-bottom:1px solid #000000;opacity:0.8;' value='UMUDIKE, ABIA STATE'><br/></p></td></tr></table>
</div>	

<br/>
<br/>
<div style='color:#e65c00;font-size:25px;text-align:center;font-weight:bold;text-decoration:underline;'>".strtoupper($lev2)." ".$lev." EXAMINATION RESULT</div>
<br/>
<div style='font-size:18px;font-family:Lucida Calligraphy;text-align:justify;font-weight:normal;padding:10px;line-height:50px;' value='".$dept."'>
I have the pleasure to inform you that your result (1st semester result = ".substr($fsrv,0,4)."gp and 2nd semester result = ".substr($ssrv,0,4)."gp) have satisfied the Academic Board requirements for the award of <span style='font-size:30px;font-weight:bold;font-family:times new roman;'>".$lev."</span> in 
<input readonly='readonly' type='text' style='text-align:center;width:300px;border:0px solid #ffffff;border-bottom:1px solid #000000;opacity:0.8;height:25px;background-color:transparent;' value='".$dept."'>
 at ".str_ireplace(" ",'',$lev2)." (CGPA<input readonly='readonly' type='text' style='text-align:center;width:50px;border:0px solid #ffffff;background-color:transparent;font-weight:bold;border-bottom:1px solid #000000;height:25px;' value='".$totalgrade."'>) with effect from 
<input readonly='readonly' type='text' style='text-align:center;width:200px;border:0px solid #ffffff;border-bottom:1px solid #000000;background-color:transparent;height:25px;' value='".$row819111['datereg']."'>. The Degree will be conferred on you after graduation at the next convocation ceremony.

<br/><br/>
";
}
?>
<table style="width:100%;text-align:center;">
<tr><td style="width:30%;">
Accept Our congratulations.<br/>
____________________________________
<br/>
<b>BRR. A. BOMA GEORGE
<br/>REGISTRAR</b></td>
<td style="text-align:center;">
<br/>
<br/>
<b><i>FPOGB/<?php echo date("d");


if($dept == ""){
echo'<script> alert("Result not Found..! \n \n Kindly check your phone for notice."); window.location="../student-record-data-storage-model/resultverify.php"; </script>';
}
?> </i>
</td>
<td style="width:30%;">
<br/>
<br/>
<i><?php echo" &nbsp;&nbsp;&nbsp;&nbsp; No: ".rand(2999144,9992919); ?></i></b></td>
</tr>
<script> alert("An SMS has already been disseminated..! \n \n Kindly check your phone for notice."); </script>
<tr>
</tr>
</table>

</div>
</div>
</div>
<br/>
<table>
<tr>
<td></td><td></td><td style="width:50%;"><a style="text-decoration:none;" onclick="backpage()" class="btn btn-default">Back to Home Page</a></td>
<td></td><td></td><td style="width:50%;text-align:right;"><a style="text-decoration:none;" onclick="printdoc()" class="btn btn-success">Print Result</a></td>
</tr>
</table>
<!-- Result end-->	
	
<script>
function backpage() {
    window.location="../student-record-data-storage-model/resultverify.php";
}	
function printdoc() {
    window.print();
}	
</script>
</div>

	 
</div> 

</div> 
 
   </div>
</div>
	 
	<script> $(document).ready(function(){ $(".navbar a, div .book").on('click', function(event) { event.preventDefault(); var hash = this.hash; $('html, body').animate({ scrollTop: $(hash).offset().top }, 900, function(){ window.location.hash = hash; }); }); $(window).scroll(function() { $(".slideanim").each(function(){ var pos = $(this).offset().top; var winTop = $(window).scrollTop(); if (pos < winTop + 600) { $(this).addClass("slide"); } }); }); })  </script>	 <script src="../student-record-data-storage-model/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
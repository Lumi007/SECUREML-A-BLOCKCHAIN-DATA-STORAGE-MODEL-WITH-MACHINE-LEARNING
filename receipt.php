<?php session_start(); include("../student-record-data-storage-model/connect.php"); 
if(isset($_GET['id']) && $_GET['id'] !=''){} else{ if(headers_sent()) { } else{ exit(header("Location:../student-record-data-storage-model/schoolfees.php")); } }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../student-record-data-storage-model/bootstrap/css/bootstrap.min.css">

<script src="../student-record-data-storage-model/bootstrap/js/jquery.min.js"></script>
<style>
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    min-width: 150px;
    padding-left:10px;
    padding-top:4px;
    padding-bottom:4px;
	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

#formsize{
	  margin-left:30px;
  }

.dropdown:hover .dropdown-content {
    display: block;
}

 @media (max-width: 700px) {
  .navbar-header {
      float: none;
  }
  .navbar-left,.navbar-right {
      float: none !important;
  }
  .navbar-toggle {
      display: block;
  }
  .navbar-collapse {
      border-top: 1px solid transparent;
      box-shadow: inset 0 1px 0 rgba(255,255,255,0.1);
  }
  .navbar-fixed-top {
      top: 0;
      border-width: 0 0 1px;
  }
  .navbar-collapse.collapse {
      display: none!important;
  }
  .navbar-nav {
      float: none!important;
      margin-top: 7.5px;
  }
  .navbar-nav>li {
      float: none;
  }
  .navbar-nav>li>a {
      padding-top: 10px;
      padding-bottom: 10px;
  }
  .collapse.in{
      display:block !important;
  }
} 

</style>

 </head>
<body id="myPage" data-spy="scroll" data-target=".navbar" style="background-color:white;font-family:calibri;" data-offset="60">
<div class="container fluid text-center" style="padding:0px;color:black;">
  <p><h2><img src='../student-record-data-storage-model/img/mouau-logo.jpg' style='margin-left:0px;margin-top:-10px;width:100px;border-radius:4px;'><br/><b>SCHOOL FEES PAYMENT RECEIPT</b></h2></p>
<h4 style='text-align:left;'><b>Personal Details</b></h4>  
  <table class="table table-striped">
    <thead>
    
    <tbody>
      <tr style="text-align:left;">
        <td>Invoice No:</td>
        <td> #<?php echo rand(10000000,90000000).rand(9000,7895); ?></td>
      </tr>
	  
<?php
$videosqlroll121 = "Select * from feepaid where id = '".$_GET['id']."'";
$videoresultroll121=mysqli_query($conn, $videosqlroll121);
while($videorollphoto=mysqli_fetch_array($videoresultroll121)){
      echo"<tr style='text-align:left;'>
        <td>Full Name:</td>
        <td> ".$videorollphoto['name']."</td>
      </tr> ";    
	  echo"<tr style='text-align:left;'>
        <td>Location:</td>
        <td> ".$videorollphoto['address']."</td>
      </tr> ";    
	
echo'
      <tr style="text-align:left;">
        <td>Country:</td>
        <td><span style="color:#00802b;"><b>Nigeria</b></span></td>
      </tr>
	  
	  <tr style="text-align:left;">
        <td>Payment Method:</td>
        <td><select>
			<option>ATM Transfer</option>
			<option>Bank Deposit</option>
			</select></td>
      </tr>
	  
	  <tr style="text-align:left;">
        <td>Invoice Date: </td>
        <td>'.date("d/m/Y").'</td>
      </tr>
	  
	  <tr style="text-align:left;">
        <td>Level: </td>
        <td>'.$videorollphoto['level'].'</td>
      </tr>
	';
	
	  echo'
<tr style="text-align:left;font-size:16px;">
        <td><b>Account Details </b></td>
        <td></td>
      </tr>	
	  
	  <tr style="text-align:left;">
        <td>Acct Name: </td>
        <td>CVS</td>
      </tr>
	  <thead>
      <tr style="text-align:center;">
        <th><b>Bank Names </b></th>
        <th>Acct No.</th>
      </tr>
    </thead>	  
	  <tr style="text-align:left;">
        <td>Access Bank PLC</td>
		<td>2034588845</td>
      </tr>
	  
	  <tr style="text-align:left;">
        <td>Diamond Bank</td>
		<td>4505112890</td>
      </tr>
	  
	  </b>
		
    </tbody>
	</thead>
	</table>
	
	
  <table class="table table-striped">
    <thead>
    
    <tbody>
      <tr style="text-align:left;">
        <td><b>Invioce Items Description</b></td>
        <td><b>Amount</b></td>
      </tr>';
	  
   echo"
	<tr style='text-align:left;'>		
		<td><b>Amount Paid</b></td>
        <td>&#8358;".$videorollphoto['feepaid']."</td>
	</tr>
	<tr style='text-align:left;'>
        <td><b>Total</b></td>
        <td><b>&#8358;".$videorollphoto['feepaid']."</b></td>
      </tr>
	";
}
?>
	  <tr style="text-align:left;">
        <td><button onclick="back()">Back to Home Page</button></td>
        <td><button onclick="printdoc()">Print &amp; Save Receipt</button></td>
      </tr>
	  <tr style="text-align:left;">
        <td></td>
        <td></td>
        
      </tr>
     </tbody>
	</thead>
	</table>	
<p><b>Thanks for your Payment! have a great day</b></p>
<p><b>Copyright &copy; CVS <?php echo date("Y"); ?></b></p>
<br/>	
</div>
<br/>
<br/>
<br/>
<br/>
<script>
function printdoc() {
    window.print();
}
function back() {
    window.location = '../student-record-data-storage-model/index.html';
}
</script>
	<script src="../student-record-data-storage-model/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
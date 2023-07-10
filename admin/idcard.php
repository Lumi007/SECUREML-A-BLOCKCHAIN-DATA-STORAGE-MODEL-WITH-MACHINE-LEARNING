<?php
$allow = "no";
ob_start();
session_start();
require_once('db.php');
include('mail.php');
?>

<!DOCTYPE html>
<html lang="en">

<?php include_once('head.php'); ?>

<?php
if(isset($_GET['idcard']) && $_GET['idcard'] != ""){
	$sql = "SELECT * FROM student WHERE id='".$_GET['idcard']."' AND status = 'Approved';";
    $query=mysqli_query($conn,$sql);
    $rowquery=mysqli_fetch_array($query);
     $numrow=mysqli_num_rows($query);
      if($numrow < 1){
		  if($rowquery['name'] == ""){
			echo'<script> alert("This student is not qualified to obtain an ID Card..!"); </script>';  
		  }
		  else{
			echo'<script> alert("'.$rowquery['name'].' is not qualified to obtain an ID Card..!"); </script>';  
		  }
		  echo'<script> window.location="view_users2.php"; </script>';  
	  }
}
?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">View All Information</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
           View All Students Record Data Storage Model</div>
        <div class="card-body">
          <div class="table-responsive">
          <!-- ID Card Start -->
		  <div class="text-center" style="width:100%;text-align:left;">
		  
		  <div style="width:418px;height:258px;border-radius:10px;border:1px solid #212421;border-radius:10px;"><img src="id card/id-tem.jpg" style="width:418px;height:256px;border-radius:10px;border:1px solid #212421;border-radius:10px;float:left;z-index:-1;"></div><br/>
		  <?php
			  if(isset($_GET['idcard']) && $_GET['idcard'] != ""){
				$sql = "SELECT * FROM student WHERE id='".$_GET['idcard']."' AND status = 'Approved';";
				$query=mysqli_query($conn,$sql);
				if($rowquery=mysqli_fetch_array($query)){
				echo"<img src='../../student-record-data-storage-model/images/".$rowquery['nd']."' style='width:94px;height:94px;border:2px solid #212421;margin-top:-194px;margin-left:55px;float:left;z-index:9999;'>
				<br/>";
				echo"<div style='width:250px;height:94px;margin-top:-225px;margin-left:160px;text-align:left;font-size:13px;float:left;'>
				<table>";
					echo'<tr><td style="font-weight:bold;vertical-align:top;">Name:</td><td style="vertical-align:top;">'.$rowquery['name'].'</td></tr>';
					echo'<tr><td style="font-weight:bold;vertical-align:top;">Reg No:</td><td style="vertical-align:top;">'.$rowquery['regno'].'</td></tr>';
					echo'<tr><td style="font-weight:bold;vertical-align:top;">Gender:</td><td style="vertical-align:top;">'.substr(strtoupper($rowquery['sex']),0,1).'</td></tr>';
					echo'<tr><td style="font-weight:bold;vertical-align:top;">Level:</td><td style="vertical-align:top;">'.$rowquery['level'].'</td></tr>';
					echo'<tr><td style="font-weight:bold;vertical-align:top;width:55px;">Dept:</td><td style="vertical-align:top;">'.$rowquery['department'].'</td></tr>';
				}
			  }
		  echo"</table>
		  </div>";
		  ?>
		  
		  <div style="width:418px;height:258px;border-radius:10px;border:1px solid #212421;border-radius:10px;"><img src="id card/id-tem-back.jpg" style="width:418px;height:256px;border-radius:10px;border:1px solid #212421;border-radius:10px;float:left;z-index:-1;"></div><br/>
		  <div style="width:250px;height:94px;margin-top:-85px;margin-left:280px;text-align:left;font-size:13px;float:left;font-family:'Times New Roman', Times, serif;color:#626a62;">
		  <table>
				<tr><td style="font-weight:bold;vertical-align:top;">JD:</td><td style="vertical-align:top;"><p style="margin:0px;" contenteditable="true">Enter Issue Date</p></td></tr>
				<tr><td style="font-weight:bold;vertical-align:top;">ED:</td><td style="vertical-align:top;"><p style="margin:0px;" contenteditable="true">Enter Expiry Date</p></td></tr>
		  </table>
		  </div>
		  
		  </div>
		  <!-- ID Card Start End-->
          </div>
        </div>
        <div class="card-footer small text-muted">Student ID Card Generating System</div>
      </div>
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
	<script src="bootstrap/js/jquery.min.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
  </div>
</body>

</html>

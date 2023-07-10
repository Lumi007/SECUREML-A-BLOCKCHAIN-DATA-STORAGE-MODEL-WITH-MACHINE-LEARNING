<?php
$allow = "no";
ob_start();
session_start();
require_once('db.php');
include('mail.php');
?>

<!DOCTYPE html>
<html lang="en">

<?php include_once('shead.php'); ?>

<?php 
//if the upload button is pressed
if(isset($_POST['submitform'])){
$regno= mysqli_real_escape_string($conn,$_POST['regno']);
$complaint= mysqli_real_escape_string($conn,$_POST['cadvise']);

$rsql345 = "Select * from student WHERE regno='".$regno."' LIMIT 1";
$rresult345=mysqli_query($conn, $rsql345);
$rroadsa=mysqli_fetch_array($rresult345);

$course= $rroadsa['department'];
$level= $rroadsa['level'];
$contact= $rroadsa['email'];


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


<?php
if(isset($_GET['deleteid']) && isset($_SESSION['regno'])){
$id= $_GET['deleteid'];

$asqal345b = "Select * from complaint WHERE id='".$id."' AND regno='".$_SESSION['regno']."'";
$aresualt345b=mysqli_query($conn, $asqal345b);
$arowsub=mysqli_num_rows($aresualt345b);
	
if($arowsub > 0){
	$delsql="DELETE FROM complaint WHERE id='".$id."'";
	if(mysqli_query($conn,$delsql)){
		echo"<script> alert('Your Complaint was Deleted Successfully..!'); </script>";
	}
	else{
		echo"<script> alert('Your Complaint has already been deleted..!'); </script>";
	}
}
else{
	echo"<script> alert('Your Complaint was not Deleted..!'); </script>";
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
        <li class="breadcrumb-item active">View All Complaint</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
           View All Advisory for <?php echo $_SESSION['regno'];?></div>
        <div class="card-body">
          <div class="table-responsive">
          <form method="POST" action="">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

              <thead>
                <tr>
				  <th>S/N</th>
                  <th>Name/Regno</th>
                  <th>Course</th>
                  <th>Contact</th>
                  <th>Complaint</th>
                  <th>Advise</th>
                  <th>Date</th>
				  <th>Date.Seen</th>
                  <th colspan='2' style='text-align:center;'>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>S/N</th>
                  <th>Name/Regno</th>
                  <th>Course</th>
                  <th>Contact</th>
                  <th>Complaint</th>
                  <th>Advise</th>
                  <th>Date</th>
                  <th>Date.Seen</th>
                  <th colspan='2' style='text-align:center;'>Action</th>
                </tr>
              </tfoot>
               <tbody>
				 <?php
					$sn=1;
					$sql = "SELECT * FROM complaint WHERE regno='".$_SESSION['regno']."' ORDER BY status ASC";
					$query=mysqli_query($conn,$sql);
					while($fetchrow=mysqli_fetch_array($query)){
					$stat=''; if($fetchrow['status'] != "" && $fetchrow['advise'] != ""){
						$stat="style='color:#137119;text-decoration:none;'";
					}
					echo"<tr ".$stat.">";
					echo "<td>".$sn."</td>";
					echo "<td>".$fetchrow['regno']."</td>";
					echo "<td>".$fetchrow['course']."</td>";
					echo "<td>".$fetchrow['contact']."</td>";
					echo "<td>".substr($fetchrow['complaint'],0,30)."...</td>";
					echo "<td>".substr($fetchrow['advise'],0,30)."...</td>";
					echo "<td>".$fetchrow['datereg']."</td>";
					echo "<td>".$fetchrow['datetreaded']."</td>";
					echo"<td style='cursor:pointer;width:50px;'><a href='?asjgajjhasjas&ahsjhasghhgas&deleteid=".$fetchrow['id']."&asjgajjhasjas&ahsjhasghhgas&ahsas7ya777as' ".$stat."><i class='fa fa-trash'></i> Del</a></td>";
					echo"<td style='cursor:pointer;width:60px;'><a href='sadvise.php?asjgajjhasjas&ahsjhasghhgas&complaintid=".$fetchrow['id']."&asjgajjhasjas&ahsjhasghhgas&ahsas7ya777as' ".$stat."><i class='fa fa-eye'></i> View</a></td>";
					echo"</tr>";
					
					$sn++;
					}
				?>
              </tbody>
            </table>
            </form>
          </div>
        </div>
        <div class="card-footer small text-muted">Students Record Data Storage Model</div>
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

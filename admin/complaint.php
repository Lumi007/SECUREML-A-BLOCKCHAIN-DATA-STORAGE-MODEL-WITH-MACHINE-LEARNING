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
if(isset($_POST['adviseform']) && isset($_POST['complaintid'])){
$advise= mysqli_real_escape_string($conn, $_POST['advise']);
$id= $_POST['complaintid'];
$dtr= date("Y-m-d");

$sqal345b = "Select * from complaint WHERE id='".$id."'";
$resualt345b=mysqli_query($conn, $sqal345b);
$rowsub=mysqli_num_rows($resualt345b);
$rowsub=mysqli_fetch_array($resualt345b);
	
if($rowsub > 0 && $rowsub['advise'] == $advise){
	echo"<script> alert('Complaint has already been treated..!');</script>";
}
else{
if (mysqli_query($conn, "UPDATE complaint SET status='open',advise='".$advise."',datetreaded='".$dtr."' WHERE id='".$id."'") === TRUE){
	echo"<script> alert('Complaint was treated successfully..!');</script>";
}
else{
	echo"<script> alert('Complaint was not treated..!');</script>";
}
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
           View All Students Record Data Storage Model</div>
        <div class="card-body">
          <div class="table-responsive">
          <form method="POST" action="">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

              <thead>
                <tr>
				  <th>S/N</th>
                  <th>Name/Regno</th>
                  <th>Course</th>
                  <th>Level</th>
                  <th>Contact</th>
                  <th>Complaint</th>
                  <th>Advise</th>
                  <th>Date</th>
				  <th>Date.Seen</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>S/N</th>
                  <th>Name/Regno</th>
                  <th>Course</th>
                  <th>Level</th>
                  <th>Contact</th>
                  <th>Complaint</th>
                  <th>Advise</th>
                  <th>Date</th>
                  <th>Date.Seen</th>
                  <th>Action</th>
                </tr>
              </tfoot>
               <tbody>
				 <?php
					$sn=1;
					$sql = "SELECT * FROM complaint ORDER BY status ASC";
					$query=mysqli_query($conn,$sql);
					while($fetchrow=mysqli_fetch_array($query)){
					$stat=''; if($fetchrow['status'] != "" && $fetchrow['advise'] != ""){
						$stat="style='color:#137119;text-decoration:none;'";
					}
					echo"<tr ".$stat.">";
					echo "<td>".$sn."</td>";
					echo "<td>".$fetchrow['regno']."</td>";
					echo "<td>".$fetchrow['course']."</td>";
					echo "<td>".$fetchrow['level']."</td>";
					echo "<td>".$fetchrow['contact']."</td>";
					echo "<td>".substr($fetchrow['complaint'],0,30)."...</td>";
					echo "<td>".substr($fetchrow['advise'],0,30)."...</td>";
					echo "<td>".$fetchrow['datereg']."</td>";
					echo "<td>".$fetchrow['datetreaded']."</td>";
					if($fetchrow['status'] != ""){
					echo"<td style='cursor:pointer;' id='treat".$fetchrow['id']."'><a href='advise.php?asjgajjhasjas&ahsjhasghhgas&complaintid=".$fetchrow['id']."&asjgajjhasjas&ahsjhasghhgas&ahsas7ya777as'  ".$stat."><span id='ttreat".$fetchrow['id']."'><i class='fa fa-eye'></i> Seen</span></a></td>";
					}
					else{ echo"<td style='cursor:pointer;'><a href='advise.php?asjgajjhasjas&ahsjhasghhgas&complaintid=".$fetchrow['id']."&asjgajjhasjas&ahsjhasghhgas&ahsas7ya777as' ".$stat."><i class='fa fa-eye'></i> Treat</a></td>"; }
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

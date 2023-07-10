<?php
ob_start();
session_start();
require_once('db.php');
?>

<!DOCTYPE html>
<html lang="en">
<?php
include_once('head.php');
$x = "";
$sql = "SELECT * FROM `users`;";
    $query=mysqli_query($conn,$sql);
     $numrow=mysqli_num_rows($query);
      if($numrow>0){
      $result=mysqli_fetch_array($query,MYSQLI_ASSOC);
      $id=$result['id'];
      $username=$result['username'];
      $name=$result['name'];
      $password=$result['password'];
       while ($result=mysqli_fetch_array($query)) {
               $id=$id."||".$result['id'];
               $username=$username."||".$result['username'];
               $name=$name."||".$result['name'];
               $password=$password."||".$result['password'];
             }
                      $id2=explode("||", $id);
                      $username2=explode("||", $username);
                      $name2=explode("||", $name);
                      $password2=explode("||", $password);
                      $x=count($id2);
                    }

if(isset($_POST['schoolfees'])){
$rnd1f=$_POST['rnd1f'];
$rnd1s=$_POST['rnd1s'];
$rnd2f=$_POST['rnd2f'];
$rnd2s=$_POST['rnd2s'];
$rhnd1f=$_POST['rhnd1f'];
$rhnd1s=$_POST['rhnd1s'];
$rhnd2f=$_POST['rhnd2f'];
$rhnd2s=$_POST['rhnd2s'];
$pnd1f=$_POST['pnd1f'];
$pnd1s=$_POST['pnd1s'];
$pnd2f=$_POST['pnd2f'];
$pnd2s=$_POST['pnd2s'];
$phnd1f=$_POST['phnd1f'];
$phnd1s=$_POST['phnd1s'];
$phnd2f=$_POST['phnd2f'];
$phnd2s=$_POST['phnd2s'];

$sql = "UPDATE schoolfees SET rnd1f='$rnd1f',rnd1s='$rnd1s',rnd2f='$rnd2f',rnd2s='$rnd2s',rhnd1f='$rhnd1f',rhnd1s='$rhnd1s',rhnd2f='$rhnd2f',rhnd2s='$rhnd2s',pnd1f='$pnd1f',pnd1s='$pnd1s',pnd2f='$pnd2f',pnd2s='$pnd2s',phnd1f='$phnd1f',phnd1s='$phnd1s',phnd2f='$phnd2f',phnd2s='$phnd2s' WHERE id = '1'";
if(mysqli_query($conn,$sql)){
echo"<script> alert('School Fees Updated Successfully...!'); </script>";	
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
        <li class="breadcrumb-item active">School Fees</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
           School Fees</div>
        <div class="card-body">
          <div class="table-responsive">
          <form method="POST" action="" class="form-horizontal" role="form">
		  <?php
		  $videosqlroll121 = "Select * from schoolfees where id = 1";
				$videoresultroll121=mysqli_query($conn, $videosqlroll121);
				while($videorollphoto=mysqli_fetch_array($videoresultroll121)){
				echo'
				<div class="form-group">
				<label class="control-label col-sm-5" for="email">Regular 100 Level (First and Second Semester) &#8358;:</label>
				<div class="col-sm-12">
				<input type="text" required="required" name="rnd1f" id="email" placeholder="1st Semester Fees" style="width:25%;border:1px solid #d3d3d3;" value="'.$videorollphoto['rnd1f'].'"> <input type="text" required="required" id="email" placeholder="2nd Semester Fees" name="rnd1s" style="width:25%;border:1px solid #d3d3d3;" value="'.$videorollphoto['rnd1s'].'">
				</div>
				</div>
				
				<div class="form-group">
				<label class="control-label col-sm-5" for="email">Regular 200 Level (First and Second Semester) &#8358;:</label>
				<div class="col-sm-12">
				<input type="text" required="required" id="email" name="rnd2f" placeholder="1st Semester Fees" style="width:25%;border:1px solid #d3d3d3;" value="'.$videorollphoto['rnd2s'].'"> <input type="text" required="required" id="email" placeholder="2nd Semester Fees" name="rnd2s" style="width:25%;border:1px solid #d3d3d3;" value="'.$videorollphoto['rnd2s'].'">
				</div>
				</div>
				
				<div class="form-group">
				<label class="control-label col-sm-5" for="email">Regular 300 Level (First and Second Semester) &#8358;:</label>
				<div class="col-sm-12">
				<input type="text" required="required" id="email" name="rhnd1f" placeholder="1st Semester Fees" style="width:25%;border:1px solid #d3d3d3;" value="'.$videorollphoto['rhnd1f'].'"> <input type="text" required="required" id="email" name="rhnd1s" placeholder="2nd Semester Fees" style="width:25%;border:1px solid #d3d3d3;" value="'.$videorollphoto['rhnd1s'].'">
				</div>
				</div>
				
				<div class="form-group">
				<label class="control-label col-sm-5" for="email">Regular 400 Level (First and Second Semester) &#8358;:</label>
				<div class="col-sm-12">
				<input type="text" required="required" id="email" name="rhnd2f" placeholder="1st Semester Fees" style="width:25%;border:1px solid #d3d3d3;" value="'.$videorollphoto['rhnd2f'].'"> <input type="text" required="required" id="email" placeholder="2nd Semester Fees" name="rhnd2s" style="width:25%;border:1px solid #d3d3d3;" value="'.$videorollphoto['rhnd2s'].'">
				</div>
				</div>
				
				
				<hr/>
				
				
					<div class="form-group">
				<label class="control-label col-sm-5" for="email">Partime National Diploma I (First and Second Semester) &#8358;:</label>
				<div class="col-sm-12">
				<input type="text" required="required" name="pnd1f" id="email" placeholder="1st Semester Fees" style="width:25%;border:1px solid #d3d3d3;" value="'.$videorollphoto['pnd1f'].'"> <input type="text" required="required" id="email" placeholder="2nd Semester Fees" name="pnd1s" style="width:25%;border:1px solid #d3d3d3;" value="'.$videorollphoto['pnd1s'].'">
				</div>
				</div>
				
				<div class="form-group">
				<label class="control-label col-sm-5" for="email">Partime National Diploma II (First and Second Semester) &#8358;:</label>
				<div class="col-sm-12">
				<input type="text" required="required" id="email" name="pnd2f" placeholder="1st Semester Fees" style="width:25%;border:1px solid #d3d3d3;" value="'.$videorollphoto['pnd2f'].'"> <input type="text" required="required" id="email" placeholder="2nd Semester Fees" name="pnd2s" style="width:25%;border:1px solid #d3d3d3;" value="'.$videorollphoto['pnd2s'].'">
				</div>
				</div>
				
				<div class="form-group">
				<label class="control-label col-sm-5" for="email">Partime 300 Level (First and Second Semester) &#8358;:</label>
				<div class="col-sm-12">
				<input type="text" required="required" id="email" name="phnd1f" placeholder="1st Semester Fees" style="width:25%;border:1px solid #d3d3d3;" value="'.$videorollphoto['phnd1f'].'"> <input type="text" required="required" id="email" name="phnd1s" placeholder="2nd Semester Fees" style="width:25%;border:1px solid #d3d3d3;" value="'.$videorollphoto['phnd1s'].'">
				</div>
				</div>
				
				<div class="form-group">
				<label class="control-label col-sm-5" for="email">Partime 400 Level (First and Second Semester) &#8358;:</label>
				<div class="col-sm-12">
				<input type="text" required="required" id="email" name="phnd2f" placeholder="1st Semester Fees" style="width:25%;border:1px solid #d3d3d3;" value="'.$videorollphoto['phnd2f'].'"> <input type="text" required="required" id="email" placeholder="2nd Semester Fees" name="phnd2s" style="width:25%;border:1px solid #d3d3d3;" value="'.$videorollphoto['phnd2s'].'">
				</div>
				</div>
				';
				}
			?>
			
			<div class="form-group" style="text-align:center;"><button id="email" type="submit" name="schoolfees" class="btn btn-primary">Update School Fees</button></div>
            </form>
          </div>
        </div>
        <div class="card-footer small text-muted">CVS [All Users]</div>
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

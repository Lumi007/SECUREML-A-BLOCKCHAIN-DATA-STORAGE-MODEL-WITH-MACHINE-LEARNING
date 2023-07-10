<?php
$allow = "no";
ob_start();
session_start();
require_once('db.php');

include('mail.php');
if(isset($_POST['checkbox'])){
    
    foreach($_POST['checkbox'] as $user_id){
      $regno = date("y")."DE/000".$user_id."/CS";

        $sql = "SELECT * FROM `student` WHERE `id` = '$user_id';";
    $query=mysqli_query($conn,$sql);
     $numrow=mysqli_num_rows($query);
      if($numrow>0){
      $result=mysqli_fetch_array($query,MYSQLI_ASSOC);
      $email=$result['email'];
       $name=$result['name'];
       $department=$result['department'];

         
   $bd = urlencode('Congratulations '.$name.', your registration in the '.$department.' department is completed. Your Registration Number is '.$regno);
   
        $bulk_option = "delete";
        
        if($bulk_option == 'delete'){
          $bulk_del_query = "UPDATE `student` SET `status` = 'Approved', `regno` = '$regno' WHERE `id` = '$user_id';";
            mysqli_query($conn, $bulk_del_query);
             
               
       echo "<script>alert('Approval Successful!');</script>";
    echo "<script>window.location='index.php';</script>";
        }
                
    }
    
}
}

?>

<!DOCTYPE html>
<html lang="en">

<?php
include_once('head.php');

$x = "";
$sql = "SELECT * FROM `student` WHERE  `status` = 'Pending';";
    $query=mysqli_query($conn,$sql);
     $numrow=mysqli_num_rows($query);
      if($numrow>0){
      $result=mysqli_fetch_array($query,MYSQLI_ASSOC);
      $id=$result['id'];
      $name=$result['name'];
      $email=$result['email'];
      $sex=$result['sex'];
      $dob=$result['dob'];
      $department=$result['department'];
      $level=$result['level'];
      $session=$result['session'];
       while ($result=mysqli_fetch_array($query)) {
               $id=$id."||".$result['id'];
               $name=$name."||".$result['name'];
               $email=$email."||".$result['email'];
               $sex=$sex."||".$result['sex'];
               $dob=$dob."||".$result['dob'];
               $department=$department."||".$result['department'];
               $level=$level."||".$result['level'];
               $session=$session."||".$result['session'];
             }
                      $id2=explode("||", $id);
                      $name2=explode("||", $name);
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
      <div class="card mb-3">
        <div class="card-header">
           View All Students</div>
        <div class="card-body">
          <div class="table-responsive">
          <form method="POST" action="">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

              <thead>
                <tr>
                  <th style="width: 60px"><button type="submit" class="btn btn-primary btn-block" name="del" >Approve (*)</button></th>
                   <th>Name</th>
                  <th>Email</th>
                  <th>Sex</th>
                  <th>DOB</th>
                  <th>Department</th>
                  <th>Level</th>
                  <th>Session</th>
                  <th>View</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                <th><button type="submit" class="btn btn-primary btn-block" name="del" >Approve (*)</button></th>
                   <th>Name</th>
                  <th>Email</th>
                  <th>Sex</th>
                  <th>DOB</th>
                  <th>Department</th>
                  <th>Level</th>
                  <th>Session</th>
                  <th>View</th>
                </tr>
              </tfoot>
               <tbody>
               <?php
               if($allow === "yes"){
              for ($i=0; $i < $px; $i++) {          
            ?>
             
                <tr>
                <td><input type="checkbox" name="checkbox[]" value="<?php echo $id2[$i]; ?>"></td>
                  <td><?php echo $name2[$i]; ?></td>
                  <td><?php echo $email2[$i]; ?></td>
                  <td><?php echo $sex2[$i]; ?></td>
                  <td><?php echo $dob2[$i]; ?></td>
                  <td><?php echo $department2[$i]; ?></td>
                 <td><?php echo $level2[$i]; ?></td>
                 <td><?php echo $session2[$i]; ?></td>
                  <td><a target="_blank" href="<?php echo 'view.php?id='.$id2[$i] ?>" ><i class="fa fa-eye"></i></a></td>
                </tr>
                  <?php
                  }}
                  ?>
              </tbody>
            </table>
            </form>
          </div>
        </div>
        <div class="card-footer small text-muted">Student Students Record Data Storage Model</div>
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

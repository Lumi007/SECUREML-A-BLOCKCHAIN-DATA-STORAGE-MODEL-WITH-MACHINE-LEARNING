<?php
$allow = "no";
ob_start();
session_start();
require_once('db.php');



if(isset($_POST['checkbox'])){
    
    foreach($_POST['checkbox'] as $user_id){
        $sql = "SELECT * FROM `product` WHERE `id` = '$user_id';";
    $query=mysqli_query($conn,$sql);
     $numrow=mysqli_num_rows($query);
      if($numrow>0){
      $result=mysqli_fetch_array($query,MYSQLI_ASSOC);
      $img=$result['img'];
       $img2=explode("##", $img);
                  $a = count($img2);
        for ($i=0; $i < $a; $i++) { 

      array_map('unlink', (glob("../images/".$img2[$i])? glob("../images/".$img2[$i]): array()));
    }
    }
        $bulk_option = "delete";
        
        if($bulk_option == 'delete'){
            $bulk_del_query = "DELETE FROM `product` WHERE `id` = '$user_id';";
            mysqli_query($conn, $bulk_del_query);
             
                header('Location: view_products.php');
        }
                
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">

<?php
include_once('head.php');

$id = $_GET['id'];
$sql = "SELECT * FROM `student` WHERE  `status` = 'Pending' AND `id` = '$id';";
    $query=mysqli_query($conn,$sql);
     $numrow=mysqli_num_rows($query);
      if($numrow>0){
      $result=mysqli_fetch_array($query,MYSQLI_ASSOC);
      $id=$result['id'];
      $passport=$result['passport'];
      $waec=$result['waec'];
      $nd=$result['nd'];
      $birth=$result['birth'];
      $attestation=$result['attestation'];
      $fees=$result['fees'];
     
     
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
                   <th>O'Level Certificate</th>
                  <th>School Fees Reciept</th>
                  <th>Student's Passport</th>
                  <th>Birth Certificate</th>
                  <th>First School Leaving Certificate</th>
                  <th>Junior Secondary Certificate Examination (JSCE)</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
				  <th>O'Level Certificate</th>
                  <th>School Fees Reciept</th>
                  <th>Student's Passport</th>
                  <th>Birth Certificate</th>
                  <th>First School Leaving Certificate</th>
                  <th>Junior Secondary Certificate Examination (JSCE)</th>
                </tr>
              </tfoot>
               <tbody>
               <?php      
            ?>
             
                <tr>
               
                  <td><a target="_blank" href="../images/<?php echo $passport; ?>" ><img height="200px" src="../images/<?php echo $passport;?>"></a></td>
                  <td><a target="_blank" href="../images/<?php echo $waec; ?>" ><img height="200px" src="../images/<?php echo $waec;?>"></a></td>
                  <td><a target="_blank" href="../images/<?php echo $nd; ?>" ><img height="200px" src="../images/<?php echo $nd;?>"></a></td>
                  <td><a target="_blank" href="../images/<?php echo $birth; ?>" ><img height="200px" src="../images/<?php echo $birth;?>"></a></td>
                  <td><a target="_blank" href="../images/<?php echo $attestation; ?>" ><img height="200px" src="../images/<?php echo $attestation;?>"></a></td>
                  <td><a target="_blank" href="../images/<?php echo $fees; ?>" ><img height="200px" src="../images/<?php echo $fees;?>"></a></td>

                </tr>
                  <?php
                  
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

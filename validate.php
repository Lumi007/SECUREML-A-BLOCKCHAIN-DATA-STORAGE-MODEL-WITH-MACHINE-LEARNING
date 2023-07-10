<?php
session_start();
include("../student-record-data-storage-model/connect.php");


if (isset($_POST['login'])) {
  $email = $_POST['username'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM users WHERE username = '$email' AND password = '$password';";
    $query=mysqli_query($conn,$sql);
     $numrow=mysqli_num_rows($query);
	 
	$assql = "SELECT * FROM student WHERE regno = '$email' AND petname = '$password';";
    $asquery=mysqli_query($conn,$assql);
     $asnumrow=mysqli_num_rows($asquery);
	 
     if ($numrow > 0) {
       $result=mysqli_fetch_array($query,MYSQLI_ASSOC);
      $id=$result['id'];
      $name=$result['name'];
      $_SESSION['user'] = $name;
       echo "<script>alert('Login Successful!');</script>";
	   echo "<script>window.location='admin/';</script>";
	 }
	 else if ($asnumrow > 0) {
	  $asresult=mysqli_fetch_array($asquery,MYSQLI_ASSOC);
      $id=$asresult['id'];
      $regno=$asresult['regno'];
      $_SESSION['regno'] = $regno;
       echo "<script>alert('Login Successful!');</script>";
	   echo "<script>window.location='admin/scomplain.php';</script>";
	 }
	 else{
      echo "<script>alert('Sorry, Username and password is Incorrect!');</script>";
	  echo "<script>window.location='../student-record-data-storage-model/login.html';</script>";
     }
}
?>
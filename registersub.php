<?php
session_start();
include("../student-record-data-storage-model/connect.php");

if (isset($_POST['payfees'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $department = $_POST['department'];
    $sex = $_POST['sex'];
    $level = $_POST['level'];
    $feepaid = $_POST['feepaid'];
    $session = $_POST['session'];
       
  $sql = "INSERT INTO feepaid (name, email, sex, dob, department, level, feepaid, session,address) VALUES ('$name', '$email','$sex', '$dob', '$department', '$level', '$feepaid', '$session', '$address')";
if(mysqli_query($conn,$sql)){
            $message = "Kindly pay your fees via BTC\\n \\nWallet ID: 16cAtbXaKMcwhUAFn7FRyjx4ZbE8gsfJRA";
    }else{
        $error = "Payment not Successful, try again later!";
    }
if (isset($message)) {

  $sql = "SELECT * FROM feepaid WHERE email = '$email' AND name = '$name';";
    $query=mysqli_query($conn,$sql);
     $numrow=mysqli_num_rows($query);
      if($numrow>0){
      $result=mysqli_fetch_array($query,MYSQLI_ASSOC);
      $_SESSION['uid']=$result['id'];
     
  }
    echo "<script>alert('".$message."');</script>";
    echo "<script>window.location='receipt.php?812811221=12212121212&jhghgegfhhhy&id=".$_SESSION['uid']."&21812777813813';</script>";
}elseif (isset($error)) {
    echo "<script>alert('".$error."');</script>";
}
   


}




if (isset($_POST['register1'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $petname = $_POST['petname'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $department = $_POST['department'];
    $sex = $_POST['sex'];
    $level = $_POST['level'];
    $session = $_POST['session'];

$sql = "INSERT INTO student (name, email, sex, dob, department, level, session, address, petname) VALUES ('$name', '$email','$sex', '$dob', '$department', '$level', '$session', '$address', '$petname')";
if(mysqli_query($conn,$sql)){
            $message = "Bio Data Uploaded Successfully, Proceed to Upload Your Credentials!";
    }else{
        $error = "Bio Data was not Uploaded Successfully, try again later!";
    }
if (isset($message)) {

  $sql = "SELECT * FROM student WHERE email = '$email' AND name = '$name';";
    $query=mysqli_query($conn,$sql);
     $numrow=mysqli_num_rows($query);
      if($numrow>0){
      $result=mysqli_fetch_array($query,MYSQLI_ASSOC);
      $_SESSION['uid']=$result['id'];
     
  }
    echo "<script>alert('".$message."');</script>";
    echo "<script>window.location='register2.html';</script>";
}elseif (isset($error)) {
    echo "<script>alert('".$error."');</script>";
}
   


}







if (isset($_POST['register2'])) {
$passport = '';
$waec = '';
$nd = '';
$birth = '';
$attestation = '';
$fees = '';


// Count # of uploaded files in array
$total = count($_FILES['passport']['name']);

// Loop through each file
for( $i=0 ; $i < $total ; $i++ ) {
$name = $_FILES['passport']['name'][$i];
$ext = end((explode('.', $name)));
$ext1= ".".$ext;
  //Get the temp file path
  $tmpFilePath = $_FILES['passport']['tmp_name'][$i];

  //Make sure we have a file path
  if ($tmpFilePath != ""){
    //Setup our new file path
    $newFilePath = "images/" . $newname = date('YmdHis',time()).mt_rand().$ext1;

    //Upload the file into the temp dir
    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
       $passport = $newname;
    
    }
  }
}



   // Count # of uploaded files in array
$total = count($_FILES['waec']['name']);

// Loop through each file
for( $i=0 ; $i < $total ; $i++ ) {
$name = $_FILES['waec']['name'][$i];
$ext = end((explode('.', $name)));
$ext1= ".".$ext;
  //Get the temp file path
  $tmpFilePath = $_FILES['waec']['tmp_name'][$i];

  //Make sure we have a file path
  if ($tmpFilePath != ""){
    //Setup our new file path
    $newFilePath = "images/" . $newname = date('YmdHis',time()).mt_rand().$ext1;

    //Upload the file into the temp dir
    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
       $waec = $newname;
    
    }
  }
}



   // Count # of uploaded files in array
$total = count($_FILES['nd']['name']);

// Loop through each file
for( $i=0 ; $i < $total ; $i++ ) {
$name = $_FILES['nd']['name'][$i];
$ext = end((explode('.', $name)));
$ext1= ".".$ext;
  //Get the temp file path
  $tmpFilePath = $_FILES['nd']['tmp_name'][$i];

  //Make sure we have a file path
  if ($tmpFilePath != ""){
    //Setup our new file path
    $newFilePath = "images/" . $newname = date('YmdHis',time()).mt_rand().$ext1;

    //Upload the file into the temp dir
    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
       $nd = $newname;
    
    }
  }
}




   // Count # of uploaded files in array
$total = count($_FILES['birth']['name']);

// Loop through each file
for( $i=0 ; $i < $total ; $i++ ) {
$name = $_FILES['birth']['name'][$i];
$ext = end((explode('.', $name)));
$ext1= ".".$ext;
  //Get the temp file path
  $tmpFilePath = $_FILES['birth']['tmp_name'][$i];

  //Make sure we have a file path
  if ($tmpFilePath != ""){
    //Setup our new file path
    $newFilePath = "images/" . $newname = date('YmdHis',time()).mt_rand().$ext1;

    //Upload the file into the temp dir
    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
       $birth = $newname;
    
    }
  }
}



   // Count # of uploaded files in array
$total = count($_FILES['attestation']['name']);

// Loop through each file
for( $i=0 ; $i < $total ; $i++ ) {
$name = $_FILES['attestation']['name'][$i];
$ext = end((explode('.', $name)));
$ext1= ".".$ext;
  //Get the temp file path
  $tmpFilePath = $_FILES['attestation']['tmp_name'][$i];

  //Make sure we have a file path
  if ($tmpFilePath != ""){
    //Setup our new file path
    $newFilePath = "images/" . $newname = date('YmdHis',time()).mt_rand().$ext1;

    //Upload the file into the temp dir
    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
       $attestation = $newname;
    
    }
  }
}



   // Count # of uploaded files in array
$total = count($_FILES['fees']['name']);

// Loop through each file
for( $i=0 ; $i < $total ; $i++ ) {
$name = $_FILES['fees']['name'][$i];
$ext = end((explode('.', $name)));
$ext1= ".".$ext;
  //Get the temp file path
  $tmpFilePath = $_FILES['fees']['tmp_name'][$i];

  //Make sure we have a file path
  if ($tmpFilePath != ""){
    //Setup our new file path
    $newFilePath = "images/" . $newname = date('YmdHis',time()).mt_rand().$ext1;

    //Upload the file into the temp dir
    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
       $fees = $newname;
    
    }
  }
}
$date = date('U');
 $uid = $_SESSION['uid'];
 $sql = "UPDATE student SET status = 'Pending', waec = '$waec', nd = '$nd', passport = '$passport', birth = '$birth', attestation = '$attestation', fees = '$fees', date = '$date' WHERE id = '$uid'";
if(mysqli_query($conn,$sql)){
            $message = "Credentials Uploaded Successfully, a confirmation email will be sent to you shortly!";
    }else{
        $error = "Credentials were not Uploaded Successfully, try again later!";
    }
if (isset($message)) {

    echo "<script>alert('".$message."');</script>";
    echo "<script>window.location='index.html';</script>";

}elseif (isset($error)) {
	    echo "<script>alert('".$error."');</script>";
}


}



?>

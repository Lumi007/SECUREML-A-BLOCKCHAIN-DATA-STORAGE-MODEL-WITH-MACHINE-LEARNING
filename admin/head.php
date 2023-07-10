<?php
    if (!isset($_SESSION['user'])) {
     header('Location: ../login.html');
}
$mess1 = "";
$mess2 = "";
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Students Record Data Storage Model</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">Students Record Data Storage Model Portal Admin</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
       <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Students' Complaint">
          <a class="nav-link" href="complaint.php">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">View Complaint</span>
          </a>
        </li>
	   <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="schoolfeespanel.php">
            <i class="fa fa-fw fa-credit-card"></i>
            <span class="nav-link-text">Fees Payment</span>
          </a>
        </li>
		
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="View Users">
          <a class="nav-link" href="view_users.php">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">View Users</span>
          </a>
        </li>
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="View Users">
          <a class="nav-link" href="view_users2.php">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">View Approved Students</span>
          </a>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="View Users">
          <a class="nav-link" href="../resultindex.php">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Upload Student's Results</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        
       
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <title>Purchase</title>
   <style>
      form {
         margin: 20px 0;
      }

      form input,
      button {
         padding: 5px;
      }

      table {
         width: 100%;
         margin-bottom: 20px;
         border-collapse: collapse;
      }

      table,
      th,
      td {
         border: 1px solid #cdcdcd;
      }

      table th,
      table td {
         padding: 10px;
         text-align: left;
      }



      #loader {
         position: fixed;
         display: flex;
         justify-content: center;
         align-items: center;
         width: 100%;
         height: 100%;
         top: 0;
         left: 0;
         opacity: 0.7;
         background-color: white;
         z-index: 99;
      }

      #loader-image {
         z-index: 100;
         width: 250px;
         height: 250px;
      }

      @-webkit-keyframes spin {
         0% {
            -webkit-transform: rotate(0deg);
         }

         100% {
            -webkit-transform: rotate(360deg);
         }
      }

      @keyframes spin {
         0% {
            transform: rotate(0deg);
         }

         100% {
            transform: rotate(360deg);
         }
      }


      .animate-bottom {
         position: relative;
         -webkit-animation-name: animatebottom;
         -webkit-animation-duration: 1s;
         animation-name: animatebottom;
         animation-duration: 1s
      }

      @-webkit-keyframes animatebottom {
         from {
            bottom: -100px;
            opacity: 0
         }

         to {
            bottom: 0px;
            opacity: 1
         }
      }

      @keyframes animatebottom {
         from {
            bottom: -100px;
            opacity: 0
         }

         to {
            bottom: 0;
            opacity: 1
         }
      }

      #myDiv {
         display: none;

      }

      .tooltip {
         position: relative;
         display: inline-block;

         border-bottom: 1px black;


      }


      /* arrow */


      .arrow-1 {
         margin-top: 8px;

         width: 80px;
         height: 30px;
         display: flex;
      }

      .arrow-1:before {
         content: "";
         background: currentColor;
         width: 15px;
         clip-path: polygon(0 10px, calc(100% - 15px) 10px, calc(100% - 15px) 0, 100% 50%, calc(100% - 15px) 100%, calc(100% - 15px) calc(100% - 10px), 0 calc(100% - 10px));
         animation: a1 1.5s infinite linear;
      }

      @keyframes a1 {

         90%,
         100% {
            flex-grow: 1
         }
      }
   </style>
   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->

   <script src="js/jquery-3.5.1.min.js"></script>


</head>

<body>

</body>

</html>











<?php
ini_set('session.gc_maxlifetime', 1000);
error_reporting(~E_NOTICE);
session_start();

if ($_SESSION["Username"] == "") {
   echo "<script type=\"text/javascript\">alert(\"กรุณาเข้าสู่ระบบ\");</script>";
   echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=index.php'>";
   exit();
}


$Username = $_SESSION["Username"];

$DepartmentCode = $_SESSION["DepartmentCode"];
$quatation_ID = $_GET['quatation_ID'];


include("connect.php");

?>
<!DOCTYPE html>
<html lang="en">


<head>
   <!-- Required meta tags-->
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="au theme template">
   <meta name="author" content="Hau Nguyen">
   <meta name="keywords" content="au theme template">




   <!-- Title Page-->
   <title>Request for quotation</title>

   <!-- Fontfaces CSS-->

   <link href="css/font-face.css" rel="stylesheet" media="all">
   <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
   <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
   <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

   <!-- Bootstrap CSS-->
   <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

   <!-- Vendor CSS-->
   <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
   <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
   <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
   <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
   <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
   <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
   <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

   <!-- Main CSS-->
   <link href="css/theme.css" rel="stylesheet" media="all">


   <!-- <script type="text/javascript" charset="utf8" src="js/jquery-3.5.1.js"></script> -->
   <script type="text/javascript" charset="utf8" src="js/jquery.dataTables.min.js"></script>
   <script type="text/javascript" charset="utf8" src="js/jszip.min.js"></script>
   <script type="text/javascript" charset="utf8" src="js/pdfmake.min.js"></script>
   <script type="text/javascript" charset="utf8" src="js/vfs_fonts.js"></script>
   <script type="text/javascript" charset="utf8" src="js/dataTables.buttons.min.js"></script>
   <script type="text/javascript" charset="utf8" src="js/buttons.html5.min.js"></script>
   <script type="text/javascript" charset="utf8" src="js/buttons.print.min.js"></script>
   <script type="text/javascript" charset="utf8" src="js/dataTables.rowGroup.min.js"></script>
   <script type="text/javascript" charset="utf8" src="js/buttons.colVis.min.js"></script>
   <!-- input file-->
   <script type="text/javascript" charset="utf8" src="js/piexif.min.js"></script>
   <script type="text/javascript" charset="utf8" src="js/sortable.min.js"></script>
   <script type="text/javascript" charset="utf8" src="js/fileinput.min.js"></script>
   <script type="text/javascript" charset="utf8" src="js/LANG.js"></script>
   <!--  -->

   <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
   <link rel="stylesheet" type="text/css" href="css/buttons.dataTables.min.css">
   <link rel="stylesheet" type="text/css" href="css/rowGroup.dataTables.min.css">

   <!-- Include Bootstrap Datepicker -->
   <link rel="stylesheet" href="css/font-awesome.css" />
   <link rel="stylesheet" href="css/bootstrap-datepicker.min.css" />
   <script src="js/bootstrap-datepicker.min.js"></script>


</head>

<!-- <body class="animsition"> -->

<body onload="myFunction()" style="margin:0;">

   <div id="loader">
      <img id="loader-image" src="DoubleRing-1s-200px.gif" alt="Loading..." /><br />
   </div>

   <div id="myDiv" class="animate-bottom">
      <div class="page-wrapper" style="  
  background-image: url('images/imageedit_1_5977293344.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 110%;
  overflow-y: hidden;

  z-index: -10;">
         <!-- HEADER MOBILE-->
         <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
               <div class="container-fluid">
                  <div class="header-mobile-inner">
                     <a class="logo" href="index.html">
                        <h1>Request for quotation</h1> <!-- <img src="images/icon/logo.png" alt="CoolAdmin" /> -->
                     </a>
                     <button class="hamburger hamburger--slider" type="button">
                        <span class="hamburger-box">
                           <span class="hamburger-inner"></span>
                        </span>
                     </button>
                  </div>
               </div>
            </div>
            <nav class="navbar-mobile">
               <div class="container-fluid">
                  <ul class="navbar-mobile__list list-unstyled">
                     <li>
                        <a href="Dashboard.php">
                           <i class="fas fa-home"></i>Dashboard</a>
                     </li>

                     <li class="active has-sub">
                        <a href="#">
                           <i class="fas fa-align-justify"></i>Add Quotation</a>
                     </li>


                     <li>
                        <a href="logout.php">
                           <i class="fas fa-power-off"></i>ออกจากระบบ</a>
                     </li>

                  </ul>
               </div>
            </nav>
         </header>
         <!-- END HEADER MOBILE-->

         <!-- MENU SIDEBAR-->
         <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
               <a href="#">
                  <h3>Request for quotation</h3> <!-- <img src="images/icon/logo.png" alt="Cool Admin" /> -->
               </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
               <nav class="navbar-sidebar">
                  <ul class="list-unstyled navbar__list">
                     <li>
                        <a href="Dashboard.php">
                           <i class="fas fa-home"></i>Dashboard</a>
                     </li>
                     <li class="active has-sub">
                        <a href="#">
                           <i class="fas fa-align-justify"></i>Quotation</a>
                     </li>

                     <li>
                        <a href="logout.php">
                           <i class="fas fa-power-off"></i>ออกจากระบบ</a>
                     </li>
                     <div style="position: absolute;  bottom: 10px;">
                        <li>
                           <div class="account-wrap">
                              <div class="account-item clearfix js-item-menu">

                                 <a href="#">
                                    <?php


                                    include("connect.php");

                                    $sqlT = "SELECT * FROM vw_Employee where EmployeeUsername = '$Username' ";
                                    $queryT = sqlsrv_query($conn, $sqlT);
                                    $resultT = sqlsrv_fetch_array($queryT, SQLSRV_FETCH_ASSOC);
                                    if (!$resultT) {
                                       // echo "Error while fetching array.\n";
                                       die(print_r(sqlsrv_errors(), true));
                                    } else if ($resultT === null) {
                                       echo "No results were found.\n";
                                    } else {
                                       do { ?>

                                          <i class="fas fa-user"></i><?php echo $resultT["ThFirstName"]; ?> <?php echo $resultT["ThLastName"]; ?>
                                          <?php echo $resultT["EmployeeCode"]; ?>

                                 </a>






                              </div>
                           </div>
                        </li>
                     </div>
                  </ul>
               </nav>
            </div>
         </aside>
         <!-- END MENU SIDEBAR-->

         <!-- PAGE CONTAINER-->
         <div class="page-container" style="background-color: transparent;">
            <!-- MAIN CONTENT-->
            <div class="main-content" style="padding-top: 20px;">
               <div class="section__content section__content--p30">
                  <div class="container-fluid">

                     <!-- โชว์ alert -->
                     <?php
                                          session_start();
                                          if (isset($_SESSION['plan'])) {
                                             echo '<div class="alert alert-success alert-dismissable" style="display:none; z-index:999;" id="flash-msg">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <i class="icon fa fa-check"></i> ' . $_SESSION['plan'] . '</div>';
                                          }
                                          unset($_SESSION['plan']);
                     ?>


                     <script>
                        $(document).ready(function() {
                           $("#flash-msg").fadeIn(800).delay(4000).fadeOut("slow");
                        });
                     </script>

                     <!-- END โชว์ alert -->


                     <div class="row">
                        <div class="col-lg-12">
                           <div id="snoAlertBox" class="sufee-alert alert with-close alert-primary alert-dismissible fade show " style=" position:fixed; z-index: 999; width:60%; margin-left: 10px ; margin-top: auto; display: none;">
                              <span class="badge badge-pill badge-primary">Success</span>
                              You successfully read this important alert.
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <h2 class="m-b-20" style="color: white;">Quotation</h2>

                           <div class="top-campaign" style="padding-bottom: 45px;">

                              <div class="row">


                                 <div class="col-lg-12">




                                    <div class="card-title">
                                       <div class="row">
                                          <div class="col-md-3 col-sm-4"></div>
                                          <div class="col-md-6 col-sm-4">
                                             <h3 class="text-center title-10">ใบขอราคาจัดซื้อจัดจ้าง</h3>
                                          </div>

                                          <?php
                                          $queryT = "SELECT quatation.*,status.* FROM quatation LEFT JOIN status ON quatation.status = status.status_id WHERE quatation_ID = '$quatation_ID' ";
                                          $returnedValueT = sqlsrv_query($conn, $queryT);
                                          $rowT = sqlsrv_fetch_array($returnedValueT, SQLSRV_FETCH_ASSOC);



                                          if ($rowT === false) {

                                             die(print_r(sqlsrv_errors(), true));
                                          } else if ($rowT === null) {
                                             echo "No results were found.\n";
                                          } else {
                                             do { ?>

                                                <div class="col-md-3 col-sm-4">
                                                   <input type="text" class="form-control" value="<?php echo  $rowT["num_req"] ?>" disabled>

                                                </div>
                                       </div>
                                    </div>
                                    <hr>




                                    <form action="db_save_quatation_edit.php" name="save" id="save-form" method="post" ENCTYPE="multipart/form-data">



                                       <form>

                                          <input id="num_req" name="num_req" type="text" value="<?php echo  $numRequire ?>" hidden>
                                          <div class="row">
                                             <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                   <strong class="card-title"><label for="employee_code_request" class="control-label mb-1">รหัสผู้ร้องขอ</label></strong>
                                                   <input id="employee_code_request" name="employee_code_request" value="<?php echo $resultT["EmployeeCode"] ?>" type="text" class="form-control" aria-required="true" aria-invalid="false" readonly>
                                                </div>
                                             </div>
                                             <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                   <strong class="card-title"><label for="name_request" class="control-label mb-1">ชื่อผู้ร้องขอ</label></strong>
                                                   <input id="name_request" name="name_request" value="<?php echo $resultT["ThFullName"] ?>" type="text" class="form-control" aria-required="true" aria-invalid="false" readonly>
                                                </div>
                                             </div>

                                          </div>
                                          <div class="row">
                                             <div class="col-md-4 col-sm-12">
                                                <div class="form-group has-success">
                                                   <strong class="card-title"><label for="department" class="control-label mb-1">หน่วยงาน</label></strong>
                                                   <input id="department" name="department" value="<?php echo $resultT["DepartmentName"] ?>" type="text" class="form-control department valid" aria-required="true" aria-invalid="false" readonly>

                                                </div>
                                             </div>
                                             <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                   <strong class="card-title"><label for="tel" class="control-label mb-1">เบอร์ติดต่อ</label></strong>
                                                   <input id="tel" name="tel" type="tel" value="<?php echo $resultT["ContactNo"] ?>" class="form-control tel" data-val="true" data-val-required="Please enter tel number" data-val-tel="Please enter a valid tel number" autocomplete="tel" readonly>

                                                </div>
                                             </div>
                                             <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                   <strong class="card-title"><label for="email" class="control-label mb-1">Email</label></strong>
                                                   <input id="email" name="email" type="email" value="<?php echo $resultT["Email"] ?>" class="form-control email" value="" data-val="true" data-val-required="Please enter your email" data-email="Please enter email" autocomplete="email" readonly>
                                                   <span class="help-block" data-valmsg-for="email" data-valmsg-replace="true"></span>
                                                </div>
                                             </div>
                                          </div>

                                          <div class="row">
                                             <div class="col-md-6 col-sm-12">


                                                <!-- <div class="form-group">
                                                <strong class="card-title"><label  for="date_picker" class="control-label mb-1">วันที่ต้องการ</label></strong>
                                                <input type="date" class="form-control" name="date_picker" id="date_picker" required>
                                             </div> -->
                                                <div class="form-group">
                                                   <strong class="card-title"><label for="date_picker">วันที่ต้องการ</label></strong>

                                                   <div class="input-group">
                                                      <input class="datepicker form-control" data-provide="datepicker" id="datepicker" name="datepicker" autocomplete="off" value="<?php echo date("d/m/Y", strtotime($rowT['date_picker']->format('Y-m-d'))); ?>" disabled>

                                                      <div class="input-group-btn">
                                                         <span class="btn btn-secondary"><i class="fa fa-calendar"></i></span>

                                                      </div>
                                                   </div>

                                                </div>
                                             </div>
                                             <div class="col-md-6 col-sm-12">
                                                <div class="form-group">

                                                   <strong class="card-title"><label for="Status_active" class="control-label mb-1">Status</label></strong>

                                                   <input id="Status_active" name="Status_active" value="<?php echo $rowT["status_name"]; ?>" class="form-control" readonly>



                                                </div>

                                             </div>


                                          </div>

                                          <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx      UPLOAD PDF    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
                                          <!-- <div class="row" style="margin-top:10px;">
                                             <div class="col-12">
                                                <label for="file_pdf" class="form-label">Upload File PDF (รวมเป็นไฟล์เดียว) : </label>
                                                <input type='file' name='file_pdf' id='file_pdf' />
                                             </div>
                                          </div> -->
                                          <div class="card">
                                             <div class="card-header"><strong class="card-title"><label for="approve_code" class="control-label mb-1">Work process</label></strong></div>
                                             <div class="card-body">
                                                <div class="row">
                                                   <div class="col-md-4 col-sm-12">
                                                      <div class="form-group">
                                                         <span class="card-title"><label for="approver_user_nameTH" class="control-label mb-1">Approver User</label></span>

                                                         <input id="approver_user_nameTH" name="approver_user_nameTH" value="<?php echo $rowT['approver_user_nameTH']; ?>" class="form-control" readonly>

                                                      </div>

                                                   </div>
                                                   <div class="col-md-2">
                                                      <div class="form-group d-none d-md-block">
                                                         <span class="card-title"><label for="arrow-1" class="control-label mb-1"></label></span>

                                                         <div class="arrow-1" id="arrow-1"></div>
                                                      </div>
                                                   </div>

                                                   <?php if ($rowT['status'] > 1 &&  $rowT['status'] != 5) { ?>
                                                      <div class="col-md-6 col-sm-12">
                                                         <div class="form-group">
                                                            <span class="card-title"><label for="ApproveStatus" class="control-label mb-1 ">Approver User Status</label></span>

                                                            <span class="btn btn-success btn-block" id="ApproveStatus">Success @ <?php echo date("d/m/Y H:i:s", strtotime($rowT['date_time_stamp_approver_user']->format('Y-m-d H:i:s'))); ?></span>

                                                         </div>
                                                      </div>
                                                   <?php  } elseif ($rowT['status'] == 5  && $rowT['date_time_stamp_approver_user'] != '') { ?>
                                                      <div class="col-md-6 col-sm-12">
                                                         <div class="form-group">
                                                            <span class="card-title"><label for="ApproveStatus" class="control-label mb-1 ">Approver User Status</label></span>

                                                            <span class="btn btn-danger btn-block" id="ApproveStatus">Unsuccess</span>

                                                         </div>
                                                      </div>
                                                   <?php } else { ?>
                                                      <div class="col-md-6 col-sm-12">
                                                         <div class="form-group">
                                                            <span class="card-title"><label for="ApproveStatus" class="control-label mb-1 ">Approver User Status</label></span>

                                                            <span class="btn btn-primary btn-block progress-bar-striped progress-bar-animated" role="progressbar"" id=" ApproveStatus">Inprocess . . .</span>

                                                         </div>
                                                      </div>
                                                   <?php } ?>
                                                </div>

                                                <!-- >>>>>>>>>>>>>>>>>>>>>>>>> Approve User Status  <<<<<<<<<<<<<<<<<<<<< -->


                                                <div class="row">
                                                   <div class="col-md-4 col-sm-12">
                                                      <div class="form-group">
                                                         <span class="card-title"><label for="approver_pu_nameTH" class="control-label mb-1">Approver PU</label></span>
                                                         <input id="approver_pu_nameTH" name="approver_pu_nameTH" value="<?php echo $rowT['approver_pu_nameTH']; ?>" class="form-control" readonly>

                                                      </div>
                                                   </div>

                                                   <div class="col-md-2">
                                                      <div class="form-group d-none d-md-block">
                                                         <span class="card-title"><label for="arrow-1" class="control-label mb-1"></label></span>

                                                         <div class="arrow-1" id="arrow-1"></div>
                                                      </div>
                                                   </div>

                                                   <?php
                                                   if ($rowT['status'] == 2) { ?>
                                                      <div class="col-md-6 col-sm-12">
                                                         <div class="form-group">
                                                            <span class="card-title"><label for="approve_pu_status" class="control-label mb-1 ">Approver PU Status</label></span>

                                                            <span class="btn btn-primary btn-block progress-bar-striped progress-bar-animated" role="progressbar"" id=" Pu_work_status">Inprocess . . .</span>


                                                         </div>
                                                      </div>
                                                   <?php
                                                   } elseif ($rowT['status'] > 2 &&  $rowT['status'] != 5) { ?>
                                                      <div class="col-md-6 col-sm-12">
                                                         <div class="form-group">
                                                            <span class="card-title"><label for="approve_pu_status" class="control-label mb-1 ">Approver PU Status</label></span>

                                                            <span class="btn btn-success btn-block" id="Pu_work_status">Success @ <?php echo date("d/m/Y H:i:s", strtotime($rowT['date_time_stamp_approver_pu']->format('Y-m-d H:i:s'))); ?></span>


                                                         </div>
                                                      </div>

                                                   <?php  } elseif ($rowT['status'] == 5 && $rowT['date_time_stamp_approver_pu'] != '') { ?>
                                                      <div class="col-md-6 col-sm-12">
                                                         <div class="form-group">
                                                            <span class="card-title"><label for="approve_pu_status" class="control-label mb-1 ">Approver PU Status</label></span>

                                                            <span class="btn btn-danger btn-block" id="approve_pu_status">Unsuccess</span>

                                                         </div>
                                                      </div>
                                                   <?php } else { ?>
                                                      <div class="col-md-6 col-sm-12">
                                                         <div class="form-group">
                                                            <span class="card-title"><label for="approve_pu_status" class="control-label mb-1 ">Approver PU Status</label></span>

                                                            <span class="btn btn-secondary btn-block" id="approve_pu_status">Wait for approve.</span>

                                                         </div>
                                                      </div>
                                                   <?php } ?>

                                                </div>
                                                <!-- >>>>>>>>>>>>>>>>>>>>>>>>> Approve PU Status  <<<<<<<<<<<<<<<<<<<<< -->


                                                <div class="row">
                                                   <div class="col-md-4 col-sm-12">
                                                      <div class="form-group">
                                                         <span class="card-title"><label for="PU" class="control-label mb-1">PU</label></span>
                                                         <input id="PU" name="PU" value="<?php echo $rowT['pu_nameTH']; ?>" class="form-control" readonly>

                                                      </div>
                                                   </div>

                                                   <div class="col-md-2">
                                                      <div class="form-group d-none d-md-block">
                                                         <span class="card-title"><label for="arrow-1" class="control-label mb-1"></label></span>

                                                         <div class="arrow-1" id="arrow-1"></div>
                                                      </div>
                                                   </div>





                                                   <?php if ($rowT['status'] == 4) { ?>
                                                      <div class="col-md-6 col-sm-12">
                                                         <div class="form-group">
                                                            <span class="card-title"><label for="Pu_work_status" class="control-label mb-1 ">PU Working Status</label></span>

                                                            <span class="btn btn-success btn-block" id="Pu_work_status">Success @ <?php echo date("d/m/Y H:i:s", strtotime($rowT['date_time_stamp_pu']->format('Y-m-d H:i:s'))); ?></span>

                                                         </div>
                                                      </div>
                                                   <?php  } elseif ($rowT['status'] == 5 && $rowT['date_time_stamp_pu'] != '') { ?>
                                                      <div class="col-md-6 col-sm-12">
                                                         <div class="form-group">
                                                            <span class="card-title"><label for="Pu_work_status" class="control-label mb-1 ">PU Working Status</label></span>

                                                            <span class="btn btn-danger btn-block" id="Pu_work_status">Unsuccess</span>

                                                         </div>
                                                      </div>
                                                   <?php } elseif ($rowT['status'] == 3) { ?>

                                                      <div class="col-md-6 col-sm-12">
                                                         <div class="form-group">
                                                            <span class="card-title"><label for="Pu_work_status" class="control-label mb-1 ">PU Working Status</label></span>

                                                            <span class="btn btn-primary btn-block progress-bar-striped progress-bar-animated" role="progressbar"" id=" Pu_work_status">Inprocess . . .</span>


                                                         </div>
                                                      </div>
                                                   <?php } else { ?>
                                                      <div class="col-md-6 col-sm-12">
                                                         <div class="form-group">
                                                            <span class="card-title"><label for="Pu_work_status" class="control-label mb-1 ">PU Working Status</label></span>

                                                            <span class="btn btn-secondary btn-block" id="Pu_work_status">Wait for Approve</span>
                                                         </div>
                                                      </div>
                                                   <?php } ?>







                                                </div>

                                                <!-- >>>>>>>>>>>>>>>>>>>>>>>>> PU Working Status  <<<<<<<<<<<<<<<<<<<<< -->


                                                <div class="progress mb-1" style="margin-top:15px">
                                                   <?php if ($rowT['status'] == 1) { ?>
                                                      <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                                   <?php } elseif ($rowT['status'] == 2) { ?>
                                                      <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                                   <?php } elseif ($rowT['status'] == 3) { ?>
                                                      <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                                                   <?php } elseif ($rowT['status'] == 4) { ?>
                                                      <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>

                                                   <?php } else { ?>
                                                      <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                                                   <?php } ?>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="row">
                                             <div class="col-md-12">

                                                <div class="card">
                                                   <div class="card-header">
                                                      <strong class="card-title"><label for="nav-tab" class="control-label mb-1">Comment</label></strong>
                                                   </div>
                                                   <div class="card-body">
                                                      <div class="default-tab">
                                                         <nav>
                                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                               <a class="nav-item nav-link active" id="nav-user-tab" data-toggle="tab" href="#nav-user" role="tab" aria-controls="nav-user" aria-selected="true">User</a>
                                                               <a class="nav-item nav-link" id="nav-approver-tab" data-toggle="tab" href="#nav-approver" role="tab" aria-controls="nav-approver" aria-selected="false">Approver User</a>
                                                               <a class="nav-item nav-link" id="nav-aprrover-pu-tab" data-toggle="tab" href="#nav-aprrover-pu" role="tab" aria-controls="nav-aprrover-pu" aria-selected="false">Approver Purchase</a>
                                                               <a class="nav-item nav-link" id="nav-pu-tab" data-toggle="tab" href="#nav-pu" role="tab" aria-controls="nav-pu" aria-selected="false">Purchaser</a>
                                                            </div>
                                                         </nav>
                                                         <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                                            <div class="tab-pane fade show active" id="nav-user" role="tabpanel" aria-labelledby="nav-user-tab">
                                                               <textarea class="form-control" value="" rows="3" readonly><?php echo $rowT["comment_user"] ?></textarea>

                                                            </div>
                                                            <div class="tab-pane fade" id="nav-approver" role="tabpanel" aria-labelledby="nav-approver-tab">
                                                               <textarea class="form-control" value="" rows="3" readonly><?php echo $rowT["comment_approver_user"] ?></textarea>

                                                            </div>
                                                            <div class="tab-pane fade" id="nav-aprrover-pu" role="tabpanel" aria-labelledby="nav-aprrover-pu-tab">
                                                               <textarea class="form-control" value="" rows="3" readonly><?php echo $rowT["comment_approver_pu"] ?></textarea>

                                                            </div>
                                                            <div class="tab-pane fade" id="nav-pu" role="tabpanel" aria-labelledby="nav-pu-tab">
                                                               <textarea class="form-control" value="" rows="3" readonly><?php echo $rowT["comment_pu"] ?></textarea>

                                                            </div>
                                                         </div>

                                                      </div>
                                                   </div>
                                                </div>






                                             </div>
                                          </div>



                                       </form>
                                 <?php
                                                $status = $rowT['status'];
                                             } while ($rowT = sqlsrv_fetch_array($returnedValueT, SQLSRV_FETCH_ASSOC));
                                          }   ?>

                           <?php
                                          $EmployeeCode = $resultT['EmployeeCode'];
                                       } while ($resultT = sqlsrv_fetch_array($queryT, SQLSRV_FETCH_ASSOC));
                                    } ?>

                           <!-- ดึงข้อมูล จัดซื้อ -->
                           <?php

                           $array_of_pu = array();
                           $count_ja = 0;
                           include("connect.php");

                           $sqlPurchase = "SELECT * FROM vw_Employee  where DepartmentCode = '1600300000' and DivisionCode = '1600414000' and EmployeeStatusCode = '01' AND (level NOT LIKE '%M%' AND level NOT LIKE '%G%' AND level NOT LIKE '%D%')";
                           $queryPurchase = sqlsrv_query($conn, $sqlPurchase);
                           $resultPurchase = sqlsrv_fetch_array($queryPurchase, SQLSRV_FETCH_ASSOC);
                           if (!$resultPurchase) {
                              // echo "Error while fetching array.\n";
                              die(print_r(sqlsrv_errors(), true));
                           } else if ($resultPurchase === null) {
                              echo "No results were found.\n";
                           } else {
                              do {
                                 $count_ja++;
                                 array_push($array_of_pu, $resultPurchase['EmployeeCode']);

                                 if ($DepartmentCode === '1600300000' && $status == 3 && $resultPurchase["EmployeeCode"] === $test) { ?>


                           ?>

                                


                           <?php  } while ($resultPurchase = sqlsrv_fetch_array($queryPurchase, SQLSRV_FETCH_ASSOC));
                           }
                           echo $count_ja;
                           ?>



                                 </div>







                              </div>
                           </div>
                        </div>


                     </div>




                  </div>
               </div>













            </div>
         </div>
         <!-- </div> -->
      </div>
   </div>
   <!-- END MAIN CONTENT-->
   <!-- END PAGE CONTAINER-->


   < <div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               Confirm Submit
            </div>
            <div class="modal-body">
               Are you sure you want to submit ?

               <!-- We display the details entered by the user here -->


            </div>

            <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
               <a type="submit" id="submit" class="btn btn-success success">Submit</a>
            </div>
         </div>
      </div>
      </div>


      <!-- Jquery JS-->
      <!-- <script src="vendor/jquery-3.2.1.min.js"></script> -->
      <!-- Bootstrap JS-->
      <script src="vendor/bootstrap-4.1/popper.min.js"></script>
      <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
      <!-- Vendor JS       -->
      <script src="vendor/slick/slick.min.js">
      </script>
      <script src="vendor/wow/wow.min.js"></script>
      <script src="vendor/animsition/animsition.min.js"></script>
      <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
      </script>
      <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
      <script src="vendor/counter-up/jquery.counterup.min.js">
      </script>
      <script src="vendor/circle-progress/circle-progress.min.js"></script>
      <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
      <script src="vendor/chartjs/Chart.bundle.min.js"></script>
      <script src="vendor/select2/select2.min.js">
      </script>


      <!-- Main JS-->
      <script src="js/main.js"></script>
      <script src="js/swallow.js"></script>
      <script>
         var myVar;

         function myFunction() {
            myVar = setTimeout(showPage, 500);
         }

         function showPage() {
            document.getElementById("loader").style.display = "none";
            document.getElementById("myDiv").style.display = "block";
         }
      </script>


      <script>
         $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',

            autoclose: true

         });
      </script>




</body>

</html>





<!-- end document-->
<?php sqlsrv_close($conn); ?>
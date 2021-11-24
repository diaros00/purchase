<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Purchase</title>

    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="css/buttons.dataTables.min.css">

    <link rel="stylesheet" type="text/css" href="css/fixedHeader.dataTables.min.css">
    <style>
        /* form {
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
        } */


        form {
            margin: 20px 0;
        }

        form input,
        button {
            padding: 5px;
        }



        div.dt-button-collection {
            width: 20vh !important;
            height: auto !important;
            margin-top: 20px;


        }

        div.dt-button-collection button.dt-button {
            display: inline-block;
            /* width: 32%; */
            margin-top: 0px;
            margin-left: 0px;
            z-index: 999;


        }

        div.dt-button-collection button.buttons-colvis {
            display: inline-block;
            width: 49%;


        }

        div.dt-button-collection h3 {


            margin-top: 5px;
            margin-bottom: 5px;

            border-bottom: 1px solid black;
            font-size: 1em;
            color: black !important;
        }

        div.dt-button-collection h3.not-top-heading {
            margin-top: 10px;
        }

        .dt-button {
            z-index: 999;
            margin-top: 20px;
            margin-left: 20px;
            border: none !important;
            outline: none !important;
            padding-left: 18px !important;
            -webkit-border-radius: 3px !important;
            -moz-border-radius: 3px !important;
            border-radius: 3px !important;
            height: 40px !important;
            background: #444 !important;
            display: -webkit-box !important;
            display: -webkit-flex !important;
            display: -moz-box !important;
            display: -ms-flexbox !important;
            display: flex !important;
            -webkit-box-align: center !important;
            -webkit-align-items: center !important;
            -moz-box-align: center !important;
            -ms-flex-align: center !important;
            align-items: center !important;
            color: #fff !important;
            font-size: 14px !important;

            border-color: #fff transparent transparent transparent;
        }

        .dt-button-collection {


            display: block;
            height: 450px !important;


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


</head>

<!-- <body class="animsition"> -->

<body onload="myFunction()" style="margin:0;">

    <div id="loader">
        <img id="loader-image" src="DoubleRing-1s-200px.gif" alt="Loading..." /><br />
    </div>

    <div id="myDiv" class="animate-bottom">
        <!-- <body> -->
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
                            <li class="active has-sub">
                                <!-- <a class="js-arrow" href="Home.php"> -->
                                <a href="#">
                                    <i class="fas fa-home"></i>Dashboard</a>
                            </li>
                            <li>

                                <a href="Quatation.php">
                                    <i class="fas fa-group"></i>Quotation</a>
                            </li>


                            <li>
                                <!-- <a class="js-arrow" href="logout.php"> -->
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
                            <li class="active has-sub">

                                <a href="#"><i class="fas fa-home"></i>Dashboard</a>

                            </li>
                            <li>
                                <a href="Quatation.php">
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

                                            <a class="js-arrow" href="#">
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



                                    <?php
                                                    } while ($resultT = sqlsrv_fetch_array($queryT, SQLSRV_FETCH_ASSOC));
                                                }
                                    ?>


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
            <div class="page-container" style="background-color:transparent; ">
                <!-- MAIN CONTENT-->
                <div class="main-content" style=" padding-top: 20px;">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <h2 class="m-b-20" style="color: white;">Dashboard</h2>
                            <div class="top-campaign">

                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2>ข้อมูลการขอราคาจัดซื้อจัดจ้าง</h2>
                                                <h3 class="title-5 m-b-10">All Data table</h3>

                                                <!-- <div class="row m-t-30"> -->
                                                <!-- <div class="col-md-12"> -->
                                                <!-- DATA TABLE-->


                                                <!-- <table class="table table-borderless table-striped table-earning"> -->
                                                <!-- <table id="example" class="table table-striped table-borderless display nowrap" style="width:100%"> -->
                                                <!-- <table id="example" class="table table-striped table-bordered" style="width:100%"> -->
                                                <div class="table-responsive">
                                                    <table class="table table-hover nowrap table-condensed " style="width:100% ">
                                                        <!-- <table id="example" class="display nowrap" style="width:100%"> -->
                                                        <thead>
                                                            <tr style="font-size: 0.9em; ">

                                                                <th style="min-width:140px">Status</th>
                                                                <th style="min-width:140px">(View/Edit)/Delete</th>
                                                                <th>No.</th>
                                                                <th>Req</th>
                                                                <th>NameRequest</th>
                                                                <th>EmployeeCode</th>
                                                                <th>Department</th>
                                                                <th>Tel</th>
                                                                <th>Email</th>
                                                                <th style="min-width:400px">Comment</th>
                                                                <th>Desired date</th>
                                                                <th>Created Date</th>
                                                                <th>Pdf download</th>


                                                            </tr>
                                                        </thead>
                                                        <tbody style="font-size: 0.8em; ">
                                                            <style>
                                                                th {
                                                                    background-color: LightSlateGrey;
                                                                    color: white;
                                                                }

                                                                td {
                                                                    height: 50px;
                                                                    vertical-align: middle !important;
                                                                    text-align: center !important;
                                                                }
                                                            </style>
                                                            <?php
                                                            include("connect.php");

                                                            // เชื่อมกับ request product
                                                            // $query = "SELECT quatation.*,request_product.* FROM quatation LEFT JOIN request_product ON quatation.num_req = request_product.num_req";
                                                            $query = "SELECT quatation.*,status.* FROM quatation LEFT JOIN status ON quatation.status = status.status_id";
                                                            $returnedValue = sqlsrv_query($conn, $query);
                                                            $row = sqlsrv_fetch_array($returnedValue, SQLSRV_FETCH_ASSOC);
                                                            // $query = sqlsrv_query($conn, "SET NAMES UTF8");
                                                            // $query = sqlsrv_query($conn, $strSQL);

                                                            $count_record = 0;

                                                            if ($row === false) {
                                                                // echo "Error while fetching array.\n";
                                                                die(print_r(sqlsrv_errors(), true));
                                                            } else if ($row === null) {
                                                                echo "No results were found.\n";
                                                            } else {
                                                                do {
                                                                    $count_record++;


                                                            ?>
                                                                    <tr>

                                                                        <td><?php if ($row["status"] == 1) { ?>
                                                                                <span class="btn btn-secondary btn-block"><i class="fa fa-check-circle" aria-hidden="true"></i> <?php echo $row["status_name"]; ?></span>
                                                                            <?php } elseif ($row["status"] == 4) { ?>
                                                                                <span class="btn btn-success btn-block"><i class="fa fa-check-circle" aria-hidden="true"></i> <?php echo $row["status_name"]; ?></span>
                                                                            <?php } elseif ($row["status"] == 5) { ?>
                                                                                <span class="btn btn-danger btn-block"><i class="fa fa-check-circle" aria-hidden="true"></i> <?php echo $row["status_name"]; ?></span>
                                                                            <?php } else { ?>
                                                                                <span class="btn btn-warning btn-block"><i class="fa fa-check-circle" aria-hidden="true"></i> <?php echo $row["status_name"]; ?></span>
                                                                            <?php } ?>
                                                                        </td>
                                                                        <td>
                                                                            <a data-toggle="tooltip" data-placement="right" title="Edit Quotation <?php echo $row["num_req"] ?>" href="Quatation_edit.php?quatation_ID=<?php echo $row["quatation_ID"]; ?>" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                                            <a data-toggle="tooltip" data-placement="right" title="Delete Quotation <?php echo $row["num_req"] ?>" href="db_delete_quatation.php?quatation_ID=<?php echo $row["quatation_ID"]; ?>&num_req=<?php echo $row["num_req"]; ?>" onclick="return confirm('Are you sure to delete JobRequest >> <?php echo $row['num_req']; ?> << ?')" class="btn btn-danger  btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a>


                                                                        </td>
                                                                        <td><?php echo $count_record; ?></td>
                                                                        <td><?php echo $row["num_req"]; ?></td>
                                                                        <td><?php echo $row["name_request"]; ?></td>
                                                                        <td><?php echo $row["employee_code_request"]; ?></td>

                                                                        <td><?php echo $row["department"]; ?></td>
                                                                        <td><?php echo $row["tel"]; ?></td>
                                                                        <td><?php echo $row["email"]; ?></td>
                                                                        <td> <textarea class="form-control" rows="3" readonly><?php echo $row["comment_user"] ?></textarea>
                                                                        </td>

                                                                        <td><?php echo date_format($row["date_picker"], "d/m/Y H:i:s"); ?></td>
                                                                        <td><?php echo date_format($row["date_time_stamp"], "d/m/Y H:i:s"); ?></td>
                                                                        <?php if ($row["pdf_name"] == "") { ?>
                                                                            <td>No file Upload</td>
                                                                        <?php } else { ?>
                                                                            <td><a class="btn btn-success success" href="<?php echo $row["pdf_name"]; ?>" target="_blank">Download</a></td>
                                                                        <?php } ?>
                                                                        <!-- <td><a class="btn btn-danger" id="delete" name="delete" onclick="return confirm('ยืนยันการลบ')" href="db_delete_quatation.php?request_ID=<?php echo $row["request_ID"]; ?>">Delete</a></td> -->


                                                                    </tr>
                                                            <?php
                                                                } while ($row = sqlsrv_fetch_array($returnedValue, SQLSRV_FETCH_ASSOC));
                                                            }
                                                            ?>
                                                        </tbody>

                                                        </ะ>
                                                    </table>
                                                </div>
                                                <!-- END DATA TABLE-->
                                                <!-- </div> -->
                                            </div>
                                            <!-- </div> -->
                                            <!-- </div> -->

                                        </div>
                                    </div>
                                    <!-- </div> -->
                                </div>
                                <!-- END MAIN CONTENT-->
                                <!-- END PAGE CONTAINER-->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>







    <div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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




</body>

</html>




<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });


    $(document).ready(function() {
        pdfMake.fonts = {

            THSarabun: {
                normal: 'THSarabun.ttf',
                bold: 'THSarabun-Bold.ttf',
                italics: 'THSarabun-Italic.ttf',
                bolditalics: 'THSarabun-BoldItalic.ttf'

            }
        }
        $('#example1').DataTable({

            order: [
                [0, 'desc']
            ],

            dom: 'lfB<t>ip',
            buttons: [{

                extend: 'collection',
                text: 'Export  <i class="fa fa-files-o" style="margin-left:10px;"></i>',
                className: 'custom-html-collection',
                buttons: [
                    '<h3>Export</h3>',
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        customize: function(doc) { // ส่วนกำหนดเพิ่มเติม ส่วนนี้จะใช้จัดการกับ pdfmake
                            // กำหนด style หลัก
                            doc.defaultStyle = {
                                font: 'THSarabun',
                                fontSize: 12
                            };

                        },
                        download: 'open'
                    },

                    {
                        extend: 'csv',

                    },
                    'excel',

                ]
            }, ],

            info: false,

            // fixedHeader: true,
            scrollX: true,
            // responsive: true,


            'initComplete': function() {
                var btns = $('.dt-button');
                btns.addClass('btn btn-group waves-effect waves-light clr');

            }




        });
        // $('#example td').css('white-space', 'initial');


    });



    $('.dt-buttons').removeClass('dt-buttons').addClass("dt-buttons").css({
        "position": "fixed"
    });
</script>




<script script type="text/javascript" charset="utf8" src="js/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="js/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="js/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="js/vfs_fonts.js"></script>
<script type="text/javascript" charset="utf8" src="js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="js/buttons.print.min.js"></script>
<script type="text/javascript" charset="utf8" src="js/buttons.colVis.min.js"></script>
<script type="text/javascript" charset="utf8" src="js/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" charset="utf8" src="js/dataTables.bootstrap4.min.js"></script>


<script src="js/swallow.js"></script>
<!-- end document-->
<?php sqlsrv_close($conn); ?>
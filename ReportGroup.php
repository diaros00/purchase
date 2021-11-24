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
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>



    <script src="js/jquery-3.5.1.min.js"></script>

    <script type="text/javascript" charset="utf8" src="js/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="js/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="js/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8" src="js/vfs_fonts.js"></script>
    <script type="text/javascript" charset="utf8" src="js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="js/buttons.print.min.js"></script>
    <script type="text/javascript" charset="utf8" src="js/dataTables.rowGroup.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="css/rowGroup.dataTables.min.css">




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
    <title>Health Condition</title>

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

<body>
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <h1>Quatation Job Request</h1> <!-- <img src="images/icon/logo.png" alt="CoolAdmin" /> -->
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
                            <a href="Home.php">
                                <i class="fas fa-home"></i>ใบเสนอราคาจัดซื้อ</a>
                        </li>

                        <li>
                            <a class="js-arrow" href="approve.php">
                                <i class="fas fa-align-justify"></i>Approve</a>
                        </li>

                        <li>
                            <!-- <a class="js-arrow" href="ReportGroup.php"> -->
                            <a href="ReportGroup.php">
                                <i class="fas fa-group"></i>Report</a>
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
                    <h3>Quatation Job Request</h3> <!-- <img src="images/icon/logo.png" alt="Cool Admin" /> -->
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <!-- <a class="js-arrow" href="Home.php"> -->
                            <a href="Home.php">
                                <i class="fas fa-home"></i>ใบขอราคาจัดซื้อ</a>
                        </li>
                        <li>
                            <a href="approve.php">
                                <i class="fas fa-align-justify"></i>Approve</a>
                        </li>
                        <li class="active has-sub">
                            <!-- <a class="js-arrow" href="ReportGroup.php"> -->
                            <a href="ReportGroup.php">
                                <i class="fas fa-bar-chart-o"></i>Report</a>
                        </li>
                        <li>
                            <!-- <a class="js-arrow" href="logout.php"> -->
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
        <div class="page-container">
            <!-- MAIN CONTENT-->
            <div class="main-content" style=" padding-top: 20px;">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <h2>ข้อมูลการขอราคาจัดซื้อจัดจ้าง</h2>

                        <!-- <div class="row m-t-30"> -->
                        <!-- <div class="col-md-12"> -->
                        <!-- DATA TABLE-->

                        <div class="table-responsive">
                            <!-- <table class="table table-borderless table-striped table-earning"> -->
                            <!-- <table id="example" class="table table-striped table-borderless display nowrap" style="width:100%"> -->
                            <!-- <table id="example" class="table table-striped table-bordered" style="width:100%"> -->
                            <table id="example" class="table table-striped table-borderless display nowrap" style="width:100%">
                                <!-- <table id="example" class="display nowrap" style="width:100%"> -->
                                <thead>
                                    <tr style="font-size: 0.9em;">
                                        <th>No.</th>
                                        <th>Request Number</th>
                                        <th>Name</th>
                                        <th>product</th>
                                        <th>amount</th>
                                        <th>unit</th>
                                        <th>price</th>

                                        <th>Department</th>
                                        <th>Tel</th>
                                        <th>Email</th>
                                        <th>Comment</th>
                                        <th>Desired date</th>
                                        <th>Created Date</th>
                                        <th>Pdf download</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 0.8em;">

                                    <?php
                                    include("connect.php");
                                    // $strSQL = "SELECT * FROM quatation ORDER BY quatation_ID DESC";
                                    // $query = "SELECT * FROM quatation ORDER BY quatation_ID DESC";

                                    $query = "SELECT quatation.*,request_product.* FROM quatation LEFT JOIN request_product ON quatation.num_req = request_product.num_req";
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
                                                <td><?php echo $count_record; ?></td>
                                                <td><?php echo $row["num_req"]; ?></td>
                                                <td><?php echo $row["name_request"]; ?></td>
                                                <td><?php echo $row["product"]; ?></td>
                                                <td><?php echo $row["amount"]; ?></td>
                                                <td><?php echo $row["unit"]; ?></td>
                                                <td><?php echo $row["price"]; ?></td>
                                                <td><?php echo $row["department"]; ?></td>
                                                <td><?php echo $row["tel"]; ?></td>
                                                <td><?php echo $row["email"]; ?></td>
                                                <td><?php echo $row["comment"]; ?></td>

                                                <td><?php echo date_format($row["date_picker"], "d/m/Y H:i:s"); ?></td>
                                                <td><?php echo date_format($row["date_time_stamp"], "d/m/Y H:i:s"); ?></td>
                                                <?php if ($row["pdf_name"] == "") { ?>
                                                    <td>No file Upload</td>
                                                <?php } else { ?>
                                                    <td><a class="btn btn-success success" href="<?php echo $row["pdf_name"]; ?>" target="_blank">Download</a></td>
                                                <?php } ?>
                                                <!-- <td><a class="btn btn-danger" id="delete" name="delete" onclick="return confirm('ยืนยันการลบ')" href="db_delete_quatation.php?request_ID=<?php echo $row["request_ID"]; ?>">Delete</a></td> -->
                                                <td align="center"><a href="db_delete_quatation.php?request_ID=<?php echo $row["request_ID"]; ?>" onclick="return confirm('ยืนยันการลบ')" class="btn btn-danger  btn-xs">Delete</a></td>



                                            </tr>
                                    <?php
                                        } while ($row = sqlsrv_fetch_array($returnedValue, SQLSRV_FETCH_ASSOC));
                                    }
                                    ?>
                                </tbody>
                                <tfoot style="font-size: 0.9em;">
                                    <th>No.</th>
                                    <th>Request Number</th>
                                    <th>Name</th>
                                    <th>Department</th>
                                    <th>Tel</th>
                                    <th>Email</th>
                                    <th>Comment</th>
                                    <th>Desired date</th>
                                    <th>Created Date</th>
                                    <th>Pdf download</th>
                                    <th>Delete</th>
                                </tfoot>
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







</body>

</html>



<script type="text/javascript">
    $(document).ready(function() {

                $(function() {
                    $('#txtDate').date({
                        format: "dd/mm/yyyy"
                    });
                });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({

            order: [
                [1, 'asc']
            ],
            rowGroup: {
                dataSrc: 1
            },
            dom: 'Bfrtip',
            buttons: [
                'copy',
                {
                    extend: 'csv',
                    text: 'csv',

                    // orientation: 'landscape'

                },
                {
                    extend: 'excel',
                    text: 'excel',
                    // exportOptions: {
                    //     columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                    // }
                    // orientation: 'landscape'

                },
                {
                    extend: 'pdf',
                    footer: 'true',
                    text: 'pdf',
                    orientation: 'landscape'

                },
                {
                    extend: 'print',
                    footer: 'true',
                    text: 'print',

                    // orientation: 'landscape'

                }
            ]
        });

    });
</script>

// <script>
    //     $(document).ready(function() {
    //         var table = $('#example').DataTable({
    //             lengthChange: true,
    //             dom: 'Bfrtip',
    //             buttons: ['copy', 'excel', 'pdf', 'colvis']
    //         });

    //         table.buttons().container()
    //             .appendTo('#example_wrapper .col-md-6:eq(0)');
    //     });
    // 
</script>

<!-- end document-->
<?php sqlsrv_close($conn); ?>
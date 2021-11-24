<?php
include("connect.php");
if (isset($_GET["quatation_ID"])) {

	$quatation_ID = $_GET['quatation_ID'];
	$num_req = $_GET['num_req'];

	$sql = "DELETE FROM quatation where quatation_ID ='$quatation_ID'";
	$sql1 = "DELETE FROM request_product where num_req ='$num_req'";

	sqlsrv_query($conn, "SET NAMES UTF8");
	$query = sqlsrv_query($conn, $sql);
	sqlsrv_query($conn, "SET NAMES UTF8");
	$query1 = sqlsrv_query($conn, $sql1);


	if ($query and $query1) {
		echo '<script type="text/javascript">alert("Delete Successfully")</script>';
		// echo '<div class="alert alert-success" ><h4><i class="icon fa fa-check"></i>Success!</h4></div>';
		// header('Location: ' . $_SERVER['HTTP_REFERER']);
		header("location: Dashboard.php");
		// echo 'window.location = "ReportGroup.php"; ';

	} else {
		echo "Error: " . $sql . "<br>" . sqlsrv_errors($conn);
	}
}
exit;
sqlsrv_close($conn);

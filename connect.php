<?php

	ini_set('sqlsrv.charset', 'UTF-8');

	$serverName='TSA-DEV02.ts.tsa.co.th';
	$userName="sa";
	$Password="P@ssw0rd";
	$dbName="E-Form_Purchase";

	$connectionInfo = array("Database"=>$dbName, "UID"=>$userName, "PWD"=>$Password, "MultipleActiveResultSets"=>true,"CharacterSet"  => 'UTF-8');

	$conn = sqlsrv_connect( $serverName, $connectionInfo);

	if( $conn === false) {
	   die( print_r( sqlsrv_errors(), true));
	}else{
		//echo "Connected";
	}
?>
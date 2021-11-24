<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include("connect.php");
    $a = array();
    $count_ja = 0;
    $sqlPurchase = "SELECT * FROM vw_Employee  where DepartmentCode = '1600300000' and DivisionCode = '1600414000' and EmployeeStatusCode = '01' AND (level NOT LIKE '%M%' AND level NOT LIKE '%G%' AND level NOT LIKE '%D%')";
    $queryPurchase = sqlsrv_query($conn, $sqlPurchase);
    $resultPurchase = sqlsrv_fetch_array($queryPurchase, SQLSRV_FETCH_ASSOC);
    if (!$resultPurchase) {
        // echo "Error while fetching array.\n";
        die(print_r(sqlsrv_errors(), true));
    } else if ($resultPurchase === null) {
        echo "No results were found.\n";
    } else {
        do {  ?>
            <table>
                <thead>
                    <tr>
                        <th>EmployeeCode</th>
                    </tr>
                </thead>
                <tbody style="font-size: 0.8em; ">
                    <tr>

                        <td><?php echo $resultPurchase['EmployeeCode']; ?></td>

                    </tr>
                </tbody>
            </table>
            <?php
            $count_ja++;
            array_push($a, $resultPurchase['EmployeeCode']);
            ?>

    <?php } while ($resultPurchase = sqlsrv_fetch_array($queryPurchase, SQLSRV_FETCH_ASSOC));
    }

    print_r($count_ja);

    print_r($a);
    if (array_search('160039', $a, true) != '') {

        echo 'found ';
    } else {
        echo 'nope ';
    }
    ?>
</body>

</html>






<!-- ดึงข้อมูล หัวหน้าจัดซื้อ -->
<?php

$sqlApprovePU = "SELECT * FROM vw_Employee   where DepartmentCode = '1600300000' and DivisionCode = '1600414000' and EmployeeStatusCode = '01' AND (level LIKE '%M%' OR level LIKE '%G%' OR level LIKE '%D%')";
$ApprovePU = sqlsrv_query($conn, $sqlApprovePU);
$resultApprovePU = sqlsrv_fetch_array($ApprovePU, SQLSRV_FETCH_ASSOC);

if ($resultApprovePU === false) {
    die(print_r(sqlsrv_errors(), true));
} elseif ($resultApprovePU === null) {
    echo "No results were found.\n";
} else {
    do { ?>

        <div class="container-fluid" style="padding: 0px;">

            <?php echo "DepartmentCode = " . $DepartmentCode ?>


            <div class="card">
                <div class="card-header"><strong class="card-title"><i class="fa fa-file-text" aria-hidden="true" style="margin-right: 10px;"></i>แก้ไขข้อมูลสินค้า</i></div>
                <div class="card-body">

                    <!-- <table class="table"> -->
                    <div class="table-responsive">
                        <table class="table table-hover" style="width:100%">
                            <thead>
                                <tr>

                                    <th>รายการสินค้า (ชื่อ,ขนาด,รุ่น,ยี่ห้อ)</th>
                                    <th>จำนวน</th>
                                    <th>หน่วยนับ</th>
                                    <th>ราคา</th>
                                    <th>บันทึกราคา</th>
                                </tr>
                            </thead>


                            <?php

                            include("connect.php");
                            $queryB = "SELECT quatation.*,request_product.* FROM quatation LEFT JOIN request_product ON quatation.num_req = request_product.num_req WHERE quatation_ID = '$quatation_ID' ";
                            $returnedB = sqlsrv_query($conn, $queryB);
                            $rowB = sqlsrv_fetch_array($returnedB, SQLSRV_FETCH_ASSOC);

                            if ($rowB === false) {
                                die(print_r(sqlsrv_errors(), true));
                            } elseif ($rowB === null) {
                                echo "No results were found.\n";
                            } else {
                                do {
                                    $test = '1600573';

                                    if ($DepartmentCode === '1600300000' && $status == 3 && $resultPurchase["EmployeeCode"] === $test) { ?>



                                        <form action="db_quatation_edit_request_product.php" name="save" id="save" method="post" ENCTYPE="multipart/form-data">

                                            <tbody style="font-size: 0.8em;">
                                                <td><input type="text" id="product" name="product" value="<?php echo $rowB['product']; ?>" autocomplete="off" readonly></td>
                                                <td><input type="text" id="amount" name="amount" value="<?php echo $rowB['amount']; ?>" autocomplete="off" readonly></td>
                                                <td><input type="text" id="unit" name="unit" value="<?php echo $rowB['unit']; ?>" autocomplete="off" readonly></td>
                                                <td><input type="text" id="price" name="price" value="<?php echo $rowB['price']; ?>" autocomplete="off"></td>
                                                <td hidden="on"><input type="text" id="request_ID" name="request_ID" value="<?php echo $rowB['request_ID']; ?>" autocomplete="off"></td>
                                                <td hidden="on"><input type="text" id="quatation_ID" name="quatation_ID" value="<?php echo $quatation_ID ?>" autocomplete="off"></td>

                                                <td><button type="submit" data-toggle="tooltip" data-placement="right" title="Save product <?php echo $rowB["product"] ?>" class="btn btn-success btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>

                                                    <!-- <td><button type="submit" data-toggle="tooltip" data-placement="right" title="Save product <?php echo $rowB["product"] ?>" href="db_quatation_edit_request_product.php?quatation_ID=<?php echo $quatation_ID; ?>&request_ID=<?php echo $rowB["request_ID"]; ?>&product=<?php echo $rowB['product']; ?>&amount=<?php echo $rowB['amount']; ?>&unit=<?php echo $rowB['unit']; ?>&price=<?php echo $rowB['price']; ?>" onclick="return confirm('Are you sure to save product >> <?php echo $rowB['product']; ?> << ?')" class="btn btn-success  btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> -->

                                                </td>
                                        </form>


                                    <?php } else { ?>


                                        <form action="db_quatation_edit_request_product.php" name="save" id="save" method="post" ENCTYPE="multipart/form-data">

                                            <tbody style="font-size: 0.8em;">
                                                <td><input type="text" id="product" name="product" value="<?php echo $rowB['product']; ?>" autocomplete="off" readonly></td>
                                                <td><input type="text" id="amount" name="amount" value="<?php echo $rowB['amount']; ?>" autocomplete="off" readonly></td>
                                                <td><input type="text" id="unit" name="unit" value="<?php echo $rowB['unit']; ?>" autocomplete="off" readonly></td>
                                                <td><input type="text" id="price" name="price" value="<?php echo $rowB['price']; ?>" autocomplete="off" readonly></td>
                                                <td hidden="on"><input type="text" id="request_ID" name="request_ID" value="<?php echo $rowB['request_ID']; ?>" autocomplete="off"></td>
                                                <td hidden="on"><input type="text" id="quatation_ID" name="quatation_ID" value="<?php echo $quatation_ID ?>" autocomplete="off"></td>

                                                <td><button type="submit" data-toggle="tooltip" data-placement="right" title="Save product <?php echo $rowB["product"] ?>" class="btn btn-success btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>

                                                    <!-- <td><button type="submit" data-toggle="tooltip" data-placement="right" title="Save product <?php echo $rowB["product"] ?>" href="db_quatation_edit_request_product.php?quatation_ID=<?php echo $quatation_ID; ?>&request_ID=<?php echo $rowB["request_ID"]; ?>&product=<?php echo $rowB['product']; ?>&amount=<?php echo $rowB['amount']; ?>&unit=<?php echo $rowB['unit']; ?>&price=<?php echo $rowB['price']; ?>" onclick="return confirm('Are you sure to save product >> <?php echo $rowB['product']; ?> << ?')" class="btn btn-success  btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> -->

                                                </td>
                                        </form>

                            <?php
                                    }
                                } while ($rowB = sqlsrv_fetch_array($returnedB, SQLSRV_FETCH_ASSOC));
                            }
                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>





            <?php
            //  ถ้า คนที่ login เข้ามาเป็น ผจก ของ user และ status เป็น  Pending (รออนุมัติ) -
            //  ให้แสดงปุ่ม approve ขึ้นมา แต่ถ้าไม่ใช่ ไม่ต้องแสดงปุ่ม  
            if ($approver_user_code === $resultT["EmployeeCode"] && $status == 1) {

            ?>


                <div class=" row" style="margin-top: 20px;">
                    <div class="col-6">

                        <button class="btn btn-block btn-success" form="save-form" id="submit" type="submit" onclick=" return confirm('ยืนยันการบันทึก')"><i class="fa fa-dot-circle-o"></i> Approve</button>
                    </div>
                    <div class="col-6">
                        <a class="btn btn-block btn-danger" href="#" style="width: auto;"><i class="fa fa-times-circle" aria-hidden="true"></i>
                            No Approve</a>

                    </div>
                </div>


        </div>
    <?php } else if ($resultApprovePU["EmployeeCode"] === '1600311' && $status == 2) { ?>

        <form action="db_quatation_edit_approver_pu.php" name="save_approver_pu" id="save_approver_pu" method="post" ENCTYPE="multipart/form-data">

            <div class="row">
                <div class="col-12">
                    <label for="approver_user_code" class="form-select">Purchaser</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="approver_user_code">ผู้จัดซื้อ</label>
                        </div>
                        <select class="custom-select" id="approver_user_code" name="approver_user_code" required>
                            <option selected>เลือกผู้จัดซื้อ...</option>


                            <option value="<?php echo $resultPurchase["EmployeeCode"]; ?>">
                                <?php echo $resultPurchase["ThFullName"]; ?> </option>

                        </select>
                    </div>
                </div>
            </div>

            <div class=" row" style="margin-top: 20px;">
                <div class="col-6">

                    <button class="btn btn-block btn-success" form="save-form" id="submit" type="submit" onclick=" return confirm('ยืนยันการบันทึก')"><i class="fa fa-dot-circle-o"></i> Approve</button>
                </div>
                <div class="col-6">
                    <a class="btn btn-block btn-danger" href="#" style="width: auto;"><i class="fa fa-times-circle" aria-hidden="true"></i>
                        No Approve</a>

                </div>
            </div>

<?php
            }
        } while ($resultApprovePU = sqlsrv_fetch_array($ApprovePU, SQLSRV_FETCH_ASSOC));
    }  ?>
<?php
include("connect.php");

if (isset($_POST["num_req"])) {


    // echo "<pre>";
    // print_r($_POST);
    // print_r($_FILES);
    // echo "</pre>";


    if (isset($_POST["product"]) && isset($_POST["amount"]) && isset($_POST["unit"])) {
        $product = $_POST["product"];
        $amount = $_POST["amount"];
        $unit = $_POST["unit"];


        if ($product[0] !== '' && $amount[0] !== '' && $unit[0] !== '') {
            $employee_code_request = $_POST['employee_code_request'];
            $name_request = $_POST['name_request'];
            $department = $_POST['department'];
            $tel = $_POST['tel'];
            $email = $_POST['email'];

            $date = $_POST["datepicker"];
            $time = strtotime($date);
            $datepicker = date('Y/m/d', $time);

            $comment_user = $_POST['comment'];
            $num_req = $_POST['num_req'];
            $approver_user_code = $_POST['approver_user_code'];

            echo $approver_user_code;

            $sqlT = "SELECT * FROM vw_Employee where EmployeeCode = '$approver_user_code'";
            $queryT = sqlsrv_query($conn, $sqlT);
            $resultT = sqlsrv_fetch_array($queryT, SQLSRV_FETCH_ASSOC);
            $approver_user_nameTH = $resultT['ThFullName'];
            echo "<script>alert( $approver_user_nameTH );</script>";

            for ($count = 0; $count < count($product); $count++) {
                $product_keep = $product[$count];
                $amount_keep = $amount[$count];
                $unit_keep = $unit[$count];

                $sql2 = "INSERT INTO request_product 
                (product,amount,unit,num_req) 
                VALUES 
                ('$product_keep','$amount_keep','$unit_keep','$num_req')";
                sqlsrv_query($conn, "SET NAMES UTF8");
                $query2 = sqlsrv_query($conn, $sql2);
            }




            $sql = "INSERT INTO quatation (employee_code_request,name_request,department,tel,email,date_time_stamp,date_picker,comment_user,num_req,approver_user_code,approver_user_nameTH,status) VALUES ('$employee_code_request','$name_request','$department','$tel','$email',GETDATE(),'$datepicker','$comment_user','$num_req','$approver_user_code','$approver_user_nameTH','1')";
            sqlsrv_query($conn, "SET NAMES UTF8");
            $query = sqlsrv_query($conn, $sql);


            if ($query) {
                echo '  Data have been add Succesfully.';
                if ($query2) {
                    echo '  Data product have been add Succesfully.';
                } else {


                    echo "<script>alert(''Error: ' . $sql1 . '<br>' . sqlsrv_errors($conn)');</script>";
                }



                // echo "<script type='text/javascript'>";
                // 
                // echo "</script>";
            } else {

                echo "Error: " . $sql . "<br>" . sqlsrv_errors($conn);


                //save_logfile($con,'ADD','Error ADD Contact Person ['.$sql_add_cp.']',$name);
            }
        } else {

            echo 'กรุณาเพิ่ม รายการสินค้า , จำนวน ,หน่วยนับ ให้ครบถ้วน';
        }
    } else {

        echo 'กรุณาเพิ่ม รายการสินค้า , จำนวน ,หน่วยนับ ให้ครบถ้วน';
    }
}

// if (isset($_POST["submit"])) {

//     print_r($_POST);
//     print_r($_FILES);

//     $target_dir = "document/";
//     $target_file = $target_dir . basename($_FILES["file_pdf"]["name"]);
//     $uploadOk = 1;
//     $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

//     // Check if image file is a actual image or fake image
//     // if (
//     //     $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//     //     && $imageFileType != "gif"
//     // ) {
//     //     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//     //     $uploadOk = 0;
//     // }

//     if (
//         $imageFileType != "pdf"
//     ) {
//         echo "Sorry, only PDF files are allowed.";
//         $uploadOk = 0;
//     }




//     $check = filesize($_FILES["file_pdf"]["tmp_name"]);
//     if ($check !== false) {
//         echo "File is an pdf - " . $check["mime"] . ".";
//         $uploadOk = 1;

//         }
//     } else {
//         echo "File does not exist.";
//         $uploadOk = 0;
//     }
// }

// // Check if file already exists
// if (file_exists($target_file)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }

exit;
//*** Reject user not online

sqlsrv_close($conn);

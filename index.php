<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

<head>
  <!-- Required meta tags-->
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

<body class="animsition" style="overflow:hidden">
  <div class="page-wrapper">
    <div class="page-content--bge5" style="  
  background-image: url('images/closeup-people-using-digital-tablet.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 120%;
  overflow-y: hidden;
 
  

  ">

      <div class="container" style="  height: 100%; 
  ">
        <div class="login-wrap" style=" max-width: 600px; ">
          <div class="login-content" style="box-shadow: 5px 10px 18px #888888;">
            <div class="login-logo">
              <a href="#">
                <h2>Request for quotation</h2>
              </a>

              <h4 style="margin-top: 10px;"><span id="typed"></span></h4>
            </div>
            <div class="login-form">
              <form action="loginclass.php" method="post">
                <div class="form-group">






                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user"></i>
                    </div>
                    <!-- <input type="text" id="username" name="username" placeholder="Username" class="form-control"> -->
                    <input class="form-control" type="Username" name="Username" placeholder="Username" required>
                  </div>



                  <!-- <label>Username</label>
                  <input class="au-input au-input--full" type="Username" name="Username" placeholder="Username"> -->
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-key" aria-hidden="true"></i>

                    </div>
                    <!-- <input type="password" id="password" name="password" placeholder="Password" class="form-control"> -->
                    <input class="form-control" type="Password" name="Password" placeholder="Password" required>

                    <!-- <label>Password</label>
                  <input class="au-input au-input--full" type="Password" name="Password" placeholder="Password"> -->
                  </div>
                </div>


                <button class="au-btn au-btn--block au-btn--blue m-b-20  " style="letter-spacing: 2px;" type="submit">Login</button>
                <div>
                  <p style="font-family: Arial, Helvetica, sans-serif; font-size: small; color:darkslategray">** การ Login เข้าใช้งานโปรแกรมให้ใช้ Username และ Password เดียวกับการเข้าใช้งานคอมพิวเตอร์</p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Jquery JS-->
  <script src="vendor/jquery-3.2.1.min.js"></script>
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
  <script src="vendor/select2/select2.min.js"></script>

  <script src="vendor/typedjs/typed.min.js"></script>

  <script>
    $(function() {
      $("#typed").typed({
        strings: [
          "Login",
          "All Request quotation",
          "All Works",
          "All Purchasing",
          "by IT@Thaisummit Autopart",

        ],
        typeSpeed: 20,
        // time before typing starts
        startDelay: 1200,
        // backspacing speed
        backSpeed: 20,
        // time before backspacing

        // loop
        loop: true,
        shuffle: true
      })
    })
  </script>





  <!-- Main JS-->
  <script src="js/main.js"></script>

</body>


</html>
<!-- end document-->
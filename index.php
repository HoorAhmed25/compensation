<?php  session_start();?>
<html dir="rtl">

<head>
    <title>وزارة الصحة و السكان المصرية</title>

    <meta charset="UTF-8">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="css/stylesheet.css">


</head>

<body style="background-color:#eeeeee; color : #000428">
 <nav>
    <div class="row">
      <div class="col-1 pt-2 "><img src="img/Ministry_of_Health_and_Population_of_Egypt.png" class="img-fluid" style="height:90px;" /></div>
            <div class="col-2">
             <h6 class="text-white d-inline" style=" font-weight: bold;">
                  <br>جمهورية مصر العربية
                 <br>وزارة الصحة و السكان
              
                </h6>
            </div>
  
        <div class="col-6"></div>
         <div class="col-3 pt-1"><img src="img/logo2.jpg" class="img-fluid" style="height:70px;" /></div>
    </div>
  </nav>
    <div class="card-body container WOW fadeIn text-center">
        <h4 class="text-center"> صندوق التعويضات عن مخاطر المهن الطبية </h4>
        <form name="login" action="" method="POST">
            <div class="form-group pt-3">
                <input name="username" type="text" class="form-control" placeholder="اسم المستخدم" required
                    autocomplete="off"><br>

                <input name="password" type="password" class="form-control" placeholder="**********" required
                    autocomplete="off"><br>

                <button class="btn btn-lg text-white submitButton" type="submit" name="loginUser">دخول</button>
            </div>
        </form>

    </div>

    <?php

         
    require_once 'connection.php';
  if(isset($_POST['loginUser'])){
      $username = $_POST['username'];
        $password = $_POST['password'];
        $ins="SELECT * FROM user WHERE username = '$username' AND password = '$password' limit 1";
        $query= mysqli_query($conn,$ins) or die("error:".mysqli_error($conn));
        $result = mysqli_fetch_array($query);
         $permission = $result['permission'];
         $_SESSION['username'] = $username;
         $_SESSION['userLogin'] = "Loggedin";
        if(mysqli_num_rows($query)==1){
          if($permission == 1){
              
             echo '<script type="text/javascript">';echo'window.location.href="hospital/home.php";';echo '</script>';
            
          }
            
           elseif($permission == 6){
             
                echo '<script type="text/javascript">';echo'window.location.href="admin/users.php";';echo '</script>';
               
           } 
            elseif($permission == 5){
             
                echo '<script type="text/javascript">';echo'window.location.href="sandok/followup.php";';echo '</script>';
               
           } 
               elseif($permission == 3){
             
                echo '<script type="text/javascript">';echo'window.location.href="ta2meensehy/inquery.php";';echo '</script>';
               
           }
                elseif($permission == 4){
             
                echo '<script type="text/javascript">';echo'window.location.href="magles/inquery.php";';echo '</script>';
               
           }
            elseif($permission == 2){
             
                echo '<script type="text/javascript">';echo'window.location.href="moderya/inquery.php";';echo '</script>';
               
           }
           } 
        else {
          echo "<script type='text/javascript'>alert('اسم المستخدم او كلمة السر خطأ');</script>";
        
        }

 }
   
    
       ?>
    <footer style="position:fixed; margin-top:3px;">
        <p style="font-size:19px;"> &copy; 2021 جميع الحقوق محفوظة لوزارة الصحة و السكان. </p>

    </footer>


    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script>
    new WOW().init();
    </script>
    <script src="js/mine.js"></script>
</body>

</html>
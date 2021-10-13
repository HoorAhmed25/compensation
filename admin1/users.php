<?php session_start(); require_once '../connection.php';?><html dir="rtl">

<head>
  <title>وزارة الصحة و السكان المصرية</title>

  <meta charset="UTF-8">
  <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="../css/all.min.css">
  <link rel="stylesheet" href="../css/animate.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/font-awesome.min.css">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/stylesheet.css">
  <style>
  p {
    font-size: 27px;
    font-weight: 400;
  }

  .card-body {
    margin-top: 40px;
    padding-top: 10px;
    margin-bottom: 50px;
    width: 70%;
    background-color: white;
    border: solid 2px gray;
    border-radius: 20px;
    box-shadow: 1px 2px 1px 2px #888888;

  }

  .card-body:hover {
    box-shadow: 3px 4px 3px 4px #888888;
  }





  h5,
  label {
    font-size: 16px;
     !important font-weight: bold;
  }
  </style>
</head>

<body style="background-color:#eeeeee;">
  <nav>
    <div class="row">
      <div class="col-2 pt-2 "><img src="../img/logo.png" class="img-fluid" style="height:100px;" /></div>
      <div class="col-8"></div>
      <div class="dropdown show d-inline h3">
        <a class="h4 dropdown-toggle float-left ml-4 mt-4 text-white" href="#" role="button" id="dropdownMenuLink"
          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $_SESSION['username']; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item text-center" href="../index.php">تسجيل خروج</a>
        </div>
      </div>
    </div>
  </nav>
  <div class="card-body container WOW fadeIn text-right" style="margin-top: 100px; height:350px; width:50%;">
    <h2 class="heading text-center mb-5 ">إضافة مستخدم</h2>
    <form name="login" action="" method="POST">

      <div class="row pr-3">
        <div class="col-4  mb-3">
          <label for="username">اسم المستخدم:</label><br>
          <input type="text" name="username" class="form-control w-75" required>
        </div>
        <div class="col-4 mb-3">
          <label for="password">كلمة السر:</label><br>
          <input type="password" name="password" class="form-control w-75" required>
        </div>
          
        <div class="col-4  mb-3">
          <label for="follow">تبعية المستشفى:</label><br>
          <select name="follow" id="follow" class="form-control w-75">
            <option>--اختر--</option>
            <option value="التأمين الصحى">التأمين الصحى</option>
            <option value="المستشفيات التعليمية">المستشفيات التعليمية </option>
            <option value="المستشفيات الجامعية">المستشفيات الجامعية </option>
            <option value="المؤسسة العلاجية">المؤسسة العلاجية </option>
            <option value="امانة المراكز الطبية">امانة المراكز الطبية </option>
             <option value="مديرية الشئون الصحية">مديرية الشئون الصحية </option> 
          </select>
        </div>
        </div>
        <div class="row pr-3">
        <div class="col-4  mb-3">
          <label for="hospital">المستشفي:</label><br>
          <input type="text" name="hospital" class="form-control w-75" required>
        </div>
        
        <div class="col-4  mb-3">
          <label for="governorates">المحافظة:</label><br>
               <select name="governorates" id="governorates" class="form-select w-75  form-control" required>
                <option>--اختر--</option>
                <?php
      
       $query= "select DISTINCT name from governorate";
       $do= mysqli_query($conn,$query)or die('error'.mysqli_error($conn));
       while($row=mysqli_fetch_array($do)){
      echo '<option value="'.$row['name'].'"  "selected">'.$row['name'].'</option>';
       }
       ?>
              </select>
        </div>
        <div class="col-4">
          <label for="permission">الصلاحيات:</label>
          <select name="permission" id="permission" class="form-control w-75">
            <option>--اختر--</option>
            <option value="1">مستشفى</option>
            <option value="2">مديرية </option>
            <option value="3">تأمين صحي </option>
            <option value="4">المجالس الطبية </option>
            <option value="5">صندوق التعويضات </option>
          </select>
            </div>
           
    </div>
      <div class="row pr-3">
        <div class="col-2">
          <button class="btn btn-lg text-white submitButton mt-4 " type="submit" name="submitUser"
            style="margin-right:10px; padding-top:5px; padding-bottom:5px;">تسجيل</button>
        </div>
      </div>

       
    </form>
  </div>






  <?php
 
    
    if(isset($_POST['submitUser'])){
      $username = $_POST['username'];
        $password = $_POST['password'];
        $permission = $_POST['permission'];
        $follow = $_POST['follow'];
        $hospital = $_POST['hospital'];
        $governorates = $_POST['governorates'];
        
        $check_duplicate_username = "SELECT username FROM users WHERE username = '$username'";
        $result = mysqli_query($conn,$check_duplicate_username);
        $count = mysqli_num_rows($result);
        if($count > 0){
            echo '<script type="text/javascript">';
     echo ' alert("اسم مستخدم موجود سابقاً ، برجاء كتابة اسم اخر");';
    echo '</script>';
        
        }
       
                   $ins="INSERT INTO user(permission,username,password,follow,hospital,gov) VALUES ('$permission','$username','$password','$follow','$hospital','$governorates')";
$query= mysqli_query($conn,$ins) or die("error:".mysqli_error($conn));
        if($query) 
{  
   echo '<script type="text/javascript">';
     echo ' alert("تم إضافة المستخدم");';
   
    echo '</script>';
}
else {
     echo '<script type="text/javascript">';
     echo ' alert("عفواً! لم يتم التسجيل");';
    echo'window.location.href="users.php";';
    echo '</script>';

}
       
        
   }
    
    
    ?>

  <footer style="position:fixed; margin-top:2px;">
    <p style="font-size:19px;"> &copy; 2021 جميع الحقوق محفوظة لوزارة الصحة و السكان المصرية. </p>

  </footer>
  <script>
  var x = 170;
  var y = 170 % 11;
  console.log(y);
  </script>
  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/wow.min.js"></script>
  <script>
  new WOW().init();
  </script>
  <script src="../js/mine.js"></script>
</body>

</html>
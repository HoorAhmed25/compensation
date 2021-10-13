

<?php session_start();include '../connection.php';?><html dir="rtl">

<head>
  <title>وزارة الصحة و السكان المصرية</title>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="../img/Ministry_of_Health_and_Population_of_Egypt.png" type="image/x-icon">
  <link rel="stylesheet" href="../css/all.min.css">
  <link rel="stylesheet" href="../css/animate.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/stylesheet.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <script src="../js/jquery-3.3.1.min.js"></script>
  <style>
  label {
    font-size: 20px;
  }
      
   
  </style>

</head>

<body style="color:black;">
     <nav>
    <div class="row">
      <div class="col-1 pt-2 "><img src="../img/Ministry_of_Health_and_Population_of_Egypt.png" class="img-fluid" style="height:100px;" /></div>
            <div class="col-2">
             <h6 class="text-white d-inline" style=" font-weight: bold;">
                  <br>جمهورية مصر العربية
                 <br>وزارة الصحة و السكان
              
                </h6>
            </div>
      
      <div class="dropdown show d-inline h3 col-4">
        <a class="h4 dropdown-toggle float-left ml-4 mt-4 text-white" href="#" role="button" id="dropdownMenuLink"
          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $_SESSION['username']; ?>
        </a>
            <div class="dropdown-menu float-left" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item text-center " href="../index.php">تسجيل خروج</a>
    
  </div>
      </div>
        <div class="col-2"></div>
         <div class="col-3 pt-1"><img src="../img/logo2.jpg" class="img-fluid" style="height:90px;" /></div>
    </div>
  </nav>
    <div class="title text-center text-dark border-bottom mb-3">
    <h3 class="heading pt-3 pb-2">الإدارة المركزية للجان الطبية للهيئة العامة للتأمين الصحى </h3>
    
  </div>
    <?php
if(isset($_POST['confirm'])){
    $id = $_POST['edit_id'];
    $sql= "select * from deathinfo where ID ='$id'";
    $query= mysqli_query($conn,$sql) or die("error:".mysqli_error($conn));
    $result = mysqli_fetch_array($query);
    if($result['type'] == 'وفاة'){?>
        
   
  <section class="container mt-5" id="result">
    <h4 class="container-fluid headOfPersonal mb-0 pb-0" style="background-image: linear-gradient(to right, #000428, #004e92);">البيانات الأساسية
      <p class="mt-1 h3" id="showHide" onclick="toggleForm()">
        <i class="fas fa-chevron-up"></i>
      </p>
    </h4>

    <form name="Info" method="post" action="" enctype="multipart/form-data">
      <section class="mb-4">
        <div id="form-container" class="container">
          


          <div class="row">
  <div class="form-check col-3">
                <label class="form-check-label pt-2 pl-2">نوع الحالة : </label>
               <input class="form-control " type="text" name="type" id="death" value="<?php echo $result['type']?>" readonly >

            </div>
            <div id="national" class="mb-3 col-3">
              <label for="nationalId" class="form-label">الرقم القومى :</label>
            <input class="form-control " type="text" name="nationalId" id="nationalId" value="<?php echo $result['nationalId']?>" readonly >
            </div>

            <div class="mb-3 col-4">
              <label for="uname" class="form-label"> الاسم رباعي :</label>
              <input class="form-control " type="text" name="uname" id="uname" value="<?php echo $result['uname']?>" readonly >

            </div>

            <div id="deathdate" class="mb-3 col-2">
              <label id="dateofdeathlbl" for="dateofdeath" class="form-label">تاريخ الوفاة :</label>
              <input class="form-control " type="text" name="dateofdeath" id="dateofdeath" value="<?php echo $result['dateofdeath']?>" readonly >
            </div>
            </div>
            


          <div class="row">
            <div class="form-check col-3">
              <label class="form-check-label pt-2 pl-2">النوع : </label>
              <input class="form-control " type="text" name="gender" id="gender" value="<?php echo $result['gender']?>" readonly >
            </div>
              
              
               <div id="workplaceDIV" class="mb-3 col-4">
              <label for="workingplace" class="form-label">جهة العمل :</label>
           <input class="form-control " type="text" name="workingplace" id="workingplace" value="<?php echo $result['workingplace']?>" readonly >
            </div>
            <div id="worknameDIV" class="mb-3 col-3">
              <label for="workingname" class="form-label">المسمي الوظيفي :</label>
        <input class="form-control " type="text" name="workingname" id="workingname" value="<?php echo $result['workingname']?>" readonly >
            </div>  
          </div>

              <div class="row">
            <div id="gov" class="mb-3 col-3">
              <label for="gov" class="form-label"> محافظة السكن :</label>
            <input class="form-control " type="text" name="governorates" id="governorate" value="<?php echo $result['governorates']?>" readonly >
                  </div>
                  
                    <div id="deathresDIV" class="mb-3 col-4" style="display:block;">
              <label id="questionlbl" for="question" class="form-label"> هل الوفاة تمت بسبب مزاولة المهنة :</label>
           <input class="form-control " type="text" name="question" id="question" value="<?php echo $result['question']?>" readonly >
            </div>
                  

                   <div id="workdeathDIV" class="mb-3 col-4" style="display:block;">
              <label id="questiondlbl" for="questiond" class="form-label"> هل الوفاة تمت و هو علي رأس العمل :</label>
             <input class="form-control " type="text" name="questiond" id="questiond" value="<?php echo $result['questiond']?>" readonly >
            </div>
                 
                  
            </div>

 <div class = "row">
        <div class="mb-3 col-3">
              <label for="address" class="form-label "> العنوان بالتفصيل  :</label>
             <input class="form-control " type="text" name="address" id="address" value="<?php echo $result['address']?>" readonly >

                    
            </div>
                  <div class="mb-3 col-4">
            <label for="phone" class="form-label">رقم التواصل 1  :</label>
           <input class="form-control " type="text" name="phone" id="phone" value="<?php echo $result['phone']?>" readonly >
          </div>
         

                 <div class="mb-3 col-4">
            <label for="phone" class="form-label">رقم التواصل 2 :</label>
           <input class="form-control " type="text" name="mobile" id="mobile" value="<?php echo $result['landnum']?>" readonly >
          </div>
        
            
             
            </div>
            <hr>
            <section>
             <h4 class="container-fluid headOfPersonal mb-0 pb-0" style="background-image: linear-gradient(to right, #000428, #004e92);">المرفقات
      <p class="mt-1 h3" id="showHide" onclick="toggleForm()">
        <i class="fas fa-chevron-up"></i>
      </p>
    </h4>

            
            
               <div class="row mr-3">
              <div class="mb-3 col-6" id="certDiv">
                   <label class="mt-1" for="report">اصل شهادة الوفاة كمبيوتر : :</label><br>
             <img src="<?php echo $result['cert']?>" class="img-fluid" style="height:150px;">
            </div>
              
              <div class="mb-3 col-6">
             <label class="mt-1" for="report">تقرير فني طبي :</label><br>
				 <img src="<?php echo $result['report']?>" class="img-fluid" style="height:150px;">
            </div>
              
                </div>
                <div class="row mr-3">
              <div class="mb-3 col-6">
             <label class="mt-1" for="tests">تحاليل :</label><br>
				 <img src="<?php echo $result['tests']?>" class="img-fluid" style="height:150px;">
            </div>
              
              <div class="mb-3 col-6">
             <label class="mt-1" for="medradio">الأشعة الطبية :</label><br>
				 <img src="<?php echo $result['medradio']?>" class="img-fluid" style="height:150px;">
            </div>
              
    </div>
                <hr>
                          <h4 class="container-fluid headOfPersonal mb-0 pb-0" style="background-image: linear-gradient(to right, #000428, #004e92);"> المرفقات الإضافية
      <p class="mt-1 h3" id="showHide" onclick="toggleForm()">
        <i class="fas fa-chevron-up"></i>
      </p>
    </h4>      
  <div class="row mr-3">

                     
                  <div class="mb-3 col-3">
            <label for="certph" class="form-label">رقم شهادة وفاة مخاطر المهن الطبية :</label>
            <input type="certph" class="form-control " name="certph" id="certph" onkeypress="return isNumberKey(event)"
              maxlength="11" autocomplete="off" required>
          </div>
          
          
          
          
            <div id="date" class="mb-3  col-3">
              <label for="date" class="form-label">تاريخ شهادة وفاة مخاطر المهن الطبية :</label>
              <input type="date" class="form-control  " name="date"   autocomplete="off" required>
            </div>

            
            <div class="mb-3 col-4">
             <label class="mt-1" for="attcert"> شهادة وفاة مخاطر المهن<br> الطبية :</label>
				<input type="file" id="attcert" name="attcert" required>
            </div>
          </div>
</section>
        </div>
      </section>
        
             
      <button class="btn btn-lg text-white submitButton" type="submit" name="submit">إضافة </button>
      <button class="btn btn-lg  backButton" type="button" name="back">
        <a href="inquery.php">رجوع</a></button>
        
         </form>
    </section>
        <?php
         }}
    
    if(isset($_POST['submit'])){
        $ID = $_POST['nationalId'];
        $certph = $_POST['certph'];
        $date = $_POST['date'];
        $fileattcert = $_FILES['attcert'];
$fileNameattcert = $_FILES['attcert']['name'];
$fileTemNameattcert = $_FILES['attcert']['tmp_name'];
$fileSizeattcert = $_FILES['attcert']['size'];
$fileErrorattcert = $_FILES['attcert']['error'];
$fileTypeattcert = $_FILES['attcert']['type'];
$fileExtattcert = explode('.', $fileNameattcert);
$fileActualExtattcert = strtolower(end($fileExtattcert));
$allowedattcert= array ('jpg','jpeg','png');
   if(in_array($fileActualExtattcert, $allowedattcert)){
     if($fileErrorattcert === 0){
        if($fileSizeattcert < 1000000){
            $fileNameNewattcert = uniqid('',true).".".$fileActualExtattcert;
            $fileDestinationattcert = '../attach/'.$fileNameNewattcert;
            move_uploaded_file($fileTemNameattcert, $fileDestinationattcert);
             
            
                 }
            else {
                echo "size error!!";
                }
            } 
        else{
            echo "there was an error to upload img";
            }
        }
    else {
        echo "Error to upload!!";
        }
        
        
$ins = "UPDATE deathinfo SET certph = '$certph', certDate = '$date', attcert = '$fileDestinationattcert', status = 'صندوق' WHERE nationalID = '$ID';";
$query= mysqli_query($conn,$ins) or die("error:".mysqli_error($conn));
if($query) 
{ 
 echo '<script type="text/javascript">';
     echo ' alert("تم الإضافة بنجاح");';
    echo '</script>';
  echo '<script type="text/javascript">';echo'window.location.href="inquery.php";';echo '</script>';
}
else {
    echo '<script type="text/javascript">';
     echo ' alert("عفواً! لم يتم الإضافة برجاء المحاولة مره اخرى");';
    echo '</script>';
    echo '<script type="text/javascript">';echo'window.location.href="inquery.php";';echo '</script>';
}
    }
    
    
    
    ?>
     

  
          
          
  <footer style="margin-top:3px;background-image: linear-gradient(to right, #000428, #004e92);">
    <p style="font-size:19px;"> &copy; 2021 جميع الحقوق محفوظة لوزارة الصحة و السكان المصرية. </p>

  </footer>


  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/wow.min.js"></script>
  <script>
  new WOW().init();
  </script>
  <script src="../js/mine.js"></script>

    </body>
</html>
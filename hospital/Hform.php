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

<body style="color:black;" >
    <nav>
    <div class="row">
      <div class="col-1 pt-2 "><img src="../img/Ministry_of_Health_and_Population_of_Egypt.png" class="img-fluid" style="height:90px;" /></div>
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
         <div class="col-3 pt-1"><img src="../img/logo2.jpg" class="img-fluid" style="height:70px;" /></div>
    </div>
  </nav>


  <div class="title text-center text-dark border-bottom mb-3">
    <h2 class="heading">بيانات تعريفية خاصة بمستحق التعويض</h2>
    <p style="font-size: 18px; color:red;">* إدخل جميع البيانات المطلوبة في الحقول</p>
  </div>
    
    
    
            <?php 
            $uname = $_SESSION['username'];
        $user = "SELECT * FROM user WHERE username = '$uname'";
       $query = mysqli_query( $conn,$user) or die('error:'.mysqli_error($conn));
       $result = mysqli_fetch_array($query);
$gov = $result['gov'];
$hospital = $result['hospital'];
$follow = $result['follow'];
            ?>

    
    
    
    
    
    
  <section class="container" id="result">
    <form name="Info" method="post" action="register.php" enctype="multipart/form-data">
          <div class="row">
            <div class="col-3">
            <h4>المحافظة : <?php echo $gov;?></h4>
            </div>
            
             <div class="col-3 ">
            <h4>مستشفى : <?php echo $hospital;?></h4>
            </div>
             <div class="col-5 ">
            <h4>تبعية المستشفى : <?php echo $follow;?></h4>
            </div>
            </div>
          <h4 class="container-fluid headOfPersonal mb-0 pb-0" style="background-image: linear-gradient(to right, #000428, #004e92);">البيانات الأساسية
      <p class="mt-1 h4" id="showHide" onclick="toggleForm()">
        <i class="fas fa-chevron-up"></i>
      </p>
    </h4>
      <section class="mb-4">
          <input type="text" name="workingplace" value="<?php echo $hospital;?>" style="display:none;">
        <div id="form-container" class="container">
            <div class="row">
             <div class="col-5 mr-3 pt-2 font-weight-bold"><p class="text-right"><?php echo " تاريخ تسجيل الطلب  : " . date("Y/m/d"); ?></p></div>
            <div class="form-check col-6">
                <label class="form-check-label pt-2 pl-2">نوع الحالة : </label>
               <input onchange="caseCheck()" type="radio" name="type" id="death" value="وفاة" checked >
                <label class="ml-3"  for="death"> وفاة </label>
              <input onchange="caseCheck()" type="radio" name="type" id="impo" value="مصاب بالعجز">
             <label for="impo">مصاب بالعجز </label>
            </div>
                </div>
<input type="text" class="form-control" style="display:none;" name="governorate" id="governorate" value="<?php echo $gov;?>">
<input type="text" class="form-control" style="display:none;" name="follow" id="follow" value="<?php echo $follow;?>">
             <input type="text" class="form-control" style="display:none;" name="hospital" id="hospital" value="<?php echo $hospital;?>">
          <div class="row">

            <div id="national" class="mb-3 col-3">
              <label for="nationalId" class="form-label">الرقم القومى :</label>
              <input type="text" class="form-control" name="nationalId" id="nationalId" maxlength="14"
                autocomplete="off" onkeypress="return isNumberKey(event)" onchange="validationID()" required>
              <p id="idError" style="display:none; color:red;">*خطأ فى الرقم القومى</p>
            </div>

            <div class="mb-3 col-4">
              <label for="uname" class="form-label"> الاسم رباعي :</label>
              <input type="text" class="form-control " name="uname" id="uname" maxlength="50" autocomplete="off"
                required>

            </div>

            <div id="deathdate" class="mb-3 col-3">
              <label id="dateofdeathlbl" for="dateofdeath" class="form-label">تاريخ الوفاة :</label>
              <input type="date" class="form-control" name="dateofdeath"   autocomplete="off" required>
            </div>
            </div>
            


          <div class="row">
            <div class="form-check col-3">
              <label class="form-check-label pt-2 pl-2">النوع : </label>
              <input type="radio" name="gender" id="male" value="ذكر">
              <label class="ml-3" for="male"> ذكر </label><br>
              <label class="form-check-label pl-2" style="visibility:hidden;">النوع : </label>
              <input type="radio" name="gender" id="female" value="أنثى">
              <label for="female">أنثى</label>
            </div>
              
              
             
              
            <div id="worknameDIV" class="mb-3 col-3">
              <label for="workingname" class="form-label">المسمي الوظيفي :</label>
              <select name="workingname" id="working" class="form-select   form-control" required>
                <option>--اختر--</option>
                <option value="طبيب بشري">طبيب بشري</option>
                <option value="طبيب أسنان">طبيب أسنان</option>
                <option value="طبيب صيدلي">طبيب صيدلي</option>
                <option value="طبيب بيطري">طبيب بيطري</option>
                <option value=" أخصائي علاج طبيعي">أخصائي علاج طبيعي </option>
                <option value="أخصائي تمريض عالي">أخصائي تمريض عالي</option>
                <option value="كيميائي">كيميائي</option>
                <option value="الفيزيقيين">الفيزيقيين</option>
                <option value="دبلوم فني تمريض">دبلوم فني تمريض</option>
                <option value="دبلوم فني صحيين">دبلوم فني صحيين</option>
              </select>
            </div>  
          </div>

              <div class="row">
            <div id="gov" class="mb-3 col-3">
              <label for="gov" class="form-label"> محافظة السكن :</label>
              <select name="governorates" id="governorates" class="form-select   form-control" required>
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
                    <div id="deathresDIV" class="mb-3 col-4" style="display:block;">
              <label id="questionlbl" for="question" class="form-label"> هل الوفاة تمت بسبب مزاولة المهنة :</label>
              <select name="question" id="question" class="form-select  w-75 form-control" required>
                <option>--اختر--</option>
                  
                <option value="نعم">نعم</option>
                <option value="لا">لا</option>

                  
                       </select>
            </div>
                  

                   <div id="workdeathDIV" class="mb-3 col-4" style="display:block;">
              <label id="questiondlbl" for="questiond" class="form-label"> هل الوفاة تمت و هو علي رأس العمل :</label>
              <select name="questiond" id="questiond" class="form-select  w-75 form-control" required>
                <option>--اختر--</option>
                  
                      
                <option value="نعم">نعم</option>
                <option value="لا">لا</option>

                       </select>
            </div>
                 
                  
            </div>

 <div class = "row">
        <div class="mb-3 col-3">
              <label for="address" class="form-label "> العنوان بالتفصيل  :</label>
              <input type="text" class="form-control " name="address" id="address" maxlength="50" autocomplete="off"
                required>

                    
            </div>
                  <div class="mb-3 col-4">
            <label for="phone" class="form-label">رقم التواصل 1  :</label>
            <input type="phone" class="form-control w-75 " name="phone" id="phone" onkeypress="return isNumberKey(event)"
              maxlength="11" autocomplete="off" required>
          </div>
         

                 <div class="mb-3 col-4">
            <label for="phone" class="form-label">رقم التواصل 2 :</label>
            <input type="phone" class="form-control w-75 " name="mobile" id="mobile" onkeypress="return isNumberKey(event)"
              maxlength="11" autocomplete="off">
          </div>
        
            
             
            </div>
          </div>
            </section>
            <hr>
            
            <section>
             <h4 class="container-fluid headOfPersonal mb-0 pb-0" style="background-image: linear-gradient(to right, #000428, #004e92);">المرفقات
      <p class="mt-1 h4" id="showHide" onclick="toggleForm()">
        <i class="fas fa-chevron-up"></i>
      </p>
    </h4>

           <div id="form-container" class="container"> 
               <div class="row mr-3">
              <div class="mb-3 col-3" id="certDiv">
             <label for="Cert"> شهادة الوفاة كمبيوتر :</label><br><br>
				<input type="file" id="cert" name="cert">
            </div>
              
              <div class="mb-3 col-3">
             <label class="mt-1" for="report">تقرير فني طبي :</label><br><br>
				<input type="file" id="report" name="report" required>
            </div>
              
              
              <div class="mb-3 col-3">
             <label class="mt-1" for="tests">تحاليل :</label><br><br>
				<input type="file" id="tests" name="tests" required>
            </div>
              
              <div class="mb-3 col-3">
             <label class="mt-1" for="medradio">الأشعة الطبية :</label><br><br>
				<input type="file" id="medradio" name="medradio" required>
            </div>
              
    </div>
            <div class="row mr-3">
                <button class="btn" id="pdf1" style="display:none;"><a href="%D9%86%D9%85%D9%88%D8%B0%D8%AC%20%D9%85%D9%86%20%D8%A7%D9%84%D9%85%D8%AC%D9%84%D8%B3%20%D9%84%D9%84%D8%A7%D8%AF%D8%A7%D8%B1%D8%A9%20%D8%A7%D9%84%D8%B9%D8%A7%D9%85%D8%A9.pdf" target="_blank"> نموذج من المستشفى للمجالس الطبية</a></button>
                
                <button class="btn" id="pdf2" style="display:none;"><a href="%D9%86%D9%85%D9%88%D8%B0%D8%AC%20%D9%85%D9%86%20%D8%A7%D9%84%D9%85%D8%B3%D8%AA%D8%B4%D9%81%D9%89%20%D9%84%D9%84%D9%85%D8%AC%D9%84%D8%B3%20%D8%A7%D9%84%D8%B7%D8%A8%D9%8A.pdf" target="_blank"> نموذج من المجالس للإدارة العامة</a></button>
                </div>    
                
                </div>
                
</section>
        <hr>
              <section id="notes">
             <h5 class="container-fluid headOfPersonal mb-0 pb-0" style="background-image: linear-gradient(to right, #000428, #004e92);">خطوات إستخراج شهادة وفاة إصابية
      <p class="mt-1 h5" id="showHide" onclick="toggleForm()">
        <i class="fas fa-chevron-up"></i>
      </p>
    </h5>

           <div id="form-container" class="container"> 
            
                <ol class="pt-3 pb-2" style="font-size:16px;">
               <li>يستوفى نموذج رقم 29 ت.ص من جهة العمل و يقدم للهئية القومية للتأمين الإجتماعى لإعتماده.   </li>
                    <li>صورة بطاقة الرقم القومى. </li>
                    <li>شهادة الوفاة. </li>
                    <li>تقرير طبى مفصل من المستشفى المتوفى بها المصاب. </li>
                     <li>المسحة التى أجريت له بالمستشفى و فى حالة عدم وجود المسحة يؤخذ بالأشعة المقطعية على الرئتين مثبت فيها الإلتهاب الرئوى غير النمطى (Ground glass Patch). </li>
                    <li>نموذج إخطار وقوع إصابة عمل من جهة العمل.</li>
                    <li>و يرسل الملف بعد إستفيائة كاملا إلى اللجنة الطبية حسب الموقع الجغرافى لكل حالة و بعد فحصه يرسل للإدارة المركزية للجان الطبية للعرض على اللجنة الإستشارية العليا للأمراض المهنية و العجز المهنى. </li>
                    <li>يرسل الملف مستوفى كاملا لهيئة التأمين الإجتماعى لإتخاذ اللازم طبقاً للقانون (مرفق به نموذج 29 لجان ت.ص "نموذج طلب إحتساب الوفاة الإصابية")</li>
                    
                    
                    
               </ol>
                </div>
                
</section>
        
    
         
    
        
        
      <button class="btn btn-lg text-white submitButton" type="submit" name="submit"
        onclick="return confirm('هل جميع البيانات صحيحة؟');">حفظ </button>
      <button class="btn btn-lg  backButton" type="button" name="back">
        <a href="home.php">رجوع</a></button>




    </form>
  </section>


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
  <script>
  function validationID() {
    var str = document.getElementById("nationalId").value;
    var res = str.split('');
    var Array = res;
    console.log(res);
    console.log(Array);
    var res1 = Array[0] * 2;
    var res2 = Array[1] * 7;
    var res3 = Array[2] * 6;
    var res4 = Array[3] * 5;
    var res5 = Array[4] * 4;
    var res6 = Array[5] * 3;
    var res7 = Array[6] * 2;
    var res8 = Array[7] * 7;
    var res9 = Array[8] * 6;
    var res10 = Array[9] * 5;
    var res11 = Array[10] * 4;
    var res12 = Array[11] * 3;
    var res13 = Array[12] * 2;
    var res14 = Array[13];
    console.log(res1);
    var totalres = (res1 + res2 + res3 + res4 + res5 + res6 + res7 + res8 + res9 + res10 + res11 + res12 + res13);
    console.log(totalres);
    var x = totalres / 11;
    var out = parseInt(x) * 11;
    var ot = totalres - out;
    console.log(ot);
    var y = 11 - ot;
    console.log(y);
       if(y == 11){
        y = 1;
               console.log("y =" + y); 
    }
    else if(y == 10){
        y = 0
        console.log("y =" + y); 
    } 
    if (res14 == y) {
      document.getElementById("idError").style.display = "none";
    } else {
      document.getElementById("idError").style.display = "block";
      document.getElementById("idError").style.color = "red";
    }
    console.log(Array[12]);
    var check = Array[12] % 2;
    console.log(check);
    if (Array[12] % 2 == 0) {
      document.getElementById("female").checked = true;
      console.log("female");

    } else {
      document.getElementById("male").checked = true;
      console.log("male");
    }
    if (Array[0] == 2) {
      var today = new Date();
      var currentYear = today.getFullYear();
      console.log(currentYear);
      var yearArray = 19 + Array[1] + Array[2];
      var month = Array[3] + Array[4];
      var day = Array[5] + Array[6];
      var birthday = month + '/' + day + '/' + yearArray;
      var age = currentYear - yearArray;
      console.log(age);
      document.getElementById("age").value = age;
      console.log(birthday);
      console.log(yearArray);
    }

    if (Array[0] == 3) {
      var today = new Date();
      var currentYear = today.getFullYear();
      console.log(currentYear);
      var yearArray = 20 + Array[1] + Array[2];
      var month = Array[3] + Array[4];
      var day = Array[5] + Array[6];
      var birthday = month + '/' + day + '/' + yearArray;
      var age = currentYear - yearArray;
      console.log(age);
      document.getElementById("age").value = age;
      console.log(birthday);
      console.log(yearArray);
    }
   
  }
      function caseCheck(){
          if(document.getElementById("impo").checked){
              console.log("impo");
              document.getElementById("dateofdeathlbl").innerHTML = "تاريخ الإصابة بالعجز : ";
              document.getElementById("questionlbl").innerHTML = "  هل العجز تم بسبب مزاولة المهنة : ";
              document.getElementById("questiondlbl").innerHTML = "هل العجز تم و هو علي رأس العمل :"
            document.getElementById("certDiv").style.display = "none";
              document.getElementById("pdf1").style.display = "block";
               document.getElementById("pdf2").style.display = "block";
              document.getElementById("notes").style.display = "none";
              
          }
          else if (document.getElementById("death").checked){
               console.log("death");
               document.getElementById("dateofdeathlbl").innerHTML = " تاريخ الوفاة :";
              document.getElementById("questionlbl").innerHTML = "  هل الوفاة تمت بسبب مزاولة المهنة :";
              document.getElementById("questiondlbl").innerHTML = "هل الوفاة تمت و هو علي رأس العمل :";
              document.getElementById("certDiv").style.display = "block";
               document.getElementById("pdf1").style.display = "none";
               document.getElementById("pdf2").style.display = "none";
              document.getElementById("notes").style.display = "block";
              
          }
      }
  </script>


</body>

</html>
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
    <nav style="background-image: linear-gradient(to right, #000428, #004e92);">
    <div class="row">
      <div class="col-2 pt-2 "><img src="../img/Ministry_of_Health_and_Population_of_Egypt.png" class="img-fluid" style="height:100px;" /></div>
  
    </div>
  </nav>


  <div class="title text-center text-dark border-bottom mb-3">
    <h2 class="heading">بيانات تعريفية خاصة بالمتوفي</h2>
    <p style="font-size: 18px;">إدخل جميع البيانات المطلوبة في الحقول</p>
  </div>
  <section class="container" id="result">
    <h4 class="container-fluid headOfPersonal mb-0 pb-0" style="background-image: linear-gradient(to right, #000428, #004e92);">البيانات الأساسية
      <p class="mt-1 h3" id="showHide" onclick="toggleForm()">
        <i class="fas fa-chevron-up"></i>
      </p>
    </h4>

    <form name="Info" method="post" action="register.php" enctype="multipart/form-data">
      <section class="mb-4">
        <div id="form-container" class="container">


          <div class="row">

            <div id="national" class="mb-3 col-3">
              <label for="nationalId" class="form-label">الرقم القومى :</label>
              <input type="text" class="form-control" name="nationalId" id="nationalId" maxlength="14"
                autocomplete="off" onkeypress="return isNumberKey(event)" onchange="validationID()">
              <p id="idError" style="display:none; color:red;">*خطأ فى الرقم القومى</p>
            </div>

            <div class="mb-3 col-4">
              <label for="uname" class="form-label"> الاسم رباعي :</label>
              <input type="text" class="form-control " name="uname" id="uname" maxlength="50" autocomplete="off"
                required>

            </div>

            <div id="deathdate" class="mb-3  col-3">
              <label for="dateofdeath" class="form-label">تاريخ الوفاة :</label>
              <input type="date" class="form-control  " name="dateofdeath"   autocomplete="off" required>
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
              
              
               <div id="workDIV" class="mb-3 col-3">
              <label for="workingplace" class="form-label">جهة العمل :</label>
              <select name="workingplace" id="workingplace" class="form-select   form-control">
                <option>--اختر--</option>
                <option value="طبيب بشري">طبيب بشري</option>


              </select>
            </div>



            <div id="workDIV" class="mb-3 col-3">
              <label for="workingname" class="form-label">المسمي الوظيفي :</label>
              <select name="workingname" id="working" class="form-select   form-control">
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

                <div id="workDIV" class="mb-3 col-3">
              <label for="payment" class="form-label">جهة صرف المعاش :</label>
              <select name="payment" id="payment" class="form-select   form-control">
                <option>--اختر--</option>

              </select>
            </div>

              
              
              
              
              
          </div>

          <div class="row">

              
              <div id="gov" class="mb-3 col-3">
              <label for="gov" class="form-label"> محافظة العمل :</label>
              <select name="governorate" id="governorate" class="form-select   form-control">
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
              
            <div id="gov" class="mb-3 col-3">
              <label for="gov" class="form-label"> محافظة السكن :</label>
              <select name="governorates" id="governorates" class="form-select   form-control">
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


                  <div class="mb-3 col-3">
            <label for="phone" class="form-label">رقم الموبابل :</label>
            <input type="phone" class="form-control  " name="phone" id="phones" onkeypress="return isNumberKey(event)"
              maxlength="11" autocomplete="off" required>
          </div>
          </div>


          <div class="row">

            <div id="wafahDiv" class="mb-3 col-3">
              <label for="wafah" class="form-label">رقم شهادة الوفاة الإصابية  :</label>
              <input type="number" class="form-control" name="wafah" id="wafah" autocomplete="off" onkeypress="return isNumberKey(event)">
         
            </div>

            <div class="mb-3 col-3">
              <label for="wafahDate" class="form-label"> تاريخ شهادة الوفاة الإصابية :</label>
              <input type="date" class="form-control " name="wafahDate" id="wafahDate" autocomplete="off" required>

            </div>
              
      <div class="mb-3 col-3">
             <label for="wafahlicense"> شهادة الوفاة الإصابية :</label>
				<input type="file" id="wafahlicense" name="wafahlicense" required>
            </div>
            

        
            
                <div class="mb-3 col-4">
              <label for="address" class="form-label"> العنوان بالتفصيل مع وجود علامات استرشادية  :</label>
              <input type="text" class="form-control " name="address" id="addresss" maxlength="50" autocomplete="off"
                required>

            </div>


          </div>

        </div>
      </section>
        
     
    <h4 class="container-fluid headOfPersonal mb-0 pb-0" style="background-image: linear-gradient(to right, #000428, #004e92);">بيانات مقدم الطلب
      <p class="mt-1 h3" id="showHide" onclick="toggleForm()">
        <i class="fas fa-chevron-up"></i>
      </p>
    </h4>

   
        
         <section class="mb-4">
        <div id="form-container" class="container">


          <div class="row">
              
              
               <div class="mb-3 col-4">
              <label for="unameapp" class="form-label"> الاسم رباعي :</label>
              <input type="text" class="form-control " name="unameapp" id="unameapp" maxlength="50" autocomplete="off"
                required>

            </div>

            <div id="national" class="mb-3 col-3">
              <label for="nationalIdapp" class="form-label">الرقم القومى :</label>
              <input type="text" class="form-control" name="nationalIdapp" id="nationalIdapp" maxlength="14"
                autocomplete="off" onkeypress="return isNumberKey(event)" onchange="validationID()">
              <p id="idError" style="display:none; color:red;">*خطأ فى الرقم القومى</p>
            </div>

            <div class="mb-3 col-3">
              <label for="rrelation" class="form-label"> صلة القرابة :</label>
              <input type="text" class="form-control " name="rrelation" id="rrelations" maxlength="50" autocomplete="off"
                required>

            </div>
              
                  <div class="mb-3 col-3">
            <label for="phone" class="form-label">رقم الموبابل :</label>
            <input type="phone" class="form-control  " name="phone" id="phones" onkeypress="return isNumberKey(event)"
              maxlength="11" autocomplete="off" required>
          </div>

                <div class="mb-3 col-5">
              <label for="address" class="form-label"> العنوان بالتفصيل مع وجود علامات استرشادية  :</label>
              <input type="text" class="form-control " name="address" id="addresss" maxlength="50" autocomplete="off"
                required>

            </div>


          </div>

         
              
    


        </div>
      </section>
        
        
        
        
        
        
        
         
                 <h4 class="container-fluid headOfPersonal mb-0 pb-0"style="background-image: linear-gradient(to right, #000428, #004e92);">بيانات مستحقي المعاش
      <p class="mt-1 h3" id="showHide" onclick="toggleForm()">
        <i class="fas fa-chevron-up"></i>
      </p>
    </h4>
                  <section class="mb-4">
        <div id="form-container" class="container">
            <div class="row">
          
                    <div class="col-2">
                 <h5 class="mb-3">الاسم رباعي</h5>
                        <br>
          <input type="text" name="rname" class="form-control  mb-3" min="0" max="24"><br>
        
                </div>
                  <div class="col-2">
                <h5 class="mb-3">الرقم القومي</h5><br>
          <input type="text"  name="rID" class="form-control mb-3" min="0" max="7"><br>
         
                </div>
                  <div class="col-2">
                <h5 class="mb-3">صلة القرابة</h5><br>
          <input type="text" name="rrelations" class="form-control "><br>
                </div>
                   <div class="col-2">
                <h5 class="mb-3">السن</h5><br>
          <input type="text" name="rage" class="form-control  mb-3 mt-1"><br>
                </div>
                     <div class="col-2">
                <h5 class="mb-3">رقم الموبايل</h5><br>
          <input type="number" name="rnumber" class="form-control  mb-3"><br>
                </div>
                     <div class="col-2">
                <h5 class="mb-3">العنوان</h5><br>
          <input type="text" name="raddress" class="form-control  mb-3"><br>
                </div>
                
                
                
                </div>
                
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
    if (Array[7] == 0 && Array[8] == 1) {
      document.getElementById("birthGov").value = "القاهرة";
    }
    if (Array[7] == 0 && Array[8] == 2) {
      document.getElementById("birthGov").value = "الاسكندرية";
    }
    if (Array[7] == 0 && Array[8] == 3) {
      document.getElementById("birthGov").value = "بورسعيد";
    }
    if (Array[7] == 0 && Array[8] == 4) {
      document.getElementById("birthGov").value = "السويس";
    }
    if (Array[7] == 1 && Array[8] == 1) {
      document.getElementById("birthGov").value = "دمياط";
    }
    if (Array[7] == 1 && Array[8] == 2) {
      document.getElementById("birthGov").value = "الدقهلية";
    }
    if (Array[7] == 1 && Array[8] == 3) {
      document.getElementById("birthGov").value = "الشرقية";
    }
    if (Array[7] == 1 && Array[8] == 4) {
      document.getElementById("birthGov").value = "القليوبية";
    }
    if (Array[7] == 1 && Array[8] == 5) {
      document.getElementById("birthGov").value = "كفر الشيخ";
    }
    if (Array[7] == 1 && Array[8] == 6) {
      document.getElementById("birthGov").value = "الغربية";
    }
    if (Array[7] == 1 && Array[8] == 7) {
      document.getElementById("birthGov").value = "المنوفية";
    }
    if (Array[7] == 1 && Array[8] == 8) {
      document.getElementById("birthGov").value = "البحيرة";
    }
    if (Array[7] == 1 && Array[8] == 9) {
      document.getElementById("birthGov").value = "الاسماعيلية";
    }
    if (Array[7] == 2 && Array[8] == 1) {
      document.getElementById("birthGov").value = "الجيزه";
    }
    if (Array[7] == 2 && Array[8] == 2) {
      document.getElementById("birthGov").value = "بنى سويف";
    }
    if (Array[7] == 2 && Array[8] == 3) {
      document.getElementById("birthGov").value = "الفيوم";
    }
    if (Array[7] == 2 && Array[8] == 4) {
      document.getElementById("birthGov").value = "المنيا";
    }
    if (Array[7] == 2 && Array[8] == 5) {
      document.getElementById("birthGov").value = "اسيوط";
    }
    if (Array[7] == 2 && Array[8] == 6) {
      document.getElementById("birthGov").value = "سوهاج";
    }
    if (Array[7] == 2 && Array[8] == 7) {
      document.getElementById("birthGov").value = "قنا";
    }
    if (Array[7] == 2 && Array[8] == 8) {
      document.getElementById("birthGov").value = "اسوان";
    }
    if (Array[7] == 2 && Array[8] == 9) {
      document.getElementById("birthGov").value = "الاقصر";
    }
    if (Array[7] == 3 && Array[8] == 1) {
      document.getElementById("birthGov").value = "البحر الاحمر";
    }
    if (Array[7] == 3 && Array[8] == 2) {
      document.getElementById("birthGov").value = "الوادى الجديد";
    }
    if (Array[7] == 3 && Array[8] == 3) {
      document.getElementById("birthGov").value = "مرسى مطروح";
    }
    if (Array[7] == 3 && Array[8] == 4) {
      document.getElementById("birthGov").value = "شمال سيناء";
    }
    if (Array[7] == 3 && Array[8] == 5) {
      document.getElementById("birthGov").value = "جنوب سيناء";
    }
    if (Array[7] == 8 && Array[8] == 8) {
      document.getElementById("birthGov").value = "مولود بالخارج";
    }
    console.log(Array[7]);
    console.log(Array[8]);
  }
  </script>


</body>

</html>
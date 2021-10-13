
<?php session_start();include '../connection.php';?><html dir="rtl">

<head>
    <title>وزارة الصحة و السكان المصرية</title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../img/Ministry_of_Health_and_Population_of_Egypt.png" type="image/x-icon">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
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
    
    <?php
if(isset($_POST['confirm'])){
    $id = $_POST['edit_id'];
    $sql= "select * from deathinfo where ID ='$id'";
    $query= mysqli_query($conn,$sql) or die("error:".mysqli_error($conn));
    $result = mysqli_fetch_array($query);
    if($result['type'] == 'وفاة' && $result['status'] =='صندوق'){?>


    <section class="container mt-5" id="result">
        <h4 class="container-fluid headOfPersonal mb-0 pb-0"
            style="background-image: linear-gradient(to right, #000428, #004e92);">البيانات الأساسية
            <p class="mt-1 h3" id="showHide" onclick="toggleForm()">
            </p>
        </h4>

        <form name="Info" method="post" action="" enctype="multipart/form-data">
            <section class="mb-4">
                <div id="form-container" class="container">
  


                    <div class="row">
                        <div class="form-check col-3">
                            <label class="form-check-label pt-2 pl-2">نوع الحالة : </label>
                            <input class="form-control " type="text" name="type" id="death"
                                value="<?php echo $result['type']?>" readonly>

                        </div>
                        <div id="national" class="mb-3 col-3">
                            <label for="nationalId" class="form-label">الرقم القومى :</label>
                            <input class="form-control " type="text" name="nationalId" id="nationalId"
                                value="<?php echo $result['nationalId']?>" readonly>
                        </div>

                        <div class="mb-3 col-4">
                            <label for="uname" class="form-label"> الاسم رباعي :</label>
                            <input class="form-control " type="text" name="uname" id="uname"
                                value="<?php echo $result['uname']?>" readonly>

                        </div>

                        <div id="deathdate" class="mb-3 col-2">
                            <label id="dateofdeathlbl" for="dateofdeath" class="form-label">تاريخ الوفاة :</label>
                            <input class="form-control " type="text" name="dateofdeath" id="dateofdeath"
                                value="<?php echo $result['dateofdeath']?>" readonly>
                        </div>
                    </div>



                    <div class="row">
                        <div class="form-check col-3">
                            <label class="form-check-label pt-2 pl-2">النوع : </label>
                            <input class="form-control " type="text" name="gender" id="gender"
                                value="<?php echo $result['gender']?>" readonly>
                        </div>


                        <div id="workplaceDIV" class="mb-3 col-4">
                            <label for="workingplace" class="form-label">جهة العمل :</label>
                            <input class="form-control " type="text" name="workingplace" id="workingplace"
                                value="<?php echo $result['workingplace']?>" readonly>
                        </div>
                        <div id="worknameDIV" class="mb-3 col-3">
                            <label for="workingname" class="form-label">المسمي الوظيفي :</label>
                            <input class="form-control " type="text" name="workingname" id="workingname"
                                value="<?php echo $result['workingname']?>" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div id="gov" class="mb-3 col-3">
                            <label for="gov" class="form-label"> محافظة السكن :</label>
                            <input class="form-control " type="text" name="governorates" id="governorate"
                                value="<?php echo $result['governorates']?>" readonly>
                        </div>

                        <div id="deathresDIV" class="mb-3 col-4" style="display:block;">
                            <label id="questionlbl" for="question" class="form-label"> هل الوفاة تمت بسبب مزاولة المهنة
                                :</label>
                            <input class="form-control " type="text" name="question" id="question"
                                value="<?php echo $result['question']?>" readonly>
                        </div>


                        <div id="workdeathDIV" class="mb-3 col-4" style="display:block;">
                            <label id="questiondlbl" for="questiond" class="form-label"> هل الوفاة تمت و هو علي رأس
                                العمل :</label>
                            <input class="form-control " type="text" name="questiond" id="questiond"
                                value="<?php echo $result['questiond']?>" readonly>
                        </div>


                    </div>

                    <div class="row">
                        <div class="mb-3 col-3">
                            <label for="address" class="form-label "> العنوان بالتفصيل :</label>
                            <input class="form-control " type="text" name="address" id="address"
                                value="<?php echo $result['address']?>" readonly>


                        </div>
                        <div class="mb-3 col-4">
                            <label for="phone" class="form-label">رقم التواصل 1 :</label>
                            <input class="form-control " type="text" name="phone" id="phone"
                                value="<?php echo $result['phone']?>" readonly>
                        </div>


                        <div class="mb-3 col-4">
                            <label for="phone" class="form-label">رقم التواصل 2 :</label>
                            <input class="form-control " type="text" name="mobile" id="mobile"
                                value="<?php echo $result['landnum']?>" readonly>
                        </div>



                    </div>
                    <hr>
                    <section>
                        <h4 class="container-fluid headOfPersonal mb-0 pb-0"
                            style="background-image: linear-gradient(to right, #000428, #004e92);">المرفقات
                            <p class="mt-1 h3" id="showHide" onclick="toggleForm()">
                              
                            </p>
                        </h4>



                        <div class="row mr-3">
                            <div class="mb-3 col-4" id="certDiv">
                                <label class="mt-1" for="report">اصل شهادة الوفاة كمبيوتر : :</label><br>
                                <img src="<?php echo $result['cert']?>" class="img-fluid" style="height:150px;">
                            </div>

                            <div class="mb-3 col-4">
                                <label class="mt-1" for="report">تقرير فني طبي :</label><br>
                                <img src="<?php echo $result['report']?>" class="img-fluid" style="height:150px;">
                            </div>
   <div class="mb-3 col-4">
                                <label class="mt-1" for="tests">تحاليل :</label><br>
                                <img src="<?php echo $result['tests']?>" class="img-fluid" style="height:150px;">
                            </div>
                        </div>
                        <div class="row mr-3">
                         

                            <div class="mb-3 col-4">
                                <label class="mt-1" for="medradio">الأشعة الطبية :</label><br>
                                <img src="<?php echo $result['medradio']?>" class="img-fluid" style="height:150px;">
                            </div>

                               <div class="mb-3 col-4">
                                        <label class="mt-1" for="attcert">شهادة وفاة مخاطر المهن
الطبية :</label><br>
                                        <img src="<?php echo $result['attcert']?>" class="img-fluid"
                                            style="height:150px;">
                                    </div>
                                    
                        </div>
                    </section>
                          <section>
                                <h4 class="container-fluid headOfPersonal mb-0 pb-0"
                                    style="background-image: linear-gradient(to right, #000428, #004e92);">تسجيل طلب الصرف
                                    <p class="mt-1 h3" id="showHide" onclick="toggleForm()">
                                    </p>
                                </h4>



                                <div class="row mr-3">
                                    <div class="mb-3 col-2">
                                        <label class="mt-1" for="transferNum">رقم حوالة الصرف :</label><br>
                                       <input class="form-control " type="text" name="transferNum" id="transferNum"
                                         >
                                    </div>


                                    <div class="mb-3 col-2">
                                        <label class="mt-1" for="bank">اسم البنك :</label><br>
                                         <input class="form-control " type="text" name="bank" id="bank"
                                        >
                                    </div>

                                    <div class="mb-3 col-2">
                                        <label class="mt-1" for="transDate">تاريخ التحويل :</label><br>
                                         <input class="form-control" style="font-size:14px;" type="date" name="tarnsDate" id="transDate"
                                        >
                                    </div>
                  <div class="mb-3 col-2">
                                        <label class="mt-1" for="amount">المبلغ :</label><br>
                                         <input class="form-control" style="font-size:14px;" type="number" name="amount" id="amount"
                                        >
                                    </div>
                                    
                                    
                                     <div class="mb-3 col-2" id="paymentRDiv">
             <label for="paymentR"> ايصال الصرف :</label><br>
				<input type="file" id="paymentR" name="paymentR">
            </div>
                                    
                                    
                                    
                                    
                                    
                                    
                                </div>
                                

                                
                    </section>
                    <hr>
                                 <section>
                    
                          

                 <h4 class="container-fluid headOfPersonal mb-2 pb-0"style="background-image: linear-gradient(to right, #000428, #004e92);">بيانات مستحقي المعاش
      <p class="mt-1 h3" id="showHide" onclick="toggleForm()">
      </p>
    </h4>
                  <section class="mb-4">
         <div id="form-container" class="container">
            <div class="row">
          
                    <div class="col-2">
                 <h5 class="mb-3">الاسم رباعي</h5>
                        <br>
          <input type="text" name="rname" class="form-control  mb-3" min="0" max="500"><br>
        
                </div>
                  <div class="col-2">
                <h5 class="mb-3">الرقم القومي</h5><br>
          <input type="text"  name="rID" class="form-control mb-3" min="0" max="14"><br>
         
                </div>
                  <div class="col-2">
                <h5 class="mb-3">صلة القرابة</h5><br>
          <input type="text" name="rrelations" class="form-control "><br>
                </div>
                     <div class="col-2">
                <h5 class="mb-3">رقم الموبايل</h5><br>
          <input type="number" name="rnumber" class="form-control  mb-3"><br>
                </div>
                     <div class="col-2">
                <h5 class="mb-3">العنوان</h5><br>
          <input type="text" name="raddress" class="form-control  mb-3"><br>
                </div>
 <div class="col-2">
                <button class="btn btn-primary btn-lg mt-5 mr-5" type="button" onclick="show();"><i class="fas fa-plus-circle"></i></button>
                </div>
                </div>
                
                      </div>
                      
    <div id="form-container">
        <div id="r2" class="container" style="display:none;">
       
            <div  class="row">
          
                    <div class="col-2">
                 <h5 class="mb-3">الاسم رباعي</h5>
                        <br>
          <input type="text" name="rname2" class="form-control  mb-3" min="0" max="500"><br>
        
                </div>
                  <div class="col-2">
                <h5 class="mb-3">الرقم القومي</h5><br>
          <input type="text"  name="rID2" class="form-control mb-3" min="0" max="14"><br>
         
                </div>
                  <div class="col-2">
                <h5 class="mb-3">صلة القرابة</h5><br>
          <input type="text" name="rrelations2" class="form-control "><br>
                </div>
                     <div class="col-2">
                <h5 class="mb-3">رقم الموبايل</h5><br>
          <input type="number" name="rnumber2" class="form-control  mb-3"><br>
                </div>
                     <div class="col-2">
                <h5 class="mb-3">العنوان</h5><br>
          <input type="text" name="raddress2" class="form-control  mb-3"><br>
                </div>
 <div class="col-2">
                <button class="btn btn-primary btn-lg mt-5 mr-5" type="button" onclick="show2();"><i class="fas fa-plus-circle"></i></button>
                </div>
                </div>
        </div>
                      </div>
                      
                      
                        <div id="form-container" >
            <div id="r3" class="container" style="display:none;">
          <div class="row">
                    <div class="col-2">
                 <h5 class="mb-3">الاسم رباعي</h5>
                        <br>
          <input type="text" name="rname3" class="form-control  mb-3" min="0" max="500"><br>
        
                </div>
                  <div class="col-2">
                <h5 class="mb-3">الرقم القومي</h5><br>
          <input type="text"  name="rID3" class="form-control mb-3" min="0" max="14"><br>
         
                </div>
                  <div class="col-2">
                <h5 class="mb-3">صلة القرابة</h5><br>
          <input type="text" name="rrelations3" class="form-control "><br>
                </div>
                     <div class="col-2">
                <h5 class="mb-3">رقم الموبايل</h5><br>
          <input type="number" name="rnumber3" class="form-control  mb-3"><br>
                </div>
                     <div class="col-2">
                <h5 class="mb-3">العنوان</h5><br>
          <input type="text" name="raddress3" class="form-control  mb-3"><br>
                </div>
 <div class="col-2">
                <button class="btn btn-primary btn-lg mt-5 mr-5" type="button" onclick="show3();"><i class="fas fa-plus-circle"></i></button>
                </div>
                </div>
                </div>
                      </div>
                      
                      
                      
                      
                                              <div id="form-container" >
            <div id="r4" class="container" style="display:none;">
          <div class="row">
                    <div class="col-2">
                 <h5 class="mb-3">الاسم رباعي</h5>
                        <br>
          <input type="text" name="rname4" class="form-control  mb-3" min="0" max="500"><br>
        
                </div>
                  <div class="col-2">
                <h5 class="mb-3">الرقم القومي</h5><br>
          <input type="text"  name="rID4" class="form-control mb-3" min="0" max="14"><br>
         
                </div>
                  <div class="col-2">
                <h5 class="mb-3">صلة القرابة</h5><br>
          <input type="text" name="rrelations4" class="form-control "><br>
                </div>
                     <div class="col-2">
                <h5 class="mb-3">رقم الموبايل</h5><br>
          <input type="number" name="rnumber4" class="form-control  mb-3"><br>
                </div>
                     <div class="col-2">
                <h5 class="mb-3">العنوان</h5><br>
          <input type="text" name="raddress4" class="form-control  mb-3"><br>
                </div>
 <div class="col-2">
                <button class="btn btn-primary btn-lg mt-5 mr-5" type="button" onclick="show4();"><i class="fas fa-plus-circle"></i></button>
                </div>
                </div>
                </div>
                      </div>
                      
                      
                      
                      
                      
                                              <div id="form-container" >
            <div id="r5" class="container" style="display:none;">
          <div class="row">
                    <div class="col-2">
                 <h5 class="mb-3">الاسم رباعي</h5>
                        <br>
          <input type="text" name="rname5" class="form-control  mb-3" min="0" max="500"><br>
        
                </div>
                  <div class="col-2">
                <h5 class="mb-3">الرقم القومي</h5><br>
          <input type="text"  name="rID5" class="form-control mb-3" min="0" max="14"><br>
         
                </div>
                  <div class="col-2">
                <h5 class="mb-3">صلة القرابة</h5><br>
          <input type="text" name="rrelations5" class="form-control "><br>
                </div>
                     <div class="col-2">
                <h5 class="mb-3">رقم الموبايل</h5><br>
          <input type="number" name="rnumber5" class="form-control  mb-3"><br>
                </div>
                     <div class="col-2">
                <h5 class="mb-3">العنوان</h5><br>
          <input type="text" name="raddress5" class="form-control  mb-3"><br>
                </div>

                </div>
                </div>
                      </div>
                      

                      
                </section>
                    
                    
                    
                    
                    </section>
                    
                    
                    
                </div>
                 <button class="btn btn-lg text-white" type="submit" name="accept"
                            style="background-color: green;  margin-top: 10px;">تم الصرف </button>
                    
        
                    <button class="btn btn-lg  backButton" type="button" name="back">
                        <a href="followup.php">رجوع</a></button>
            </section>
            <?php
         }
    else if($result['type'] == 'مصاب بالعجز' && $result['status'] =='صندوق' ){
             ?>

            <section class="container mt-5" id="result">
                <h4 class="container-fluid headOfPersonal mb-0 pb-0"
                    style="background-image: linear-gradient(to right, #000428, #004e92);">البيانات الأساسية
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
                                    <input class="form-control " type="text" name="type" id="death"
                                        value="<?php echo $result['type']?>" readonly>

                                </div>
                                <div id="national" class="mb-3 col-3">
                                    <label for="nationalId" class="form-label">الرقم القومى :</label>
                                    <input class="form-control " type="text" name="nationalId" id="nationalId"
                                        value="<?php echo $result['nationalId']?>" readonly>
                                </div>

                                <div class="mb-3 col-4">
                                    <label for="uname" class="form-label"> الاسم رباعي :</label>
                                    <input class="form-control " type="text" name="uname" id="uname"
                                        value="<?php echo $result['uname']?>" readonly>

                                </div>

                                <div id="deathdate" class="mb-3 col-2">
                                    <label id="dateofdeathlbl" for="dateofdeath" class="form-label">تاريخ الإصابة
                                        :</label>
                                    <input class="form-control " type="text" name="dateofdeath" id="dateofdeath"
                                        value="<?php echo $result['dateofdeath']?>" readonly>
                                </div>
                            </div>



                            <div class="row">
                                <div class="form-check col-3">
                                    <label class="form-check-label pt-2 pl-2">النوع : </label>
                                    <input class="form-control " type="text" name="gender" id="gender"
                                        value="<?php echo $result['gender']?>" readonly>
                                </div>


                                <div id="workplaceDIV" class="mb-3 col-4">
                                    <label for="workingplace" class="form-label">جهة العمل :</label>
                                    <input class="form-control " type="text" name="workingplace" id="workingplace"
                                        value="<?php echo $result['workingplace']?>" readonly>
                                </div>
                                <div id="worknameDIV" class="mb-3 col-3">
                                    <label for="workingname" class="form-label">المسمي الوظيفي :</label>
                                    <input class="form-control " type="text" name="workingname" id="workingname"
                                        value="<?php echo $result['workingname']?>" readonly>
                                </div>
                            </div>

                            <div class="row">
                                <div id="gov" class="mb-3 col-3">
                                    <label for="gov" class="form-label"> محافظة السكن :</label>
                                    <input class="form-control " type="text" name="governorates" id="governorate"
                                        value="<?php echo $result['governorates']?>" readonly>
                                </div>

                                <div id="deathresDIV" class="mb-3 col-4" style="display:block;">
                                    <label id="questionlbl" for="question" class="form-label"> هل العجز تم بسبب مزاولة
                                        المهنة :</label>
                                    <input class="form-control " type="text" name="question" id="question"
                                        value="<?php echo $result['question']?>" readonly>
                                </div>


                                <div id="workdeathDIV" class="mb-3 col-4" style="display:block;">
                                    <label id="questiondlbl" for="questiond" class="form-label"> هل العجز تم و هو علي
                                        رأس العمل :</label>
                                    <input class="form-control " type="text" name="questiond" id="questiond"
                                        value="<?php echo $result['questiond']?>" readonly>
                                </div>


                            </div>

                            <div class="row">
                                <div class="mb-3 col-3">
                                    <label for="address" class="form-label "> العنوان بالتفصيل :</label>
                                    <input class="form-control " type="text" name="address" id="address"
                                        value="<?php echo $result['address']?>" readonly>


                                </div>
                                <div class="mb-3 col-4">
                                    <label for="phone" class="form-label">رقم التواصل 1 :</label>
                                    <input class="form-control " type="text" name="phone" id="phone"
                                        value="<?php echo $result['phone']?>" readonly>
                                </div>


                                <div class="mb-3 col-4">
                                    <label for="phone" class="form-label">رقم التواصل 2 :</label>
                                    <input class="form-control " type="text" name="mobile" id="mobile"
                                        value="<?php echo $result['landnum']?>" readonly>
                                </div>



                            </div>
                            <hr>
                        
                            <section>
                                <h4 class="container-fluid headOfPersonal mb-0 pb-0"
                                    style="background-image: linear-gradient(to right, #000428, #004e92);">المرفقات
                                    <p class="mt-1 h3" id="showHide" onclick="toggleForm()">
                                      
                                    </p>
                                </h4>



                                <div class="row mr-3">
                                    <div class="mb-3 col-3">
                                        <label class="mt-1" for="report">تقرير فني طبي :</label><br>
                                        <img src="<?php echo $result['report']?>" class="img-fluid"
                                            style="height:150px;">
                                    </div>


                                    <div class="mb-3 col-3">
                                        <label class="mt-1" for="tests">تحاليل :</label><br>
                                        <img src="<?php echo $result['tests']?>" class="img-fluid"
                                            style="height:150px;">
                                    </div>

                                    <div class="mb-3 col-3">
                                        <label class="mt-1" for="medradio">الأشعة الطبية :</label><br>
                                        <img src="<?php echo $result['medradio']?>" class="img-fluid"
                                            style="height:150px;">
                                    </div>

                                     <div class="mb-3 col-3">
                                        <label class="mt-1" for="attcert">تقرير الإصابة :</label><br>
                                        <img src="<?php echo $result['attcert']?>" class="img-fluid"
                                            style="height:150px;">
                                    </div>
                                    
                                </div>
                                

                                
                                                </section>
                            <hr>
             
                    
                                <section>
                                <h4 class="container-fluid headOfPersonal mb-0 pb-0"
                                    style="background-image: linear-gradient(to right, #000428, #004e92);">تسجيل طلب الصرف
                                    <p class="mt-1 h3" id="showHide" onclick="toggleForm()">
                                    </p>
                                </h4>



                                <div class="row mr-3">
                                    <div class="mb-3 col-2">
                                        <label class="mt-1" for="transferNum">رقم حوالة الصرف :</label><br>
                                       <input class="form-control " type="text" name="transferNum" id="transferNum"
                                         >
                                    </div>


                                    <div class="mb-3 col-2">
                                        <label class="mt-1" for="bank">اسم البنك :</label><br>
                                         <input class="form-control " type="text" name="bank" id="bank"
                                        >
                                    </div>

                                    <div class="mb-3 col-2">
                                        <label class="mt-1" for="transDate">تاريخ التحويل :</label><br>
                                         <input class="form-control" style="font-size:14px;" type="date" name="tarnsDate" id="transDate"
                                        >
                                    </div>
                  <div class="mb-3 col-2">
                                        <label class="mt-1" for="amount">المبلغ :</label><br>
                                         <input class="form-control" style="font-size:14px;" type="number" name="amount" id="amount"
                                        >
                                    </div>
                                    
                                    
                                     <div class="mb-3 col-2" id="paymentRDiv">
             <label for="paymentR"> ايصال الصرف :</label><br>
				<input type="file" id="paymentR" name="paymentR">
            </div>
                                    
                                    
                                    
                                    
                                    
                                    
                                </div>
                                

                                
                                                </section>
                            
                               <hr>
                                            <section>
                    
                          

                 <h4 class="container-fluid headOfPersonal mb-2 pb-0"style="background-image: linear-gradient(to right, #000428, #004e92);">بيانات مستحقي المعاش
      <p class="mt-1 h3" id="showHide" onclick="toggleForm()">
      </p>
    </h4>
                  <section class="mb-4">
         <div id="form-container" class="container">
            <div class="row">
          
                    <div class="col-2">
                 <h5 class="mb-3">الاسم رباعي</h5>
                        <br>
          <input type="text" name="rname" class="form-control  mb-3" min="0" max="500"><br>
        
                </div>
                  <div class="col-2">
                <h5 class="mb-3">الرقم القومي</h5><br>
          <input type="text"  name="rID" class="form-control mb-3" min="0" max="14"><br>
         
                </div>
                  <div class="col-2">
                <h5 class="mb-3">صلة القرابة</h5><br>
          <input type="text" name="rrelations" class="form-control "><br>
                </div>
                     <div class="col-2">
                <h5 class="mb-3">رقم الموبايل</h5><br>
          <input type="number" name="rnumber" class="form-control  mb-3"><br>
                </div>
                     <div class="col-2">
                <h5 class="mb-3">العنوان</h5><br>
          <input type="text" name="raddress" class="form-control  mb-3"><br>
                </div>
 <div class="col-2">
                <button class="btn btn-primary btn-lg mt-5 mr-5" type="button" onclick="show();"><i class="fas fa-plus-circle"></i></button>
                </div>
                </div>
                
                      </div>
                      
    <div id="form-container">
        <div id="r2" class="container" style="display:none;">
       
            <div  class="row">
          
                    <div class="col-2">
                 <h5 class="mb-3">الاسم رباعي</h5>
                        <br>
          <input type="text" name="rname2" class="form-control  mb-3" min="0" max="500"><br>
        
                </div>
                  <div class="col-2">
                <h5 class="mb-3">الرقم القومي</h5><br>
          <input type="text"  name="rID2" class="form-control mb-3" min="0" max="14"><br>
         
                </div>
                  <div class="col-2">
                <h5 class="mb-3">صلة القرابة</h5><br>
          <input type="text" name="rrelations2" class="form-control "><br>
                </div>
                     <div class="col-2">
                <h5 class="mb-3">رقم الموبايل</h5><br>
          <input type="number" name="rnumber2" class="form-control  mb-3"><br>
                </div>
                     <div class="col-2">
                <h5 class="mb-3">العنوان</h5><br>
          <input type="text" name="raddress2" class="form-control  mb-3"><br>
                </div>
 <div class="col-2">
                <button class="btn btn-primary btn-lg mt-5 mr-5" type="button" onclick="show2();"><i class="fas fa-plus-circle"></i></button>
                </div>
                </div>
        </div>
                      </div>
                      
                      
                        <div id="form-container" >
            <div id="r3" class="container" style="display:none;">
          <div class="row">
                    <div class="col-2">
                 <h5 class="mb-3">الاسم رباعي</h5>
                        <br>
          <input type="text" name="rname3" class="form-control  mb-3" min="0" max="500"><br>
        
                </div>
                  <div class="col-2">
                <h5 class="mb-3">الرقم القومي</h5><br>
          <input type="text"  name="rID3" class="form-control mb-3" min="0" max="14"><br>
         
                </div>
                  <div class="col-2">
                <h5 class="mb-3">صلة القرابة</h5><br>
          <input type="text" name="rrelations3" class="form-control "><br>
                </div>
                     <div class="col-2">
                <h5 class="mb-3">رقم الموبايل</h5><br>
          <input type="number" name="rnumber3" class="form-control  mb-3"><br>
                </div>
                     <div class="col-2">
                <h5 class="mb-3">العنوان</h5><br>
          <input type="text" name="raddress3" class="form-control  mb-3"><br>
                </div>
 <div class="col-2">
                <button class="btn btn-primary btn-lg mt-5 mr-5" type="button" onclick="show3();"><i class="fas fa-plus-circle"></i></button>
                </div>
                </div>
                </div>
                      </div>
                      
                      
                      
                      
                                              <div id="form-container" >
            <div id="r4" class="container" style="display:none;">
          <div class="row">
                    <div class="col-2">
                 <h5 class="mb-3">الاسم رباعي</h5>
                        <br>
          <input type="text" name="rname4" class="form-control  mb-3" min="0" max="500"><br>
        
                </div>
                  <div class="col-2">
                <h5 class="mb-3">الرقم القومي</h5><br>
          <input type="text"  name="rID4" class="form-control mb-3" min="0" max="14"><br>
         
                </div>
                  <div class="col-2">
                <h5 class="mb-3">صلة القرابة</h5><br>
          <input type="text" name="rrelations4" class="form-control "><br>
                </div>
                     <div class="col-2">
                <h5 class="mb-3">رقم الموبايل</h5><br>
          <input type="number" name="rnumber4" class="form-control  mb-3"><br>
                </div>
                     <div class="col-2">
                <h5 class="mb-3">العنوان</h5><br>
          <input type="text" name="raddress4" class="form-control  mb-3"><br>
                </div>
 <div class="col-2">
                <button class="btn btn-primary btn-lg mt-5 mr-5" type="button" onclick="show4();"><i class="fas fa-plus-circle"></i></button>
                </div>
                </div>
                </div>
                      </div>
                      
                      
                      
                      
                      
                                              <div id="form-container" >
            <div id="r5" class="container" style="display:none;">
          <div class="row">
                    <div class="col-2">
                 <h5 class="mb-3">الاسم رباعي</h5>
                        <br>
          <input type="text" name="rname5" class="form-control  mb-3" min="0" max="500"><br>
        
                </div>
                  <div class="col-2">
                <h5 class="mb-3">الرقم القومي</h5><br>
          <input type="text"  name="rID5" class="form-control mb-3" min="0" max="14"><br>
         
                </div>
                  <div class="col-2">
                <h5 class="mb-3">صلة القرابة</h5><br>
          <input type="text" name="rrelations5" class="form-control "><br>
                </div>
                     <div class="col-2">
                <h5 class="mb-3">رقم الموبايل</h5><br>
          <input type="number" name="rnumber5" class="form-control  mb-3"><br>
                </div>
                     <div class="col-2">
                <h5 class="mb-3">العنوان</h5><br>
          <input type="text" name="raddress5" class="form-control  mb-3"><br>
                </div>

                </div>
                </div>
                      </div>
                      

                      
                </section>
                    
                    
                    
                    
                    </section>
                        </div>
                        
                    <button class="btn btn-lg text-white" type="submit" name="accept"
                            style="background-color: green;  margin-top: 10px;">تم الصرف </button>
                    
        
                    <button class="btn btn-lg  backButton" type="button" name="back">
                        <a href="followup.php">رجوع</a></button>
                    </section>

                    
                    
                    <?php
    }
    else if($result['status'] =='مديرية' ||  $result['status'] =='مرفوض عودة للمستشفى'){
   
    ?>
<h2 class="text-center">لم يتم القبول حتى الان</h2>

   <?php
    
    }
   else if($result['status'] =='تم الصرف' ){
   
    ?>
<h2 class="text-center">تم الصرف مسباقاً بتاريخ <?php echo $result['transDate'];?></h2>

   <?php
    
    }
    ?>

                </form>
            </section>

            <?php
    }
if(isset($_POST['accept'])){
    $ID = $_POST['nationalId'];
    $tarnSferNum = $_POST['transferNum'];
    $bank = $_POST['bank'];
    $transferDate = $_POST['tarnsDate'];
$ins = "UPDATE deathinfo SET status = 'تم الصرف', transferNum = '$tarnSferNum',bank = '$bank', transDate = '$transferDate'  WHERE nationalID = '$ID'";
$query= mysqli_query($conn,$ins) or die("error:".mysqli_error($conn));
if($query) 
{ 
 echo '<script type="text/javascript">';
     echo ' alert("تم التحديث");';
    echo '</script>';
 echo '<script type="text/javascript">';echo'window.location.href="followup.php";';echo '</script>';
}
else {
    echo '<script type="text/javascript">';
     echo ' alert("عفواً! لم يتم التحديث برجاء المحاولة مره اخرى");';
    echo '</script>';
    echo '<script type="text/javascript">';echo'window.location.href="followup.php";';echo '</script>';
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
            <script>
            function show(){
                document.getElementById("r2").style.display = "block";
            }
            
                function show2(){
                    document.getElementById("r3").style.display = "block";
                }
                
                function show3(){
                    document.getElementById("r4").style.display = "block";
                }
                function show4(){
                    document.getElementById("r5").style.display = "block";
                }
            </script>

</body>

</html>
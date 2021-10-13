<?php session_start();include '../connection.php';?><html dir="rtl">

<head>
  <title>وزارة الصحة و السكان المصرية</title>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="../css/all.min.css">
  <link rel="stylesheet" href="../css/animate.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/stylesheet.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <script src="../js/jquery-3.3.1.min.js"></script>
  <style>
  p {
    font-size: 25px;
  }
      .new{
    width: 100px;
	margin-top: 50px;
    border-radius: 20px;
	box-shadow: 1px 2px #888888;
	cursor: pointer;
	background-color: white;
	height: 200px;
	padding-top: 50px;
	margin-right: 120px;
    transition: 0.5s;
}
.new:hover{
	cursor: pointer;
	background-color: white;
	height: 200px;
	padding-top: 50px;
	border-radius: 20px;
	box-shadow: 3px 4px 3px 4px #888888;
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
        
      <div class="container mt-5" style="background-color: #eeeeee; height: 500px;" >
          <h2 class="heading text-center pt-4" style="font-family: Cairo;">صندوق التعويضات عن مخاطر المهن الطبية</h2>
		  <div class="row">
              <div class="col-1"></div>
			   <div onclick="location.href='Hform.php'" class="new col-3">
	   <p class="text-center"><i class="fas fa-user-tie"></i> </p>
		  <p class="text-center">طلب جديد</p>
		  
		  </div>
		
			  <div class="col-1"></div>
   <div onclick="location.href='inquery.php'" class="new col-3">
		  <p class="text-center"><i class="fas fa-users"></i></p>
		  <p class="text-center">بحث عن طلب سابق</p>
		  </div>
              <div class="col-1"></div>
			  </div>
</div>
		
        <footer style="position:fixed;">
        <p style="font-size:19px;"> &copy; 2021 جميع الحقوق محفوظة لوزارة الصحة و السكان المصرية. </p>
        
        </footer>

        
          <script src="../js/jquery-3.3.1.min.js"></script> 
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>  
        <script src="../js/wow.min.js"></script> 
        <script>new WOW().init();</script> 
        <script src="../js/mine.js"></script>
    </body>
</html>

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
  .paginationNav {
    background-color: white;
  }

  .containers {
    margin-left: 10%;
    margin-right: 10%;

  }
  </style>


</head>

<body style="color:black;">
  <nav>
    <div class="row">
      <div class="col-1 pt-2 "><img src="../img/logo.png" class="img-fluid" style="height:100px;" /></div>
            <div class="col-2">
             <h6 class="text-white d-inline" style=" font-weight: bold;">
                  <br>جمهورية مصر العربية
                 <br>وزارة الصحة و السكان
              
                </h6>
         
            
            </div>
      <div class="col-6"></div>
      <div class="dropdown show d-inline h3">
        <a class="h4 dropdown-toggle float-left ml-4 mt-4 text-white" href="#" role="button" id="dropdownMenuLink"
          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $_SESSION['username']; ?>
        </a>
          
           <div class="dropdown-menu float-left" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item text-center " href="../index.php">تسجيل خروج</a>
    
  </div>
          
          
          
      </div>
    </div>
  </nav>







  <?php

    
$limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 50;
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	$start = ($page - 1) * $limit;
	$result = $conn->query("SELECT * FROM deathinfo where status = '' LIMIT $start,$limit");
	$customers = $result->fetch_all(MYSQLI_ASSOC);
 $countA = $conn->query("SELECT COUNT(DISTINCT id) as id FROM deathinfo where status = ''");
         $custCountA = $countA->fetch_all(MYSQLI_ASSOC);
	$totalCustomer = $custCountA[0]['id'];
	$pages = ceil( $totalCustomer / $limit  );
if($page < 1){
    $page = 1;
}
	$Previous = $page - 1;
	$Next = $page + 1;
        
        
        ?>

  <div class="container mt-5" style="border: 1px solid #eeeeee;">

    <div class="row border-bottom">
      <div class="col-5">
        <h3 class="text-right pt-3 mr-4"> طلبات التعويضات <span class="font-weight-bold"
            style="color:red;">(<?php echo $totalCustomer; ?>)</span></h3>
      </div>
      <div class="col-3"> </div>
      <div class="col-3 ml-1 mt-3 border-right pt-2">
        <form method="post" action="#">
        <label for="limit-records" class="form-label">عدد السجلات لكل صفحة :</label>
        <select name="limit-records" id="limit-records">
          <option selected="selected">50</option>
          <?php foreach([100,500,1000,5000] as $limit): ?>
          <option <?php if( isset($_POST["limit-records"]) && $_POST["limit-records"] == $limit) echo "selected" ?>
            value="<?= $limit; ?>"><?= $limit; ?></option>
          <?php endforeach; ?>
        </select>
      </form>
        
        </div>

    </div>
    <div class="container" style="overflow-x: auto; ">
      <table id="tblData" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>م</th>
              <th>حالة الطلب</th>
            <th>الرقم القومى</th>
            <th>الاسم</th>
            <th> تاريخ الوفاة / الإصابة</th>
            <th>جهة العمل</th>
            <th>المسمى الوظيفى</th>
            <th>محافظة السكن</th>
            <th>العنوان بالتفاصيل</th>
            <th>رقم التواصل 1</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($customers as $customer) :  ?>
          <tr>
            <td><?php echo $customer['ID'];?></td>
            <td><?php echo $customer['type'];?></td>
            <td><?php echo $customer['nationalId'];?></td>
            <td><?php echo $customer['uname'];?></td>
            <td><?php echo $customer['dateofdeath'];?></td>
            <td><?php echo $customer['workingplace'];?></td>
            <td><?php echo $customer['workingname'];?></td>
            <td><?php echo $customer['governorates'];?></td>
            <td><?php echo $customer['address'];?></td>
            <td><?php echo $customer['phone'];?></td>
        


            <td>
                <form action="Directorate.php" method="post">
                <input type="text" value="<?php echo $customer['ID'];?>" name="edit_id" hidden><button class="btn btn-sm  backButton" type="submit" style="background-color:green; color:white;" name="confirm">تأكيد الطلب</button>
                </form></td>
          
             
          
              
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
        


    </div>



    <div class="paginationNav" style="background-color:white;" aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item">
          <a class="page-link" href="dashboard.php?page=<?= $Previous; ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo; السابق</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>


        <li class="page-item">
          <a class="page-link" href="dashboard.php?page=<?= $Next; ?>" aria-label="Next">
            <span aria-hidden="true">التالى &raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
  
  <footer style="position:fixed; margin-top:3px;">
    <p style="font-size:19px;"> &copy; 2021 جميع الحقوق محفوظة لوزارة الصحة و السكان. </p>

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
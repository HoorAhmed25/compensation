<?php
if(isset($_GET['governorate']) && !empty($_GET['governorate'])){
   
    include ('../connection.php');
    $id= $_GET['governorate'];
    $query= "select  workingname from deathinfo where governorates ='$id'";
    $do= mysqli_query($conn,$query);
    $count= mysqli_num_rows($do);
    if($count >0){
        
        echo '<option>--اختر--</option>';
        while($row= mysqli_fetch_array($do)){
            
            echo '<option value="'.$row['workingname'].'">'.$row['workingname'].'</option>';
        }
        
    }

    else {
        echo 'error1';
    }
}



else{
    
    echo 'Error';
}

?>
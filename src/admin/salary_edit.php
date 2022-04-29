<?php

session_start();
$conn = mysqli_connect("localhost","root","","salary");

if(isset($_POST['registerbtn'])){
    
    $emp_id=$_POST['emp_id'];
    $date=$_POST['date'];
    $salary=$_POST['salary'];
    $message=$_POST['message'];
    

    $query1 = "SELECT * FROM emp_list WHERE Emp_id='$emp_id' ";
    $result = mysqli_query($conn,$query1);
   
    if (!empty(mysqli_fetch_assoc($result))) {
        $date1= date("Y-m", strtotime($date));
        
        $query2 ="SELECT Emp_id,date FROM emp_salary WHERE Emp_id='$emp_id' AND date like '%".$date1."%'";
        
        $query_result = mysqli_query($conn,$query2);
        $rowAB= mysqli_fetch_assoc($query_result);
        if(count($rowAB)){

            $_SESSION['status'] = "Employee Salary already Credited";
            header('Location: salary.php');
        } 
        else
        {
            $query = "INSERT INTO emp_salary(Emp_id,Salary,date,message)
            VALUES ('$emp_id','$salary','$date','$message')";

            $query_run = mysqli_query($conn, $query);

            if($query_run){
                
                $_SESSION['success'] = "Employee Salary Credited";
                header('Location: salary.php');
            }
            else{
                
                $_SESSION['status'] = "Employee Salary not Credited";
                header('Location: salary.php');
            }

        }
    }
    
    else 
    {
        $_SESSION['status'] = "Employee Id does not Exists";
        header('Location: salary.php');
    }
    
}

?>




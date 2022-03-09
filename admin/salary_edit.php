<?php

session_start();
$conn = mysqli_connect("localhost","root","","salary");

if(isset($_POST['registerbtn'])){
    
    $emp_id=$_POST['emp_id'];
    $date=$_POST['date'];
    $salary=$_POST['salary'];
    
    

    $query = "INSERT INTO emp_salary(Emp_id,Salary,date)
                VALUES ('$emp_id','$salary','$date')";

    $query_run = mysqli_query($conn, $query);

    if($query_run){
        // echo "Saved";
        $_SESSION['success'] = "Employee Salary Credited";
        header('Location: salary.php');
    }
    else{
        // echo "Not Saved";
        $_SESSION['status'] = "Employee Salary Credited";
        header('Location: salary.php');
    }
}

?>
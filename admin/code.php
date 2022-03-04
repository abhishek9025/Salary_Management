<?php

session_start();
$conn = mysqli_connect("localhost","root","","salary");

if(isset($_POST['registerbtn'])){

    $emp_id=$_POST['emp_id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $department=$_POST['department'];
    $position=$_POST['position'];
    $status=$_POST['status'];
    $password=$_POST['password'];
    $username=$_POST['username'];
    

    $query = "INSERT INTO emp_list(Emp_id,Name,Email,Department,Position,Status,Password,username)
                VALUES ('$emp_id','$name','$email','$department','$position','$status','$password','$username')";

    $query_run = mysqli_query($conn, $query);

    if($query_run){
        // echo "Saved";
        $_SESSION['success'] = "Employee Profile Added";
        header('Location: register.php');
    }
    else{
        // echo "Not Saved";
        $_SESSION['status'] = "Employee Profile Not Added";
        header('Location: register.php');
    }
}


if(isset($_POST['delete_btn'])){
    $id= $_POST['delete_id'];
    $query= "DELETE FROM emp_list WHERE Emp_id='$id' ";
    
    $query_run= mysqli_query($conn,$query);


    if($query_run){
        
        $_SESSION['success'] = "Employee Data is Deleted";
        header('Location: register.php');
    }
    else{
        
        $_SESSION['status'] = "Employee Data is not Deleted";
        header('Location: register.php');
    }
}


if(isset($_POST['updatebtn'])){

    $emp_id=$_POST['edit_emp_id'];
    $name=$_POST['edit_name'];
    $email=$_POST['edit_email'];
    $department=$_POST['edit_department'];
    $position=$_POST['edit_position'];
    $status=$_POST['edit_status'];
    $password=$_POST['edit_password'];
    $username=$_POST['edit_username'];

    $query = "UPDATE emp_list SET Emp_id='$emp_id', Name='$name', Email='$email', Department='$department',
                Position='$position', Status='$status', Password='$password', username='$username' WHERE Emp_id='$emp_id' ";

    $query_run= mysqli_query($conn, $query);

    if($query_run){
        
        $_SESSION['success'] = "Employee Data is Updated";
        header('Location: register.php');
    }
    else{
        
        $_SESSION['status'] = "Employee Data is not Updated";
        header('Location: register.php');
    }
}

?>
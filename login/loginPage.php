<?php
 
  include("db_con.php");

  if(isset($_POST['login'])){
  $email=$_POST["Email"];
  $password=$_POST["password"];
  $usertype=$_POST["usertype"];  
  

  if($_POST["usertype"]=="Employee"){

    $query="select * from emp_list where Email = '".$email."' and Password ='".$password."' ";
    $result= mysqli_query($conn,$query);
    $row= mysqli_fetch_assoc($result);
    $errmsg="";
    
    
    

    if($row["Email"]==$email && $row["Password"]==$password){
      include("encode.php");

      base64_url_encode($row['Emp_id']);
      
      header("Location: http://localhost/sms/employee/e_index.php?user=".base64_url_encode($row['Emp_id']));
    }
      
    else{
      $errmsg="InCorrect Email or Password";
      }

  }

  if($_POST["usertype"]=="Admin"){

    $sql="select * from admin where Name = '".$email."' and Password ='".$password."' ";

  $result= mysqli_query($conn,$sql);

  $row= mysqli_fetch_array($result);

  $errmsg="";

  if($row["Name"]==$email && $row["Password"]==$password){
    header("Location: http://localhost/sms/admin/index.php");
    echo "admin";
  }
  else{
    $errmsg="InCorrect Username or Password";
    }

  }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  
  <h1>Salary Management System</h1>

  <form action="#" method="POST">
<div class="login-box">
  <h2>Login</h2>
  <div class="textbox">
    <i class="fas fa-user"></i>
    <input type="text" placeholder="Username" name="Email" required>
  </div>

  <div class="textbox">
    <i class="fas fa-lock"></i>
    <input type="password" placeholder="Password" name= "password" required>
  </div>
   
  <div class="drop">
      <!-- <label for="usertype"></label> -->
      <select style="background:none ; border: 2px solid #4caf50; " name="usertype" id="usertype" class="textbox" required>
      <option value="">Select Usertype</option>
          <option  style="background:none ; " value="Admin">Admin</option>
          <option style="background:none ; " value="Employee">Employee</option>
      </select>

  <div>
  

  <input type="submit" class="btn" value="Login" name="login">
  <?php
  if(!empty($errmsg)){
  ?>
  <p style="color:red;">*Incorrect username or password</p>
  <?php
  }
  ?>
  <!-- <a class="atag" style="color:blue;" href=forgotpwd.php>Forgot Password</a> -->

</div>
</form>
</body>
</html>
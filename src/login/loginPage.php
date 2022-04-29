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

  <form action="#" method="POST" onsubmit="return validation()">
<div class="login-box">
  <h2>Login</h2>
  <div class="textbox">
    <i class="fas fa-user"></i>
    <input type="text" placeholder="Email" name="Email" id="user"  >
  </div>
  <span id ="username" style="color:red" class="text-danger font-weight-bold"></span>

  <div class="textbox">
    <i class="fas fa-lock"></i>
    <input type="password" placeholder="Password" name= "password" id="pass" >
  </div>
  <span id ="password" style="color:red" class="text-danger font-weight-bold"></span>
   
  <div class="drop">
      
      <select style="background:none ; border: 2px solid #4caf50; " name="usertype" id="usertype" class="textbox" >
      <option value="">Select Usertype</option>
          <option  style="background:none ; " value="Admin">Admin</option>
          <option style="background:none ; " value="Employee">Employee</option>
      </select>

  <div>
  <span id ="type" style="color:red" class="text-danger font-weight-bold"></span>
  

  <input type="submit" class="btn" value="Login" name="login">
  <?php
  if(!empty($errmsg)){
  ?>
  <p style="color:red;">*Incorrect username or password</p>
  <?php
  }
  ?>
  

</div>
</form>
<script type="text/javascript">

function validation(){
  var user = document.getElementById('user').value;
  var password = document.getElementById('pass').value;
  var usertype = document.getElementById('usertype').value;

  if(user == ""){
    document.getElementById('username').innerHTML = "*Please Fill Email field";
    return false;
  }
  if(password == ""){
    document.getElementById('password').innerHTML = "*Please Fill Password field";
    return false;
  }
  if(usertype == ""){
    document.getElementById('type').innerHTML = "*Please Select Usertype";
    return false;
  }

}

</script>
</body>
</html>
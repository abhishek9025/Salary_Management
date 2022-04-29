<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">
 <!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Employee Profile
        </h6>
    </div>
    <div class="card-body">



    <?php
    
    include("db.php");


    if(isset($_POST['edit_btn'])){
        $id= $_POST['edit_id'];
        
        $query="SELECT * FROM emp_list WHERE Emp_id='$id' ";
        $query_run = mysqli_query($conn,$query);

        foreach($query_run as $row){
            ?>
            

    <form action="code.php" method="POST">
    <div class="form-group">
            <label> Employee Id </label>
            <input type="number" name="edit_emp_id" value="<?php echo $row['Emp_id'];?>" class="form-control" placeholder="Enter Employee Id" >        
        </div>
        <div class="form-group">
            <label> Name </label>
            <input type="text" name="edit_name"value="<?php echo $row['Name'];?>" class="form-control" placeholder="Enter Name" >        
        </div>
        <div class="form-group">
            <label> Email </label>
            <input type="email" name="edit_email" value="<?php echo $row['Email'];?>"class="form-control" placeholder="Enter Email" >        
        </div>
        <div class="form-group">
            <label> Department </label>
            <input type="text" name="edit_department" value="<?php echo $row['Department'];?>" class="form-control" placeholder="Enter Department" >        
        </div>
        <div class="form-group">
            <label> Position </label>
            <input type="text" name="edit_position" value="<?php echo $row['Position'];?>"class="form-control" placeholder="Enter Position" >        
        </div>
        <div class="form-group">
            
            <label for="edit_status">Status</label>
            <select name="edit_status" id="edit_status"  class="form-control" >
            <option value="">Select</option>
                <option value="Active">Active</option>
                <option value="InActive">InActive</option>
            </select>
        </div>
        <div class="form-group">
            <label> Password </label>
            <input type="password" name="edit_password" value="<?php echo $row['Password'];?>" class="form-control" placeholder="Set Password" >        
        </div>
        <div class="form-group">
            <label> Username </label>
            <input type="text" name="edit_username" value="<?php echo $row['username'];?>"class="form-control" placeholder="Set Username" >        
        </div>
            <a href="register.php" style=" border-radius: 12px;" class="btn-btn-danger"> Cancel </a>
            <button type="submit" name="updatebtn" class="btn-btn-primary"  style="background-color:blue ;color:white;  border-radius: 8px;"> Update </button>


        </form>
        <?php
        }
        
    }
    ?>


    </div>
</div>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
?>

<!-- Modal -->
<div class="modal fade" id="addemployeeprofile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Fill Employee Information</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="code.php" method="POST">
        <div class="modal-body">

        <div class="form-group">
            <label> Employee Id </label>
            <input type="number" name="emp_id" class="form-control" placeholder="Enter Employee Id" >        
        </div>
        <div class="form-group">
            <label> Name </label>
            <input type="text" name="name" class="form-control" placeholder="Enter Name" >        
        </div>
        <div class="form-group">
            <label> Email </label>
            <input type="email" name="email" class="form-control" placeholder="Enter Email" >        
        </div>
        <div class="form-group">
            <label> Department </label>
            <input type="text" name="department" class="form-control" placeholder="Enter Department" >        
        </div>
        <div class="form-group">
            <label> Position </label>
            <input type="text" name="position" class="form-control" placeholder="Enter Position" >        
        </div>
        <div class="form-group">
            <!-- <label for="Status"> Status </label>
            <select name="status" class="form-control">
                <option value="Active">Active</option>
                <option value="InActive">InActive</option>
            </select> -->
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" >
            <option value="">Select</option>
                <option value="Active">Active</option>
                <option value="InActive">InActive</option>
            </select>
        </div>
        <div class="form-group">
            <label> Password </label>
            <input type="password" name="password" class="form-control" placeholder="Set Password" >        
        </div>
        <div class="form-group">
            <label> Username </label>
            <input type="text" name="username" class="form-control" placeholder="Set Username" >        
        </div>

    </div>

     
    
        <div class="modal-footer">
        
            <button type="button" value="Close" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
            <!-- <button name="Cancel" type="submit"  value="Cancel">Cancel</button> -->
        
        <button type="submit" name ="registerbtn" class="btn btn-primary">Save</button>
        
        </div>
    </form>   
    

    </div>
  </div>
</div>
<div class="container-fluid">
 <!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Employee Profile
            <button type="button" class="btn-btn-primary" data-toggle="modal" data-target="#addemployeeprofile">
            Add Employee Profile
            </button>
        </h6>
    </div>
    <div class="card-body">

    <?php
    if(isset($_SESSION['success']) && $_SESSION['success'] !=''){
        echo $_SESSION['success'];
        unset($_SESSION['success']);

    }

    if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
        echo $_SESSION['status'];
        unset($_SESSION['status']);
    }
    ?>


        <div class="table-responsive">

        <?php
        $conn = mysqli_connect("localhost","root","","salary");
        $query="SELECT * FROM emp_list";
        $query_run = mysqli_query($conn,$query);
        ?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Employee Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Position</th>
                        <th>Status</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Edit</th>
                        <th>Delete</th>

                        <!-- <th>Salary</th> -->
                    </tr>
                </thead>
                <tbody>

                <?php
                
                if(mysqli_num_rows($query_run)>0){
                    while($row= mysqli_fetch_assoc($query_run)){
                        
                        ?>

                        
                
                    <tr>
                        <td><?php   echo $row['Emp_id'];   ?></td>
                        <td><?php   echo $row['Name'];   ?></td>
                        <td><?php   echo $row['Email'];   ?></td>
                        <td><?php   echo $row['Department'];   ?></td>
                        <td><?php   echo $row['Position'];   ?></td>
                        <td><?php   echo $row['Status'];   ?></td>
                        <td><?php   echo $row['username'];   ?></td>
                        <td><?php   echo $row['Password'];   ?></td>
                        <td> 
                            <form action="register_edit.php" method="POST">
                                <input type="hidden" name="edit_id" value="<?php echo $row['Emp_id'];?>">
                                <style>
                                    .btn-btn-success{
                                        background:#228B22; 
                                        border:white; color:white; 
                                        height:25px;
                                        border-radius: 8px;
                                    }
                                    .btn-btn-success:hover{
                                        background-color: #4caf50;
                                    }
                                </style>
                            <button type="submit" name="edit_btn" class="btn-btn-success"  >EDIT</button>
                            </form>
                            
                        
                        </td>
                        <td>
                        <form action="code.php" method="POST">
                            <input type="hidden" name="delete_id" value="<?php echo $row['Emp_id'];?>">
                            <style>
                                    .btn-btn-nsuccess{
                                        background: red; 
                                        border:white;
                                        color:white; 
                                        height:25px;
                                        border-radius: 8px;
                                    }
                                    .btn-btn-nsuccess:hover{
                                        background-color:#FF6347 ;
                                    }
                            </style>
                            <button type="submit" name="delete_btn" class="btn-btn-nsuccess" >DELETE</button>
                            </form>
                        </td>
                        
                    </tr>
                    <?php
                    }
                }
                else{
                    echo "NO Record Found";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
            

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
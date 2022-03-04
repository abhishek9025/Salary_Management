<?php


include('includes/header.php');
include('includes/navbar.php');

?>

<!-- Modal -->
<div class="modal fade" id="addemployeesalary" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Fill Information</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="Salary_edit.php" method="POST">
        <div class="modal-body">

        <div class="form-group">
            <label> Employee Id </label>
            <input type="number" name="emp_id" class="form-control" placeholder="Enter Employee Id" >        
        </div>
        
        <div class="form-group">
            <label> Salary </label>
            <input type="text" name="salary" class="form-control" placeholder="Enter Salary" >        
        </div>
        <div class="form-group">
            <label> Date </label>
            <input type="date" id="start" name="date" class="form-control" min="2022-01" value="2022-03">
        
        </div>
        
        

    </div>

     
    
        <div class="modal-footer">
        
            <button type="button" value="Close" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
            <!-- <button name="Cancel" type="submit"  value="Cancel">Cancel</button> -->
        
        <button type="submit" name ="registerbtn" class="btn btn-primary">Credit Salary</button>
        
        </div>
    </form>   
    

    </div>
  </div>
</div>
<div class="container-fluid">
 <!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Employee Salary Data
        <style>
                                    .btn-btn-primary{
                                        background:dodgerblue; 
                                        border:white; color:white; 
                                        height:25px;
                                        border-radius: 8px;
                                    }
                                    .btn-btn-primary:hover{
                                        background-color: blue;
                                    }
                                </style>
            <button  type="button" class="btn-btn-primary" data-toggle="modal" data-target="#addemployeesalary">
            Add Employee Salary
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
        $query="SELECT * FROM emp_salary";
        $query_run = mysqli_query($conn,$query);
        ?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Employee Id</th>
                        <th>Salary</th>
                        <th>Date<th>

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
                        <td><?php   echo $row['Salary'];   ?></td>
                        <td><?php   echo $row['date'];   ?></td>
                       
                        
                        
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
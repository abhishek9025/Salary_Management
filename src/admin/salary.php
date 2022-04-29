<?php

session_start();
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
    <form action="salary_edit.php" method="POST" >
        <div class="modal-body">

        <div class="form-group">
            <label> Employee Id </label>
            <input type="number" name="emp_id" class="form-control" placeholder="Enter Employee Id" id="Emp_id" >        
        </div>
        <span id ="id" style="color:red" class="text-danger font-weight-bold"></span>
        
        <div class="form-group">
            <label> Salary </label>
            <input type="text" name="salary" class="form-control" placeholder="Enter Salary" id="Amount" required>        
        </div>
        <span id ="salary" style="color:red" class="text-danger font-weight-bold"></span>

        <div class="form-group">
            <label> Date </label>
            <input type="date" id="start" name="date" class="form-control" min="2022-01" value="2022-03" id="Date_credit" required>
        </div>
        <span id ="date" style="color:red" class="text-danger font-weight-bold"></span>

        <div class="form-group">
            <label> Message </label>
            <input type="text" rows="4" cols="50" class="form-control" name="message" ></input>
        </div>

        
        

    </div>

     
    
        <div class="modal-footer">
        
            <button type="button" value="Close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                
            <button type="submit" name ="registerbtn" id="test1" class="btn btn-primary" value="Salary is Credited">Credit Salary</button>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            
        </div>
    </form>   
    <script type="text/javascript">

    function validation(){
        var id = document.getElementById('Emp_id').value;
        var salary = document.getElementById('Amount').value;
        var date = document.getElementById('Date_credit').value;

        if(id == ""){
            document.getElementById('id').innerHTML = "*Please Fill Employee Id";
            return false;
        }
        if(salary == ""){
            document.getElementById('salary').innerHTML = "*Please Fill Salary field";
            return false;
        }
        if(date == ""){
            document.getElementById('date').innerHTML = "*Please Fill Date";
            return false;
        }

    }

    </script>
    

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
            Credit Employee Salary
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

        $limit = 10;
        if(isset($_GET['page'] )){
            $page = $_GET['page'];
        }
        else{
            $page = 1;
        }
        $offset = ($page - 1) * $limit;


        $conn = mysqli_connect("localhost","root","","salary");
        $query="SELECT * FROM emp_salary ORDER BY Emp_id ASC, date ASC LIMIT {$offset}, {$limit}";
        $query_run = mysqli_query($conn,$query);
        ?>
            <table class="table table-bordered" id="dataTable" >
                <thead>
                    <tr>
                        <th>Employee Id</th>
                        <th>Salary</th>
                        <th>Date</th>
                        <th>Message</th>
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
                        <td><?php   echo $row['message'];   ?></td>
                       
                        
                        
                    </tr>
                    <?php
                    }
                }

                else{
                    echo "NO Record Found";
                }
                $sql1="SELECT * FROM emp_salary";
                $result1 = mysqli_query($conn,$sql1) or die("Query failed");

                if(mysqli_num_rows($result1) > 0){
                    $total_records = mysqli_num_rows($result1);
                    echo"Pages:";
                    $total_page = ceil($total_records/ $limit);
                    echo '<ul class="pagination admin-pagination">';
                    if($page > 1){
                        echo '<li><a href="salary.php?page='.($page - 1).'">Prev</a></li>';
                    }
                    for($i = 1; $i <= $total_page; $i++){
                        if($i == $page)
                        {
                            $active="active";
                        }     
                        else{
                            $active="";

                        }                   

                    echo '<li class="'.$active.'"><a class="changeable" style="margin-left: 10px;" href="salary.php?page='.$i.' ">'.$i.'</a></li>';
                    }
                    if($total_page> $page){
                        echo '<li><a style="margin-left: 10px;" href="salary.php?page='.($page + 1).'">Next</a></li>';
                    }
                    echo '</ul>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
            

    <form method="post" action="export.php" align="center">  
        <style>
            .btn-btn-primary
            {
                background:blue; 
                border:white; color:white; 
                height:35px;
                border-radius: 8px;
            }
            .btn-btn-primary:hover
            {
                background-color: dodgerblue;
            }
        </style>
        <input type="submit"  name="export" value="CSV Download" class="btn-btn-primary" />  
    </form>

<?php

include('includes/scripts.php');
include('includes/footer.php');
?>
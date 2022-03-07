<?php
include('includes/e_header.php');
include('includes/e_navbar.php');

?>
<div class="container-fluid">
        

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        
            <h1 class="h3 mb-0 text-gray-800">Salary Data</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->

                    
        </div>
        
        <!-- <h5 style="color:dodgerblue;">Select Month to Check Salary</h5> -->

        <form action="#" method="post">
        
        <div class="form-group">
                        
                      
                <!-- <select style="background:none ; border: 2px solid #4caf50; " placeholder="Month">
                <option name="" value="" style="display:none;">Month</option>
                <option name="January" value="Jan">January</option>
                <option name="February" value="Feb">February</option>
                <option name="March" value="Mar">March</option>
                <option name="April" value="Apr">April</option>
                        <option name="May" value="May">May</option>
                <option name="June" value="Jun">June</option>
                <option name="July" value="Jul">July</option>
                <option name="August" value="Aug">August</option>
                        <option name="September" value="Sep">September</option>
                <option name="October" value="Oct">October</option>
                <option name="November" value="Nov">November</option>
                <option name="December" value="Dec">December</option>
                </select>
                <select style="background:none ; border: 2px solid #4caf50; " placeholder="Year">
                <option name="" value="" style="display:none;">Year</option>
                <option  name="2022" value="2022">2022</option>
                <option name="2023" value="2023">2023</option>
                </select> -->

                
        </div>
        <style>
                .btn{
                        
                        background: none;
                        border: 2px solid #4caf50;
                        padding: 5px;
                        
                        font-size: 18px;
                        cursor: pointer;
                        margin: 12px 0;
                }
                .btn:hover{
                        color: white;
                        background-color: #4caf50;
                }
         </style>
        <input type="submit" class="btn" value="Check Salary Status" name="salary">
        </form>

        <?php
        $conn = mysqli_connect("localhost","root","","salary");

        if(isset($_POST['salary'])){

                $query="SELECT * FROM emp_salary WHERE Emp_id='".$_GET['user']."'";
                $query_rn = mysqli_query($conn,$query);
                // $row = mysqli_fetch_assoc($query_rn);


        
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
                
                if(mysqli_num_rows($query_rn)>0){
                    while($row= mysqli_fetch_assoc($query_rn)){
                        
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
        }
                
                ?>
                </tbody>
            </table>

        
</div>


<?php

include('includes/e_scripts.php');
include('includes/e_footer.php');
?>
<?php
include('includes/e_header.php');
include('includes/e_navbar.php');

?>
<div class="container-fluid">
        

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        
            <h1 class="h3 mb-0 text-gray-800">Salary Data</h1>
            

                    
        </div>
        
        

        <form action="#" method="post">
        
        <div class="form-group">
                        
                      
                <select style="background:none ; border: 2px solid #4caf50; " name="month" id="month" >
                <option value="" style="display:none;">Month</option>
                <option  value="01">January</option>
                <option  value="02">February</option>
                <option  value="03">March</option>
                <option  value="04">April</option>
                <option  value="05">May</option>
                <option  value="06">June</option>
                <option  value="07">July</option>
                <option  value="08">August</option>
                <option  value="09">September</option>
                <option  value="10">October</option>
                <option  value="11">November</option>
                <option  value="12">December</option>
                </select>

                <select style="background:none ; border: 2px solid #4caf50; " name="year" id="year" placeholder="Year">
                <option  value="" style="display:none;">Year</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                </select>

                
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
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
        $(document).ready(function(){
        $("#btnhide").click(function(){
        $("#dataTable").hide();
        });
        
        });
        </script>
        <input type="submit" class="btn" value="Check Salary Details" name="salary">
        </form>

        <?php
        include('db.php');
        
        include("encode.php");

        
        if(isset($_POST['salary'])){
                $month= $_POST["month"];
                $year = $_POST["year"];
               
                $query="SELECT * FROM emp_salary WHERE Emp_id='". base64_url_decode($_GET['user'])."' AND MONTH(date)='$month' AND YEAR(date)='$year' ";
                
                $query_rn = mysqli_query($conn,$query);
                

                if(mysqli_num_rows($query_rn)>0){
                        while($row= mysqli_fetch_assoc($query_rn)){


        
?>
        <table class="table table-bordered" id="dataTable">
        
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
                    echo "Sorry! No Record Found";
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
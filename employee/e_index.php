<?php
// session_start();
@include('includes/e_header.php');
@include('includes/e_navbar.php');



?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-0 text-gray-800">Your Record</h1>

        <div class="table-responsive">

        <?php
        // ('D:\xampp\htdocs\sms\login\loginPage.php');
        

        include("encode.php");
            include('db.php');
            
            $conn = mysqli_connect("localhost","root","","salary");
            $query="SELECT * FROM emp_list WHERE Emp_id='".base64_url_decode($_GET['user'])."'";
            $query_run = mysqli_query($conn,$query);
            $userData = mysqli_fetch_assoc($query_run);
           
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


                        <!-- <th>Salary</th> -->
                    </tr>
                </thead>
                <tbody>

                <?php
                
                // if(mysqli_num_rows($query_run)>0){
                //     while($row= mysqli_fetch_assoc($query_run)){
                        
                        ?>

                        
                
                    <tr>
                        <td><?php   echo $userData['Emp_id'];   ?></td>
                        <td><?php   echo $userData['Name'];   ?></td>
                        <td><?php   echo $userData['Email'];   ?></td>
                        <td><?php   echo $userData['Department'];   ?></td>
                        <td><?php   echo $userData['Position'];   ?></td>
                        <td><?php   echo $userData['Status'];   ?></td>
                        
                    </tr>
                    <?php
                    // }
                // }
                // else{
                //     echo "NO Record Found";
                // }
                ?>
                </tbody>
            </table>
        </div>

            

        <!-- Content Row -->

</div>
    <!-- /.container-fluid -->

    </div>
<!-- End of Main Content -->


                


<?php

include('includes/e_scripts.php');
include('includes/e_footer.php');
?>
<?php

$emp_id= '';

if(isset($_GET['user']))
{
    $emp_id = $_GET['user'];
}
?>
    
    

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Welcome Employee</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    
    <a class="nav-link" href="e_index.php?user=<?php echo $emp_id; ?>">
        <em class="fas fa-fw fa-tachometer-alt"></em>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Interface
</div>

<!--Nav Item - Tables -->
<li class="nav-item">
    <?php
        
    ?>
    <a class="nav-link" href="empdata.php?user=<?php echo $emp_id; ?>">
        <i class="fas fa-fw fa-table"></i>
        <span>Salary Data</span></a>
</li>

<!-- Logout -->

<li class="nav-item">
    
    <a class="nav-link" href="http://localhost/sms/login/loginPage.php">
    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 "></i>

  
    <span>Logout</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">


<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->

    <!-- Scroll to Top Button-->
    
    


 <!-- Logout Modal-->
 

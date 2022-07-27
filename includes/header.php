<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="The Institute of Peace and Security Management Studies is an independent educational institution that provides highly specialized practical professional training for security personnel and peace advocate.">
    <meta name="author" content="Institute of Peace and Security Management Studies">

    <title>Institute of Peace and Security Management Studies</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <!-- <script src="vendor/ckeditor/ckeditor.js"></script> -->
        <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/favicon.png">
    <script src="vendor/sweetalert/sweetalert.min.js"></script>
   
                <style>
                    .backBtn{
                        border:1px solid #e8a66a;
                        color:#101820ff;
                        border-radius:50px;
                        padding: 10px 15px;
                        transition: all ease-in-out 0.3s;
                    }
                    .backBtn:hover{
                        background:#101820ff;
                        border:none;
                        color:#fff;
                    }
                    .table-bordered > tbody > tr > td,
                    .table-bordered > thead > tr > td,
                    .table-bordered {
                        border-left: 0;
                        border-right: 0;
}
                </style>
                <?php
    
    include("config/dblink.php");
    $connect = new Ipsms();
    session_start();
    if($_SESSION['email']){
        //Continue Browsing 
    }else{
        echo "<script>window.location='login'</script>";
    }
    $tblquery = "SELECT * FROM tblstudents WHERE stu_email = :user";
    $tblvalue = array(
        ':user' => $_SESSION['email']
    );
    $select =$connect->tbl_select($tblquery, $tblvalue);
    foreach($select as $data){
        extract($data);
    };


   if($url[0] == "404"){
       echo "<title>404 | IPSMS</title>";
       $active1 = "active";
   }
    elseif($url[0] == "amdashboard"){
        echo "<title>Dashboard | IPSMS</title>";
        $active4 = "active";
        }
    elseif($url[0] == "dashboard"){
        echo "<title>Dashboard | IPSMS</title>";
        $active5 = "active";
    }elseif($url[0] == "profile"){
        echo "<title>profile | IPSMS</title>";
        $active6 = "active";
    }elseif($url[0] == "password"){
        echo "<title>change password | IPSMS</title>";
        $active7 = "active";
    }
    elseif($url[0] == "learn"){
        echo "<title>Learn | IPSMS</title>";
        $active8 = "active";
    }
    elseif($url[0] == "classroom"){
        echo "<title>Classroom | IPSMS</title>";
        $active8 = "active";
    }elseif($url[0] == "add_module"){
        echo "<title>Add Module | IPSMS</title>";
        $active9 = "active";
    } elseif($url[0] == "add_test"){
        echo "<title>Add Test | IPSMS</title>";
        $active10 = "active";
    }elseif($url[0] == "users"){
        echo "<title>All Students | IPSMS</title>";
        $active11 = "active";
    }elseif($url[0] == "users_profile"){
        echo "<title>Users Profile | IPSMS</title>";
        $active11 = "active";
    }elseif($url[0] == "approve_acct"){
        echo "<title>Payment Status | IPSMS</title>";
        $active12 = "active";
    }
    elseif($url[0] == "result"){
        echo "<title>Test Results | IPSMS</title>";
        $active13 = "active";
    }elseif($url[0] == "request"){
        echo "<title>Certificate Requests| IPSMS</title>";
        $active14 = "active";
    }
    elseif($url[0] == "modules" || $url[0] == "details"){
        echo "<title>Modules | IPSMS</title>";
        $active15 = "active";
    }
?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon">
                <img class="img-responsive good" id="goodie" style="display:none;" src="assets/logosm.png" alt="IPSMS logo">
                  <img class="img-responsive d-none d-md-block responding" id="respond" src="assets/logo.png" alt="IPSMS logo"> 
                  <img class="img-responsive d-md-none" src="assets/logosm.png" alt="IPSMS logo">

                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <?php if($_SESSION['accessType'] == "User"){

           
            
            ?>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php echo $active5;?>">
                <a class="nav-link" href="dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <?php if($stu_paymentStatus == "Paid"){?>
            <li class="nav-item <?php echo $active8;?>">
                <a class="nav-link" href="learn">
                <i class="fas fa-book"></i>
                    <span>Start Learning</span></a>
            </li>
            <?php }?>
            <li class="nav-item <?php echo $active6;?>">
                <a class="nav-link" href="profile">
                <i class="fas fa-user"></i>
                    <span>Profile</span></a>
            </li>

            <li class="nav-item <?php echo $active7;?>">
                <a class="nav-link" href="password">
                <i class="fas fa-wrench"></i>
                    <span>Change Password</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link" href="logout">
                <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>
            <?php  
            
        }    
            
            ?>
            <?php 
            if($_SESSION['accessType'] == "Admin"){
            ?>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php echo $active4;?>">
                <a class="nav-link" href="amdashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item <?php echo $active11;?>">
                <a class="nav-link" href="users">
                <i class="fas fa-user-graduate"></i>
                    <span>View All Students</span></a>
            </li>

            <li class="nav-item <?php echo $active12;?>">
                <a class="nav-link" href="approve_acct">
                <i class="fas fa-thermometer-half"></i>
                    <span>Payment Status</span></a>
            </li>

            <li class="nav-item <?php echo $active15;?>">
                <a class="nav-link" href="modules">
                <i class="fas fa-book"></i>
                    <span>View all Modules</span></a>
            </li>

            <li class="nav-item <?php echo $active13;?>">
                <a class="nav-link" href="result">
                <i class="fas fa-table"></i>
                    <span>View Test Result</span></a>
            </li>

            <li class="nav-item <?php echo $active14;?>">
                <a class="nav-link" href="request">
                <i class="fas fa-table"></i>
                    <span>View Certificate Requests</span></a>
            </li>
                
            <!-- Nav Item - Message -->
            <li class="nav-item <?php echo $active9;?>">
                <a class="nav-link" href="add_module">
                <i class="fas fa-book"></i>
                    <span>Add Module</span></a>
            </li>

            <li class="nav-item <?php echo $active10;?>">
                <a class="nav-link" href="add_test">
                <i class="fas fa-table"></i>
                    <span>Add Test</span></a>
            </li>

             <!-- Divider -->
             <hr class="sidebar-divider d-none d-md-block">

            <li class="nav-item">
                <a class="nav-link" href="logout">
                <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>

            <?php }?>
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle" onclick="hide(),show()"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <a class="backBtn" href="https://instituteofpeaceandsecurity.com" target="_blank">Go Back to Main Site</a>
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['email']; ?></span> 
                                        <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->


<?php
         if($_SESSION['accessType'] == "Admin"){
            echo "<script>window.location='amdashboard'</script>";
        }

        if($_POST){
            $tblquery5 = "INSERT INTO tblcertificate VALUES(:cert_ID, :cert_students, :cert_course, :cert_grade, :cert_date)";
            $tblvalue5 = array(
                ':cert_ID' => NULL,
                ':cert_students' => $_SESSION['email'],
                ':cert_course' => $_SESSION['course'],
                ':cert_grade' => $_SESSION['grade'],
                ':cert_date' => date("Y-m-d")
            );  
            $insert =$connect->tbl_insert($tblquery5, $tblvalue5);
            if($insert){
                echo "
                <script>
                swal({
                title: 'Success', 
                text: 'We have received your Application. your certificate will be sent to your email THANKS.', 
                icon: 'success',
                })
                </script>
            ";
            }
        }

        $tblquery = "SELECT * FROM tblstudents WHERE stu_email = :email";
        $tblvalue = array(
            ':email' => $_SESSION['email']
        );
        $select =$connect->tbl_select($tblquery, $tblvalue);
        foreach($select as $data){
            extract($data);
        }
        $tblquery1 = "SELECT * FROM tblmodulescompleted WHERE com_completedBy = :user ORDER BY com_moduleNo DESC LIMIT 1";
        $tblvalue1 = array(
            ':user' => $_SESSION['email']
        );
        $search =$connect->tbl_select($tblquery1, $tblvalue1);
        foreach($search as $data1){
            extract($data1);
        }
        $tblquery2 = "SELECT * FROM tblmodules WHERE mod_course = :course";
        $tblvalue2 = array(
            ':course' => $_SESSION['course']
        );
        $select2 =$connect->tbl_select($tblquery2, $tblvalue2);
       $count = count($select2);
       $percent = $com_moduleNo / $count * 100;
       $rounded = round($percent);
    

?>

<div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 ml-4 mb-0 text-gray-800">Dashboard</h1>
                        <a class="d-sm-inline-block ml-4 btn btn-success btn-sm shadow-sm" style="color:#ffffff; text-transform:uppercase;">Welcome  <?php echo $stu_lastName . " ". $stu_firstName?></a>
                    </div>

                </div>
          <!-- /.container-fluid -->
          <div class="container">
                    <!-- Content Row -->
                    <div class="row">

       
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                % completion</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rounded . "%";?></div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-check-square fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Payment Status </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $stu_paymentStatus;?></div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-angle-double-right fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Modules Completed
                                                 </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $com_moduleNo?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-book fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
      
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Nationality</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $stu_nationality;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-globe fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 ml-4 mb-0 text-gray-800">Active Module</h1>
                    </div> -->
                    <?php if($stu_paymentStatus == "Not Paid"){?>
                    <div class="row">
                        <!-- Illustrations -->
                        <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Checkout to Continue</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                            src="img/payment.svg" alt="">
                                    </div>
                                    <p> Hello please we want to inform that to continue with our lectures here you have to first make payment either by Bank Transfer or by making payment online directly. Click on the link below to checkout Thank You. </p>
                                    <a  href="checkout">Checkout Here</a>
                                </div>
                            </div>
                        </div>
                        <?php } elseif($stu_paymentStatus == "Paid"){?>
                            <!-- Content Row -->
                    <div class="row">
                    <div class="col-lg-6 mt-4 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Selected Course
                                                 </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $stu_course?></div>
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mt-3 mb-1">Course Grade
                                                 </div>
                                                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $stu_courseGrade?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-book fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
<!-- Content Column -->
<div class="col-lg-6 mt-4 mb-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Course Details</h6>
        </div>
        <div class="card-body">
            <h4 class="small font-weight-bold">% Course Completion <span
                    class="float-right"><?php echo $rounded . "%"?></span></h4>
            <div class="progress">
                <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $rounded . "%"?>"
                    aria-valuenow="<?php echo $rounded;?>" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <?php if($rounded == 100){?>
            <form method="POST" action="dashboard">
            <button name="cert" type="submit" class="btn btn-success mt-4">Apply for Certificate</button>
            </form>
            <?php }?>
        </div>
        </div>
    </div>
    </div>

                        
                            <?php }?>
                    </div>
                
</div>

<?php 
     
     if($_SESSION['accessType'] == "User"){
        echo "<script>window.location='dashboard'</script>";
    }
    $tblquery = "SELECT * FROM tblstudents";
    $tblvalue = array();
    $select =$connect->tbl_select($tblquery, $tblvalue);
    $count = count($select);

    $tblquery1 = "SELECT * FROM tblstudents WHERE stu_paymentStatus = :status";
    $tblvalue1 = array(
        ':status' => "Paid"
    );
    $select1 =$connect->tbl_select($tblquery1, $tblvalue1);
    $count1 = count($select1);

    $tblquery2 = "SELECT * FROM tblmodules";
    $tblvalue2 = array();
    $select2 =$connect->tbl_select($tblquery2, $tblvalue2);
    $count2 = count($select2);

    $tblquery3 = "SELECT * FROM tblcertificate";
    $tblvalue3 = array();
    $select3 =$connect->tbl_select($tblquery3, $tblvalue3);
    $count3 = count($select3);

?>

<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 ml-4 mb-0 text-gray-800">Dashboard</h1>
                        <a class="d-none d-sm-inline-block btn btn-success btn-sm shadow-sm" style="color:#ffffff;"> Welcome Admin</a>
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
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Registered Students</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count?></div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
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
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Paid Student</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count1?></div>
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
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Modules</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count2?></div>
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
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Certificate Request</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count3?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-certificate fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 ml-4 mb-0 text-gray-800">Last Ten Registered Students</h1>
                    </div>
                    <div style="overflow-x:auto">
<table class="table table-hover table-bordered">
	<thead>
	<tr>
        <th>S/N</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Course</th>
        <th>Course Grade</th>
		<th>Payment Status</th>
	</tr>
	</thead>
	<tbody>
		<tr>
		<?php
			$tblquery4 = "SELECT * FROM tblstudents LIMIT 10";
			$tblvalue4 = array();
			$select4 =$connect->tbl_select($tblquery4, $tblvalue4);
			
			$si = 1;
			foreach($select as $data){
			extract($data)
		?>
        <?php if($stu_paymentStatus == "Paid"){
            $color = "#27ae60";
        }
            elseif($stu_paymentStatus == "Not Paid"){
                $color = "#c0392b";
            }
        ?>
	<td><?php echo $si++;?></td>
	<td><?php echo $stu_firstName;?></td>
	<td><?php echo $stu_lastName;?></td>
	<td><?php echo $stu_course;?></td>
	<td><?php echo $stu_courseGrade;?></td>
	<td><button style="padding:0.2rem 0.4rem; color:#fff; background-color:<?php echo $color;?>; outline:none;border:none;"><?php echo $stu_paymentStatus;?></button></td>
	</tr>


	<?php  }?>
	</tbody>
	
</table>
</div>	
</div>
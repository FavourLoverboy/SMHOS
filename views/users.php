<?php 
		if($_SESSION['accessType'] == "User"){
            echo "<script>window.location='dashboard'</script>";
        }
?>

<div class="container-fluid">
<div class="row">
<div class="col-xl-12 col-md-12 mb-4">

                        <!-- Illustrations -->
                        <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="h4 m-0 font-weight-bold text-primary">View All Student</h6>
                                </div>
                                <div class="card-body">
                                   
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
        <th>Action</th>
	</tr>
	</thead>
	<tbody>
		<tr>
		<?php
			$tblquery = "SELECT * FROM tblstudents ORDER BY stu_createdAt ASC";
			$tblvalue = array();
			$select =$connect->tbl_select($tblquery, $tblvalue);
			
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
	<td><a href="users_profile?stID=<?php echo $stu_transID;?>">View More</a></td>
	</tr>


	<?php  }?>
	</tbody>
	
</table>
</div>	
                                </div>
                            </div>
                        </div>
    </div>
</div>
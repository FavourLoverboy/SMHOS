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
                                    <h6 class="h4 m-0 font-weight-bold text-primary">Certificate Requests</h6>
                                </div>
                                <div class="card-body">
                                   
                                <div style="overflow-x:auto">
<table class="table table-hover table-bordered">
	<thead>
	<tr>
		<th>S/N</th>
		<th> Student's Email</th>
		<th>Course</th>
        <th>Course Grade</th>
        <th>Date</th>
	</tr>
	</thead>
	<tbody>
		<tr>
		<?php
			$tblquery = "SELECT * FROM tblcertificate ORDER BY cert_date ASC";
			$tblvalue = array();
			$select =$connect->tbl_select($tblquery, $tblvalue);
			
			$si = 1;
			foreach($select as $data){
			extract($data)
		?>

	<td><?php echo $si++;?></td>
	<td><?php echo $cert_students;?></td>
	<td><?php echo $cert_course;?></td>
    <td><?php echo $cert_grade;?></td>
    <td><?php echo $cert_date;?></td>
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
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
                                    <h6 class="h4 m-0 font-weight-bold text-primary">View All Modules</h6>
                                </div>
                                <div class="card-body">
                                   
                                <div style="overflow-x:auto">
<table class="table table-hover table-bordered">
	<thead>
	<tr>
		<th>S/N</th>
		<th>Module Title</th>
		<th>Course</th>
        <th>Course Grade</th>
        <th>Action</th>
	</tr>
	</thead>
	<tbody>
		<tr>
		<?php
			$tblquery = "SELECT * FROM tblmodules";
			$tblvalue = array();
			$select =$connect->tbl_select($tblquery, $tblvalue);
			
			$si = 1;
			foreach($select as $data){
			extract($data)
		?>
	<td><?php echo $si++;?></td>
	<td><?php echo $mod_title;?></td>
	<td><?php echo $mod_course;?></td>
	<td><?php echo $mod_courseGrade;?></td>
	<td><a href="details?course=<?php echo $mod_title?>&id=<?php echo $mod_ID;?>">View More</a></td>
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
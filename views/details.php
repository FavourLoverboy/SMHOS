<?php 
 if($_SESSION['accessType'] == "User"){
    echo "<script>window.location='dashboard'</script>";
}
       
        if($_GET){
            $course = urldecode($_GET['course']);
            $tblquery = "SELECT * FROM tblmodules WHERE mod_title = :course";
            $tblvalue = array(
                ':course' => $course
            );
            $select =$connect->tbl_select($tblquery, $tblvalue);
            foreach($select as $data){
                extract($data);
            }
        }
           
?>


<div class="container">
<div class="row">
<div class="col-xl-12 col-md-12 mb-4">

                        <!-- Illustrations -->
                        <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="h4 m-0 font-weight-bold text-primary">Module Details</h6>
                                </div>
                                <div class="card-body">
                                    <h1 class="text-dark mb-4"><?php echo  $mod_title;?></h1>
                                    <p class="mb-4"> <?php echo $mod_content; ?></p>
                                </div>
                            </div>
                        </div>
    </div>
</div>
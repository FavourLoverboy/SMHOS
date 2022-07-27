<?php 
     if($_SESSION['accessType'] == "Admin"){
        echo "<script>window.location='amdashboard'</script>";
    }
$tblquery = "SELECT * FROM tblstudents WHERE stu_email = :user";
    $tblvalue = array(
        ':user' => $_SESSION['email']
    );
    $select =$connect->tbl_select($tblquery, $tblvalue);
    foreach($select as $data){
        extract($data);
    };
 if($stu_paymentStatus == "Paid"){

 }else{
     echo "<script>window.location='dashboard'</script>";
 }
    ?>

<div class="container">

<div class="row">
<div class="col-xl-12 col-md-12 mb-4">
                        <!-- Illustrations -->
                        <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="h5 m-0 font-weight-bold text-primary">Start Learning</h6>
                                </div>
                                <div class="card-body">
                                <div class="row">

       
<div class="col-xl-12 col-md-12 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <?php 
                    $tblquery = "SELECT * FROM tblmodules WHERE mod_course = :course";
                    $tblvalue = array(
                        ':course' => $_SESSION['course']
                    );
                    $select =$connect->tbl_select($tblquery, $tblvalue);
                    $si = 1;
                    foreach($select as $data){
                        extract($data);
                   
            ?>
            <div class="row no-gutters">
            <div class="col-1 mr-1">
                    <div class="h2 text-gray-600 font-weight-bold text-dark text-uppercase mb-1">
                        <?php echo $si++?></div>

                </div>
                <div class="col mr-2">
                    <div class="text-lg font-weight-bold text-success text-uppercase">
                        <?php echo $mod_title;?></div><br>
                        <div class="text-md text-dark text-uppercase mb-1">
                        <?php echo $mod_desc?></div>
                </div>
                <div class="col-auto">
                <?php 
                        $tblquery1 = "SELECT * FROM tblmodulescompleted WHERE com_moduleNo = :id && com_completedBy = :user";
                        $tblvalue1 = array(
                            ':id' => $mod_ID,
                            ':user' => $_SESSION['email']
                        );
                        $search =$connect->tbl_select($tblquery1, $tblvalue1);
                        if($search){
                ?>
                   <a href="classroom?course=<?php echo $mod_title?>&id=<?php echo $mod_ID;?>"><button type="button" class="btn btn-success btn-md">Completed</button></a>         
                <?php }else{?>
                <a href="classroom?course=<?php echo $mod_title?>&id=<?php echo $mod_ID;?>" style="border:1px solid #0da64d;font-size:1.4rem;padding:0.2rem 2rem;border-radius:3px;color:#0da64d;">Start</a>
               <?php }?>
                </div>
                
            </div>
            <hr>
            <?php  }?>
        </div>
    </div>
</div>
</div>
</div>

                                </div>
                            </div>
                        </div>
</div>
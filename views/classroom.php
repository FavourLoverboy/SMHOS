<?php 
 if($_SESSION['accessType'] == "Admin"){
    echo "<script>window.location='amdashboard'</script>";
}
    $tblquery5 = "SELECT * FROM tblstudents WHERE stu_email = :user";
    $tblvalue5 = array(
        ':user' => $_SESSION['email']
    );
    $select3 =$connect->tbl_select($tblquery5, $tblvalue5);
    foreach($select3 as $data3){
        extract($data3);
    };
 if($stu_paymentStatus == "Paid"){

 }else{
     echo "<script>window.location='dashboard'</script>";
 }
        $tblquery2 = "SELECT * FROM tblmodulescompleted WHERE com_moduleNo = :moduleNo";
        $tblvalue2 = array(
            ':moduleNo' => htmlspecialchars($_GET['id'])
        ); 
        $search =$connect->tbl_select($tblquery2, $tblvalue2);
        if($search){
            $disable = "disabled";
            $buttonType = "button";
        }else{
            $buttonType = "submit";
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
           if($_POST){
             $tblquery6 = "SELECT * FROM  tbltest WHERE tst_courseGrade = :grade && tst_course = :course && tst_module = :module";
            $tblvalue6 = array(
                ':grade' => $_SESSION['grade'],
                ':course' => $_SESSION['course'],
                ':module' => $course
            );
            $testSearch =$connect->tbl_select($tblquery6, $tblvalue6);
            foreach($testSearch as $Test){
                extract($Test);
            }
            if($testSearch){
                echo "
                <script>
                swal({
                title: 'Complete test to Continue', 
                text: 'Please Click On Button to continue to test.', 
                icon: 'warning',
                }).then(function(){
                    window.location='test?module=$course'
                });
                </script>
            ";    
            }else{
            $tblquery1 = "INSERT INTO tblmodulescompleted VALUES(:com_ID, :com_moduleNo, :com_completedBy, :com_course, :com_completedTime)";
            $tblvalue1 = array(
                ':com_ID' => NULL,
                ':com_moduleNo' => $mod_ID,
                ':com_completedBy' => $_SESSION['email'],
                ':com_course' => $course,
                ':com_completedTime' => date("Y-m-d h:i:s")
            );
            $insert =$connect->tbl_insert($tblquery1, $tblvalue1);
            if($insert){
                echo "
                <script>
                swal({
                title: 'Success', 
                text: 'Hurray Module successfully Completed Click OK to continue', 
                icon: 'success',
                }).then(function(){
                    window.location='learn'
                });
                </script>
            ";
            }
        }
        }
?>


<div class="container">
<div class="row">
<div class="col-xl-12 col-md-12 mb-4">

                        <!-- Illustrations -->
                        <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="h4 m-0 font-weight-bold text-primary">Classroom</h6>
                                </div>
                                <div class="card-body">
                                    <h1 class="text-dark mb-4"><?php echo  $mod_title;?></h1>
                                    <p class="mb-4"> <?php echo $mod_content; ?></p>
                                    <form method="POST" action="classroom?course=<?php echo $mod_title?>">
                                        <button type="<?php echo $buttonType?>" name="complete" class="btn-success btn btn-md <?php echo $disable?>">Complete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
    </div>
</div>
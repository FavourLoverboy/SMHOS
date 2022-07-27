
<?php 
         if($_SESSION['accessType'] == "Admin"){
            echo "<script>window.location='amdashboard'</script>";
        }

        $module = urldecode($_GET['module']);
        $tblquery4 = "SELECT * FROM tblmodules WHERE mod_title = :module";
        $tblvalue4 = array(
            ':module' => $module
        );
        $select1 =$connect->tbl_select($tblquery4, $tblvalue4);
        foreach($select1 as $data1){
            extract($data1);
        }

        if($_POST){
            $module = urldecode($_GET['module']);
            extract($_POST);
            $tblquery1 = "SELECT * FROM tbltest WHERE tst_answer = :answer && tst_module = :module && tst_courseGrade = :grade && tst_course = :course";
            $tblvalue1 = array(
                ':answer' => htmlspecialchars($answer),
                ':module' => htmlspecialchars($module),
                ':grade' => $_SESSION['grade'],
                ':course' => $_SESSION['course']

            );
            $select =$connect->tbl_select($tblquery1, $tblvalue1);
            if($select){
            $count = count($select);
            $score = $count * 75;
            if($score <= 65){
                echo "
                <script>
                swal({
                title: 'Sorry', 
                text: 'Sorry You scored below our pass mark so you cannot continue. you need to pass the test before you can continue. your score is ($score%)', 
                icon: 'error',
                }).then(function(){
                    window.location='learn'
                });
                </script>
            "; 
            }elseif($score > 65){
                $tblquery3 = "INSERT INTO tbltestResult VALUES(:rst_ID, :rst_student, :rst_score, :rst_dateSubmited)";
                $tblvalue3 = array(
                    ':rst_ID' => NULL,
                    ':rst_student' => $_SESSION['email'],
                    ':rst_score' => $score,
                    ':rst_dateSubmited' => date("Y-m-d")
                );
                $insert =$connect->tbl_insert($tblquery3, $tblvalue3);
                if($insert){
            $tblquery7 = "INSERT INTO tblmodulescompleted VALUES(:com_ID, :com_moduleNo, :com_completedBy, :com_course, :com_completedTime)";
            $tblvalue7 = array(
                ':com_ID' => NULL,
                ':com_moduleNo' => $mod_ID,
                ':com_completedBy' => $_SESSION['email'],
                ':com_course' => $_SESSION['course'],
                ':com_completedTime' => date("Y-m-d h:i:s")
            );
            $insert2 =$connect->tbl_insert($tblquery7, $tblvalue7);
            if($insert2){
                echo "
                <script>
                swal({
                title: 'Success', 
                text: 'Hurray Module successfully Completed. your score is ($score%), Click OK to continue', 
                icon: 'success',
                }).then(function(){
                    window.location='learn'
                });
                </script>
            ";
            }
                }
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
                                    <h6 class="h5 m-0 font-weight-bold text-primary">Take Test</h6>
                                </div>
                                <div class="card-body">
           <form method="POST" action="test?module=<?php echo $_GET['module']?>" class="user">

            <?php 
                    if($_GET){
                        $module = urldecode($_GET['module']);
                    $tblquery = "SELECT * FROM tbltest WHERE tst_course = :course && tst_courseGrade = :grade && tst_module = :module";
                    $tblvalue = array(
                        ':course' => $_SESSION['course'],
                        ':grade' => $_SESSION['grade'],
                        ':module' => htmlspecialchars($module)
                    );
                    $select =$connect->tbl_select($tblquery, $tblvalue);
                    $si = 1;
                    $answer = 1;
                    foreach($select as $data){
                        extract($data);
                   
            ?>
           <div class="h4 text-gray-900"><span><?php echo $si++?>.</span> <?php echo $tst_question?></div>
           <?php
               $opts = explode(",", $tst_options);
               foreach($opts as $opt){
              
           ?>
<div class="form-check">
<input class="form-check-input" value="<?php echo $opt?>" type="radio" name="answer" id="<?php echo $opt?>">
<label class="form-check-label h5" for="<?php echo $opt?>">
<?php echo $opt?>
</label>
</div>
                <?php  }?>
  
            <hr>
            <?php  } }?>
            <button type="submit" class="btn btn-success btn-user1" style="font-size:1.2rem; color:#ffffff">
                                    Submit <i class="fas fa-sign-out-alt"></i></i></button>
</div>
</form>
                                </div>
                            </div>
                        </div>
</div>

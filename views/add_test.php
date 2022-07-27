<?php 
        if($_SESSION['accessType'] == "User"){
            echo "<script>window.location='dashboard'</script>";
        }
        if($_POST){
            extract($_POST);
            $tblquery = "INSERT INTO tbltest VALUES(:tst_ID, :tst_course, :tst_courseGrade, :tst_module, :tst_question, :tst_options, :tst_answer)";
            $tblvalue = array(
                ':tst_ID' => NULL,
                ':tst_course' => htmlspecialchars($course),
                ':tst_courseGrade' => htmlspecialchars($grade),
                ':tst_module' => htmlspecialchars($title),
                ':tst_question' => htmlspecialchars($question),
                ':tst_options' => htmlspecialchars($option),
                ':tst_answer' => htmlspecialchars($answer)
            );
            $insert =$connect->tbl_insert($tblquery, $tblvalue);
            if($insert){
                echo "
                 <script>
                 swal({
                 title: 'Success', 
                 text: 'Test Successfully Added', 
                 icon: 'success',
                 });
                 </script>
             ";
            }
        }
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">

        <div class="card shadow mb-4">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Add Test</h6>
                                </div>
                                <div class="card-body">
                                <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Add Test to Modules</h1>
                            </div>
                                <form method="POST" action="add_test" class="user">
                                <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="grade">* Course Grade:</label>
                            <select name="grade" class="custom-select" id="grade" required>
                                    <option value="" disabled selected> Choose Course Grade</option>
                                    <option value="Basic certificate course">Basic certificate course</option>
                                    <option value="Diploma">Diploma</option>
                                    <option value="Masters">Masters</option>
                                    </select>
                                    </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="partnership">* Assign to Course:</label>
                            <select name="course" class="custom-select" id="course" required>
                                    <option value="" disabled selected> Choose Course to Assign</option>
                                    <?php
                                        $tblquery = "SELECT * FROM tblcourses";
                                        $tblvalue = array();
                                        $select =$connect->tbl_select($tblquery, $tblvalue);
                                        foreach($select as $data){
                                            extract($data);
                                            echo "<option value='$crs_name'>$crs_name</option>";
                                        }
                                    ?>
                                    </select>
                        </div>

                                    
                                </div>
                                <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="module">* Module Title:</label>
                                <input type="text" class="form-control form-control-user" id="title" name="title" required>
                                    </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="question">*Test Question:</label>
                            <input type="text" class="form-control form-control-user" id="question" name="question" required>
                        </div>
                                    </div>
                                    <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="option">* Test Options:</label>
                                <input type="text" placeholder="Comma should be used at the end of each option" class="form-control form-control-user" id="option" name="option" required>
                                    </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="answer">*answer:</label>
                            <input type="text" class="form-control form-control-user" id="answer" name="answer" required>
                        </div>
                                    </div>
                                <button type="submit" class="btn btn-success btn-user1" style="font-size:1.2rem; color:#ffffff">
                                    Add Test</i></button>
                                </form>
                                     
                                 </div>   
                            </div>
        </div>
    </div>
</div>
</div>


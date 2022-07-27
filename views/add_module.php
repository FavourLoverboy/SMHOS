<?php 
        if($_SESSION['accessType'] == "User"){
            echo "<script>window.location='dashboard'</script>";
        }

        if($_POST){
            extract($_POST);
            $tblquery = "INSERT INTO tblmodules VALUES(:mod_ID, :mod_title, :mod_course, :mod_courseGrade, :mod_desc, :mod_content)";
            $tblvalue = array(
                ':mod_ID' => NULL,
                ':mod_title' => htmlspecialchars($title),
                ':mod_course' => htmlspecialchars($course),
                ':mod_courseGrade' => htmlspecialchars($grade),
                ':mod_desc' => htmlspecialchars($desc),
                ':mod_content' => $content
            );
            $insert =$connect->tbl_insert($tblquery, $tblvalue);
            if($insert){
                echo "
                 <script>
                 swal({
                 title: 'Success', 
                 text: 'Module Successfully Added', 
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
                                    <h6 class="m-0 font-weight-bold text-primary">Add Module</h6>
                                </div>
                                <div class="card-body">
                                <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Add Modules to Courses</h1>
                            </div>
                                <form method="POST" action="add_module" class="user">
                                <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="title">* Title of Module:</label>
                                <input type="text" class="form-control form-control-user" id="title" name="title" required>
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
                                <label for="desc">* Module Description:</label>
                                <input type="text" class="form-control form-control-user" id="desc" name="desc" required>
                                    </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="grade">* Course Grade:</label>
                            <select name="grade" class="custom-select" id="grade" required>
                                    <option value="" disabled selected> Choose Course Grade</option>
                                    <option value="Basic certificate course">Basic certificate course</option>
                                    <option value="Diploma">Diploma</option>
                                    <option value="Masters">Masters</option>
                                    </select>
                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                    <textarea name="content" id="editor1" rows="10" cols="103">
                Module Content Here.
            </textarea>
                                    </div>
                                    </div>
                                <button type="submit" class="btn btn-success btn-user1" style="font-size:1.2rem; color:#ffffff">
                                    Add Module</i></button>
                                </form>
                                     
                                 </div>   
                            </div>
        </div>
    </div>
</div>
</div>
                <script>
                // Replace the <textarea id="editor1"> with a CKEditor 4
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>
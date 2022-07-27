<?php 
        // if(isset($_POST['course'])){
        //     $module_arr = array();
        //     $grade = $_POST['grade'];
        //     $course = $_POST['course'];
        //     $tblquery = "SELECT * FROM tblmodules WHERE mod_course = :course";
        //     $tblvalue = array(
        //         ':course' => htmlspecialchars($course)
        //     );
        //     $select =$connect->tbl_select($tblquery, $tblvalue);
        //     foreach($select as $data){
        //         extract($data);
        //         $module_arr[] = array("name" => $mod_title);
        //     }
        // }
            if($_POST['course'] == "Cyber Security"){
                $module_arr = array(
                    'name' => "Goodnews Nelson"
                );
            }

        echo json_encode($module_arr);
?>
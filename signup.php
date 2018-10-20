
<?php
    $con = mysqli_connect("localhost", "root", "", "lsm_project") or die(mysqli_error());
    mysqli_select_db($con, "lsm_project");
    $reg_no = "";
    $password = "";
    $name = "";
    $hostel_block = "";
    $gender="";
    $mob_no = "";
    $email = "";
    if (!empty($_REQUEST['reg_no'])) {
        $reg_no = $_REQUEST['reg_no'];
    }
    if (!empty($_REQUEST['name'])) {
        $name = $_REQUEST['name'];
    }
    if (!empty($_REQUEST['password'])) {
        $password = $_REQUEST['password'];
    }
    if (!empty($_REQUEST['gender'])) {
        $gender = $_REQUEST['gender'];
    }
    if (!empty($_REQUEST['hostel_block'])) {
        $hostel_block = $_REQUEST['hostel_block'];
    }
    if (!empty($_REQUEST['mob_no'])) {
        $mob_no = $_REQUEST['mob_no'];
    }
    if (!empty($_REQUEST['email'])) {
        $email = $_REQUEST['email'];
    }
    if ($reg_no!="" && $name!="" && $password!=""  && $gender!="" && $hostel_block!="" && 
            $mob_no!="" && $email!=""){
        
        $query = "insert into users values(\"$reg_no\",\"$name\",\"$password\",\"$gender\",\"$hostel_block\",$mob_no,\"$email\")";
        
        echo mysqli_query($con,$query) or die(mysqli_error($con)."occurs");
        
        if(!mysqli_query($con,$query)){
            header('Location: student1.html');
           // echo 'You are logged in';
        }
        
        else{
            echo 'Signup Failed!<br> Please make sure that you enter the correct details';
        }
    }
    else
        {echo 'Failed!';}
?>

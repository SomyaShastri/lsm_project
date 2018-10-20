<?php
    $con = mysqli_connect("localhost", "root", "", "lsm_project") or die(mysqli_error());
    mysqli_select_db($con, "lsm_project");
    $admin_id = "";
    $pwd = "";
    $shop_name = "";
    $address = "";
    $mobile_no = "";
    $open_time="";
    $close_time = "";
    if (!empty($_REQUEST['shop_name'])) {
        $shop_name = $_REQUEST['shop_name'];
    }
    if (!empty($_REQUEST['admin_id'])) {
        $admin_id = $_REQUEST['admin_id'];
    }
    if (!empty($_REQUEST['pwd'])) {
        $pwd = $_REQUEST['pwd'];
    }
    if (!empty($_REQUEST['mobile_no'])) {
        $mobile_no = $_REQUEST['mobile_no'];
    }
    if (!empty($_REQUEST['address'])) {
        $address = $_REQUEST['address'];
    }
    
    if (!empty($_REQUEST['open_time'])) {
        $open_time = $_REQUEST['open_time'];
    }
    if (!empty($_REQUEST['close_time'])) {
        $close_time = $_REQUEST['close_time'];
    }
    if ($shop_name!="" && $admin_id!="" && $pwd!="" && $mobile_no!="" && $address!="" && $open_time!="" && $close_time!=""){
        
        $query = "insert into admin values(\"$shop_name\", \"$admin_id\",\"$pwd\",$mobile_no,\"$address\",\"$open_time\",\"$close_time\")";
        
        echo mysqli_query($con,$query) or die(mysqli_error($con));
        
        if(!mysqli_query($con,$query)){
            header('Location: req.html');
        }
        
        else{
            echo 'Signup Failed!<br> Please make sure that you enter the correct details';
        }
    }
    else{echo 'fail';}
?>
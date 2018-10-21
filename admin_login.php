<?php
        $con = mysqli_connect("localhost", "root", "", "software_project") or 
                die(mysqli_error());

                
        mysqli_select_db($con, "software_project");
        $uname = "";
        $pwd = "";
        if (!empty($_REQUEST['uname'])) {
            $uname = $_REQUEST['uname'];
            //echo $uname;
        }
        if (!empty($_REQUEST['pwd'])) {
            $pwd = $_REQUESTT['pwd'];
        }
        if(!empty($uname) && !empty($pwd)){
            //echo "a";
        $query = "select * from admin where admin_id = \"$uname\" "
                . "and pwd = \"$pwd\"";
        $result = mysqli_query($con, $query);
        $num = mysqli_num_rows($result);
        if($num){
            setcookie("details",$uname);
            header("location:Profilepage.php");
        }
        else{
            $msg = 'Login Failed! Please make sure that you enter the correct '
                    . 'details';
            echo "<script type = \"text/javascript\">alert(\"$msg\")</script>";
        }
        /*if(($num === 0) and (isset($_COOKIE["details"]))){
            setcookie("details",$uname, time()-10);
        }*/
        }
    ?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel = "stylesheet" type="text/css" href = "css/style.css" >
        <link href = "css/style2.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
    </head>
    <body>
        <ul>
            <li><a class= "logo" href="home.php"><b>The Store</b></a></li>
            <div class = "floatright">
            <li><a class="active" href="loginpg.php">Login</a></li>
            <li><a class= "navbar" href="signup.php">Signup</a></li>
            </div>
        </ul>
        <div ng-app="loginapp" ng-controller="logincontroller">
        <form method="post" action="loginpg.php" class="loginform">
        <table align = "center">
                <tr>
                <td>
                    <h1 style="color: #ff6666;">Login</h1>
                </td>
                </tr>
                <tr>
                    <td><input required type="text" name="uname" placeholder="Username" class="input"></td>
                </tr>
                <tr>
                    <td><input required type="password" name="pwd" placeholder="Password" class="input"></td>
                </tr>
                <tr>
                    <td>
                        <br><br><input type="submit" class = "button" value = "Login!">
                    </td>
                </tr>
                <tr>
                    <td>
                        <br><br><a href ="signup.php">New user? Sign up.</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <br><br><a  href ="forgotpwd.php">Forgot Password?</a>
                    </td>
                </tr>
        </table>
        </form>
        </div>
        <script>
         var loginapp = angular.module("loginapp", []);
         
         mainApp.controller('logincontroller', function($scope) {
            $scope
            
         });
      </script>
    </body>
</html>

<?php
session_start();

include "himikoConnection.php";

if(isset($_POST['himikoSignUp'])){
    $himikofname = $_POST['fname'];
    $himikolname = $_POST['lname'];
    $himikoemail = $_POST['email'];
    $himikouname = $_POST['uname'];
    $himikopass = $_POST['pass'];
    $himikocpass = $_POST['cpass'];
    $_SESSION['himikores'] = 0;

    if($himikopass === $himikocpass){
        $sql = "INSERT INTO himikoregistration 
                (fname, lname, email, uname, pass, cpass, himiko_Type, himiko_Status) 
                VALUES 
                ('$himikofname','$himikolname','$himikoemail','$himikouname','$himikopass','$himikocpass', 0, 0)";

        $regsql = mysqli_query($himikoConn, $sql);

        $_SESSION['himikofname'] = $himikofname;
        $_SESSION['himikores'] = 1;

        header("location: himikoRegisteroutput.php");
        exit();

    } else {
        $_SESSION['himikores'] = 0;
        header("location: himikoRegisteroutput.php");
        exit();
    }
}
?>

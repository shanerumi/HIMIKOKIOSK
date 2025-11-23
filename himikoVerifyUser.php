<?php
session_start();

include "himikoConnection.php";

if(isset($_POST['himikoLogIn'])){
    $himikouname = $_POST['uname'];
    $himikopass = $_POST['pass'];

    $himikoverifysql =  "SELECT * FROM himikoregistration WHERE uname = '$himikouname'";

    $himikoverify = mysqli_query($himikoConn, $himikoverifysql);

    if(mysqli_num_rows($himikoverify) === 1)
    {
        $himikouser = mysqli_fetch_assoc($himikoverify);

        $himikovpass = $himikouser['pass'];
        $himikousername = $himikouser['uname'];
        $himikotype = $himikouser['himiko_Type'];
        $himikostatus = $himikouser['himiko_Status'];
        $himikofname = $himikouser['fname'];
        
        if ($himikopass === $himikovpass) {

            switch($himikotype){
                case '0':
                    if($himikostatus === '1'){

                        $_SESSION['himikousername'] = $himikousername;
                        echo "<script>
                            alert('Successful Log in. Welcome, Client {$himikofname}.');

                            parent.frames['nav_column'].location.href = 'himikoClientNav.php';
                            parent.frames['mid_column'].location.href = 'himikoClientProduct.php';
                        </script>";
                    }
                    else{
                        header("Location: himikoLogin.php?message=Your account is still not approved by the admin.");
                        exit(); 
                    }
                    break;
                case '1':
                    $_SESSION['himikousername'] = $himikousername;
                    echo "<script>
                        alert('Successful Log in. Welcome, Admin {$himikofname}.');

                        parent.frames['nav_column'].location.href = 'himikoAdminNav.php';
                        parent.frames['mid_column'].location.href = 'himikoAdminProduct.php';
                    </script>";
                    break;
                default:
                    header("Location: himikoGuestProduct.php");
            }
            exit();
        }
        else{
            header("Location: himikoLogin.php?message=Incorrect Password");
            exit();
        }
    }
    else{
        header("Location: himikoLogin.php?message=User does not exist");
        exit();
    }
}
?>

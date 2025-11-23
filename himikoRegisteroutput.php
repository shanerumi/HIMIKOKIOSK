<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="himikoregoutput.css">
    <title>Register Output</title>
</head>
<body>
    <?php
        session_start();

        $himikores = $_SESSION['himikores'];

        if($himikores === 1){
    ?>
        <h1>Registered successfully</h1>
        <?php
            $himikofname = $_SESSION['himikofname'];
        ?>
        <h2>Hello, <span style="color: red;"><?php echo $himikofname; ?></span>! You are now registered, please wait for the admin to approve your account.</h2>
        <br>
    <?php
        }

        else{
    ?>
        <h1>Registration failed.</h1>
        <h2>Passwords should match. Please try again.</h2>
        <br>
    <?php
        }

        session_destroy();
    ?>
    
    <a href="himikoRegister.php"><button class="himikoClear">Return</button></a>
</body>
</html>

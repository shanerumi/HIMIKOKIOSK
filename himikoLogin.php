<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="himikologin.css">
    <title>Login</title>
</head>
<body>
    <form action="himikoVerifyUser.php" method="POST" autocomplete="OFF">
        <h1>Sign In</h1>
        <br>
        <table>
            <tr>
                <td><h2>Username</h2></td>
                <td><input type="text" name="uname"></td>
            </tr>
            <tr>
                <td><h2>Password</h2></td>
                <td><input type="password" name="pass"></td>
            </tr>
        </table>
        <br>
        <p id="message"></p>
        <button type="submit" class="himikoLogIn" name="himikoLogIn">Log In</button>
        <button type="reset" class="himikoClear">Clear</button>
    </form>
    <br><br>

    <script>
        function hideErrorMessage() {
            const errorMessage = document.getElementById('message');
            if (errorMessage) {
                setTimeout(() => {
                    errorMessage.innerHTML = '';
                }, 5000);
            }
        }
        function showLoading() {
            document.getElementById("loading").style.display = "block";
            document.getElementById("loading").style.fontSize = "20px";
            document.getElementById("loading").style.fontFamily = "Raleway";
            document.getElementById("loading").style.color = "green";

            setTimeout(function(){
                document.querySelector("form").submit();
            }, 5000); 
        }
    </script>
</body>

<?php
    if(isset($_GET['message'])) {
        echo "<script>
        const s = 'Invalid log in credentials';
        const status = document.getElementById('message');
        status.innerText ='".$_GET['message']."';
        status.style.color = 'red';
        hideErrorMessage();
        </script>";
    }
?>
</html>

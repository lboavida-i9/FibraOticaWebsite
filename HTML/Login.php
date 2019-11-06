<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    include_once "Content/_header.html";
    ?>
    <link rel="stylesheet" href="../PHP/Style.php/Login.scss">
    <script src="../JS/Login.js"></script>
    <title>Homepage</title>
</head>

<?php
include_once "../PHP/LoginHelper.php";
?>

<body>
    <?php
    include_once "Content/Navbar.html";
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 col-12 mt-5">
                <div class="form-group">
                    <label for="EmailTxt">Email address</label>
                    <input type="email" id="EmailTxt" class="form-control" placeholder="Enter email">
                </div>

                <div class="form-group">
                    <label for="PasswordTxt">Password</label>
                    <input type="password" id="PasswordTxt" class="form-control" placeholder="Enter your password">
                </div>

                <button onclick="Login()" class="btn btn-primary w-100-small">Submit</button>                
            </div>
        </div>
    </div>
</body>

</html>
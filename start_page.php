<!DOCTYPE html>
<?php
require_once('DB.php');
$connect = GetPDO();
$username = $_POST['username'];
$password = $_POST['password'];
if ($username && $password){
    if(checkUserCredentials($connect, $username, $password )) {
        header('Location: main.php');
        exit();
    } else {
        header('Location: registration.php');
        exit();
    }
}

$connect = null;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Authorization</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <br>
    <br>
    <h1 style="text-align: center; text-decoration-color: black; color: greenyellow">Авторизація</h1>
    <br>
    <br>
    <br>
    <br>
    <form method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
<?php

?>
</body>
</html>

<!DOCTYPE html>
<?php
require_once('DB.php');
$connect = GetPDO();

$username = $_POST['username'];
$password = $_POST['password'];
var_dump(checkUserCredentials($connect, $username, $password));
if (!empty($_POST['username']) && !empty($_POST['password'])){
    if (!checkUserCredentials($connect, $username, $password)){
        echo 'Add new';
        addNewUser($connect, $username, $password);
        header('Location: start_page.php');
        exit();
    } else{header('Location: start_page.php');
        exit();}

    echo 'Redirect is not active.';
}
$connect = null;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <br>
    <br>
    <h1 style="text-align: center; background-color: greenyellow; color: black">REGISTRATION</h1>
    <br>
    <br>
    <br>
    <br>
    <form method="post">
        <div class="mb-3">
            <label for="exampleInputUsername" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="exampleInputUsername" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

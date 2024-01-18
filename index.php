<?php
session_start();
if (!isset($_COOKIE['counter'])){
    $counter = 0;
} else {
    $counter = $_COOKIE['counter'];
}
$counter++;
setcookie('counter', $counter);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Education</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
<div class="container">
    <?php
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
        if(empty($_SESSION['user'])){
            $_SESSION['user'] = [];
        }
        $_SESSION['is_auth'] = true;
        $id = count($_SESSION['user']);
        $_SESSION['last_id'] = $id;
        $_SESSION['user'][$id] = [
                'email'=>$_POST['email'],
            'password'=>$_POST['password']
        ]
    ?>
        <div style="color: green; background-color: black">
            Ви намагаєтесь залогінитись з Email:  <?php echo $_POST['email']; ?>
        </div>
    <?php } else {?>
        <div style="color: red; background-color: black">
            <h1>Ви не вказали дані входу!</h1>
        </div>

    <br>
    <br>
    <br>


    <?php }
        var_dump($_SESSION).PHP_EOL;
        var_dump($_COOKIE).PHP_EOL;
    ?>

    <br>
    <br>
    <br>
    <br>
    <?php
    if (empty($_SESSION['is_auth']) || $_SESSION['is_auth'] === false):
    ?>
    <form method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php
    else:
    ?>
    <div class="text-bg-success p-3">Ви вже зареєструвались з наступним емейлом: <?php echo $_SESSION['user'][$_SESSION['last_id']]['email']?></div>
    <?php
    endif;
    ?>
</div>
</body>
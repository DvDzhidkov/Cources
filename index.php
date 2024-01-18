<?php
session_start();
session_regenerate_id(true);
/*if (!isset($_COOKIE['counter'])){
    $counter = 0;
} else {
    $counter = $_COOKIE['counter'];
}
$counter++;
setcookie('counter', $counter);*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Education</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <title>Education</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <br>
    <br>
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
            ];
            $dif = ' | ';
            $data = 'Login: ' . $_POST['email'] . $dif . 'Password: ' . $_POST['password'];

            $fillFile = fopen("trash.txt", "a+") or die("He-he-he, file can't be open.");
            fwrite($fillFile, $data . PHP_EOL);
            fclose($fillFile);
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

        ?>
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
        <br>
        <br>
        <br>
        <form method="post">
            <input type="hidden" name="delete_all" value="1">
            <button type="submit" class="btn btn-danger" name="delete_all" value="true">Delete all</button>
        </form>

    <?php

    ?>
        <br>
        <br>
        <br>
        <form method="post" action="">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="email_to_delete" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary" name="delete_row" value=true>Submit</button>
        </form>
    <?php
    if(isset($_POST['delete_all']) && $_POST['delete_all'] == 'true') {
        file_put_contents("trash.txt", '');
    }


    if (isset($_POST['delete_row']) && isset($_POST['email_to_delete'])) {
        $file_content = file("trash.txt", FILE_IGNORE_NEW_LINES);
        $index = array_search($_POST['email_to_delete'], $file_content);
        if ($index !== false) {
            unset($file_content[$index]);
            file_put_contents("trash.txt", implode(PHP_EOL, $file_content));
            echo '<h3>Row successfully deleted</h3>';
        } else {
            echo '<h3>Error: Email not found</h3>';
        }
    } else {
        echo '<h1>Ooops something is wrong</h1>';
    }
    var_dump($_POST);
    session_write_close();
    ?>

    </div>
</body>
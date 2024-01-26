<!DOCTYPE html>
<?php
require_once('DB.php');
$connect = GetConnection();
$messages = getAllMessages($connect);
//showSomething($messages);
if(!empty($_POST['name']) && !empty($_POST['message']))
{
    addNewMessage($connect, $_POST['name'], $_POST['message']);
} echo "Empty fields";
echo "<br>";

mysqli_close($connect);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Education</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
<div class="card" style="width: 18rem;">
    <div class="card-header">
        Chat
    </div>
    <ul class="list-group list-group-flush">
        <?php foreach ($messages as $message): ?>
        <li class="list-group-item">
            <strong><?= $message['name'] ?></strong> at
            <?= $message['date'] ?>
            <i><?= $message['message'] ?></i>
        </li>
        <?php endforeach; ?>
    </ul>
    <br>
    <br>
    <br>
    <form method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Message</label>
            <input type="text" class="form-control" name="message">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php
    var_dump($messages);
    ?>
</div>
</body>

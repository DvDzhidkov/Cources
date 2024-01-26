<?php
function  GetConnection()
{
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'mainDb';
    $connect = mysqli_connect($host, $username, $password, $dbname);
    if($connect->connect_error){
        die("Connection failed" . $connect->connect_error);
    }
    return $connect;
}

function showSomething($something)
{
    echo '<pre>';
    var_dump($something);
    echo '</pre>';
    die();
}
function getAllMessages($connect): array
{
    $data = [];
    $sql = "SELECT * FROM Messages";
    $result = $connect->query($sql);
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        $data[] = $row;
    }
    return $data;
}

function addNewMessage($connect, $name, $message)
{
    $getUserId = "SELECT id FROM Users WHERE username = \"$name\"";
    $id = $connect->query($getUserId);
    if ($id && $id->num_rows > 0) {
        $row = $id->fetch_assoc();
        $user_id = $row['id'];
    }
$sql = "INSERT INTO Messages(name, message, user_id) VALUES (\"$name\", \"$message\", '$user_id')";
if(mysqli_query($connect, $sql)){
        echo "New record successfuly created";
    }
}

function addNewUser($connect, $username, $password)
{
    $sql = "INSERT INTO Users(username, password) VALUES (\"$username\", \"$password\")";
    if(mysqli_query($connect, $sql)){
        echo "New user is added";
    } else{ echo "Something is wrong";}
}

/*function checkUserCredentials($connect, $username, $password): array
{

    $data = [];
    $sql = "SELECT * FROM Users WHERE username = \"$username\" AND password = \"$password\"";
    $result = $connect->query($sql);
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        $data[] = $row;
    }
    return $data;

}*/
function checkUserCredentials($connect, $username, $password): bool
{
    $sql = "SELECT * FROM Users WHERE username = '$username' AND password = '$password'";
    $result = $connect->query($sql);
    if (mysqli_num_rows($result) > 0) {
        return true; // Якщо користувач існує, повертаємо true
    } else {
        return false; // Якщо користувача не знайдено, повертаємо false
    }
}
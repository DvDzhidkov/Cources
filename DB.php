<?php
function  GetPDO(): PDO
{
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'mainDb';
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
}

function showSomething($something)
{
    echo '<pre>';
    var_dump($something);
    echo '</pre>';
    die();
}
function getAllMessages(PDO $pdo): array
{
    $data = [];
    $sql = "SELECT * FROM Messages";
    $stmt = $pdo->query($sql);
    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        $data[] = $row;
    }
    return $data;
}

function addNewMessage(PDO $pdo, $name, $message)
{
    $getUserId = "SELECT id FROM Users WHERE username = ?";
    $stmt = $pdo->prepare($getUserId);
    $stmt->execute([$name]);
    $user_id = $stmt->fetchColumn();
    $sql = "INSERT INTO Messages(name, message, user_id) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    if($stmt->execute([$name, $message, $user_id])){
            echo "New record successfuly created";
        } else {
            echo "Error creating new record";
        }
}

function addNewUser(PDO $pdo, $username, $password)
{
    $sql = "INSERT INTO Users(username, password) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    if($stmt->execute([$username, $password])){
        echo "New user is added";
    } else{ echo "Something is wrong";}
}

function checkUserCredentials(PDO $pdo, $username, $password): bool
{
    $sql = "SELECT * FROM Users WHERE username = ? AND password = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $password]);
    $count = $stmt->fetchColumn();
    return $count > 0;
}

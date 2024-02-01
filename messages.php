<?php
require_once('DB.php');
$connect = GetConnection();

$messages = getAllMessages($connect);
showSomething($messages);

$connect = null;
header('Content-Type: application/json; charset=utf-8');
echo json_encode(['data'=>$messages]);

<?php
require_once('DB.php');
$connect = GetConnection();

if(!empty($_POST['name']) && !empty($_POST['message']))
{
    addNewMessage($connect, $_POST['name'], $_POST['message']);
} echo "Empty fields";

$connect = null;
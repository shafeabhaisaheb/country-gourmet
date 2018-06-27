<?php

$servername = "localhost";
$username = "shafea_bhaisaheb";
$password = "myfriends";
$dbname = "country_gourmet";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = '';
if (isset($_POST["id"]))
{
    $id = $_POST["id"];
}

$item_name = '';
if (isset($_POST["item_name"]))
{
    $item_name = $_POST["item_name"];
}

$description = '';
if (isset($_POST["description"]))
{
    $description = $_POST["description"];
}

$menu = '';
if (isset($_POST["menu"]))
{
    $menu = $_POST["menu"];
}

$status = '';
if (isset($_POST["status"]))
{
    $status = $_POST["status"];
}

$disporder = '';
if (isset($_POST["disporder"]))
{
    $disporder = $_POST["disporder"];
}

$price = '';
if (isset($_POST["price"]))
{
    $price = $_POST["price"];
}

$sql = "update items set item_name = '$item_name', description = '$description', price = $price, status = '$status', disporder = $disporder, menu = '$menu' where id = $id";

if ($conn->query($sql) === TRUE) {
    $result = "success";
} else {
    $result = "failure";
}

$conn->close();

$redirect_page = "item.php?menu=".$menu;

header("Refresh:0; url=" . $redirect_page);

?>
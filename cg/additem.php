<?php

$msg = '';
if (isset($_GET["msg"]))
{
    $msg = $_GET["msg"];
}

$menu = '';
if (isset($_GET["menu"]))
{
    $menu = $_GET["menu"];
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

$servername = "localhost";
$username = "shafea_bhaisaheb";
$password = "myfriends";
$dbname = "country_gourmet";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$servername = "localhost";
$username = "shafea_bhaisaheb";
$password = "myfriends";
$dbname = "country_gourmet";

$id = 0;
$sql = "select ifnull(max(id),0) 'id' from items";
$result = $conn->query($sql);
$value = "";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $id = $row["id"]*1 + 1;
    }
}

$sql = "insert into items (id, item_name, description, status, menu, disporder, price) values ($id, '$item_name', '$description', '$status', '$menu', $disporder, $price)";
if ($conn->query($sql) === TRUE) {
    $result = "success";
} else {
    $result = "failure";
}


$conn->close();

$redirect_page = "item.php?menu=".$menu;

header("Refresh:0; url=" . $redirect_page);

?>
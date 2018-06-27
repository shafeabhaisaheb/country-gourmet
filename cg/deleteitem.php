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

$menu = '';
if (isset($_POST["menu"]))
{
    $menu = $_POST["menu"];
}

$sql = "delete from items where id = $id";

if ($conn->query($sql) === TRUE) {
    $result = "success";
} else {
    $result = "failure";
}

$conn->close();

$redirect_page = "item.php?menu=".$menu;

header("Refresh:0; url=" . $redirect_page);

?>
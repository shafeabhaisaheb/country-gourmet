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

$id = '';
if (isset($_GET["id"]))
{
    $id = $_GET["id"];
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

$item_name = "";
$description = "";
$price = "";
$status = "";
$disporder = "";

$sql = "select item_name, description, price, status, disporder, menu from items where id = $id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $item_name = $row["item_name"];
        $description = $row["description"];
        $price = $row["price"];
        $status = $row["status"];
        $disporder = $row["disporder"];
        $menu = $row["menu"];
    }
}

$breakfast_selected = get_selected("Breakfast", $menu);
$lunch_selected = get_selected("Lunch", $menu);
$dinner_selected = get_selected("Dinner", $menu);
$dessert_selected = get_selected("Dessert", $menu);
$active_selected = get_selected("Active", $status);
$inactive_selected = get_selected("Inactive", $status);

function get_selected($option_value, $value) {
    $result = "";
    if ($option_value === $value){
        $result = "selected";
    }
    return $result;
}

$conn->close();

$pageContents = <<< EOPAGE

<!DOCTYPE html>
<html>
<body>

<table>
    <tr>
        <td valign='top' width='60'>
            <table>
                <tr>
                    <td>
                        <a href='main.php'>Main</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href='item.php?menu=Breakfast'>Breakfast</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href='item.php?menu=Lunch'>Lunch</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href='item.php?menu=Dinner'>Dinner</a>
                    </td>
                </tr>
            </table>
        </td>
        <td>
            <table>
                <tr>
                    <td>

                        <table>
                            <form action="updateitem.php" method="post">
                            <input type="hidden" name="id" value="$id">
                            <tr>
                                <td>
                                    Name:
                                </td>
                                <td>
                                    <input type='text' name='item_name' value='$item_name'>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Description:
                                </td>
                                <td>
                                    <input type='text' name='description' value='$description'>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Menu:
                                </td>
                                <td>
                                    <select name='menu'>
                                        <option value='Breakfast' $breakfast_selected>Breakfast</option>
                                        <option value='Lunch' $lunch_selected>Lunch</option>
                                        <option value='Dinner' $dinner_selected>Dinner</option>
                                        <option value='Dessert' $dessert_selected>Dessert</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Status:
                                </td>
                                <td>
                                    <select name='status'>
                                        <option value='Active' $active_selected>Active</option>
                                        <option value='Inactive' $inactive_selected>Inactive</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Display Order:
                                </td>
                                <td>
                                    <input type='text' name='disporder' value='$disporder'>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Price:
                                </td>
                                <td>
                                    <input type='text' name='price' value='$price'>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type='submit' value='Update Item'>
                                </td>
                                </form>
                                <form action="deleteitem.php" method="post">
                                <input type="hidden" name="id" value="$id">
                                <input type="hidden" name="menu" value="$menu">
                                <td>
                                    <input type='submit' value='Delete Item'>
                                </td>
                                </form>
                            </tr>
                            <tr>
                            </tr>
                        </table>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>

EOPAGE;

echo $pageContents;

?>
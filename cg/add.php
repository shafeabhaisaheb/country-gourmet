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
                        <form action="additem.php" method="post">
                        <input type="hidden" name="menu" value="$menu">

                        <table>
                            <tr>
                                <td>
                                    Name:
                                </td>
                                <td>
                                    <input type='text' name='item_name'>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Description:
                                </td>
                                <td>
                                    <input type='text' name='description'>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Menu:
                                </td>
                                <td>
                                    <select name='menu'>
                                        <option value='Breakfast'>Breakfast</option>
                                        <option value='Lunch'>Lunch</option>
                                        <option value='Dinner'>Dinner</option>
                                        <option value='Dessert'>Dessert</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Status:
                                </td>
                                <td>
                                    <select name='status'>
                                        <option value='Active'>Active</option>
                                        <option value='Inactive'>Inactive</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Display Order:
                                </td>
                                <td>
                                    <input type='text' name='disporder'>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Price:
                                </td>
                                <td>
                                    <input type='text' name='price'>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='2'>
                                    <input type='submit' value='Add Item'>
                                </td>
                            </tr>

                        </table>
                        </form>

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
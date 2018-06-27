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

function get_element_value($name, $conn) {
    $sql = "select value from elements where name = '$name'";
    $result = $conn->query($sql);
    $value = "";
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $value = $row["value"];
        }
    }
    return $value;
}

$menu_image = "";
$menu_subheading = "";
$menu_subheading_name = "";

if ($menu == "Breakfast"){
    $menu_image = get_element_value("breakfast_image", $conn);
    $menu_subheading = get_element_value("breakfast_subheading", $conn);
    $menu_subheading_name = "breakfast_subheading";
}

if ($menu == "Lunch"){
    $menu_image = get_element_value("lunch_image", $conn);
    $menu_subheading = get_element_value("lunch_subheading", $conn);
    $menu_subheading_name = "lunch_subheading";
}

if ($menu == "Dinner"){
    $menu_image = get_element_value("dinner_image", $conn);
    $menu_subheading = get_element_value("dinner_subheading", $conn);
    $menu_subheading_name = "dinner_subheading";
}

$str = "";

$sql = "select id, item_name, description, price, status, disporder from items where menu = '$menu' order by disporder";
$result = $conn->query($sql);
$str = "";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $item_name = $row["item_name"];
        $description = $row["description"];
        $price = $row["price"];
        $status = $row["status"];
        $disporder = $row["disporder"];

        $str = $str . "<tr>";
        $str = $str . "    <td>";
        $str = $str . "        <a href='edit.php?menu=$menu&id=$id'>$item_name</a>";
        $str = $str . "    </td>";
        $str = $str . "    <td>";
        $str = $str . "        $description";
        $str = $str . "    </td>";
        $str = $str . "    <td>";
        $str = $str . "        $disporder";
        $str = $str . "    </td>";
        $str = $str . "    <td>";
        $str = $str . "        $status";
        $str = $str . "    </td>";
        $str = $str . "    <td>";
        $str = $str . "        $price";
        $str = $str . "    </td>";
        $str = $str . "</tr>";

    }
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
                            <tr>
                                <td>
                                    <img src='img/$menu_image' width='100'>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <form action="upload.php" method="post" enctype="multipart/form-data">
                                    <input type="file" name="fileToUpload" id="fileToUpload">
                                    <input type="hidden" name="image_name" value="$menu_image">
                                    <input type="hidden" name="redirect_page" value="item.php">
                                    <input type="submit" value="Upload Image" name="submit">
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <form action="element.php" method="post">
                        <input type="hidden" name="redirect_page" value="item.php">
                        <table>
                            <tr>
                                <td>
                                    Heading:
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type='text' name='$menu_subheading_name' value='$menu_subheading' size='60'>
                                </td>
                                <td>
                                    <input type='submit' value='Save'>
                                </td>
                            </tr>
                        </table>
                        </form>
                    </td>
                </tr>

                <tr>
                    <td>
                        <table cellpadding='3' cellspacing='0' border='0'>
                            <tr>
                                <td>
                                    <a href='add.php?menu=$menu'>Add Item</a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td>
                        <table cellpadding='3' cellspacing='0' border='1'>
                            <tr>
                                <td>
                                    Name
                                </td>
                                <td>
                                    Description
                                </td>
                                <td>
                                    Order
                                </td>
                                <td>
                                    Status
                                </td>
                                <td>
                                    Price
                                </td>
                            </tr>

                            $str

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
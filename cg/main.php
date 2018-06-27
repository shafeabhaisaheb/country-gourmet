<?php

$msg = '';
if (isset($_GET["msg"]))
{
    $msg = $_GET["msg"];
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

$carousel1_image = get_element_value("carousel1_image", $conn);
$carousel1_heading = get_element_value("carousel1_heading", $conn);
$carousel1_subheading = get_element_value("carousel1_subheading", $conn);

$carousel2_image = get_element_value("carousel2_image", $conn);
$carousel2_heading = get_element_value("carousel2_heading", $conn);
$carousel2_subheading = get_element_value("carousel2_subheading", $conn);

$carousel3_image = get_element_value("carousel3_image", $conn);
$carousel3_heading = get_element_value("carousel3_heading", $conn);
$carousel3_subheading = get_element_value("carousel3_subheading", $conn);

$phone = get_element_value("phone", $conn);
$address = get_element_value("address", $conn);

$conn->close();

$pageContents = <<< EOPAGE

<!DOCTYPE html>
<html>
<body>

<h4>$msg</h4>

<h4>Main</h4>
<br>

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
            <table cellpadding='4' cellspacing='0' border='1'>
                <tr>
                    <td>
                        <b>Carousel 1</b>
                    </td>
                    <td>
                        <b>Carousel 2</b>
                    </td>
                    <td>
                        <b>Carousel 3</b>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td>
                                    <img src='img/$carousel1_image' width='100'>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <form action="upload.php" method="post" enctype="multipart/form-data">
                                    <input type="file" name="fileToUpload" id="fileToUpload">
                                    <input type="hidden" name="image_name" value="$carousel1_image">
                                    <input type="hidden" name="redirect_page" value="main.php">
                                    <input type="submit" value="Upload Image" name="submit">
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td>
                                    <img src='img/$carousel2_image' width='100'>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <form action="upload.php" method="post" enctype="multipart/form-data">
                                    <input type="file" name="fileToUpload" id="fileToUpload">
                                    <input type="hidden" name="image_name" value="$carousel2_image">
                                    <input type="hidden" name="redirect_page" value="main.php">
                                    <input type="submit" value="Upload Image" name="submit">
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td>
                                    <img src='img/$carousel3_image' width='100'>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <form action="upload.php" method="post" enctype="multipart/form-data">
                                    <input type="file" name="fileToUpload" id="fileToUpload">
                                    <input type="hidden" name="image_name" value="$carousel3_image">
                                    <input type="hidden" name="redirect_page" value="main.php">
                                    <input type="submit" value="Upload Image" name="submit">
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <br><br><br>

            <form action="element.php" method="post">
            <input type="hidden" name="redirect_page" value="main.php">

            <table cellpadding='4' cellspacing='0' border='1'>
                <tr>
                    <td>
                        <b>Carousel 1</b>
                    </td>
                    <td>
                        <b>Carousel 2</b>
                    </td>
                    <td>
                        <b>Carousel 3</b>
                    </td>
                    <td>
                        <b>Other</b>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td>Heading:</td>
                                <td><input type='text' name='carousel1_heading' value='$carousel1_heading'></td>
                            </tr>
                            <tr>
                                <td>Sub-Heading:</td>
                                <td><input type='text' name='carousel1_subheading' value='$carousel1_subheading'></td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td>Heading:</td>
                                <td><input type='text' name='carousel2_heading' value='$carousel2_heading'></td>
                            </tr>
                            <tr>
                                <td>Sub-Heading:</td>
                                <td><input type='text' name='carousel2_subheading' value='$carousel2_subheading'></td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td>Heading:</td>
                                <td><input type='text' name='carousel3_heading' value='$carousel3_heading'></td>
                            </tr>
                            <tr>
                                <td>Sub-Heading:</td>
                                <td><input type='text' name='carousel3_subheading' value='$carousel3_subheading'></td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td>Phone:</td>
                                <td><input type='text' name='phone' value='$phone'></td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td><input type='text' name='address' value='$address'></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan='4' align='center'>
                        <input type='submit' value='Update All'>
                    </td>
                </tr>
            </table>
            </form>
        </td>
    </tr>
</table>

</body>
</html>

EOPAGE;

echo $pageContents;

?>
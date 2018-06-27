<?php

$redirect_page = $_POST["redirect_page"];

$servername = "localhost";
$username = "shafea_bhaisaheb";
$password = "myfriends";
$dbname = "country_gourmet";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$carousel1_heading = '';
if (isset($_POST["carousel1_heading"]))
{
    $carousel1_heading = $_POST["carousel1_heading"];
    $result = update_element_value("carousel1_heading", $carousel1_heading, $conn);
}

$carousel1_subheading = '';
if (isset($_POST["carousel1_subheading"]))
{
    $carousel1_subheading = $_POST["carousel1_subheading"];
    $result = update_element_value("carousel1_subheading", $carousel1_subheading, $conn);
}

$carousel2_heading = '';
if (isset($_POST["carousel2_heading"]))
{
    $carousel2_heading = $_POST["carousel2_heading"];
    $result = update_element_value("carousel2_heading", $carousel2_heading, $conn);
}

$carousel2_subheading = '';
if (isset($_POST["carousel2_subheading"]))
{
    $carousel2_subheading = $_POST["carousel2_subheading"];
    $result = update_element_value("carousel2_subheading", $carousel2_subheading, $conn);
}

$carousel3_heading = '';
if (isset($_POST["carousel3_heading"]))
{
    $carousel3_heading = $_POST["carousel3_heading"];
    $result = update_element_value("carousel3_heading", $carousel3_heading, $conn);
}

$carousel3_subheading = '';
if (isset($_POST["carousel3_subheading"]))
{
    $carousel3_subheading = $_POST["carousel3_subheading"];
    $result = update_element_value("carousel3_subheading", $carousel3_subheading, $conn);
}

$phone = '';
if (isset($_POST["phone"]))
{
    $phone = $_POST["phone"];
    $result = update_element_value("phone", $phone, $conn);
}

$address = '';
if (isset($_POST["address"]))
{
    $address = $_POST["address"];
    $result = update_element_value("address", $address, $conn);
}

$breakfast_subheading = '';
if (isset($_POST["breakfast_subheading"]))
{
    $breakfast_subheading = $_POST["breakfast_subheading"];
    $result = update_element_value("breakfast_subheading", $breakfast_subheading, $conn);
}

$lunch_subheading = '';
if (isset($_POST["lunch_subheading"]))
{
    $lunch_subheading = $_POST["lunch_subheading"];
    $result = update_element_value("lunch_subheading", $lunch_subheading, $conn);
}

$dinner_subheading = '';
if (isset($_POST["dinner_subheading"]))
{
    $dinner_subheading = $_POST["dinner_subheading"];
    $result = update_element_value("dinner_subheading", $dinner_subheading, $conn);
}



function update_element_value($name, $value, $conn) {
    $result = "";
    $sql = "update elements set value = '$value' where name = '$name'";
    if ($conn->query($sql) === TRUE) {
        $result = "success";
    } else {
        $result = "failure";
    }
    return $result;

}

$conn->close();

$msg = "";
if (strcasecmp( $msg, 'failure' ) == 0){
    $msg = "Could not update successfully";

} else {
    $msg = "Successfully updated";
}


#header('Location: main.php?msg='.$msg);

header("Refresh:0; url=" . $redirect_page);

?>
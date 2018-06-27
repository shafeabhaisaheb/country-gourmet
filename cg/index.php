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


function get_menu_items($name, $conn) {
    $sql = "select item_name, description, price from items where menu = '$name' and status = 'Active' order by disporder";
    $result = $conn->query($sql);
    $str = "";
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $name = $row["item_name"];
            $description = $row["description"];
            $price = $row["price"];

            $str =  $str . "<div class='d-flex flex-column itemlist'>";
            $str =  $str . "<div class='d-flex flex-row item'>";
            $str =  $str . "    <h3>" . $name . "</h3>";
            $str =  $str . "    <h3 class='ml-auto'>" . $price . "</h3>";
            $str =  $str . "</div>    ";
            $str =  $str . "    <p>" . $description . " </p>";
            $str =  $str . "</div>    ";  

        }
    }
    return $str;
}

function get_holidays($status, $conn) {
    $sql = "select name from holidays where status = '$status'";
    $result = $conn->query($sql);
    $str = "";
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $name = $row["name"];
            $str = $str . $name . "<br>";
        }
    }
    return $str;
}

function get_hours($conn) {
    $sql = "select name, value from hours";
    $result = $conn->query($sql);
    $str = "";
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $name = $row["name"];
            $value = $row["value"];
            $str = $str . $name . " ". $value . "<br>";

        }

    }
    return $str;
}

$breakfast_subheading = get_element_value("breakfast_subheading", $conn);
$lunch_subheading = get_element_value("lunch_subheading", $conn);
$dinner_subheading = get_element_value("dinner_subheading", $conn);
$address = get_element_value("address", $conn);
$phone = get_element_value("phone", $conn);

$carousel1_image = get_element_value("carousel1_image", $conn);
$carousel1_heading = get_element_value("carousel1_heading", $conn);
$carousel1_subheading = get_element_value("carousel1_subheading", $conn);

$carousel2_image = get_element_value("carousel2_image", $conn);
$carousel2_heading = get_element_value("carousel2_heading", $conn);
$carousel2_subheading = get_element_value("carousel2_subheading", $conn);

$carousel3_image = get_element_value("carousel3_image", $conn);
$carousel3_heading = get_element_value("carousel3_heading", $conn);
$carousel3_subheading = get_element_value("carousel3_subheading", $conn);

$breakfast_image = "img/".get_element_value("breakfast_image", $conn);
$lunch_image = "img/".get_element_value("lunch_image", $conn);
$dinner_image = "img/".get_element_value("dinner_image", $conn);


$breakfast_str = get_menu_items("Breakfast", $conn);
$lunch_str = get_menu_items("Lunch", $conn);
$dinner_str = get_menu_items("Dinner", $conn);

$hours_str = get_hours($conn);
$footer = get_element_value("footer", $conn);

$holidays_closed = get_holidays("closed", $conn);
$holidays_limited = get_holidays("limited", $conn);

$conn->close();



$pageContents = <<< EOPAGE


<!DOCTYPE html>
<html lang="en">

    <head>

        <title>Country Gourmet</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href='landing.css' rel='stylesheet' type='text/css'> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

        <link href="https://fonts.googleapis.com/css?family=Rubik|Work+Sans|Cinzel:700|Pacifico" rel="stylesheet">

    </head>

    <body>

    <!-- NAVBAR --> 

    <nav class="navbar navbar-expand-sm navbar-light fixed-top">
        <div class="container navbar-brand">
            <img src="img/logo_white_bg.gif">
        </div>
        <button (click)="isCollapsed = !isCollapsed" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-main" aria-controls="navbar-main" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
 
        <div class="collapse navbar-collapse justify-content-end" id="navbar-main" [collapse]="isCollapsed">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="#intro">Menu</a>
                <a class="nav-item nav-link" href="#specials">Specials</a>
                <a class="nav-item nav-link" href="#catering">Catering</a>
            </div>
        </div>
    </nav>

    <!-- END NAVBAR -->

    <!-- START CAROUSEL -->

    <div id="maincarousel" class="carousel slide" data-ride="false">
        <ol class="carousel-indicators">
            <li data-target="#maincarousel" data-slide-to="0" class="active"></li>
            <li data-target="#maincarousel" data-slide-to="1"></li>
            <li data-target="#maincarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="img/$carousel1_image">
                <div class="carousel-caption d-none d-md-block">
                    <h5>$carousel1_heading</h5>
                    <p>$carousel1_subheading</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/$carousel2_image">
                <div class="carousel-caption d-none d-md-block">
                    <h5>$carousel2_heading</h5>
                    <p>$carousel2_subheading</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/$carousel3_image">
                <div class="carousel-caption d-none d-md-block">
                    <h5>$carousel3_heading</h5>
                    <p>$carousel3_subheading</p>
                </div>
            </div>
        </div>

        <a class="carousel-control-prev" href="#maincarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#maincarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- END CAROUSEL -->

<!-- ADDRESS BAR -->

    <div class="d-flex flex-column flex-sm-row address">
      <div class="p-2 addr">$address</div>
      <div class="ml-auto p-2">$phone</div>
    </div>

<!-- END ADDRESS BAR -->

<!-- INTRO DIV -->

<div id="intro" class="container-fluid text-center">
    <div class="row">
        <div class="col-sm-12">
            <h1> Welcome to <span class="fancytext">Country Gourmet!</span></h1> 
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <p>We are a family-owned restaurant serving breakfast, lunch, and dinner daily. We offer high-quality, healthy, innovative food with the convenient of casual dining. Come see why we've been a local favorite since 1986!</p>

            <h3>Explore our menus</h3>
            <div class="flex-column flex-sm-row justify-content-between">
                <button type="button" class="btn m-2"><i class="fas fa-download"></i> Breakfast </button> 
                <button type="button" class="btn m-2"><i class="fas fa-download"></i> Lunch </button>
                <button type="button" class="btn m-2"><i class="fas fa-download"></i> Dinner </button>
            </div>

        </div>
    </div>
</div>

<!-- END INTRO DIV -->

<!-- MENU DIV -->

<div class="container-fluid parallax1" id="specials">
  <div class="break"></div>
  <div class="container menudiv">
    <h1 class="fancytext">Weekly Specials</h1>
    <ul class="nav nav-tabs d-flex flex-column flex-sm-row justify-content-around" id="tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="breakfast-tab" data-toggle="tab" href="#breakfast" role="tab" aria-controls="breakfast" aria-selected="true">Breakfast</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="lunch-tab" data-toggle="tab" href="#lunch" role="tab" aria-controls="lunch" aria-selected="false">Lunch</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="dinner-tab" data-toggle="tab" href="#dinner" role="tab" aria-controls="dinner" aria-selected="false">Dinner</a>
        </li>
    </ul>

    <div class="tab-content" id="tabcontent">
        <!-- BREAKFAST PANE --> 

        <div class="tab-pane fade show active" id="breakfast" role="tabpanel" aria-labelledby="breakfast-tab">
            <div class="imghold"><img class="img-fluid rounded menuimg" src="$lunch_image"></div>
            <div class="row"> 
                <div class="col-sm-12">
                    <div id="menuheader">$breakfast_subheading</div>
                </div>
            </div> 
            $breakfast_str
        </div>

        <!-- LUNCH PANE -->

        <div class="tab-pane fade" id="lunch" role="tabpanel" aria-labelledby="lunch-tab">
            <div class="imghold"><img class="img-fluid rounded menuimg" src="$lunch_image"></div>
            <div class="row"> 
                <div class="col-sm-12">
                    <div id="menuheader">$lunch_subheading</div>
                </div>
            </div> 
            $lunch_str
        </div>

        <!-- DINNER PANE -->
        <div class="tab-pane fade" id="dinner" role="tabpanel" aria-labelledby="dinner-tab">
            <div class="imghold"><img class="img-fluid rounded menuimg" src="$dinner_image"></div>
            <div class="row"> 
                <div class="col-sm-12">
                    <div id="menuheader">$dinner_subheading</div>
                </div>
            </div> 
            $dinner_str
        </div>
    </div>

  </div>
  <div class="break"></div>
</div>


<!-- END MENU DIV -->

<!-- CATERING DIV  -->
    <div class="container-fluid text-center" id="catering">
        <div class="row">
            <div class="col-sm-12">
                <h1>Let <span class="fancytext">Country Gourmet</span> do the <span class="fancytext">cooking.</span></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <p>Do you have a favorite menu item you would like to serve while entertaining? Our catering menu is made up of our popular salads, sandwiches, and desserts, as well as crudite platters, Aram sandwiches, and chicken enchiladas.</p>

                <button type="button" class="btn btn-default"> View the Catering Menu</button> 
            </div>
        </div>
    </div>

<!-- End CATERING DIV -->

<!-- MISC FLOAT DIV -->

    <div class="container-fluid parallax2 text-center">
        <h3>Miscellaneous Floating Content</h3>

            <div class="container" id="misc">
                
                <div class="placeholder" style="height:200px;"></div>
            </div>
            <h3>This section is now over.</h3>

    </div>


<!-- END MISC FLOAT -->


<!-- HOURS -->
    <div class="container-fluid hours d-flext justify-content-between">
            <div class="row">
                <div class="col-sm-3 text-center">
                    <h4>HOURS:</h4>
                    $hours_str
                </div>
                <div class="col-sm-3 text-center">
                    <h4>CLOSED:</h4>
                    $holidays_closed
                </div>
                    
                <div class="col-sm-3 text-center">
                    <h4>LIMITED HOURS:</h4>
                    $holidays_limited
                </div>

                <div class="col-sm-3 text-center">
                    <h4>SENIOR DISCOUNTS:</h4>
                    Monday 2:00 pm - 9:00 pm <br>
                    Tuesday - Sunday 2:00 pm - 5:30 pm
                </div>

            </div>
        </div>

    <!-- END HOURS -->
    <!-- FOOTER -->

    <footer class="container-fluid text-center">
    <p> $footer </p>
    </footer>

    <!-- END FOOTER -->

    </body>
</html>

EOPAGE;

echo $pageContents;
?>
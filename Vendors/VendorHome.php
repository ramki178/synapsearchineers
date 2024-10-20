<?php
require('../config.php');
if($_SESSION['USERNAME']=="Ramki")
{
    $uname = $_SESSION['USERNAME'];
}
else if($_SESSION['USERNAME']=="admin")
{
    $uname = $_SESSION['USERNAME'];
}
else if($_SESSION['USERNAME']=="Supervisor")
{
    $uname = $_SESSION['USERNAME'];
}
else if($_SESSION['USERNAME']=="ramesh")
{
    $uname = $_SESSION['USERNAME'];
}
else if($_SESSION['USERNAME']=="amer")
{
    $uname = $_SESSION['USERNAME'];
}
$BALANCE=0;

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>View Records</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="refresh" content="900;url=logout.php" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/NavigationBar.css" />
    <link rel="stylesheet" href="SuperAdminStyles.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .txtBoxOne {
            height: 33px;
            width: 300px;
            position: relative;
            border: 1px solid #ff6a00;
            border-radius: 5px;
            border-color: cornflowerblue;
            background-color: lightskyblue;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark styleContainer" style="padding-top:0px;">
        <div class="container-fluid" style="background-color:#5d0b1d">
            <div class="navbar-header" style="background-color:#5d0b1d">
                <a href="index.html">
                    <img src="../images/SA_Logo_New.jpg" style="width:100%" />
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" style="justify-content:flex-end;" id="collapsibleNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#" style="color:white;background-color:#5d0b1d;font-family:'Times New Roman';font-size:16px">
                            <span class="glyphicon glyphicon-user">
                                <?php echo $uname;  ?>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="logout.php" style="color:white;background-color:#5d0b1d;font-family:'Times New Roman';font-size:16px">
                            <span class="glyphicon glyphicon-log-out"></span> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluidone">
        <div class="row">
            <div class="col-md-1 col-lg-1"></div>
            <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <a href="CreateVendor.php" style="width:100%" class="btn btn-primary linkStyle">Create New Vendor </a>
                        &nbsp;
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <a class="btn btn-primary" style="width:100%" href="VendorTableView.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-table" viewbox="0 0 16 16">
                                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"></path>
                            </svg>
                            Table View
                        </a>
                        &nbsp;
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <a href="../SuperAdminIndex.php" style="width:100%" class="linkStyle btn btn-primary">
                            <span class="glyphicon glyphicon-home"></span> Home
                        </a>
                    </div>
                </div>
                <br />
                <div class="form">
                    <?php

                    $count=1;
                    $i=0;
                    $sel_query="Select * from vendors ORDER BY ID desc;";
                    $result = mysqli_query($con,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h1 class="panel-title">
                                VENDOR ID: <?php echo $row["ID"]; ?>
                            </h1>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-4 col-md-3">Name</div>
                                <div class="col-xs-8 col-md-9">
                                    <?php echo $row["NAME"]; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4 col-md-3">Contact</div>
                                <div class="col-xs-8 col-md-9">
                                    <?php echo $row["CONTACT"]; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4 col-md-3">Address</div>
                                <div class="col-xs-8 col-md-9">
                                    <?php echo $row["ADDRESS"]; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4 col-md-3">Product</div>
                                <div class="col-xs-8 col-md-9">
                                    <?php echo $row["PRODUCT"]; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4 col-md-3">Description</div>
                                <div class="col-xs-8 col-md-9">
                                    <?php echo $row["DESCRIPTION"]; ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-xs-12">
                                    <a href="EditVendor.php?id=<?php echo $row["ID"]; ?>">
                                        <span class="glyphicon glyphicon-edit btn btn-sm btn-default">Edit</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div><?php $count++;
                    } ?>
                </div>
            </div>
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
        </div>
    </div>
</body>
</html>
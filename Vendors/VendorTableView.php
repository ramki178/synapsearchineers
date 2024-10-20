<?php
require('../config.php');
include("VendorModel.php");
include("VendorBusinessLayer.php");

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
        @media only screen and (min-device-width: 768px) {
            .divcenter {
                text-align-last: center;
            }

            .divright {
                text-align-last: right;
            }
        }

        @media only screen and (min-width: 100px) {
            .divcenter {
                text-align-last: left;
            }

            .divright {
                text-align-last: left;
            }
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
                                <?php echo $_SESSION['USERNAME']; ?>
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

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1 col-lg-1"></div>
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                <div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    <a href="../Vendors/CreateVendor.php" style="width:100%" class="btn btn-primary linkStyle">Create New Vendor </a>
                                    &nbsp;
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    <a class="btn btn-primary" style="width:100%" href="../Vendors/VendorHome.php">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-table" viewbox="0 0 16 16">
                                            <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"></path>
                                        </svg>
                                        Panel View
                                    </a>
                                    &nbsp;
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    <a href="../SuperAdminIndex.php" style="width:100%" class="linkStyle btn btn-primary">
                                        <span class="glyphicon glyphicon-home"></span> Home
                                    </a>
                                </div>
                            </div>

                        </div>
                        <br />
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form">
                                <br />
                                <table class="table table-dark responsive-style1" border="1" style="border-collapse:collapse;">
                                    <thead>
                                        <tr>
                                            <th>
                                                <strong>ID</strong>
                                            </th>
                                            <th>
                                                <strong>NAME</strong>
                                            </th>
                                            <th>
                                                <strong>CONTACT</strong>
                                            </th>
                                            <th>
                                                <strong>ADDRESS</strong>
                                            </th>
                                            <th>
                                                <strong>PRODUCT</strong>
                                            </th>
                                            <th>
                                                <strong>DESCRIPTION</strong>
                                            </th>
                                            <th>
                                                <strong>EDIT</strong>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count=1;
                                        $sel_query="Select * from vendors ORDER BY ID desc;";
                                        $result = mysqli_query($con,$sel_query);
                                        while($row = mysqli_fetch_assoc($result)) { ?>
                                        <tr>
                                            <td align="center">
                                                <?php echo $row["ID"]; ?>
                                            </td>
                                            <td align="center">
                                                <?php echo $row["NAME"]; ?>
                                            </td>
                                            <td align="center">
                                                <?php echo $row["CONTACT"]; ?>
                                            </td>
                                            <td align="center">
                                                <?php echo $row["ADDRESS"]; ?>
                                            </td>
                                            <td align="center">
                                                <?php echo $row["PRODUCT"]; ?>
                                            </td>
                                            <td align="center">
                                                <?php echo $row["DESCRIPTION"]; ?>
                                            </td>
                                            <td align="center">
                                                <a class="btn btn-danger" href="EditVendor.php?id=<?php echo $row["ID"]; ?>">Edit</a>
                                            </td>
                                        </tr><?php $count++;
                                        } ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
        </div>
    </div>
</body>
</html>
<?php
require('../config.php');
include("VendorModel.php");
include("VendorBusinessLayer.php");

$id=$_REQUEST['id'];
$query = "SELECT * from vendors where ID='".$id."'";
$result = mysqli_query($con, $query) or die ( mysqli_connect_error());
$row = mysqli_fetch_assoc($result);



?>
<html>
<head>
    <meta charset="utf-8" />
    <title>Update Record</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/NavigationBar.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <style>
        .hovertext {
            position: relative;
            border-bottom: 1px dotted black;
        }

            .hovertext:before {
                content: attr(data-hover);
                visibility: hidden;
                opacity: 0;
                width: 140px;
                background-color: black;
                color: #fff;
                text-align: center;
                border-radius: 5px;
                padding: 5px 0;
                transition: opacity 1s ease-in-out;
                position: absolute;
                z-index: 1;
                left: 0;
                top: 110%;
            }

            .hovertext:hover:before {
                opacity: 1;
                visibility: visible;
            }


        .txtBox {
            height: 33px;
            width: 300px;
            position: relative;
            border: 1px solid #ff6a00;
            border-radius: 5px;
            border-color: cornflowerblue;
            background-color: AliceBlue;
            font-size: 14px;
        }

            .txtBox :hover {
                border-color: burlywood;
            }
 .txtBoxTwo {
            height: 140px;
            width: 300px;
            position: relative;
            border: 1px solid #ff6a00;
            border-radius: 5px;
            border-color: cornflowerblue;
            background-color: AliceBlue;
            font-size: 14px;
        }
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

            .txtBoxOne :hover {
                border-color: burlywood;
            }
    </style>
     <script type="text/javascript">
        $(document).ready(function(){

           
            
        });
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark styleContainer" style="padding-top:0px;">
        <div class="container-fluid" style="background-color:#5d0b1d">
            <div class="navbar-header" style="background-color:#5d0b1d">
                <a href="index.html">
                    <img src="../images/SA_Logo_New.svg" style="width:80%" />
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
                                <?php echo $_SESSION['USERNAME'];  ?>
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
    <div class="container">
        <div class="row">
            <div class="col-xs-1 col-sm-1 col-md-3 col-lg-3">

            </div>
            <div class="col-xs-10 col-sm-10 col-md-6 col-lg-6">
                <div class="form" style="text-align-last:center">
                    <a href="VendorHome.php" style="width:55%" class="btn btn-primary linkStyle">Vendor Home </a>
                    <hr />
                    <h3>Update Vendor</h3>
                    <?php

                    if(isset($_POST['update']))
                    {
                        $businesslayer_obj=new vendorbusinesslayer();
                        $formdata_obj= new vendor();

                        $formdata_obj->ID=$id;
                        $formdata_obj->NAME=$_REQUEST['NAME'];
                        $formdata_obj->CONTACT=$_REQUEST['CONTACT'];
                        $formdata_obj->ADDRESS=$_REQUEST['ADDRESS'];
                        $formdata_obj->PRODUCT=$_REQUEST['PRODUCT'];
                        $formdata_obj->DESCRIPTION=$_REQUEST['DESCRIPTION'];

                        $businesslayer_obj->update_vendor($formdata_obj);
                        if (headers_sent()) {
                    ?> <a href='/Vendors/VendorHome.php'>View Updated Record</a> <?php
                        }
                        else{
                            header('Location:/Vendors/VendorHome.php');
                        }

                    }
                    else {
                    ?>
                    <div>

                        <form name="form" method="post" action="">
                            
                            <p>
                                <span class="hovertext" data-hover="VENDOR NAME">
                                    <input type="text" name="NAME" class="txtBox" placeholder="TRANSACTION DATE"
                                        required value="<?php echo $row['NAME'];?>" />
                                </span>

                            </p>
                            <p>
                                <span class="hovertext" data-hover="PHONE NUMBER">
                                    <input type="text" id="txtName" name="CONTACT" class="txtBox" maxlength="10" placeholder="PHONE NUMBER"
                                        required value="<?php echo $row['CONTACT'];?>" />
                                </span>

                            </p>
                            <p>
                                <span class="hovertext" data-hover="ADDRESS">
                                    <input type="text" id="txtContact" name="ADDRESS" class="txtBox" placeholder="ADDRESS"
                                        required value="<?php echo $row['ADDRESS'];?>" />
                                </span>

                            </p>
                            <p>
                                <span class="hovertext" data-hover="PRODUCT">
                                    <input type="text" name="PRODUCT" class="txtBox" placeholder="PRODUCT"
                                        required value="<?php echo $row['PRODUCT'];?>" />
                                </span>

                            </p>
                            <p>
                                <span class="hovertext" data-hover="DESCRIPTION">
                                    <input type="text" name="DESCRIPTION" class="txtBox" placeholder="DESCRIPTION"
                                        required value="<?php echo $row['DESCRIPTION'];?>" />
                                </span>

                            </p>
                            
                           
                            
                        
                            
                            <p>
                                <input name="update" onclick="checkbox_validation()" type="submit" value="Update" class="btn btn-default txtBox" style="color:white;background-color:dodgerblue;" />
                            </p>
                        </form><?php } ?>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
</body>
</html>
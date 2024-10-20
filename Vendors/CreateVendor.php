<?php
require('../config.php');


include("VendorModel.php");
include("VendorBusinessLayer.php");
include("../Models/Credit_Purchase_Model.php");
//include("../Models/BUSINESS_LAYER.php");
//include("../Models/SUPERVISOR_TRANSACTIONS.php");

//$_PAYMENT_CATEGORY_VALUE=0;//used
//$_PAYMENT_SUB_CATEGORY_VALUE=0;//used
//$transaction_obj=new transaction();
//$error="";
//$_paymode_value="";


if(isset($_POST['insert']))
{
    $businesslayer_obj=new vendorbusinesslayer();
    $formdata_obj= new vendor();

    $formdata_obj->ID=$businesslayer_obj->get_vendor_id();
    $formdata_obj->NAME=$_REQUEST['NAME'];
    $formdata_obj->CONTACT=$_REQUEST['CONTACT'];
    $formdata_obj->ADDRESS=$_REQUEST['ADDRESS'];
    $formdata_obj->PRODUCT=$_REQUEST['PRODUCT'];
    $formdata_obj->DESCRIPTION=$_REQUEST['DESCRIPTION'];

   $businesslayer_obj->insert_vendor($formdata_obj);


   $credit_pruchase_obj=new creditpurchase();
   $credit_pruchase_obj->ID=$businesslayer_obj->get_credit_purchase_id();
   $credit_pruchase_obj->DATE=date('d-m-y');
   $credit_pruchase_obj->PRODUCT=$_REQUEST['PRODUCT'];
   $credit_pruchase_obj->PRICE=0;
   $credit_pruchase_obj->QUANTITY=0;
   $credit_pruchase_obj->TOTAL=0;
   $credit_pruchase_obj->PAID=0;
   $credit_pruchase_obj->DUE=0;
   $credit_pruchase_obj->VENDOR_ID=$formdata_obj->ID;
   $credit_pruchase_obj->PURCHASED_BY="";
   $credit_pruchase_obj->TRANSACTION_ID=0;

   $businesslayer_obj->insert_credit_purchase_initial($credit_pruchase_obj);

   header('Location: /Vendors/VendorHome.php');

}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Insert New Record</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/NavigationBar.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="/PayCat.js" ></script>
    <script src="/CheckBoxValidation.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            
            

             
        });
    </script>
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
       $(document).ready(function () {
                   $(document).on('change', ".name", function () {
                       var x = document.getElementById('txtName').value;
                       var specials = /[^A-Za-z 0-9]/;
                       var y = specials.test(x);
                       if (y == true) {
                           alert("Please Enter Text");
                       }
                       else
                       {
                           if (isNaN(x))
                           {
                                       
                           }
                           else
                           {
                               alert("Please Enter Text");
                               this.value = "";
                           }
                       }
                   });
                   $(document).on('change', ".phonenumber", function () {
                       var x = document.getElementById('txtContact').value;
                       if (isNaN(x))
                       {
                            alert("Please Enter Numeric Value");
                            this.value = "";
                       }
                       else
                       {
                            var digits_count = x.length;
                           if (digits_count < 11)
                           {

                           }
                           else
                           {
                               alert("length can not exceed 10 digits");
                               this.value = "";
                           }
                       }
                   });
        }); 

        $(document).ready(function () {
            
        }); 
        function checkbox_validation() {
            
        }
    </script>
    <script type="text/javascript">
        
    </script>
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

        <div class="form">
            <div>
                <div class="row">
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-3">
                        
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
                        <div  style="text-align-last:center">
                            <a href="VendorHome.php" style="width:55%" class="btn btn-primary linkStyle">Vendor Home </a>
                            <hr />
                        </div>
                        <form name="form" method="post" action=""  style="text-align-last:center">
                            <p>
                                <span span class="hovertext" data-hover="VENDOR NAME">
                                    <input type="text" name="NAME"  id="txtName" class="txtBox name" placeholder="VENDOR NAME"
                                        required value="" />
                                </span>
                            </p>
                            <p>
                                <span span class="hovertext" data-hover="VENDOR CONTACT">
                                    <input type="text" id="txtContact" name="CONTACT" class="txtBox phonenumber" maxlength="10" placeholder="CONTACT"
                                        required value="<?php   ?>" />
                                </span>
                            </p>
                            <p>
                                <span span class="hovertext" data-hover="VENDOR ADDRESS">
                                    <input type="text" name="ADDRESS" class="txtBox" placeholder="ADDRESS"
                                        required value="<?php   ?>" />
                                </span>
                            </p>
                            <p>
                                <span span class="hovertext" data-hover="PROCUCT">
                                    <input type="text" name="PRODUCT" class="txtBox" placeholder="PRODUCT"
                                        required value="<?php  ?>" />
                                </span>
                            </p>
                            <p>
                                <span span class="hovertext" data-hover="DESCRIPTION">
                                    <input type="text" name="DESCRIPTION" class="txtBox" placeholder="DESCRIPTION"
                                        required value="<?php  ?>" />
                                </span>
                            </p>
                            <p>
                                <span style="color:#FF0000;font-size:16px"><?php  ?></span>
                            </p>
                            <p>
                                <input name="insert" type="submit" value="Insert" class="btn btn-default txtBox" style="color:white;background-color:dodgerblue" onclick="checkbox_validation()" />
                            </p>
                        </form>
                        <p style="color:#FF0000;">
                            <?php  ?>
                        </p>
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-3">
                        
                    </div>
                </div>
            </div>
        </div>
       
    </div>
     
</body>
</html>
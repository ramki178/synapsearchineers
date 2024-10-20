<?php
require('config.php');
include("Models/CONFIG_MODEL.php");
include("Models/Credit_Purchase_model.php");
error_reporting(0);

class businesslayer
{

    public $TRANSACTION_ID="";
    public $RECORD_DATE="";
    public $TRANSACTION_DATE="";
    public $SITE_ID="";
    public $SITE_NAME="";
    public $PAYMENT_CATEGORY="";
    public $PAYMENT_SUB_CATEGORY="";
    public $PAYMENT_CONTRACTOR_NAME="";
    public $AMOUNT="";
    public $STATUS="";
    public $PAYMENT_MODE="";
    public $PAYMENTMODE_SELECTED="";
    public $REMARKS="";
    public $RECORDED_BY="";
    public $host="";
    public $user="";
    public $password="";
    public $dbname="";
    public $con;
    public $SUPERVISOR_ID="";
    public $CURRENT_BALANCE=0;
    public $PRICE="";
    public $QUANTITY="";
    public $creditpurchase_obj;
    public $name1="";
    function __construct()
    {
         $this->creditpurchase_obj=new creditpurchase();
        $this->host = "103.108.220.125"; /* Host name */
        $this->user = "ramakrishna"; /* User */
        $this->password = "Ganesh@1186"; /* Password */
        $this->dbname = "mabsaoof_synapse"; /* Database name */
        $this->con = mysqli_connect($this->host,  $this->user, $this->password,$this->dbname);
        // Check connection
        if (!$this->con) {
            die("Connection failed: " . mysqli_connect_error());
        }

    }
    public  function get_record_date()
    {
        $this->RECORD_DATE = date('d-m-y');
        $this->TRANSACTION_DATE=$_REQUEST['TRANSACTION_DATE'];
        return $this->TRANSACTION_DATE;
    }
    function get_tramsaction_date()
    {
        $this->RECORD_DATE = date('d-m-y');
        $this->TRANSACTION_DATE=$_REQUEST['TRANSACTION_DATE'];
        return $this->TRANSACTION_DATE;
    }
    public  function get_transaction_id()
    {
        $sql_query = "Select * from out_transactions ORDER BY ID desc";
        $result = mysqli_query($this->con,$sql_query);
        $row = mysqli_fetch_assoc($result);
        if($row==null)
        {
            $this->TRANSACTION_ID=0;
        }
        else
        {
            $this->TRANSACTION_ID = $row["ID"];

        }
         $this->TRANSACTION_ID=$this->TRANSACTION_ID+1;
        return $this->TRANSACTION_ID;
    }
    function get_site_id()
    {
        return $this->SITE_ID=$_REQUEST['sel_sitename'];
    }
    function get_site_name($id)
    {
        $_SITEID=$_REQUEST['sel_sitename'];
        $query ="select SITE_NAME from synapse_sites where ID='".$_SITEID."'";
        $result = mysqli_query($this->con,$query);

        if($result->num_rows>0)
        {
            while($optionData=$result->fetch_assoc())
            {
                $this->SITE_NAME=$optionData['SITE_NAME'];
            }

        }
        return $this->SITE_NAME;
    }
    function get_payment_category()
    {
        $_PAYMENT_CATEGORY_VALUE = $_REQUEST['paycat_name'];
        $query ="select * from payment_category where ID='".$_PAYMENT_CATEGORY_VALUE."'";
        $result = mysqli_query($this->con,$query);

        if($result->num_rows>0)
        {
            while($optionData=$result->fetch_assoc())
            {
                $this->PAYMENT_CATEGORY=$optionData['PAYMENT CATEGORY'];
            }

        }
        return $this->PAYMENT_CATEGORY;
    }
    function get_payment_sub_category()
    {
        $_PAYMENT_SUB_CATEGORY_VALUE = $_REQUEST['paysubcat_name'];
        $query ="select * from payment_sub_category where ID='".$_PAYMENT_SUB_CATEGORY_VALUE."'";
        $result = mysqli_query($this->con,$query);

        if($result->num_rows>0)
        {
            while($optionData=$result->fetch_assoc())
            {
                $this->PAYMENT_SUB_CATEGORY=$optionData['PAYMENT_SUB_CATEGORY'];
            }

        }
        return $this->PAYMENT_SUB_CATEGORY;
    }
    function get_payment_contractor_name()
    {
        $PAYMENT_CONTRACTOR_VALUE = $_REQUEST['sel_contractors_name'];
        $query ="select * from synapse_contractors where ID='".$PAYMENT_CONTRACTOR_VALUE."'";
        $result = mysqli_query($this->con,$query);

        if($result->num_rows>0)
        {
            while($optionData=$result->fetch_assoc())
            {
                $this->PAYMENT_CONTRACTOR_NAME=$optionData['CONTRACTOR_NAME'];
            }

        }

        return $this->PAYMENT_CONTRACTOR_NAME;
    }
    public  function get_amount()
    {

        return $this->AMOUNT=$_REQUEST['AMOUNT'];
    }
    public  function get_payment_mode()
    {

        $_paymode_value=$_POST['paymode'];
        if($_paymode_value!="")
        {
            for($i=0;$i<1;$i++)
            {
                $name1=$_paymode_value[$i];
                $this->PAYMENT_MODE=$name1;
            }
            return $this->PAYMENT_MODE;
        }
        else
        {
            return $this->PAYMENT_MODE="";
        }
    }
    public  function get_remarks()
    {

        return $this->REMARKS=$_REQUEST['REMARKS'];
    }
    public  function get_recorded_by()
    {

        return $this->RECORDED_BY=$_SESSION['USERNAME'];
    }
    public  function insert_out_transactions($obj)
    {

        $ins_query="CALL sp_insert_out_transaction('".$obj->TRANSACTION_ID."',
                                            '".$obj->RECORD_DATE."',
                                            '".$obj->TRANSACTION_DATE."',
                                            '".$obj->SITE_ID."',
                                            '".$obj->SITE_NAME."',
                                            '".$obj->PAYMENT_CATEGORY."',
                                            '".$obj->PAYMENT_SUB_CATEGORY."',
                                            '".$obj->PAYMENT_CONTRACTOR_NAME."',
                                            '".$obj->AMOUNT."',
                                            '".$obj->STATUS."',
                                            '".$obj->PAYMENT_MODE."',
                                            '".$obj->REMARKS."',
                                            '".$obj->RECORDED_BY."')";
        mysqli_query($this->con,$ins_query)
        or die(mysqli_connect_error());
    }
    public  function get_supervisor_transactions_id()
    {

        $query="select * from supervisor_transactions order by ID desc";
        $result = mysqli_query($this->con,$query);
        $row = mysqli_fetch_assoc($result);
        if($row==null)
        {
            $this->SUPERVISOR_ID=1;
        }
        else
        {
            $this->SUPERVISOR_ID = $row["ID"];
        }
        $this->SUPERVISOR_ID =$this->SUPERVISOR_ID +1;
        return $this->SUPERVISOR_ID ;
    }
    public  function get_current_balance()
    {
        $query3="select * from supervisor_transactions where SUPERVISOR_USERNAME='".$_SESSION['USERNAME']."' order by BALANCE ASC";
        $result = mysqli_query($this->con,$query3);
        $row = mysqli_fetch_assoc($result);
        $this->CURRENT_BALANCE = $row["BALANCE"];
        return $this->CURRENT_BALANCE ;
    }
    public  function insert_supervisor_transactions($obj)
    {

        $ins_query="CALL sp_insert_supevisor_transactions('".$obj->ID."',
                                            '".$obj->AMOUNT_RECIEVED."',
                                            '".$obj->AMOUNT_SPENT."',
                                            '".$obj->BALANCE."',
                                            '".$obj->SUPERVISOR_USERNAME."',
                                            '".$obj->TRANSACTION_ID."')";
        mysqli_query($this->con,$ins_query)
        or die(mysqli_connect_error());
    }

    public function update_transaction($obj)
    {
        $ins_query="CALL sp_update_out_transaction('".$obj->TRANSACTION_ID."',
                                            '".$obj->RECORD_DATE."',
                                            '".$obj->TRANSACTION_DATE."',
                                            '".$obj->SITE_ID."',
                                            '".$obj->SITE_NAME."',
                                            '".$obj->PAYMENT_CATEGORY."',
                                            '".$obj->PAYMENT_SUB_CATEGORY."',
                                            '".$obj->PAYMENT_CONTRACTOR_NAME."',
                                            '".$obj->AMOUNT."',
                                            '".$obj->STATUS."',
                                            '".$obj->PAYMENT_MODE."',
                                            '".$obj->REMARKS."',
                                            '".$obj->RECORDED_BY."')";
        mysqli_query($this->con,$ins_query)
        or die(mysqli_connect_error());
    }
    public  function update_supervisor_transaction($obj)
    {

        $ins_query="CALL sp_update_supervisor_transaction('".$obj->ID."',
                                            '".$obj->AMOUNT_RECIEVED."',
                                            '".$obj->AMOUNT_SPENT."',
                                            '".$obj->BALANCE."',
                                            '".$obj->SUPERVISOR_USERNAME."',
                                            '".$obj->TRANSACTION_ID."')";
        mysqli_query($this->con,$ins_query)
        or die(mysqli_connect_error());
    }

    /// credit purchase
    public function get_credit_purchase_id()
    {
        $sql_query = "Select * from credit_purchase ORDER BY ID desc";
        $result = mysqli_query($this->con,$sql_query);
        $row = mysqli_fetch_assoc($result);
        if($row==null)
        {
            $this->creditpurchase_obj->ID=0;
        }
        else
        {
            $this->creditpurchase_obj->ID = $row["ID"];

        }
        $this->creditpurchase_obj->ID=$this->creditpurchase_obj->ID+1;
        return $this->creditpurchase_obj->ID;
    }
    public function get_credit_purchase_date()
    {
        return $this->creditpurchase_obj->DATE=date('d-m-y');
    }
    public function get_credit_purchase_product()
    {
        //paysubcat_name
        $vendorid = $_REQUEST['sel_vendor_name'];
        $this->creditpurchase_obj->VENDOR_ID=$vendorid;
        $query ="select * from vendors where ID='".$vendorid."'";
        $result = mysqli_query($this->con,$query);

        if($result->num_rows>0)
        {
            while($optionData=$result->fetch_assoc())
            {
                $this->creditpurchase_obj->PRODUCT=$optionData['PRODUCT'];
            }

        }
        return $this->creditpurchase_obj->PRODUCT;
    }
    public function get_credit_purchase_price()
    {
        return $this->creditpurchase_obj->PRICE=$_REQUEST['PRICE'];
    }
    public function get_credit_purchase_quantity()
    {
        return $this->creditpurchase_obj->QUANTITY=$_REQUEST['QUANTITY'];
    }
    public function get_credit_purchase_total()
    {
        $this->creditpurchase_obj->TOTAL=$this->creditpurchase_obj->QUANTITY * $this->creditpurchase_obj->PRICE;
        return $this->creditpurchase_obj->TOTAL;
    }
    public function get_credit_purchase_paid()
    {

        return $this->creditpurchase_obj->PAID=0;
    }
    public function get_credit_purchase_due($CR_TRANSACTION_ID)
    {
        $z=0;
        $vendorid = $_REQUEST['sel_vendor_name'];
        $this->creditpurchase_obj->VENDOR_ID=$vendorid;
        $this->TRANSACTION_ID= $CR_TRANSACTION_ID;
        $query ="select * from credit_purchase where VENDOR_ID='".$vendorid."' ORDER BY ID DESC";
        $result = mysqli_query($this->con,$query);

        if($result->num_rows>0)
        {
            while($optionData=$result->fetch_assoc())
            {
                $x=$optionData['DUE'];
                $y=$this->creditpurchase_obj->TOTAL;
                $z=$y +$x;
                return $this->creditpurchase_obj->DUE= $z;

            }

        }
        else
        {
            return $this->creditpurchase_obj->DUE=$this->creditpurchase_obj->TOTAL;
        }


    }
    public function get_credit_purchase_vendor_id()
    {
        return $this->creditpurchase_obj->VENDOR_ID;
    }
    function get_credit_purchase_vendor_name($id)
    {

        $query ="select NAME from vendors where ID='".$id."'";
        $result = mysqli_query($this->con,$query);

        if($result->num_rows>0)
        {
            while($optionData=$result->fetch_assoc())
            {
                $this->SITE_NAME=$optionData['NAME'];
            }

        }
        return $this->SITE_NAME;
    }
    public function get_credit_purchase_purchased_by()
    {
        return $this->creditpurchase_obj->QUANTITY=$_SESSION['USERNAME'];
    }
    public function get_credit_purchase_transaction_id()
    {
        return $this->creditpurchase_obj->QUANTITY=$this->TRANSACTION_ID;
    }
    public  function insert_credit_purchase($obj)
    {

        $ins_query="CALL sp_insert_credit_purchase('".$obj->ID."',
                                                    '".$obj->DATE."',
                                                    '".$obj->PRODUCT."',
                                                    '".$obj->PRICE."',
                                                    '".$obj->QUANTITY."',
                                                    '".$obj->TOTAL."',
                                                    '".$obj->PAID."',
                                                    '".$obj->DUE."',
                                                    '".$obj->VENDOR_ID."',
                                                    '".$obj->PURCHASED_BY."',
                                                    '".$obj->TRANSACTION_ID."')";
        mysqli_query($this->con,$ins_query)
        or die(mysqli_connect_error());
    }
}
?>
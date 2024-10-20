<?php
 require('../Configuration.php');

class vendorbusinesslayer
{
    public $ID="";
    public $con;
    public $row;
    public $cr_id="";
    function __construct()
    {
        $connection_obj=new configuration();
        $this->con=$connection_obj->con;

    }

    public  function get_vendor_id()
    {
        $sql_query = "Select * from vendors ORDER BY ID desc";
        $result = mysqli_query($this->con,$sql_query);
        $row = mysqli_fetch_assoc($result);
        if($row==null)
        {

            $this->ID=0;
        }
        else
        {
            $this->ID = $row["ID"];

        }
        $this->ID=$this->ID+1;
        return $this->ID;
    }
    public  function insert_vendor($obj)
    {

        $ins_query="CALL sp_insert_vendor('".$obj->ID."',
                                            '".$obj->NAME."',
                                            '".$obj->CONTACT."',
                                            '".$obj->ADDRESS."',
                                            '".$obj->PRODUCT."',
                                            '".$obj->DESCRIPTION."')";
        mysqli_query($this->con,$ins_query)
        or die(mysqli_connect_error());
    }
    public  function update_vendor($obj)
    {
        $ins_query="update vendors set NAME='".$obj->NAME."',
                                             CONTACT='".$obj->CONTACT."',
                                             ADDRESS='".$obj->ADDRESS."',
                                             PRODUCT='".$obj->PRODUCT."',
                                             DESCRIPTION='".$obj->DESCRIPTION."'
                                             where ID='".$obj->ID."'";
        mysqli_query($this->con,$ins_query)
        or die(mysqli_connect_error());
    }
    public  function get_credit_purchase_id()
    {
        $sql_query = "Select * from credit_purchase ORDER BY ID desc";
        $result = mysqli_query($this->con,$sql_query);
        $row = mysqli_fetch_assoc($result);
        if($row==null)
        {
            $this->cr_id=0;
        }
        else
        {
            $this->cr_id = $row["ID"];

        }
        $this->cr_id=$this->cr_id+1;
        return $this->cr_id;
    }
    public  function insert_credit_purchase_initial($obj)
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
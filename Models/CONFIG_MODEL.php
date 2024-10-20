<?php
class configuration
{
    public $host="";
    public $user="";
    public $password="";
    public $dbname="";

    function get_con_object()
    {
        $this->host = "103.108.220.125"; /* Host name */
        $this->user = "ramakrishna"; /* User */
        $this->password = "Ganesh@1186"; /* Password */
        $this->dbname = "mabsaoof_synapse"; /* Database name */
        $con = mysqli_connect($this->host,  $this->user, $this->password,$this->dbname);
        // Check connection
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $this->$con;
    }

}
?>
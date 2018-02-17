<?php
$connectionString = getenv("MYSQLCONNSTR_localdb");
$varsString = str_replace(";", "&", $connectionString);
parse_str($varsString);
$conn = new mysqli($Data_Source, $User_Id, $Password, $Database);
if($conn->connect_errno){
    echo $conn->connect_errno.": ".$conn->connect_error;
}
?>

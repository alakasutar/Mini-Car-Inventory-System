<?php
#enter host
$host = "localhost"; 
#enter database name
$dbname   = "id6459976_test";
#enter username
$username = "";
# enter password
$password = "";

$conn_rw = mysqli_connect($host, $username, $password);
if (!$conn_rw) {
    die("Connection failed: " . mysqli_error($conn_rw));
}

mysqli_select_db($conn_rw, $dbname) or DIE('Database name is not available!'.MYSQL_ERROR());

?>